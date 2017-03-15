<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Facebook\Controllers;

use Kazist\Controller\AddonController;
use System\Addons\Facebook\Models\FacebookModel;

/**
 * Kazist view class for the application
 *
 * @since  1.0
 */
class FacebookController extends AddonController {

    public $flexview_id = '';

    function indexAction($offset = 0, $limit = 6) {

        $model = new FacebookModel;

        $model->flexview_id = $this->flexview_id;

        $tabs = $model->getFacebookTabs();
        $height = $model->getFacebookHeight();
        $width = $model->getFacebookWidth();
        $href = $model->getFacebookHref();
        $show_facepile = $model->getFacebookShowFacepile();
        $small_header = $model->getFacebookSmallHeader();

        $data_arr['tabs'] = $tabs;
        $data_arr['height'] = $height;
        $data_arr['width'] = $width;
        $data_arr['href'] = $href;
        $data_arr['show_facepile'] = $show_facepile;
        $data_arr['small_header'] = $small_header;

        $this->html = $this->render('System:Addons:Facebook:views:facebook.twig', $data_arr);

        $response = $this->response($this->html);



        return $response;
    }

}
