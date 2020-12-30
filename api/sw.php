<?php
include_once "../base.php";


$table=$_POST['table'];
$db=new DB($table);
$idx=$db->find($_POST['idx']);
$idy=$db->find($_POST['idy']);
$tmp=$idx['rank'];
$idx['rank']=$idy['rank'];
$idy['rank']=$tmp;

$db->save($idx);
$db->save($idy);

?>