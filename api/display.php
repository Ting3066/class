<?php
include_once "../base.php";

$db=new DB($_POST['table']);
$row=$db->find($_POST['id']);

$row['sh']=($row['sh']+1)%2;  //切換顯示 若原為顯示，+1除以2後的餘數變為隱藏

$db->save($row);
?>