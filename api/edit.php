<?php
include "../base.php";

$table=$_POST['table'];
$db=new DB($table);

foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){

    $db->del($id);

  }else{

    $row=$db->find($id);

    if(!empty($_POST['text'])){

      $row['text']=$_POST['text'][$key];
    }

    switch($table){
      case 'title':
        $row['sh']=($id==$_POST['sh'])?1:0;
      break;
      case 'total':
        $row['total']=$_POST['total'];
      break;
      case 'bottom':
        $row['bottom']=$_POST['bottom'];
      break;
      case 'menu':
        $row['sh']=(in_array($id,$_POST['sh']))?1:0;
        $row['href']=$_POST['href'][$key];
      break;
      case 'admin':
        $row['acc']=$_POST['acc'][$key];
        $row['pw']=$_POST['pw'][$key];
      break;
      default:
        $row['sh']=(in_array($id,$_POST['sh']))?1:0;
        
      // case 'ad':     
      // case 'mvim':
      // case 'image':
      // case 'news':

    }

    // case 'total':
    //   $row['total']=$_POST['total'];
    // break;
    // case 'bottom':
    //   $row['bottom']=$_POST['bottom'];
    // break;
    // 可以改寫成
    // case 'total':
    // case 'bottom':
    //   $row[$table]=$_POST[$table];
    // break;

    
    $db->save($row);
  }
}


to("../backend.php?do=$table");
?>
