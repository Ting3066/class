<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$ads=$Ad->all(['sh'=>1]);
$str="";
foreach($ads as $ad){
  $str=$str.$ad['text']."&nbsp;";

}
echo $str;


// 可以寫成
// foreach($ads as $ad){
//   echo $ad['text']."&nbsp;&nbsp;&nbsp;";

// }
?>
</marquee>