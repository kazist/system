<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Googleanalytics\Controllers;

use Kazist\Controller\AddonController;
use System\Addons\Googleanalytics\Models\GoogleanalyticsModel;

/**
 * Kazist view class for the application
 *
 * @since  1.0
 */
class GoogleanalyticsController extends AddonController {

    public $flexview_id = '';

    function indexAction($offset = 0, $limit = 6) {

        $model = new GoogleanalyticsModel;
        $model->flexview_id = $this->flexview_id;


        $tracking_id = $model->getTrackingId();


        $data_arr['tracking_id'] = $tracking_id;

        $this->html = $this->render('System:Addons:Googleanalytics:views:googleanalytics.twig', $data_arr);

        $response = $this->response($this->html);



        return $response;
    }

}
