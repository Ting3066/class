<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<?php include "marquee.php";?>
  <div style="height:32px; display:block;"></div>
  <!--正中央-->
  <div style="width:100%; padding:2px; height:290px;">
    <div id="mwww" loop="true" style="width:100%; height:100%;">
      <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
    </div>
  </div>
  <script>
    var lin = new Array(); 
    var now = 0;
    <?php
    
    $str=[];
    $mvims=$Mvim->all(['sh'=>1]);
    foreach($mvims as $key => $mvim){
      echo "lin.push('img/{$mvim['img']}');";  //利用script的原生程式
      
    }
    ?>;  //script內使用php要加上;
    ww();
    if (lin.length > 1) {
      setInterval("ww()", 3000);  //每隔3秒執行ww() function
      now = 1;
    }

    function ww() {
      $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
      //$("#mwww").attr("src",lin[now])
      now++;
      if (now >= lin.length)
        now = 0;
    }
  </script>
  <div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
    <span class="t botli">最新消息區
    <?php
    if($News->count(['sh'=>1])>5){
    ?>
    <a href="?do=news" style="float:right">More...</a>
    <?php
    }
    ?>
    </span>
    <ul class="ssaa" style="list-style-type:decimal;">
    <?php
      $news=$News->all(['sh'=>1]," limit 5");
      foreach($news as $key => $new){
        echo "<li>".mb_substr($new['text'],0,25);
        echo "<div class='all' style='display:none'>{$new['text']}}</div>";
        echo "</li>";
      }


    ?>
    </ul>
    <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
    <script>
      $(".ssaa li").hover(
        function() {
          $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
          $("#altt").show()
        }
      )

      $(".ssaa li").mouseout(
        function() {
          $("#altt").hide()
        }
      )
    </script>
  </div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
  $(".sswww").hover(
    function() {
      $("#alt").html("" + $(this).children(".all").html() + "").css({
        "top": $(this).offset().top - 50
      })
      $("#alt").show()
    }
  )
  $(".sswww").mouseout(
    function() {
      $("#alt").hide()
    }
  )
</script>