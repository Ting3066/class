<?php
$order=$Order->find(['num'=>$_GET['num']]);



?>
<p>感謝您的訂購，您的訂單編號是:<?=$order['num'];?></p>
<p>電影:<?=$order['movie'];?></p>
<p>日期:<?=$order['date'];?></p>
<p>場次時間:<?=$order['session'];?></p>
<p>座位:
<?php
$seats=unserialize($order['seats']);
foreach($seats as $seat){
  echo (floor($seat/5)+1)."排".($seat%5+1)."號<br>";
}

echo "共".$order['qt']."張電影票";
?>
</p>
<button onclick="javascript:location.href='index.php'">確認</button>