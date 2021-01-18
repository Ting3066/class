<h2 class="ct">會員註冊</h2>
<table class="all">
  <tr>
    <td class="ct tt">姓名</td>
    <td class="pp"><input type="text" name="name" id="name"></td>
  </tr>
  <tr>
    <td class="ct tt">帳號</td>
    <td class="pp">
      <input type="text" name="acc" id="acc">
      <button onclick="chkAcc()">檢測帳號</button>
    </td>
  </tr>
  <tr>
    <td class="ct tt">密碼</td>
    <td class="pp"><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td class="ct tt">電話</td>
    <td class="pp"><input type="text" name="tel" id="tel"></td>
  </tr>
  <tr>
    <td class="ct tt">住址</td>
    <td class="pp"><input type="text" name="addr" id="addr"></td>
  </tr>
  <tr>
    <td class="ct tt">電子信箱</td>
    <td class="pp"><input type="text" name="email" id="email"></td>
  </tr>
</table>
<div class="ct">
  <button onclick="reg()">註冊</button>
  <button onclick="reset()">重置</button>
</div>

<script>
  function reg(){
    let acc=$("#acc").val();
    let name=$("#name").val();
    let pw=$("#pw").val();
    let tel=$("#tel").val();
    let addr=$("#addr").val();
    let email=$("#email").val();
    
    $.get('api/chk_acc.php',{acc},function(res){  //先檢查帳號是否被使用過
      if(parseInt(res) || acc=='admin'){  //回傳的資料為1或者是admin則顯示已被使用
        alert("帳號已被使用");
      }else{  //若帳號沒有重複則執行註冊程式
        $.post('api/reg.php',{name,acc,pw,tel,addr,email},function(res){
          location.href='index.php?do=login';
        })

      }
    })
  }

  function chkAcc(){
    let acc=$("#acc").val();
    $.get('api/chk_acc.php',{acc},function(res){
      if(parseInt(res) || acc=='admin'){  //回傳的資料為1或者是admin則顯示已被使用
        alert("帳號已被使用");
      }else{
        alert("帳號可以使用");

      }
    })
  }
</script>