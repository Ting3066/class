<?php
include "../base.php";

$table=$_POST['table'];
$db=new DB($table);

foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){

    $db->del($id);

  }else{

    $row=$db->find($id);
    $row['sh']=($id==$_POST['sh'])?1:0;
    $row['text']=$_POST['text'][$key];

    $db->save($row);
  }
}


to("../backend.php?do=$table");
?>
