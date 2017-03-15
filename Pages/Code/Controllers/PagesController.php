<?php

/*
 * This file is part of Kazist Framework.
 * (c) Dedan Irungu <irungudedan@gmail.com>
 *  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 * 
 */

/**
 * Description of PagesController
 *
 * @author sbc
 */

namespace System\Pages\Code\Controllers;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\KazistFactory;
use Kazist\Controller\BaseController;

class PagesController extends BaseController {

    public function detailAction($id = '') {

        $factory = new KazistFactory();

        $rate_enable = $factory->getSetting('system_pages_rate_enable');
        $addthis_enable = $factory->getSetting('system_pages_addthis_enable');
        $disqus_enable = $factory->getSetting('system_pages_disqus_enable');
        $survey_enable = $factory->getSetting('system_pages_survey_enable');

        $item = $this->model->getRecord($id);

        $data_arr['item'] = $item;
        $data_arr['rate_enable'] = $rate_enable;
        $data_arr['addthis_enable'] = $addthis_enable;
        $data_arr['disqus_enable'] = $disqus_enable;
        $data_arr['survey_enable'] = $survey_enable;


        $this->html = $this->render('System:Pages:Code:views:detail.index.twig', $data_arr);

        $response = $this->response($this->html);



        return $response;
    }

}
