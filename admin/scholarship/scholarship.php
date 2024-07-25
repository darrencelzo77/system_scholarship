<?php
if (session_id() == '') {session_start();}
if (isset($_SESSION['accountid'])) {
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc');}
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc');}
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc');}
} else {
    header('location: ../');
    exit(0);
}

if(isset($_POST['regid_edit'])){
    include('../email/complete.php');
}

?>

<div align="left">
    <h3>List of Accepted Applicants</h3>
</div>

<div> <? include('scholarship_tmp.php'); ?> </div>
