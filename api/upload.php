<?php
include "../base.php";

$table=$_POST['table'];
$db=new DB($table);
$id=$_POST['id'];
$row=$db->find($id);

if(!empty($_FILES['img']['tmp_name'])){
  move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
  $row['img']=$_FILES['img']['name'];
}
$db->save($row);

to("../backend.php?do=$table");
?>
