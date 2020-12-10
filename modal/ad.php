<!-- 彈出視窗 -->

<h3>新增動態文字廣告</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <td>動態文字廣告</td>
    <td><input type="text" name="text"></td>
  </tr>
  <tr>
    <td colspan=2>
      <input type="hidden" name="table" value="<?=$_GET['table'];?>">
      <input type="submit" value="新增">
      <input type="reset" value="重置">
    </td>
  </tr>
</table>

</form>