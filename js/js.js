// JavaScript Document
function lof(x)
{
	location.href=x
}

function del(table,id){
	$.post("api/del.php",{table,id},function(res){
		location.reload();
	})
}


function login(table){
	let acc=$("#acc").val();
	let pw=$("#pw").val();
	let ans=$("#ans").val();

	$.get('api/ans.php',{ans},function(res){  //先判斷驗證碼答案是否正確
		if(parseInt(res)){
			$.get('api/login.php',{table,acc,pw},function(result){  //再判斷帳號是否正確
				if(parseInt(result)){
					switch(table){
						case 'mem':
							location.href='index.php';  //若是會員則導向前台首頁
							break;
							case 'admin':
							location.href='backend.php';  //若是管理者則導向後台頁面
						break;
					}
				}else{
					alert("帳號或密碼錯誤");
				}
			})
		}else{
			alert("對不起，您輸入的驗證碼有誤，請您重新登入");
		}
	})
}