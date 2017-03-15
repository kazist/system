<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Megamenu\Controllers;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Controller\AddonController;
use System\Addons\Megamenu\Models\MegamenuModel;

/**
 * Kazist view class for the application
 *
 * @since  1.0
 */
class MegamenuController extends AddonController {

    public $paths = array();
    public $app = '';
    public $flexview_id = '';

    function indexAction($category_id = '1', $layout = 'custom') {

        $model = new MegamenuModel($this->container, $this->request);
        $model->paths = $this->paths;
        $model->app = $this->app;
        $model->flexview_id = $this->flexview_id;

        $menus = $model->getCategoriesMenus($category_id);

        $data_arr['layout'] = $layout;
        $data_arr['menus'] = $menus;

        $this->html = $this->render('System:Addons:Megamenu:views:megamenu.twig', $data_arr);

        $response = $this->response($this->html);

        return $response;
    }

}
