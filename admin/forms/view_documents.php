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

function displayFile($filepath) {
    $ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
    if ($ext == 'pdf') {
        echo '<embed src="../../requirements/'.$filepath.'" width="900" height="800" type="application/pdf">';
    } else {
        echo '<img src="../../requirements/'.$filepath.'" height="600"/>';
    }
}

?>
<br><br>
<div align="center">
    <div style="font-family: arial;font-size:25px;">2x2 Picture</div>
    <?php displayFile($rw['pic']); ?>

    <br><br><br><br>
    <div style="font-family: arial;font-size:25px;">COR</div>
    <?php displayFile($rw['cor']); ?>

    <br><br><br><br>
    <div style="font-family: arial;font-size:25px;">COG</div>
    <?php displayFile($rw['cog']); ?>
    
    <br><br><br><br>
    <div style="font-family: arial;font-size:25px;">Indigency</div>
    <?php displayFile($rw['indigency']); ?>

</div>
<br><BR>
