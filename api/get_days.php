<?php
include_once "../base.php";
$movie=$Movie->find($_GET['movie']);

$today=strtotime(date("Y-m-d"));  //把今天的日期轉為秒數
$startDay=strtotime($movie['ondate']);  //把電影上映日轉為秒數

for($i=0;$i<3;$i++){
  $showDay=strtotime("+$i days",$startDay);  //轉換電影上映的第一天為秒數
  if($showDay>=$today){
    echo "<option value='".date("Y-m-d",$showDay)."'>".date("m月d日 l", $showDay)."</option>";

  }
}
?>