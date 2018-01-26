<?php
/**
 * Created by PhpStorm.
 * User: apramodya
 * Date: 1/27/18
 * Time: 12:31 AM
 */

use Codebird\Codebird;
require 'vendor/autoload.php';

Codebird::setConsumerKey('PUQ1LIBHdcZZKfSNELVVsjFNx', 'aJ5PKxqG046lrPrP0aRXwcbrZowvHOS1MnwANsQ4RhVWtDJAZr');

$cb = \Codebird\Codebird::getInstance();

$cb->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);

$cb->setToken('68331869-Beibi63AfgxqzGxc2NwVk7VtvViYCgxcxo6Cj0Zw1','0W0Jxc0HoipdkPcuufCtifefpLbTrANMohIiFFVsR4PJP');

$mentions =$cb->statuses_mentionsTimeline();

if (!isset($mentions)){
    return;
}

$tweets = [];

foreach ($mentions as $index => $mention){
    if (isset($mention['id'])){
        $tweets = [
            'id' => $mention['id'],
            'user_screen_name' => $mention['user']['screen_name'],
            'text' => $mention['text']
        ];
    }
}

$tweetsText = array_map(function ($tweet){
    return $tweet['text'];
},$tweets);

var_dump($tweetsText);