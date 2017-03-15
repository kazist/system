<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Extensions\Code\Classes;

defined('KAZIST') or exit(DIE_MSG);

use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

class AutoDiscover {

    public function processAutoDiscover() {
        $applications = $this->getApplications();

        foreach ($applications as $key => $application) {

            $addon_detail = $this->getAddonDetails($application->name);

            $applications[$key]->type = 'application';
            $applications[$key]->fetched_data = $addon_detail;
        }

        return $applications;
    }

    public function getApplications() {
        $factory = new KazistFactory;
        $db = $factory->getDatabase();

        $query = new Query();
        $query->select('name, title, explanation, description');
        $query->from('#__system_applications', 'sa');
        $query->orderBy('name');

        $records = $query->loadObjectList();

        return $records;
    }

    public function getRepositories() {
        $factory = new KazistFactory;
        $db = $factory->getDatabase();

        $query = new Query();
        $query->select('*');
        $query->from('#__system_addons_repositories', 'sar');

        $records = $query->loadObjectList();

        return $records;
    }

    public function getAddonDetails($addon_name, $type = 'application') {
        $addon_detail = '';
        $repositories = $this->getRepositories();

        foreach ($repositories as $repository) {
            $addon_detail = $this->curlProcessor($repository, $addon_name, $type);

            if ($addon_detail['exist'] || $addon_detail['is_owner']) {
                return $addon_detail;
            }
        }

        return $addon_detail;
    }

    public function curlProcessor($repository, $addon_name, $type) {

        $data = array();
        $data['token'] = $repository->token;
        $data['name'] = $addon_name;
        $data['type'] = $type;

        $url = rtrim($repository->url, '/') .  '/extension-single';


        $curl = curl_init();
        // Set some options - we are passing in a useragent too here

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data
        ));

        // Send the request & save response to $resp
        $resp = curl_exec($curl);

        // Close request to clear up some resources
        curl_close($curl);

        $result = json_decode($resp, true);

        return $result;
    }

}
