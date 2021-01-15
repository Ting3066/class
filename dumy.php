<?php
//用來建立資料

include_once "base.php";

//預告片
for($i=1;$i<=10;$i++){
  $data['name']="預告片".$i;
  $data['img']="03A".sprintf("%02d",$i).".jpg";
  $data['sh']=1;
  $data['rank']=$i+1;
  $data['ani']=rand(1,3);
  $Poster->save($data);


}

//院線片
$level=[1=>'普遍級',2=>'保護級',3=>'限制級',4=>'輔導級'];
for($i=1;$i<=10;$i++){
  $data['name']="院線片".$i;
  $data['trailer']="03B".sprintf("%02d",$i)."v.mp4";
  $data['poster']="03B".sprintf("%02d",$i).".png";
  $data['level']=$level(rand(1,4));
  $data['length']=100;
  $data['year']=2021;
  $data['month']=3;
  $data['day']=rand(5,9);
  $data['ondate']=$data['year']."-".$data['month']."-".$data['day'];
  $data['publish']="院線片".$i."的發行商";
  $data['director']="院線片".$i."的導演";
  $data['intro']=str_repeat("院線片 $i 的劇情介紹",10);
  $data['sh']=1;
  $data['rank']=$i+1;
  $Movie->save($data);


}

//訂單
$sess=[
  1=>"14:00~16:00",
  2=>"16:00~18:00",
  3=>"18:00~20:00",
  4=>"20:00~22:00",
  5=>"22:00~24:00"
];

for($i=1;$i<=10;$i++){
  $data=[];
  $data['num']=date("Ymd").sprintf("%04d",$i);
  $data['movie']="院線片".rand(2,5);
  $data['date']=date("Y-m-d");
  $data['session']=$sess[rand(2,4)];
  $data['seats']=serialize([$i]);
  $data['qt']=1;
  $Order->save($data);


}

?>