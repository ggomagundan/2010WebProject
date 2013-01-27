<?php
// 랜덤값 생성
function random_string($length) {
    $randomcode = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'A', 'B', 'C', 'd', 'E', 'F', 'G', 'H', 'x', 'J', 'K', 'b', 'M', 'N', 'y', 'P', 'r', 'R', 'S', 'T', 'u', 'V', 'W', 'X', 'Y', 'Z');
   
mt_srand((double)microtime()*1000000);
    for($i=1;$i<=$length;$i++) $Rstring .= $randomcode[mt_rand(1, count($randomcode))];
    return
$Rstring;
}
?>