<?php

/*

سورس ربات نیم بها کننده لینک همراه با وبسرویس
کانال ما : @PersianPanel_TM
نویسنده : @DevUltra
منبع بزن.

*/

header('Content-Type: application/json;charset=utf-8');
error_reporting(0);

#------------------------#

$link_address = $_GET['link'];

#------------------------#

function getresult($link){
    $cp = curl_init();
    curl_setopt($cp, CURLOPT_URL, 'https://www.digitalbam.ir/DirectLinkDownloader/Download');
    curl_setopt($cp, CURLOPT_POST, true);
    curl_setopt($cp, CURLOPT_POSTFIELDS, ['downloadUri' => $link]);
    curl_setopt($cp, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($cp);
    curl_close($cp);
}

#------------------------#

$end_result = json_decode(getresult($link_address));

if($link_address == null or $link_address == "" or !isset($_GET['link'])){
    
    $end = [];
    $end['ok'] = "false";
    $end['creator'] = "https://t.me/DevUltra";
    $end['channel'] = "https://t.me/PersianPanel_TM";
    $end['description'] = "link is null";
       
}else{
    
    $end = [];
    $end['ok'] = "true";
    $end['creator'] = "https://t.me/DevUltra";
    $end['channel'] = "https://t.me/PersianPanel_TM";
    $end['download_link'] = $end_result->fileUrl;
    
}

echo json_encode($end,128|256);

/*

سورس ربات نیم بها کننده لینک همراه با وبسرویس
کانال ما : @PersianPanel_TM
نویسنده : @DevUltra
منبع بزن.

*/

?>