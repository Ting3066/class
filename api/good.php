<?php

include_once "../base.php";


switch($_POST['type']){
  case "1";
    $Log->save([
      'acc'=>$_POST['acc'],
      'news'=>$_POST['news']
    ]);
    break;
    case "2";
    $Log->del([
      'acc'=>$_POST['acc'],
      'news'=>$_POST['news']
    ]);
    
    break;
}

?>