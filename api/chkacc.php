<?php

include_once "../base.php";
$acc=$_POST['acc'];
$chk=$Mem->count(['acc'=>$acc]);
if($chk){
  echo 1;  //回傳值為字串
}else{
  echo 0;
}


?>