<?php
include_once "../base.php";

if(!empty($_FILES['poster']['tmp_name'])){
  $data=[];
  $filename=$_FILES['poster']['name'];
  move_uploaded_file($_FILES['poster']['tmp_name'],'../img/'.$filename);

  $data['img']=$filename;
  $data['name']=$_POST['name'];
  $data['sh']=1;
  $data['rank']=$Poster->q("select max(rank) from poster")[0][0]+1;  //q function  fetchALL取出一定是二為陣列，因此需要索引值
  $data['ani']=rand(1,3);
  $Poster->save($data);
}

to("../backend.php?do=poster");

?>