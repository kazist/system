<?php

//Thanks for iYETER on http://stackoverflow.com/questions/927341/upload-entire-directory-via-php-ftp

namespace System\Extensions\Code\Classes;

defined('KAZIST') or exit(DIE_MSG);

use Kazist\KazistFactory;

class FtpNew {

    private $successful = true;
    private $connectionID;
    private $ftpSession = false;
    private $blackList = array('.', '..', 'Thumbs.db');
    private $ignore_list = array('config.php');

    public function __construct($ftpHost = "") {
        if ($ftpHost != "")
            $this->connectionID = ftp_connect($ftpHost);
    }

    public function __destruct() {
        $this->disconnect();
    }

    public function connect($ftpHost) {
        $this->disconnect();
        $this->connectionID = ftp_connect($ftpHost);
        return $this->connectionID;
    }

    public function login($ftpUser, $ftpPass) {
        if (!$this->connectionID)
            throw new Exception("Connection not established.", -1);
        $this->ftpSession = ftp_login($this->connectionID, $ftpUser, $ftpPass);
        return $this->ftpSession;
    }

    public function disconnect() {
        if (isset($this->connectionID)) {
            ftp_close($this->connectionID);
            unset($this->connectionID);
        }
    }

    public function send_recursive_directory($localPath, $remotePath) {
        return $this->recurse_directory($localPath, $localPath, $remotePath);
    }

    private function recurse_directory($rootPath, $localPath, $remotePath) {

        $errorList = array();
        //$remotePath = realpath($remotePath);

        if (!is_dir($localPath)) {
            throw new Exception("Invalid directory: $localPath");
        }

        chdir($localPath);
        $directory = opendir(".");

        while ($file = readdir($directory)) {
            if (in_array($file, $this->blackList))
                continue;
            if (is_dir($file)) {
                $errorList["$remotePath/$file"] = $this->make_directory("$remotePath/$file");
                $errorList[] = $this->recurse_directory($rootPath, "$localPath/$file", "$remotePath/$file");
                chdir($localPath);
            } else {
                $errorList["$remotePath/$file"] = $this->put_file("$localPath/$file", "$remotePath/$file");
            }
        }

        return $errorList;
    }

    function recursiveDelete($directory) {

        $factory = new KazistFactory();

        foreach ($this->ignore_list as $key => $ignore) {
            if (strpos($directory, $ignore)) {
                return;
            }
        }

        # here we attempt to delete the file/directory
        if (!(@ftp_rmdir($this->connectionID, $directory) || @ftp_delete($this->connectionID, $directory))) {

            # if the attempt to delete fails, get the file listing
            $filelist = @ftp_nlist($this->connectionID, '-A ' . $directory);
            $buff = ftp_rawlist($this->connectionID, '-aAF /' . $directory);

            unset($buff[0]);
            unset($buff[1]);

            if (count($filelist) && count($buff) && count($filelist) == count($buff)) {

                # loop through the file list and recursively delete the FILE in the list
                foreach ($filelist as $file) {
                    $this->recursiveDelete($file);
                }

                if ($this->successful) {
                    #if the file list is empty, delete the DIRECTORY we passed
                    $this->recursiveDelete($directory);
                }
            } else {

                $this->successful = FALSE;

                foreach ($filelist as $file) {
                    $this->recursiveDelete($file);
                }

                $factory->enqueueMessage('Directory: ' . $directory, 'error');

                foreach ($buff as $file) {
                    $factory->enqueueMessage('File:   ' . $file, 'error');
                }
            }
        }
    }

    public function make_directory($remotePath) {

        $error = "";

        try {
            if (!$this->ftp_is_dir($this->connectionID, $remotePath)) {

                ftp_mkdir($this->connectionID, $remotePath);
                ftp_chmod($this->connectionID, 0777, $remotePath);
                chown($remotePath, get_current_user());
            }
        } catch (Exception $e) {
            if ($e->getCode() == 2)
                $error = $e->getMessage();
        }
        return $error;
    }

    public function put_file($localPath, $remotePath) {
        $error = "";

        try {

            ftp_put($this->connectionID, $remotePath, $localPath, FTP_BINARY);
            ftp_chmod($this->connectionID, 0777, $remotePath);
            chown($remotePath, get_current_user());
        } catch (Exception $e) {
            if ($e->getCode() == 2)
                $error = $e->getMessage();
        }
        return $error;
    }

    function ftp_is_dir($ftp, $dir) {

        $pushd = ftp_pwd($ftp);

        if ($pushd !== false && @ftp_chdir($ftp, $dir)) {
            ftp_chdir($ftp, $pushd);
            return true;
        }

        return false;
    }

}
