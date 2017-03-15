<?php

/*
 * This file is part of Kazist Framework.
 * (c) Dedan Irungu <irungudedan@gmail.com>
 *  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 * 
 */

namespace System\Flexviews\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

/**
 * Description of MarketplaceModel
 *
 * @author sbc
 */
class FlexviewsModel extends BaseModel {

    public function getFlexviewPositions($viewside) {

        $tmp_array = array();

        $query = new Query();

        $record = $query->select('*')
                ->from('#__system_templates')
                ->where('viewside=:viewside')
                ->andWhere('is_default=:is_default')
                ->andWhere('published=:published')
                ->setParameter('is_default', 1)
                ->setParameter('published', 1)
                ->setParameter('viewside', $viewside)
                ->loadObject();

        $filename = JPATH_ROOT . 'themes/' . $record->viewside . '/' . $record->name . '/positions.json';
        //  print_r($viewside); exit;

        $position_json = json_decode(file_get_contents($filename), true);

        foreach ($position_json['index'] as $key => $position) {
            $tmp_array[] = array('value' => $position, 'text' => $position);
        }

        return $tmp_array;
    }

    public function getFlexviewMenuPositions($viewside) {

        $tmp_array = array();

        $query = new Query();

        if ($viewside == 'frontend') {

            $records = $query->select('*')
                    ->from('#__system_menus')
                    ->where('position<>:position')
                    ->setParameter('position', '')
                    ->loadObjectList();

            foreach ($records as $key => $record) {
                $tmp_array[] = array('value' => $record->position, 'text' => $record->position . ' [Menu]');
            }
        }

        return $tmp_array;
    }

    public function getFlexviewSelectedPositions($id) {

        $query = new Query();

        $records = $query->select('position')
                ->from('#__system_flexviews_positions')
                ->where('flexview_id=:flexview_id')
                ->setParameter('flexview_id', $id)
                ->loadObjectList();

        foreach ($records as $key => $record) {
            $tmp_array[] = $record->position;
        }

        return $tmp_array;
    }

    public function getFlexviewInput() {

        $tmp_arr = array();
        $query = new Query();

        $records = $query->select('id, unique_name, title')
                ->from('#__system_flexviews')
                ->orderBy('unique_name')
                ->loadObjectList();


        foreach ($records as $record) {
            $tmp_arr[] = array('value' => $record->id, 'text' => $record->unique_name . ' -- [' . $record->title . ']');
        }

        return $tmp_arr;
    }

    public function getFlexviewRoutes($flexview_id) {

        $query = new Query();

        $records = $query->select('*')
                ->from('#__system_routes_flexviews')
                ->where('flexview_id=:flexview_id')
                ->setParameter('flexview_id', $flexview_id)
                ->loadObjectList();

        return $records;
    }

    public function getExtensionInput() {

        $tmp_arr = array();
        $query = new Query();

        $records = $query->select('id, name')
                ->from('#__system_extensions')
                ->where('extension=:extension')
                ->setParameter('extension', 'component')
                ->loadObjectList();


        foreach ($records as $record) {
            $tmp_arr[] = array('value' => $record->id, 'text' => $record->name);
        }

        return $tmp_arr;
    }

    public function prepareSetting($record) {

        $params = json_decode($record->params, true);
        $settings = json_decode($record->setting, true);

        foreach ($settings as $key => $setting) {

            $settings[$key]['options'] = array();

            if ($setting['source'] <> '') {
                $settings[$key]['options'] = $setting['source']['custom'];
            }

            if ($setting['source'] <> '') {
                $settings[$key]['options'] = array_merge($settings[$key]['options'], $this->getSettingOptions($setting));
            }

            $settings[$key]['default'] = $params[$setting['name']];
        }


        return $settings;
    }

    public function getSettingOptions($setting) {

        $tmp_array = array();
        $query = new Query();

        $table = $setting['source']['table']['name'];
        $wheres = $setting['source']['table']['where'];
        $orders = $setting['source']['table']['order'];
        $value = $setting['source']['table']['value'];
        $text = $setting['source']['table']['text'];

        if ($table <> '') {
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

    public function prepareFlexviewObject($form, $flexview) {


        $tmp_flexview = (array) $flexview;

        foreach ($form as $field_name => $field) {

            $field_name = trim($field_name);

            if (array_key_exists($field_name, $tmp_flexview)) {
                $flexview->$field_name = $field;
            }
        }

        $flexview->params = (is_array($form['params'])) ? json_encode($form['params']) : $flexview->params;
        $flexview->is_modified = 1;

        return $flexview;
    }

    public function saveRenderFlexview($form) {

        $flexview_id = 0;

        $flexview_entity = new \System\Flexviews\Code\Tables\Flexviews;
        $factory = new KazistFactory();
     
        if (!$form['id']) {
            $flexview = $factory->getRecord('#__system_flexviews', 'sf', array('sf.id=:id'), array('id' => $form['flexview']));
            unset($flexview->id);
        } else {
            $flexview = $factory->getRecord('#__system_flexviews', 'sf', array('sf.id=:id'), array('id' => $form['id']));
        }

        $flexview = $this->prepareFlexviewObject($form, $flexview);

        if (is_object($flexview)) {

            $this->saveEntity($flexview_entity, $flexview);

            $flexview_id = $id = $flexview_entity->getId();
        }
        return $flexview_id;
    }

    public function saveRenderTwig($form) {

        $flexview_entity = new \System\Flexviews\Code\Tables\Flexviews;
        $factory = new KazistFactory();

        if (!$form['id']) {
            $file_content = file_get_contents('applications/System/Flexviews/Code/samplejson/twig_flexview.json');
            $flexview = json_decode($file_content);
            $flexview->render = 'twig';
            $flexview->twig_file = $form['twig'];
        } else {
            $flexview = $factory->getRecord('#__system_flexviews', 'sf', array('sf.id=:id'), array('id' => $form['id']));
        }

        $flexview = $this->prepareFlexviewObject($form, $flexview);

        $flexview->unique_name = strtolower(str_replace(' ', '_', $flexview->title));

        $this->saveEntity($flexview_entity, $flexview);

        $flexview_id = $id = $flexview_entity->getId();

        return $flexview_id;
    }

    public function saveRenderCustom($form) {

        $flexview_entity = new \System\Flexviews\Code\Tables\Flexviews;
        $factory = new KazistFactory();

        if (!$form['id']) {
            $file_content = file_get_contents(JPATH_ROOT . 'applications/System/Flexviews/Code/samplejson/custom_flexview.json');
            $flexview = json_decode($file_content);
            $flexview->render = 'custom';
            $flexview->main_content = $form['custom'];
        } else {
            $flexview = $factory->getRecord('#__system_flexviews', 'sf', array('sf.id=:id'), array('id' => $form['id']));
        }


        $flexview = $this->prepareFlexviewObject($form, $flexview);

        $flexview->unique_name = strtolower(str_replace(' ', '_', $flexview->title));

        $this->saveEntity($flexview_entity, $flexview);

        $flexview_id = $id = $flexview_entity->getId();

        return $flexview_id;
    }

    public function saveOtherData($form, $flexview_id) {

        $factory = new KazistFactory();

        if (!empty($form['positions'])) {

            $ids = array();

            foreach ($form['positions'] as $key => $position) {

                $position_arr = array();
                $position_arr['position'] = $position;
                $position_arr['flexview_id'] = $flexview_id;

                $where_arr = array('position=:position', 'flexview_id=:flexview_id');

                $position = $factory->getRecord('#__system_flexviews_positions', 'sfp', $where_arr, $position_arr);
                $position_arr['id'] = $position->id;

                $ids[] = $factory->saveRecord('#__system_flexviews_positions', $position_arr);
            }

            if (!empty($ids)) {
                $position_arr = array();
                $position_arr['flexview_id'] = $flexview_id;
                $where_arr = array('flexview_id=:flexview_id', 'id NOT IN (' . implode(',', $ids) . ')');
                $factory->deleteRecords('#__system_flexviews_positions', $where_arr, $position_arr);
            }
        }

        if (!empty($form['routes'])) {

            $tmp_ids = array();

            foreach ($form['routes'] as $key => $route_arr) {
                if ($route_arr['route'] <> '') {
                    $tmp_ids[] = $factory->saveRecord('#__system_routes_flexviews', $route_arr);
                }
            }

            if (!empty($tmp_ids)) {
                $position_arr = array();
                $position_arr['flexview_id'] = $flexview_id;
                $where_arr = array('flexview_id=:flexview_id', 'id NOT IN (' . implode(',', $tmp_ids) . ')');
                $factory->deleteRecords('#__system_routes_flexviews', $where_arr, $position_arr);
            }
        }
    }

}
