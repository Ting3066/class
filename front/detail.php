<?php
$goods=$Goods->find($_GET['id']);
?>

<h2 class="ct"><?=$goods['name'];?></h2>
<div class="pp" style="display:flex;padding:10px 0 10px 10px">
  <div style="width:40%;text-align:center">
    <a href="?do=detail&id=<?=$goods['id'];?>"><img src='img/<?=$goods['img'];?>' style='width:200px;'></a>
  </div>
    <div style="width:60%;vertical-align:top">
      <div>分類:<?=$Type->find($goods['big'])['name'];?>><?=$Type->find($goods['mid'])['name'];?></div>
      <div>編號:<?=$goods['num'];?></div>
      <div>價錢:<?=$goods['price'];?></div>
      <div>簡介:<?=$goods['intro'];?></div>
      <div>庫存量:<?=$goods['quota'];?></div>
    </div>
</div>
  <div class="tt ct">
    <form action="?" method="get">
      購買數量:<input type="number" name="qt" value="1">
      <input type="hidden" name="do" value="buycart">
      <input type="hidden" name="goods" value="<?=$goods['id'];?>">
      <input type="submit" value="" style="background:url('icon/0402.jpg');width:60px;height:20px">
    </form>
  </div>