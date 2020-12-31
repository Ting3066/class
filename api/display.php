<?php
include_once "../base.php";

$db=new DB($_POST['table']);
$row=$db->find($_POST['id']);

$row['sh']=($row['sh']+1)%2;

$db->save($row);
?>