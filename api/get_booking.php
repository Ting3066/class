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
$date=$_GET['date'];
$session=$_GET['session'];
$now=date("G");


?>
<div style="margin:auto;width:540px;height:370px;background:url('icon/03D04.png')">

</div>

<div style="padding:0 20%;background:#ccc">
  <p>您選擇的電影是:<?=$movie['name'];?></p>
  <p>您選擇的時刻是:<?=$date;?> <?=$sess[$session];?></p>
  <p>您已經勾選<span id="ticket"></span>張票，最多可以購買四張票</p>
  <div class="ct">
    <button onclick="javascript:$('.order, .booking').toggle()">上一步</button>
  </div>
</div>