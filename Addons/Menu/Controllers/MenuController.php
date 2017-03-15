<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Menu\Controllers;

use Kazist\Controller\AddonController;
use System\Addons\Menu\Models\MenuModel;

/**
 * Kazist view class for the application
 *
 * @since  1.0
 */
class MenuController extends AddonController {

    public $flexview_id = '';

    function indexAction($category_id = '1') {
        $model = new MenuModel;

        $model->flexview_id = $this->flexview_id;

        $menus = $model->getCategoriesMenus($category_id);

        $data_arr['menus'] = $menus;

        $this->html = $this->render('System:Addons:Menu:views:menu.twig', $data_arr);

        $response = $this->response($this->html);



        return $response;
    }

}
