<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Issuestracker\Controllers;

use Kazist\Controller\AddonController;
use System\Addons\Issuestracker\Models\IssuestrackerModel;

/**
 * Kazist view class for the application
 *
 * @since  1.0
 */
class IssuestrackerController extends AddonController {

    public $flexview_id = '';

    function indexAction($offset = 0, $limit = 6) {

        $model = new IssuestrackerModel;

        $model->flexview_id = $this->flexview_id;

        $script = $model->getScript();

        $data_arr['script'] = $script;

        $this->html = $this->render('System:Addons:Issuestracker:views:issuestracker.twig', $data_arr);

        $response = $this->response($this->html);



        return $response;
    }

}
