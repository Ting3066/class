<?php
include_once "../base.php";

$sess=[
  1=>"14:00~16:00",
  2=>"16:00~18:00",
  3=>"18:00~20:00",
  4=>"20:00~22:00",
  5=>"22:00~24:00"
];

$movie=$Movie->find($_GET['movie']);
$now=date("G");
$date=$_GET['date'];

if($now<=13){
  $start=1;
}else{
  $start=ceil(($now-13)/2)+1;
}

if($date==date("Y-m-d")){
  
  for($i=$start;$i<=5;$i++){
  
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位 20 </option>";
  
  }
}else{
  for($i=1;$i<=5;$i++){
  
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位 20 </option>";
  
  }

}
?>