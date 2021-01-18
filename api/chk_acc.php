<?php
include_once "../base.php";

$acc=$_GET['acc'];

$chk=$Mem->count(['acc'=>$acc]);

echo $chk;

?>