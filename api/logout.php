<?php
include_once "../base.php";

unset($_SESSION[$_GET['do']]);

to("../index.php");

?>