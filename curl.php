<?php
/*$begin_time = time();
$a=1;
begin:
$url = "http://kan.sogou.com/dianying/aiqing----$a/";
$res = file_get_contents($url);*/
/*$pattern = '/<strong id="J_StrPrice">(.+?)<\/strong>/is';
preg_match($pattern, $res,$match);*/
/*$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ;
curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
$output = curl_exec($ch);
curl_close($ch);
$partten_title = '/<p class="tit">(.+?)<\/p>/is';
preg_match_all($partten_title,$output,$title_array);
$partten_credit_string = '/<dl class="commit cf">(.+?)<\/dl>/is';
preg_match_all($partten_credit_string,$output,$credit_string);
$partte_credit = '/<span>(.+?)<\/span>/';
preg_match_all($partte_credit,$output,$credit_array);
$mysql = new mysqli('127.0.0.1','root','','movie');
if(mysqli_connect_errno()){
    echo "数据库连接失败！";
    exit();
}


for($i=0;$i<count($title_array[0]);$i++){
    preg_match('/"_blank">(.*)</',$title_array[0][$i],$title);
    preg_match('/>(.*)</',$credit_array[0][$i],$credit);
    $sql1 = "set names utf8";
    $mysql->query($sql1);
    $sql = "insert into `test`(`title`,`credit`) VALUES ('{$title[1]}','{$credit[1]}')";
    $mysql->query($sql);

}
$a++;
if($a>60) {;
$time = time()-$begin_time;
    echo "抓取时间为：".$time;
  die;
}else{
    goto begin;
}*/

$url = 'https://weibo.com/p/1005052489371414/follow?relate=fans&from=100505&wvr=6&mod=headfans&current=fans#place';
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ;
curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($ch,CURLOPT_COOKIE,"SINAGLOBAL=5543289531150.943.1521099862649; wvr=6; YF-Page-G0=2d32d406b6cb1e7730e4e69afbffc88c; SSOLoginState=1526261814; SCF=Atg1dWciNOcMNLUjzDXyTjHc9q8gytD--mAVBDWGo62XrVwmc-ZPKR4SDUmHhuiHIOrCzov_NPNt0g936o9FyOY.; SUB=_2A253_JhmDeRhGeNN61IR9ynLyjSIHXVUi46urDV8PUNbmtBeLRTbkW9NSfH1H3f5THMqjXWf0e2JHz6BN22E-emD; SUBP=0033WrSXqPxfM725Ws9jqgMF55529P9D9WF_0uT71awqHfDoN0qADVdV5JpX5KMhUgL.Fo-0eh57S0MNeKn2dJLoIEXLxK-LB.eLB.2LxK-L122LB.qLxK-LB.-L1hnLxK-LB.eLB.2LxK-L122LB.qt; SUHB=0vJIMmLDrM56UN; ALF=1557797813; _s_tentry=login.sina.com.cn; UOR=www.dewen.net.cn,widget.weibo.com,login.sina.com.cn; Apache=3765670955300.595.1526261821637; ULV=1526261821733:4:2:1:3765670955300.595.1526261821637:1526005069551");
$data = curl_exec($ch);
curl_close($ch);
/*$file = fopen('a.txt','w') or die("创建失败！");
fwrite($file,$data);
fclose($file);
$fw = file('a.txt');
//print_r($fw);
//$html = htmlspecialchars($fw[111]);
//var_dump($html);*/

preg_match_all( '/<script>FM.view(.*)<\/script>/i',$data,$a);
var_dump($a[0][10]);
$c = htmlspecialchars($a[0][10]);
preg_match_all('/<span>使生如夏花之绚烂，死如秋叶之静美<(.*?)\/span>/ius',$c,$ff);
var_dump($ff);













//$partten = '/<div class="page_num">(.+?)<\/div>/is';
/*preg_match($partten,$output,$mach);

$partten_a = '/<a(.+?)<\/a>';
preg_match($partten,$mach[0],$mach1);

var_dump($mach1[0]);*/
