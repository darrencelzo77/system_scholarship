<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}

$regid = secureData($_GET['regid'], 'd');
// echo $regid;
$qr = mysqli_query($db_connection, 'SELECT * FROM tblregistrations WHERE regid='.$regid);
$rw = mysqli_fetch_array($qr);
?>
<br><br>
<div align="center">
    <div style="font-family: arial;font-size:25px;">2x2 Picture</div>
    <img src="../../requirements/<?=$rw['pic']?>" height="600"/>
    <br><br><br><br>
    <div style="font-family: arial;font-size:25px;">COR</div>
    <img src="../../requirements/<?=$rw['cor']?>" height="600"/>
    <br><br><br><br>
    <div style="font-family: arial;font-size:25px;">COG</div>
    <img src="../../requirements/<?=$rw['cog']?>" height="600"/>
    <br><br><br><br>
    <div style="font-family: arial;font-size:25px;">Indigency</div>
    <img src="../../requirements/<?=$rw['indigency']?>" height="600"/>

</div>
<br><BR>
