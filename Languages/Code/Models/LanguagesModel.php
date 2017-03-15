<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Languages\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;

/**
 * Description of AdvertModel
 *
 * @author sbc
 */
class LanguagesModel extends BaseModel {

    public function getLanguagePhrases($id = '') {

        $language = $this->getRecord($id);

        $language_json = json_decode(file_get_contents($language->file_path), TRUE);

        return $language_json;
    }

    public function save($form_data = '') {

        $factory = new KazistFactory;

        $language = $this->getRecord($form_data['id']);

        $file_path_arr = explode('/', $language->file_path);
        $file_path_arr_rev = array_reverse($file_path_arr);
        $file_name = $file_path_arr_rev[0];

        unset($file_path_arr_rev[0]);

        $language_path = JPATH_ROOT . 'cache/language/' . implode('/', array_reverse($file_path_arr_rev));
        $phrases = json_encode($form_data['phrases'], JSON_PRETTY_PRINT);

        $factory->makeDir($language_path);
        file_put_contents($language_path . '/' . $file_name, $phrases);

        return $form_data['id'];
    }

}
