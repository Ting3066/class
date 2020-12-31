<?php
$movie=$Movie->find($_GET['id']);

?>
<h3 class="ct" style="margin:0">編輯院線片</h3>
<form action="api/edit_movie.php" method="post" enctype="multipart/form-data">
<table style="width:100%">
  <tr>
    <td width="20%" style="vertical-align:top;text-align:right">影片資料</td>
    <td>
      <div>片名:<input type="text" name="name" value="<?=$movie['name'];?>"></div>
      <div>分級:
        <select name="level">
          <option value="普遍級" <?=($movie['level']=="普遍級")?"selected":"";?>>普遍級</option>
          <option value="輔導級" <?=($movie['level']=="輔導級")?"selected":"";?>>輔導級</option>
          <option value="保護級" <?=($movie['level']=="保護級")?"selected":"";?>>保護級</option>
          <option value="限制級" <?=($movie['level']=="限制級")?"selected":"";?>>限制級</option>
        </select>
      </div>
      <div>片長:<input type="text" name="length" value="<?=$movie['length'];?>"></div>
      <div>上映日期:
        <select name="year">
          <option value="2020" <?=($movie['year']=="2020")?"selected":"";?>>2020</option>
          <option value="2021" <?=($movie['year']=="2021")?"selected":"";?>>2021</option>
          <option value="2022" <?=($movie['year']=="2022")?"selected":"";?>>2022</option>
        </select>年
        <select name="month">
        <?php
          for($i=1;$i<=12;$i++){
            $selected=($movie['month']==$i)?"selected":"";
            echo "<option value='$i' $selected>$i</option>";
          }
        ?>
        </select>月
        <select name="day">
        <?php
          for($i=1;$i<=31;$i++){
            $selected=($movie['day']==$i)?"selected":"";
            echo "<option value='$i' $selected>$i</option>";
          }
        ?>
        </select>日
      </div>
      <div>發行商:<input type="text" name="publish" value="<?=$movie['publish'];?>"></div>
      <div>導演:<input type="text" name="director" value="<?=$movie['director'];?>"></div>
      <div>預告影片:<input type="file" name="trailer"></div>
      <div>電影海報:<input type="file" name="poster"></div>
    </td>
  </tr>
  <tr>
    <td style="vertical-align:top;text-align:right">劇情簡介</td>
    <td><textarea name="intro" style="width:98%;height:60px"><?=$movie['intro'];?></textarea></td>
  </tr>
</table>
<div class="ct">
  <input type="submit" value="編輯">
  <input type="reset" value="重置">
  <input type="hidden" name="id" value="<?=$movie['id'];?>">
</div>
</form>