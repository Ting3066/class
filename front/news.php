<fieldset>
  <legend>目前位置:首頁 > 最新文章區</legend>
  <table>
    <tr>
      <td width="20%">標題</td>
      <td width="60%">內容</td>
      <td width="20%"></td>
    </tr>
    <?php
      $count=$News->count(['sh'=>1]);
      $div=5;
      $pages=ceil($count/$div);
      $now=(isset($_GET['p']))?$_GET['p']:1;
      $start=($now-1)*$div;

    
      $all=$News->all(['sh'=>1]," limit $start,$div");
      foreach($all as $news){

    ?>
    <tr>
      <td class="header" id="t<?=$news['id'];?>" style="cursor:pointer;color:blue;text-decoration:underline"><?=$news['title'];?></span></td>
      <td>
        <span class="title"><?=mb_substr($news['text'],0,30,'utf8');?>...</span>
        <span class="text" style="display:none"><?=nl2br($news['text']);?></span>
      </td>
      <td>
      <?php
        if(!empty($_SESSION['login'])){
          $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$news['id']]);
          if($chk){  //有按讚過的紀錄，畫面要顯示收回讚

            ?>

        <a href="#" id="news<?=$news['id'];?>" onclick="good('<?=$news['id'];?>','<?=$_SESSION['login'];?>','2')">收回讚</a>  <!--若type=2，執行刪除log紀錄的動作-->
      <?php
          }else{  //沒有按讚紀錄，畫面顯示讚
      ?>
        <a href="#" id="news<?=$news['id'];?>" onclick="good('<?=$news['id'];?>','<?=$_SESSION['login'];?>','1')">讚</a> <!--若type=1，新稱log紀錄-->

      <?php
          }
        }
      ?>
      </td>
    </tr>
    <?php
      }
    ?>
  </table>
  <div class="ct">
      <?php
      if(($now-1)>0){
        echo "<a href='index.php?do=news&p=".($now-1)."'> &lt; </a>";
      }
      for($i=1;$i<=$pages;$i++){
        $fontsize=($i==$now)?"28px":"18px";
        echo "<a href='index.php?do=news&p=$i' style='font-size:$fontsize'> $i </a>";
      }
      if(($now+1)<=$pages){
      echo "<a href='index.php?do=news&p=".($now+1)."'> &gt; </a>";
      }
      ?>
  </div>

</fieldset>

<script>
$(".header").on("click",function(){
  $(this).next().children('.title').toggle();  //toggle 點擊後讓原本為顯示的區塊變為隱藏，原為隱藏的區塊變為顯示
  $(this).next().children('.text').toggle();
})
</script>