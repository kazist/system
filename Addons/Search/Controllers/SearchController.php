<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Search\Controllers;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Controller\AddonController;
use System\Addons\Search\Models\SearchModel;

/**
 * Kazist view class for the application
 *
 * @since  1.0
 */
class SearchController extends AddonController {

    public $flexview_id = '';

    function indexAction($theme = 'success', $show_filter = true) {

        $model = new SearchModel;
        $session = $this->container->get('session');

        $filters = $model->getSearchSubsets();

        $search_phrase = $session->get('search_phrase');
        $search_filter = $session->get('search_filter');

        $data_arr['theme'] = $theme;
        $data_arr['search_phrase'] = $search_phrase;
        $data_arr['search_filter'] = $search_filter;
        $data_arr['show_filter'] = $show_filter;
        $data_arr['filters'] = $filters;

        $this->html = $this->render('System:Addons:Search:views:search.twig', $data_arr);

        $response = $this->response($this->html);



        return $response;
    }

}
