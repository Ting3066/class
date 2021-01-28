<?php
$goods=$Goods->find($_GET['id']);
?>

<h2 class="ct"><?=$goods['name'];?></h2>
<div class="pp" style="display:flex;padding:10px 0 10px 10px">
    <div style="width:40%;text-align:center">
      <a href="?do=detail&id=<?=$goods['id'];?>"><img src='img/<?=$goods['img'];?>' style='width:200px;'></a>
    </div>
      <div style="width:60%;vertical-align:top">
        <div class="tt ct"><?=$goods['name'];?></div>
        <div>價錢:<?=$goods['price'];?></div>
        <div>規格:<?=$goods['spec'];?></div>
        <div>簡介:<?=mb_substr($goods['intro'],0,25,'utf8');?></div>
      </div>
  </div>
  <div class="tt ct">
    <form action="?" method="get">
      購買數量:<input type="number" name="qt" value="1">
      <input type="hidden" name="do" value="buycart">
      <input type="hidden" name="id" value="<?=$goods['id'];?>">
      <input type="submit" value="" style="background:url('icon/0402.jpg');width:60px;height:20px">
    </form>
  </div>