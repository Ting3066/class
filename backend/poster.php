<div class="rb tab" style="width:98%">
  <h3 class="ct" style="margin:0">預告片清單</h3>
  <div style="width:98.5%;display:flex;" class="ct">
    <div style="background:#999;width:25%;margin:0 1px">預告片海報</div>
    <div style="background:#999;width:25%;margin:0 1px">預告片片名</div>
    <div style="background:#999;width:25%;margin:0 1px">預告片排序</div>
    <div style="background:#999;width:25%;margin:0 1px">操作</div>
  </div>
  <div style="width:100%;height:200px;overflow-y:scroll;color:black">
  <?php
    $posters=$Poster->all();
    foreach($posters as $poster){
  ?>
    <div style="width:100%;display:flex;align-items:center;background:white;margin:1px 0" class="ct">
      <div style="width:25%;margin:0 1px">
        <img src="img/<?=$poster['img'];?>" alt="" style="width:80px">
      </div>
      <div style="width:25%;margin:0 1px">
        <input type="text" name="name" value="<?=$poster['name'];?>">
      </div>
      <div style="width:25%;margin:0 1px">
        <input type="button" value="往上">
        <input type="button" value="往下">
      </div>
      <div style="width:25%;margin:0 1px">
        <input type="checkbox" name="sh[]" value="<?=$poster['id'];?>" <?=($poster['sh']==1)?'checked':'';?>>顯示
        <input type="checkbox" name="del[]" value="<?=$poster['id'];?>">刪除
        <select name="ani[]">
          <option value="1" <?=($poster['ani']==1)?'selected':'';?>>淡入淡出</option>
          <option value="2" <?=($poster['ani']==2)?'selected':'';?>>滑入滑出</option>
          <option value="3" <?=($poster['ani']==3)?'selected':'';?>>縮放</option>
        </select>
      </div>
    </div>
  <?php
    }
  ?>
  </div>
  <div class="ct">
    <input type="submit" value="編輯確定"><input type="reset" value="重置">
  </div>
  <hr>
  <h3 class="ct" style="margin:0">新增預告片海報</h3>
  <form action="api/add_poster.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td>預告片海報:</td>
        <td><input type="file" name="poster" id=""></td>
        <td>預告片片名:</td>
        <td><input type="text" name="name" id=""></td>
      </tr>
    </table>
    <div class="ct">
      <input type="submit" value="新增">
      <input type="reset" value="重置">
    </div>
  </form>
</div>