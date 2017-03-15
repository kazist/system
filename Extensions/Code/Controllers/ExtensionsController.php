<?php

/*
 * This file is part of Kazist Framework.
 * (c) Dedan Irungu <irungudedan@gmail.com>
 *  For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 * 
 */

/**
 * Description of ExtensionsController
 *
 * @author sbc
 */

namespace System\Extensions\Code\Controllers;

defined('KAZIST') or exit('Not Kazist Framework');

use System\Extensions\Code\Models\ExtensionsModel;
use Kazist\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class ExtensionsController extends BaseController {

    public function installAction($path) {

        $extensionsModel = new ExtensionsModel($this->doctrine, $this->request);

        $extensionsModel->install($path);

        return $this->redirectToRoute('generator');
    }

}
