<?php 
session_name("chulettaa");
session_start();
session_destroy();
header('Location: ../index.php');
exit;
?>