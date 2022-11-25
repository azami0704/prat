<?php

$str = 'aaddww1123';
$str2 = 'The reason why a great man is great is that he resolves to be a great man';
echo mb_substr($str2,0,10).'...';
echo preg_replace('/\w/','*',$str);

$str3 = "學會PHP網頁程式設計，薪水會加倍，工作會好找";

echo str_replace('程式設計','<span style="color:red; font-weight:bold;">程式設計</span>',$str3);

?>