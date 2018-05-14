<?php
$start = time();
$url = array();
for($i=1;$i<74;$i++){
    $url[] = "http://kan.sogou.com/dianying/aiqing----$i/";
}
//$res = file_get_contents($url);
$works=array();
for($i=0;$i<5;$i++){
    $process = new swoole_process('curl_contents',true);
    $process->start();
    $process->write($i);
    $works[] = $process;
}
/*foreach ($works as $process){
    echo $process->read();
    echo PHP_EOL;
}*/

//echo "总共使用时间:".(time()-$start).PHP_EOL;

function curl_contents(swoole_process $works){
    $i = $works->read();
    global $url;
    $res1 = exeCurl($url[($i*10)]);
    $res2 = exeCurl($url[($i*10+1)]);
    $res3 = exeCurl($url[($i*10+2)]);
    $res4 = exeCurl($url[($i*10+3)]);
    $res5 = exeCurl($url[($i*10+4)]);
    $res6 = exeCurl($url[($i*10+5)]);
    $res7 = exeCurl($url[($i*10+6)]);
    $res8 = exeCurl($url[($i*10+7)]);
    $res9 = exeCurl($url[($i*10+8)]);
    $res10 = exeCurl($url[($i*10+9)]);
    //echo $res1.PHP_EOL.$res2.PHP_EOL.$res3.PHP_EOL.$res4.PHP_EOL.$res5.PHP_EOL.$res6.PHP_EOL.$res7.PHP_EOL.$res8.PHP_EOL.$res9.PHP_EOL.$res10;
   // echo $i."time:".time().PHP_EOL;

    sleep(2);
}
function exeCurl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
    $output = curl_exec($ch);
    curl_close($ch);
    $partten_title = '/<p class="tit">(.+?)<\/p>/is';
    preg_match_all($partten_title, $output, $title_array);
    $partten_credit_string = '/<dl class="commit cf">(.+?)<\/dl>/is';
    preg_match_all($partten_credit_string, $output, $credit_string);
    $partte_credit = '/<span>(.+?)<\/span>/';
    preg_match_all($partte_credit, $output, $credit_array);
    $mysql = new mysqli('127.0.0.1', 'movie', '123', 'movie');
    if (mysqli_connect_errno()) {
        echo "数据库连接失败！";
        exit();
    }
    for ($i = 0; $i < count($title_array[0]); $i++) {
        preg_match('/"_blank">(.*)</', $title_array[0][$i], $title);
        preg_match('/>(.*)</', $credit_array[0][$i], $credit);
        $sql1 = "set names utf8";
        $mysql->query($sql1);
        $sql = "insert into `test`(`title`,`credit`) VALUES ('{$title[1]}','{$credit[1]}')";
        $mysql->query($sql);
    }
    return "handle ".$url." finished";
}






















//$partten = '/<div class="page_num">(.+?)<\/div>/is';
/*preg_match($partten,$output,$mach);

$partten_a = '/<a(.+?)<\/a>';
preg_match($partten,$mach[0],$mach1);

var_dump($mach1[0]);*/
