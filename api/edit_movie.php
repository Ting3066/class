<?php
include_once "../base.php";

$movie=$Movie->find($_POST['id']);

if(!empty($_FILES['trailer']['tmp_name'])){
  $movie['trailer']=$_FILES['trailer']['name'];
  move_uploaded_file($_FILES['trailer']['tmp_name'],'../img/'.$_FILES['trailer']['name']);
}
if(!empty($_FILES['poster']['tmp_name'])){
  $movie['poster']=$_FILES['poster']['name'];
  move_uploaded_file($_FILES['poster']['tmp_name'],'../img/'.$_FILES['poster']['name']);
}

// $_POST['sh']=1;
// $_POST['rank']=$Movie->q("select max(rank) from movie")[0][0]+1;
$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];

foreach($movie as $key => $value){
  if(isset($_POST[$key])){
    if($value!=$_POST[$key]){
      $movie[$key]=$_POST[$key];
    }
  }
}

$Movie->save($movie);
to("../backend.php?do=movie");

?>