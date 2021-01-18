<?php
include_once "../base.php";


$mem=$Mem->find($_POST['id']);

$mem['name']=$_POST['name'];
$mem['tel']=$_POST['tel'];
$mem['addr']=$_POST['addr'];
$mem['email']=$_POST['email'];

$Mem->save($mem);

// $Mem->save($_POST);  簡寫


to("../backend.php?do=mem");

?>