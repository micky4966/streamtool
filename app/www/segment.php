<?php
error_reporting(E_ALL);
set_time_limit(0);
include("config.php");
function closed()
{
    global $user_activity_id;
    if ($user_activity_id != 0) {
        $active = Activity::find($user_activity_id);
        $active->date_end = date('Y-m-d H:i:s');
        $active->save();
    }
    fastcgi_finish_request();
    exit;
}
$user_activity_id = 0;
$user_ip = $_SERVER['REMOTE_ADDR'];
header("Access-Control-Allow-Origin: *");
register_shutdown_function('closed');
header("Content-Type: video/mp2t");
if (ob_get_length() > 0) {
    ob_end_flush();
}
if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['segment'])) {
    $user_agent = (empty($_SERVER['HTTP_USER_AGENT'])) ? "0" : trim($_SERVER['HTTP_USER_AGENT']);
    $username = $_GET['username'];
    $password = $_GET['password'];
    $segment_id = $_GET['segment'];
    if (!BlockedUseragent::where('name', '=', $user_agent)->first())
        if (!BlockedIp::where('ip', '=', $_SERVER['REMOTE_ADDR'])->first()) {
            if ($user = User::where('username', '=', $username)->where('password', '=', $password)->where('active', '=', 1)->first()) {
            } else {
                $log  = "Worning --> Ip: [" . $_SERVER['REMOTE_ADDR'] . '] - ' . date("d-m-Y H:i:s") .
                    " - Attempt " . ('Failed Login -') .
                    " User: " . $username .
                    " Pass: " . $password .
                    " " . PHP_EOL;
                file_put_contents('/opt/streamtool/app/wws/log/streamtool-loginfail' . '.log', $log, FILE_APPEND);
                sleep(10);
            }

            $setting = Setting::first();
            $folder = "/opt/streamtool/app/www/" . $setting->hlsfolder . '/';
            $file = "/opt/streamtool/app/www/" . $setting->hlsfolder . '/' . $segment_id . '.ts';
            if (file_exists($file)) {

    header('Content-Description: File Transfer');
    header('Content-Type: video/mp2t');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);

            }
        }
}
