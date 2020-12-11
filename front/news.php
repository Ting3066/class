<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<?= include "marquee.php";?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<!-- 新聞顯示區 -->
	<?php
		$all=$News->count(['sh'=>1]);
		$div=5;
		$pages=ceil($all/$div);
		$now=(isset($_GET['p']))?$_GET['p']:1;   //可以簡化成$now=(isset($_GET['p']))??1;
		$start=($now-1)*$div;
	?>
	<ol start="<?=$start+1;?>">
	<?php
		$news=$News->all(['sh'=>1]," limit $start,$div");
		foreach($news as $key => $new){
			echo "<li>".mb_substr($new['text'],0,25);
			echo "<div class='all' style='display:none'>{$new['text']}}</div>";
			echo "</li>";
		}
	?>
	</ol>
	<div style="text-align:center;">
		<a class="bl" style="font-size:30px;" href="?do=news&p=0">&lt;&nbsp;</a>
		<?php
			for($i=1;$i<=$pages;$i++){
				echo "<a href='?do=news&p=$i'>";
				echo $i;
				echo "</a>";
			}

		?>
		<a class="bl" style="font-size:30px;" href="?do=news&p=0">&nbsp;&gt;</a>
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
