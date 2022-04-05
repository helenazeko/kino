<?php
   session_start();
   session_destroy();
   unset($_SESSION['emailp']);
   
   header('location: login.php');
?>