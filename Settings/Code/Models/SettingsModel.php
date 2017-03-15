<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Settings\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

/**
 * Description of AdvertModel
 *
 * @author sbc
 */
class SettingsModel extends BaseModel {

    public function getSubsets() {

        $factory = new KazistFactory;

        $query = $factory->getQueryBuilder('#__system_settings', 'ss');
        $query->leftJoin('ss', '#__system_subsets', 'sub', 'sub.id=ss.subset_id');
        $query->select('DISTINCT sub.*');
        $query->where('ss.subset_id >= 1');
        $query->orderBy('sub.title', 'ASC');

        $subsets = $query->loadObjectList();

        return $subsets;
    }

    public function getPathSubset($path) {

        $factory = new KazistFactory;
        
        $new_path = str_replace('.', '/', $path);
        
        $query = $factory->getQueryBuilder('#__system_subsets', 'ss');
        $query->orderBy('ss.title', 'ASC');
        $query->where('ss.path=:path');
        $query->setParameter('path', $new_path);

        $subset = $query->loadObject();

        return $subset;
    }

    public function getSettings($path) {

        $settings = array();
        $path_arr = explode('.', $path);
        $path_arr = array_map('ucfirst', $path_arr);

        $new_path = JPATH_ROOT . 'applications/' . implode('/', $path_arr) . '/Code/setting.json';

        if (file_exists($new_path)) {
            $settings = json_decode(file_get_contents($new_path), true);
        }

        $setting = $this->prepareSetting($settings);


        return $setting;
    }

    public function prepareSetting($settings) {

        if (!empty($settings)) {
            foreach ($settings as $key => $setting) {

                $settings[$key]['options'] = array();

                if ($setting['source']['custom'] <> '') {
                    $settings[$key]['options'] = $setting['source']['custom'];
                }

                if ($setting['source'] <> '') {
                    $settings[$key]['options'] = array_merge($settings[$key]['options'], $this->getSettingOptions($setting));
                }

                $settings[$key]['default'] = $this->getSettingDefault($setting);
            }
        }


        return $settings;
    }

    public function getSettingDefault($setting) {

        $name = $setting['name'];

        $record = $this->getQueryedRecord('#__system_settings', 'ss', array('ss.name=:name'), array('name' => $name));

        return $record->value;
    }

    public function getSettingOptions($setting) {

        $tmp_array = array();
        $query = new Query();

        $table = $setting['source']['table']['name'];
        $wheres = $setting['source']['table']['where'];
        $orders = $setting['source']['table']['order'];
        $value = $setting['source']['table']['value'];
        $text = $setting['source']['table']['text'];

        if (is_array($setting) && $table <> '') {

            $query->select($text . ', ' . $value);
            $query->from($table);

            foreach ($wheres as $key => $where) {
                (!$key) ? $query->where($where) : $query->andWhere($where);
            }

            foreach ($orders as $key => $order) {
                $order_arr = explode(' ', $order);
                (!$key) ? $query->orderBy($order_arr[0], $order_arr[1]) : $query->addOrderBy($order_arr[0], $order_arr[1]);
            }

            $records = $query->loadObjectList();

            foreach ($records as $key => $record) {
                $tmp_array[] = array('value' => $record->$value, 'text' => $record->$text);
            }
        }

        return $tmp_array;
    }

    public function save($form) {


        foreach ($form as $key => $item) {

            $record = $this->getQueryedRecord('#__system_settings', 'ss', array('ss.name=:name'), array('name' => $key));

            if (is_object($record)) {
                $record->value = $item;
            } else {
                $record = new \stdClass();
                $record->name = $key;
                $record->value = $item;
            }

            $this->saveRecord('#__system_settings', $record);
        }
    }

}
