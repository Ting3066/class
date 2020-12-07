<?php include_once "../base.php";?>
<h3><?=$uploadimg[$_GET['table']][0];?></h3>
<hr>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <td><?=$uploadimg[$_GET['table']][1];?></td>
    <td><input type="file" name="img"></td>
  </tr>
  <tr>
    <td colspan=2>
      <input type="hidden" name="table" value="<?=$_GET['table'];?>">
      <input type="hidden" name="id" value="<?=$_GET['id'];?>">
      <input type="submit" value="更新">
      <input type="reset" value="重置">
    </td>
  </tr>
</table>

</form>