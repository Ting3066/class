<h4 class="ct">線上訂票</h4>
<form>
  <table style="width:400px;margin:auto">
    <tr>
      <td width="15%">電影:</td>
      <td><select name="movie" id="movie" style="width:98%" onchange="getDays()"></select></td>
    </tr>
    <tr>
      <td>日期:</td>
      <td><select name="date" id="date" style="width:98%"></select></td>
    </tr>
    <tr>
      <td>場次:</td>
      <td><select name="session" id="session" style="width:98%"></select></td>
    </tr>
  </table>
  <div class="ct">
    <input type="button" value="確定">
    <input type="reset" value="重置">
  </div>
</form>


<script>
//作法一
// let query={}; //宣告物件
// document.location.search.replace("?","").split("&").forEach(function(item,idx){
//   query[item.split("=")[0]]=item.split("=")[1];
// });
// if(query.id==undefined){
//   getMovies();
// }else{
//   getMovies(query.id);

// }


//作法二
getMovies(<?=$_GET['id']??'';?>);  //isset($_GET['id'])?$_GET['id']:"";

function getMovies(id){
  let movie;
  if(id!=undefined){
    movie=id;
  }else{
    movie="all";
  }
  console.log(movie);
  $.get("api/get_movies.php",{movie},function(movies){
    $("#movie").html(movies);
    getDays();
  });
}

function getDays(){
  let movie=$("#movie").val();
  $.get("api/get_days.php",{movie},function(days){
    $("#date").html(days);
  });
}

</script>