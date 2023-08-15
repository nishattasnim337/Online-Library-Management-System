<?php
session_start();
if(isset($_SESSION['admin_login_user']))
{

  unset($_SESSION['admin_login_user']);
}
header("location:../index.php");

 ?>
