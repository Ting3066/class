<?php
include_once "../base.php";

$table=$_POST['table'];
$db=new DB($table);

$data=[];
if(!empty($_FILES['img']['tmp_name'])){
  move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
  $data['img']=$_FILES['img']['name'];
}

if(!empty($_POST['text'])){

  $data['text']=$_POST['text'];

}

if($table!='title'){
  
  $data['sh']=1;
}else{
  $data['sh']=0;

}


$db->save($data);

to("../backend.php?do=$table");

?>
