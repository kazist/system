<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\Addons\Sharing\Classes;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\KazistFactory;

/**
 * Description of Sharing
 *
 * @author sbc
 */
class Sharing {

    //put your code here

    public function countFacebook() {

        $facebook_arr = array();

        $factory = new KazistFactory();

        $facebook_page_url = $factory->getSetting('facebook_page_url');

        $url = 'https://graph.facebook.com/fql?q=SELECT%20like_count%20FROM%20link_stat%20WHERE%20url%20=%20%27' . $facebook_page_url . '%27';

        $facebook_json = $this->processCurl($url);
        $facebook_obj = json_decode($facebook_json);

        if (isset($facebook_obj->data)) {
            $facebook_count = $facebook_obj->data[0]->like_count;
        } else {
            $facebook_count = 0;
        }

        $facebook_arr['count'] = $facebook_count;
        $facebook_arr['url'] = $facebook_page_url;

        return $facebook_arr;
    }

    public function countGooglePlus() {
        $google_arr = array();

        $factory = new KazistFactory();

        $google_plus_url = $factory->getSetting('google_plus_url');

        $url = 'https://graph.facebook.com/fql?q=SELECT%20like_count%20FROM%20link_stat%20WHERE%20url%20=%20%27' . $google_plus_url . '%27';

        $google_json = $this->processCurl($url);
        $google_obj = json_decode($google_json);

        if (isset($google_obj->data)) {
            $google_count = $google_obj->data[0]->like_count;
        } else {
            $google_count = 0;
        }

        $google_arr['count'] = $google_count;
        $google_arr['url'] = $google_plus_url;

        return $google_arr;
    }

    public function countYoutube() {

        $google_arr = array();

        $factory = new KazistFactory();

        $google_plus_url = $factory->getSetting('google_plus_url');

        $url = 'https://graph.facebook.com/fql?q=SELECT%20like_count%20FROM%20link_stat%20WHERE%20url%20=%20%27' . $google_plus_url . '%27';

        $facebook_json = $this->processCurl($url);
        $facebook_obj = json_decode($facebook_json);

        if (isset($facebook_obj->data)) {
            $facebook_count = $facebook_obj->data[0]->like_count;
        } else {
            $facebook_count = 0;
        }

        $facebook_arr['count'] = $facebook_count;
        $facebook_arr['url'] = $url;

        return $facebook_arr;
    }

    public function countTwitter() {

        $twitter_arr = array();

        $factory = new KazistFactory();

        $twitter_url = $factory->getSetting('twitter_account_url');

        $url = "http://query.yahooapis.com/v1/public/yql?q=SELECT%20*%20from%20html%20where%20url=%22http://twitter.com/vaakash%22%20AND%20xpath=%22//a[@class='js-nav']/strong%22&format=json";

        $twitter_json = $this->processCurl($url);
        $twitter_obj = json_decode($twitter_json);

        if (isset($twitter_obj->query)) {
            $twitter_count = $twitter_obj->query->count;
        } else {
            $twitter_count = 0;
        }

        $twitter_arr['count'] = $twitter_count;
        $twitter_arr['url'] = $twitter_url;

        return $twitter_arr;
    }

    public function processCurl($url) {

        if (!function_exists('curl_init')) {
            // die('Sorry cURL is not installed!');
            return false;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

}
