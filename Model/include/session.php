<?php 
require_once('MVC/Model/include/config.php');
 session_start();
 if(!isset($_SESSION['is_logged_in'])){
   header('Location:'.ROOT_URL.'login.php');
 }