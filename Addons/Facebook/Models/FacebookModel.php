<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Facebook\Models;

use Kazist\KazistFactory;

class FacebookModel {

    public $block_id = '';

    public function getFacebookTabs() {
        $factory = new KazistFactory();
        $tabs = $factory->getSetting('system.block.facebook.tabs', $this->flexview_id);
        return $tabs;
    }

    public function getFacebookHeight() {
        $factory = new KazistFactory();
        $height = $factory->getSetting('system.block.facebook.height', $this->flexview_id);
        return $height;
    }

    public function getFacebookWidth() {
        $factory = new KazistFactory();
        $width = $factory->getSetting('system.block.facebook.width', $this->flexview_id);
        return $width;
    }

    public function getFacebookHref() {
        $factory = new KazistFactory();
        $href = $factory->getSetting('system.block.facebook.href', $this->flexview_id);
        return $href;
    }

    public function getFacebookShowFacepile() {
        $factory = new KazistFactory();
        $show_facepile = $factory->getSetting('system.block.facebook.show_facepile', $this->flexview_id);
        return ($show_facepile) ? 'true' : 'false';
    }

    public function getFacebookSmallHeader() {
        $factory = new KazistFactory();
        $small_header = $factory->getSetting('system.block.facebook.small_header', $this->flexview_id);
        return ($small_header) ? 'true' : 'false';
    }

}
