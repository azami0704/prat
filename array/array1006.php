<?php
$num1=[];
for($i=0;$i<38;$i++){
    $num1[] = $i+1; //產一個數字1-38的陣列
}
// array_splice($num1,0,1);
// print_r($num1);

// 樂透做法2-for迴圈
// 利用刪除值後重新排序索引的特性
$a1 =[];
for($i=0;$i<6;$i++){
  $idx = rand(0,count($num1)-1); // 取陣列長度內的隨機值
  $num = $num1[$idx]; // 用髓機索引取值
  $a1[] = $num; // 將撈出的數字加入陣列
  array_splice($num1,$idx,1); // 用splice把用過的值刪掉,並確保值刪除後索引會重新排列
}
print_r($a1);

//樂透做法3-將陣列本身打亂取值
shuffle($num1); // 將陣列亂數打亂
print_r(join(',',array_slice($num1,0,6))) ; // 由於陣列已經為亂數,直接取出要的個數即可

?>