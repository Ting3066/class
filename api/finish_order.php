<?php
include_once "../base.php";
$sess=[
  1=>"14:00~16:00",
  2=>"16:00~18:00",
  3=>"18:00~20:00",
  4=>"20:00~22:00",
  5=>"22:00~24:00"
];
$data['movie']=$Movie->find($_POST['movie'])['name'];
$data['date']=$_POST['date'];
sort($_POST['seats']);
$data['seats']=serialize($_POST['seats']);
$data['qt']=count($_POST['seats']);
$data['session']=$sess[$_POST['session']];
$n=$Order->q('select max(`id`) from `orders`')[0][0]+1;
$data['num']=date("Ymd").sprintf("%04d",$n);

$Order->save($data);
echo $data['num'];
?>