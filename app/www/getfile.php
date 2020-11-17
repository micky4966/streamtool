<?php
ob_start();
include('config.php');
logincheck();
set_time_limit(0);
if (!isset($_GET['id'])) {
    die();
}

$id = $_GET['id'];
$user = User::find($id);
$setting = Setting::first();

if (isset($_GET['e2'])) {
    echo "#NAME Streamtool \r\n";
    foreach ($user->categories as $category) {
        foreach ($category->streams as $stream) {
            if ($stream->running == 1) {
                echo "#SERVICE 1:0:1:0:0:0:0:0:0:0:http%3A//" . $setting->webip . "%3A" . $setting->webport . "/mpegts/" . $user->username . "/" . $user->password . "/" . $stream->id . "\r\n";
                echo "#DESCRIPTION " . $stream->name . "\r\n";
            }
        }
    }
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="userbouquet.favourites.tv"');
    header("Content-Transfer-Encoding: binary");
    header('Pragma: no-cache');
    header('Expires: 0');
    die;
}

if (isset($_GET['m3u_hls'])) {

    echo "#EXTM3U \r\n";
    foreach ($user->categories as $category) {
        foreach ($category->streams as $stream) {
            echo "#EXTINF:-1," . $stream->name . "\r\n";
            echo "http://" . $setting->webip . ":" . $setting->webport . "/live/" . $user->username . "/" . $user->password . "/" . $stream->id . "\r\n";
        }
    }
    header('Content-Type: application/vnd.apple.mpegurl');
    header('Content-Disposition: attachment; filename="st-' . $user->username . '_hls.m3u8"');
    header("Content-Description: File Transfer");
    header("Content-Transfer-Encoding: binary");
    header('Pragma: no-cache');
    header('Expires: 0');
    die;
}
if (isset($_GET['m3u_mpegts'])) {

    echo "#EXTM3U \r\n";
    foreach ($user->categories as $category) {
        foreach ($category->streams as $stream) {


            echo "#EXTINF:-1," . $stream->name . "\r\n";
            echo "http://" . $setting->webip . ":" . $setting->webport . "/mpegts/" . $user->username . "/" . $user->password . "/" . $stream->id . "\r\n";
        }
    }
    header('Content-Type: application/vnd.apple.mpegurl');
    header('Content-Disposition: attachment; filename="st-' . $user->username . '_mpegts.m3u8"');
    header("Content-Description: File Transfer");
    header("Content-Transfer-Encoding: binary");
    header('Pragma: no-cache');
    header('Expires: 0');
    die;
}

if (isset($_GET['tv'])) {
    foreach ($user->categories as $category) {
        foreach ($category->streams as $stream) {
            if ($stream->running == 1) {
                echo "ext,$stream->name,http://" . $setting->webip . ":" . $setting->webport . "/mpegts/" . $user->username . "/" . $user->password . "/" . $stream->name . "\r\n";
            }
        }
    }

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="Channels.txt"');
    header("Content-Transfer-Encoding: binary");
    header('Pragma: no-cache');
    header('Expires: 0');
    die;
}
