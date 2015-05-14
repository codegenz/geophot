<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 14.05.15
 * Time: 23:52
 */
$instagram_token = "type instagram token here";
$vk_token = "type VK token here";
$config = array(
    "tpl_dir"       => "templates/",
    "cache_dir"     => "cache/",
    "debug"         => false, // set to false to improve the speed
    "auto_escape"	=> false
);

function download($link) {
    $output = '';
    while ($output == '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4'));
        $output = curl_exec($ch);
        if ($output == '')
            echo curl_error($ch) . "\n";
        curl_close($ch);
    }
    return $output;
}