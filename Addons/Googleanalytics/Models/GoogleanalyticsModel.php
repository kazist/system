<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Googleanalytics\Models;

use Kazist\KazistFactory;

class GoogleanalyticsModel {

    public $block_id = '';

    public function getInfo() {
        return 'Hello World!';
    }

    public function getTrackingId() {

        $factory = new KazistFactory();

        $tracking_id = $factory->getSetting('system.block.googleanalytics.tracking.id', $this->flexview_id);

        return $tracking_id;
    }

}
