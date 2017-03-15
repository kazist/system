<?php

/*
 * This file is part of Kazist Framework.
 * (c) Dedan Irungu <irungudedan@gmail.com>
 *  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 * 
 */

/**
 * Description of FlexviewController
 *
 * @author sbc
 */

namespace System\Flexviews\Code\Controllers\Admin;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\KazistFactory;
use Kazist\Controller\BaseController;
use System\Flexviews\Code\Models\FlexviewsModel;

class FlexviewsController extends BaseController {

    public function editAction($id = '') {

        $this->model = new FlexviewsModel($this->doctrine, $this->request);

        if ($id) {
            $record = $this->model->getRecord($id);
            $data_arr['item'] = $record;
            $data_arr['routes'] = $this->model->getFlexviewRoutes($id);
            $data_arr['positions'] = $this->model->getFlexviewPositions($record->viewside);
            $data_arr['menu_positions'] = $this->model->getFlexviewMenuPositions($record->viewside);
            $data_arr['positions'] = array_merge($data_arr['positions'], $data_arr['menu_positions']);
            $data_arr['selected_positions'] = $this->model->getFlexviewSelectedPositions($id);
            $data_arr['settings'] = $this->model->prepareSetting($record);
        }

        $data_arr['action_type'] = 'edit';
        $data_arr['show_action'] = true;
        $data_arr['show_messages'] = true;


        $json_list = $this->model->getDetailedJson(null, $id);

        $json_list['fields']['extension_id']['parameters']['options'] = $this->model->getExtensionInput();

        $data_arr['json_object'] = $json_list;

        $this->html .= $this->render('Kazist:views:edit:edit.index.twig', $data_arr);

        $response = $this->response($this->html);

        return $response;
    }

    public function saveAction() {

        $form = $this->request->request->get('form');
        $activity = $this->request->query->get('activity');
        $this->model = new FlexviewsModel($this->doctrine, $this->request);

        if ($activity == 'savecopy') {
            $flexview = $this->model->getRecord($form['id']);
            $form = json_decode(json_encode($flexview), true);
            $form['flexview'] = $form['id'];
            unset($form['id']);
        }

        if ($form['render'] == 'flexview') {
            $flexview_id = $this->model->saveRenderFlexview($form);
        } elseif ($form['render'] == 'twig') {
            $flexview_id = $this->model->saveRenderTwig($form);
        } elseif ($form['render'] == 'custom') {
            $flexview_id = $this->model->saveRenderCustom($form);
        }

        $this->model->saveOtherData($form, $flexview_id);

        switch ($activity) {
            case 'savecopy':
                return $this->redirectToRoute('admin.system.flexviews.edit', array('id' => $flexview_id));
            case 'savenew':
                return $this->redirectToRoute('admin.system.flexviews.add');
            case 'saveclose':
                return $this->redirectToRoute('admin.system.flexviews');
            default:
                return $this->redirectToRoute('admin.system.flexviews.edit', array('id' => $flexview_id));
        }

        return $this->redirectToRoute('admin.system.flexviews', array('id' => $flexview_id));
    }

}
