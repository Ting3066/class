<?php
include_once "../base.php";

$type=$_POST['type'];
$value=$_POST['value'];

$Order->del([$type=>$value]);

?>