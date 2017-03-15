<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Subsets\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

/**
 * Description of MarketplaceModel
 *
 * @author sbc
 */
class SubsetsModel extends BaseModel {

    public function slugProcessing() {

        $records = $this->getSubsets();

        return $record;
    }

    public function getSubsets() {

        $query = new Query();
        $query->select('ss.*');
        $query->from('#__system_subsets', 'ss');
        $query->where('ss.published=1');
        $query->setMaxResults(10);

        $record = $query->loadObjectList();

        return $record;
    }

}
