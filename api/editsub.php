<?php
include_once "../base.php";

// print_r($_POST);

foreach($_POST['id'] as $key => $id){
  if(isset($_POST['del']) && in_array($id,$_POST['del'])){
    $Menu->del($id);
  }else{
    $sub=$Menu->find($id);
    $sub['text']=$_POST['text'][$key];
    $sub['href']=$_POST['href'][$key];

    $Menu->save($sub);
  }
}

to("../backend.php?do=menu");
?>