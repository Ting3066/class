<?php
include_once "../base.php";


if($_SESSION['ans']==$_GET['ans']){
  echo 1;
}else{
  echo 0;
  
}

// echo $_SESSION['ans']==$_GET['ans'];  簡寫

?>