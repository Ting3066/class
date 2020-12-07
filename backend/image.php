<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli"><?=$tstr[$do];?></p>  
  <form method="post" action="./api/edit.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="70%">校園映像圖片</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
          <td></td>
        </tr>
        <?php
        $row=$Image->all();
        foreach($row as $row){
        ?>
        <tr>
          <td width="70%"><img src="./img/<?=$row['img'];?>" style="width:100px;height:68px"></td>
          <td width="10%"><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
          <td width="10%"><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
          <td><input type="button" value="更新圖片" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>&#39;)"></td>
          <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
        <input type="hidden" name="table" value="<?=$do;?>">
          <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do;?>.php?table=<?=$do;?>&#39;)" value="<?=$addstr[$do];?>"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>