<div class="rb tab" style="width:98%">
  <button onclick="javascript:location.href='backend.php?do=add_movie'">新增電影</button>
  <hr>
  <div style="max-height:450px;overflow-y:auto">
  <?php
    $movies=$Movie->all();
    foreach($movies as $movie){

    ?>
    <div style="background:white;color:black;display:flex;margin:1px 0">
      <div style="width:20%">
        <img src="img/<?=$movie['poster'];?>" style="width:80px">
      </div>
      <div style="width:20%">
        分級: <img src="icon/<?=$movie['level'];?>.png" style="width:25px;vertical-align:middle">
      </div>
      <div style="width:60%">
        <div style="display:flex">
          <div style="width:33%">片名:<?=$movie['name'];?></div>
          <div style="width:33%">片長:<?=$movie['length'];?></div>
          <div style="width:33%">上映時間:<?=$movie['year'];?>-<?=$movie['month'];?>-<?=$movie['day'];?></div>
        </div>
        <div style="text-align:right">
          <button onclick="javascript:location.href='backend.php?do=edit_movie&id=<?=$movie['id'];?>'">編輯電影</button>
          <button>刪除電影</button>
        </div>
        <div><?=$movie['intro'];?></div>
      </div>
    </div>
    <?php
      }
    ?>
  </div>
</div>

<script>
function sw(idx,idy){
  $.post('api/sw.php',{table:'poster',idx,idy},function(){
    location.reload();
  });
}
</script>