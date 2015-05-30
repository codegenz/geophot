<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 15.05.15
 * Time: 0:25
 */
set_include_path("include");
include('configuration.php');

if (isset($_POST['lat']) && isset($_POST['lon'])) {
    $user_lat =  $_POST['lat'];
    $user_lon = $_POST['lon'];
    $s_vk = $_POST['vk'];
    $s_insta = $_POST['insta'];
    $radius = $_POST['radius'];
    $insta_prep = array();
    if ($s_insta == "true")
    {
    $insta_photos = download('https://api.instagram.com/v1/media/search?lat='.$user_lat.'&lng='.$user_lon.'&DISTANCE='.$radius.'&access_token='.$instagram_token.'&count=75');
    $fave_photos_data = json_decode($insta_photos, true);
    $fave_photos_array = $fave_photos_data['data'];
    for ($i=0; $i<count($fave_photos_array); $i++) {
        $photo_low = $fave_photos_array[$i]['images']['low_resolution']['url'];
        $photo_max = $fave_photos_array[$i]['images']['standard_resolution']['url'];
        $photo_lat = $fave_photos_array[$i]['location']['latitude'];
        $photo_lon = $fave_photos_array[$i]['location']['longitude'];
        $photo_link = $fave_photos_array[$i]['link'];
        $code = "<a class='fancybox' data-title-id='title-".$i."' rel='group' href=".$photo_max."><img src=".$photo_low." alt=".$photo_link."></a>";
        $code .= "<div id='title-".$i."' class='hidden'><a href='".$photo_link."' target=blank>Ссылка на Instagramm</a></div>";
        $insta_prep[$i]['data'] = $code;
        $insta_prep[$i]['lat'] = $photo_lat;
        $insta_prep[$i]['lon'] = $photo_lon;
        $insta_prep[$i]['link'] = $photo_link;
    }
    }
    if ($s_vk = "true")
    {
    $vk_photos = download('https://api.vk.com/method/photos.search?lat='.$user_lat.'&long='.$user_lon.'&radius='.$radius.'&sort=1&count=1000');
    $vk_photos_data = json_decode($vk_photos, true);
    $vk_photos_array = $vk_photos_data['response'];
    for ($i=1; $i<count($vk_photos_array); $i++) {
        $photo_max = $vk_photos_array[$i]['src_big'];
        $photo_low = $vk_photos_array[$i]['src'];
        $user_id = $vk_photos_array[$i]['owner_id'];
        $photo_lat = $vk_photos_array[$i]['lat'];
        $photo_lon = $vk_photos_array[$i]['long'];
        $code = "<a class='fancybox' data-title-id='title-".$i."' rel='group' href=".$photo_max." target=blank><img src=".$photo_low."></a>";
        $code .= "<div id='title-".$i."' class='hidden'><a href='https://vk.com/id".$user_id."' target=blank>Ссылка на Vkontakte</a></div>";
        if($user_id > 0)
        {
            $insta_prep[$i]['data'] = $code;
            $insta_prep[$i]['lat'] = $photo_lat;
            $insta_prep[$i]['lon'] = $photo_lon;
            $insta_prep[$i]['link'] = "https://vk.com/id".$user_id;
        }
    }
    }
    echo json_encode($insta_prep);
}