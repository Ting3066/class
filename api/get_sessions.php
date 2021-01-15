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
    //作法一
    // $orders=$Order->all(['movie'=>$movie['name'],'date'=>$date,'session'=>$sess[$i]]);
    
    // $sum=0;
    // foreach($orders as $ord){
      //   $sum+=$ord['qt'];
      // }

      //作法二
    $sum=$Order->q("select sum(`qt`) from `orders` where `movie`='{$movie['name']}' && `date`='$date' && `session`='{$sess[$i]}'")[0][0];


    echo "<option value='$i'>{$sess[$i]} 剩餘座位 ".(20-$sum)." </option>";
  
  }
}else{
  for($i=1;$i<=5;$i++){
    //作法一
    // $orders=$Order->all(['movie'=>$movie['name'],'date'=>$date,'session'=>$sess[$i]]);
    
    // $sum=0;
    // foreach($orders as $ord){
      //   $sum+=$ord['qt'];
      // }

      //作法二
    $sum=$Order->q("select sum(`qt`) from `orders` where `movie`='{$movie['name']}' && `date`='$date' && `session`='{$sess[$i]}'")[0][0];


    echo "<option value='$i'>{$sess[$i]} 剩餘座位 ".(20-$sum)." </option>";
  
  }

}
?>