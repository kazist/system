<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Search\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\KazistFactory;

class SearchModel {

    public $block_id = '';

    public function getInfo() {
        return 'Hello World!';
    }

    public function getSearchSubsets() {

        $factory = new KazistFactory;

        $records = $factory->getRecords('#__search_subsets', 'ss');

        return $records;
    }

    public function getTheme() {
        $factory = new KazistFactory();

        $theme = $factory->getSetting('system.block.search.theme', $this->flexview_id);

        return $theme;
    }

    public function getShowFilter() {
        $factory = new KazistFactory();

        $show_filter = $factory->getSetting('system.block.search.filters.show', $this->flexview_id);

        return $show_filter;
    }

}
