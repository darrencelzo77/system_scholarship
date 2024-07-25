<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
  if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
  if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
  if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
  header('location: ../'); exit(0); 
}

if (!isset($_GET['date1'])) {$from = date('Y-m-d', strtotime('-31 days'));}
if (!isset($_GET['date2'])) {$to = date('Y-m-d', strtotime('7 days'));}


$pic = GetData('select pic from tblregistrations where regid='.$_GET['regid']);
echo $pic;
?>

<div align="center"><img src="../../requirements/<?=$pic?>" height="400"/></div>


