<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
</head>
<? include('../nav/header.php'); ?>
<body>
<div class="container-scroller">
    <? include('../nav/topnav.php'); ?>
    <div class="container-fluid page-body-wrapper">
    <? include('../nav/sidenav.php'); ?>
    <div class="main-panel">
        <div class="content-wrapper">
        <div id="maincontent">
            <?include('schedule.php')?>
        </div>
        </div>
        <? include('../nav/footer.php'); ?>
    </div>
    </div>
</div>
<? include('../nav/footer_script.php'); ?>
</body>
</html>