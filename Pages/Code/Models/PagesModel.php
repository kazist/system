<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Pages\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

/**
 * Description of MarketplaceModel
 *
 * @author sbc
 */
class PagesModel extends BaseModel {

    public function getRecord($id = '') {

        if (!WEB_IS_ADMIN) {
            $document = $this->container->get('document');

            $query = $this->getQueryBuilder();

            $query->where('sp.unique_name=:unique_name');
            $query->setParameter('unique_name', $document->current_route);

            $query->orderBy('sp.date_created ', 'DESC');

            $record = $query->loadObject();
        } else {
            $record = parent::getRecord($id);
        }
        
        $document->title = $record->title;

        return $record;
    }

    //put your code here
    public function getAdditionalDetail($items) {

        $tmp_array = array();

        if (!empty($items)) {
            foreach ($items as $item) {

                $tmp_array[] = $this->getItemAdditionDetails($item);
            }
        }

        return $tmp_array;
    }

    public function getItemAdditionDetails($item) {

        $item_obj = (is_object($item)) ? $item : new \stdClass();

        $item_obj->title = ucwords($item->title);
        $item_obj->article_image = $this->getArticleImage($item);
        $item_obj->contest = $this->getArticleContest($item->contest_id);

        return $item_obj;
    }

    public function getArticleContest($contest_id) {

        $factory = new KazistFactory();


        $query = new Query();
        $query->select('cc.*');
        $query->from('#__cms_contests', 'cc');
        if ($contest_id) {
            $query->where('cc.id=:contest_id');
            $query->setParameter('contest_id', $contest_id);
        } else {
            $query->where('1=-1');
        }


        $record = $query->loadObject();

        return $record;
    }

    public function getArticleImage($item) {

        $factory = new KazistFactory();


        $query = new Query();
        $query->select('mm.file, mm.title');
        $query->from('#__cms_articles', 'ca');
        $query->leftJoin('ca', '#__media_media', 'mm', 'mm.id = ca.image');
        if ($item->id) {
            $query->where('ca.id=:id');
            $query->setParameter('id', $item->id);
        } else {
            $query->where('1=-1');
        }



        $record = $query->loadObject();
        //print_r($record); exit;

        return $record;
    }

    public function getCategoriesOptions() {

        $tmp_array = array();
        $categories = $this->getCategories();


        if (!empty($categories)) {
            foreach ($categories as $category) {
                $tmp_array[] = array('text' => $category->title, 'value' => $category->id);
            }
        }

        return $tmp_array;
    }

    public function getCategories() {

        $factory = new KazistFactory();


        $query = new Query();
        $query->select('cbc.*');
        $query->from('#__cms_articles_categories', 'cbc');
        $query->where('cbc.published=1');


        $record = $query->loadObjectList();

        return $record;
    }

}
