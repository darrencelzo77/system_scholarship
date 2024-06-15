<?php
session_start();
//if (file_exists('includes/database.php')) { include_once('includes/database.php'); }
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
header("location: ../");
?>