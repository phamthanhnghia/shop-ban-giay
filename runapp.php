<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$path = 'TiengViet.txt';
$fp = @fopen($path, "r");
  
// Kiểm tra file mở thành công không
if (!$fp) {
    echo 'Mở file không thành công';
}
else{
    //echo 'Mở file thành công';
    $i= 0;
    while(!feof($fp))
    {
        $i++;
        if($i === 2 || $i % 4 == 2 ){
            //echo "- ". $i . " - ";
            //echo "<br>";
//            echo change(fgets($fp));
//            echo "<br>";
        }else{
            //echo "- ". $i . " - ";

        }
        echo change(fgets($fp),$i);
        //echo fgets($fp);
        echo "<br>";
    }
}

function change($a,$i){
    if($i === 2 || $i % 4 == 2 ){
            //echo "- ". $i . " - ";
            //echo "<br>";
//            echo change(fgets($fp));
//            echo "<br>";
            return format($a);
        }else{
            //echo "- ". $i . " - ";
            return  $a;
        }
}

function format($b){
    $t1 = substr($b,0,3);
    $t2 = substr($b,4,3);
    $t3 = substr($b,8,14);
    $t4 = substr($b,19,3);
    $t5 = substr($b,27,10);
    //$t6 = substr($b,26,8);
    return $t1.$t2.$t3.$t4.$t5;
}