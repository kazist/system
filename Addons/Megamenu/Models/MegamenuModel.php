<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Megamenu\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\KazistFactory;
use Kazist\Service\Database\Query;
use Kazist\Model\BaseModel;
use Kazist\Service\System\Template\Template;

class MegamenuModel extends BaseModel {

    public $app;
    public $paths = array();
    public $block_id = '';

    public function getCategories($alias = '', $fetch_menu = false) {

        $query = new Query();

        $query->select('smc.*');
        $query->from('#__system_menus_categories', 'smc');
        $query->where('smc.published=1');
        $query->orderBy('smc.title');
        if ($alias != '') {
            $query->andWhere('smc.alias=:alias');
            $query->setParameter('alias', $alias);
        }

        $records = $query->loadObjectList();


        if (!empty($records)) {
            foreach ($records as $key => $record) {
                $records[$key]->menus = $this->getCategoriesMenus($record->id);
            }
        }

        return $records;
    }

    public function getCategoriesMenus($category_id) {


        $factory = new KazistFactory;

        $query = new Query();

        $query->select('sm.*');
        $query->from('#__system_menus', 'sm');
        $query->where('sm.category_id=:category_id');
        $query->andWhere('sm.published=1');
        $query->orderBy('sm.parent_id');
        $query->addOrderBy('sm.ordering');
        $query->addOrderBy('sm.id');
        $query->addOrderBy('sm.title');
        $query->setParameter('category_id', (int) $category_id);

        $records = $query->loadObjectList();

        $records = $this->processTree($records);

        return $records;
    }

    public function processTree($records) {

        $tree_arr = array();

        if (!empty($records)) {
            foreach ($records as $key => $record) {

                $parent_id = $record->parent_id;
                $record->url = (false === strpos($record->url, '://')) ? WEB_BASE . '/' . $record->url : $record->url;

                if ($parent_id) {
                    $tree_arr[$parent_id]->children[] = $record;
                } else {
                    $tree_arr[$record->id] = $record;
                    $tree_arr[$record->id]->blocks = $this->loadBlocks($record);
                }
            }
        }

        return $tree_arr;
    }

    public function loadBlocks($record) {

        $templates = new Template($this->container, $this->request);

        $flexviews = $templates->getFlexviewHtml($record->position);


        return $flexviews;
    }

}
