<?php

/*
 * This file is part of Kazist Framework.
 * (c) Dedan Irungu <irungudedan@gmail.com>
 *  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 * 
 */

/**
 * Description of SettingsController
 *
 * @author sbc
 */

namespace System\Settings\Code\Controllers\Admin;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Controller\BaseController;

class SettingsController extends BaseController {

    public function indexAction($offset = 0, $limit = 10) {

        $subsets = $this->model->getSubsets();
        $subset = $subsets[0];
        $path = $this->request->get('path');

        if ($path == '') {
            $path = str_replace('/', '.', $subset->path);
        }
        $settings = $this->model->getSettings($path);
        $path_subset = $this->model->getPathSubset($path);

        $path_arr = explode('.', $path);
        $tmp_data_arr['settings'] = $settings;
        $tmp_data_arr['path'] = $path;
        $tmp_data_arr['root'] = $path_arr[0];

        $html = $this->render('Kazist:views:main:setting.index.twig', $tmp_data_arr);

        $this->data_arr['path_subset'] = $path_subset;
        $this->data_arr['subsets'] = $subsets;
        $this->data_arr['settings'] = $settings;
        $this->data_arr['settings_html'] = $html;
        $this->data_arr['item'] = $path_subset;

        return parent::indexAction($offset, $limit);
    }

}
