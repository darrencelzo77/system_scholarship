<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}


if (isset($_POST['register'])) {
  $levelid = mysqli_real_escape_string($db_connection, $_POST['levelid']);
  $semid = mysqli_real_escape_string($db_connection, $_POST['semid']);
  $categoryid = mysqli_real_escape_string($db_connection, $_POST['categoryid']);
  $lastname = mysqli_real_escape_string($db_connection, $_POST['lastname']);
  $firstname = mysqli_real_escape_string($db_connection, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($db_connection, $_POST['middlename']);
  $namextid = mysqli_real_escape_string($db_connection, $_POST['namextid']);
  $provid = mysqli_real_escape_string($db_connection, $_POST['provid']);
  $cityid = mysqli_real_escape_string($db_connection, $_POST['cityid']);
  $brgyid = mysqli_real_escape_string($db_connection, $_POST['brgyid']);
  $street = mysqli_real_escape_string($db_connection, $_POST['street']);
  $dob = mysqli_real_escape_string($db_connection, $_POST['dob']);
  $birthplace = mysqli_real_escape_string($db_connection, $_POST['birthplace']);
  $citizenshipid = mysqli_real_escape_string($db_connection, $_POST['citizenshipid']);
  $civilid = mysqli_real_escape_string($db_connection, $_POST['civilid']);
  $sexid = mysqli_real_escape_string($db_connection, $_POST['sexid']);
  $contact = mysqli_real_escape_string($db_connection, $_POST['contact']);
  $elementary = mysqli_real_escape_string($db_connection, $_POST['elementary']);
  $junior = mysqli_real_escape_string($db_connection, $_POST['junior']);
  $senior = mysqli_real_escape_string($db_connection, $_POST['senior']);
  $college = mysqli_real_escape_string($db_connection, $_POST['college']);
  $is_online = mysqli_real_escape_string($db_connection, $_POST['is_online']);
  $query = "INSERT INTO tblregistrations 
            SET semid='$semid',
                levelid='$levelid',
                categoryid='$categoryid', 
                lastname='$lastname', 
                firstname='$firstname', 
                middlename='$middlename', 
                namextid='$namextid', 
                provid='$provid', 
                cityid='$cityid', 
                brgyid='$brgyid', 
                street='$street', 
                dob='$dob', 
                birthplace='$birthplace', 
                citizenshipid='$citizenshipid', 
                civilid='$civilid', 
                sexid='$sexid', 
                contact='$contact',
                elementary='$elementary',
                junior='$junior',
                senior='$senior',
                college='$college',
                is_online='$is_online'";
  mysqli_query($db_connection, $query) or die(mysqli_error($db_connection));

  $regid = mysqli_insert_id($db_connection);
 
  $rs = mysqli_query($db_connection, 'SELECT * FROM ' . $_SESSION['tmp_registrations_family']) or die(mysqli_error($db_connection));
  while ($rw = mysqli_fetch_array($rs)) {
      $query_family = 'INSERT INTO tblregistrations_family SET regid='.$regid.',family_lastname=\''
                                              .$rw['family_lastname'].'\',family_firstname=\''
                                              .$rw['family_firstname'].'\',family_middleinitial=\''
                                              .$rw['family_middleinitial'].'\',relationshipid=\''
                                              .$rw['relationshipid'].'\',family_age=\''
                                              .$rw['family_age'].'\',familycivilid=\''
                                              .$rw['familycivilid'].'\',educationid=\''
                                              .$rw['educationid'].'\',occupation=\''
                                              .$rw['occupation'].'\',income=\''
                                              .$rw['income'].'\' ';
      mysqli_query($db_connection, $query_family);
  }
}


$jscript = "ajax_new_without_reload('tmp_registration.php?date1='+object('date1').value
                                                  +'&date2='+object('date2').value
                                                  +'&src='+object('src').value
                                                  +'&status='+object('status').value,'tmp_tmp');";

$from = date('Y-m-d', strtotime('-31 days'));
$to = date('Y-m-d');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div align="left">
  <h3>Registration</h3>
</div>

<table width="100%">
  <tr>
    <td align="left">
      FROM:&nbsp;<input type="date" value="<?=$from; ?>" id="date1" onchange="<?=$jscript; ?>" />
  
      TO:<input type="date" value="<?=$to; ?>" id="date2" onchange="<?=$jscript; ?>" />
    </td>
  
    <td align="right" class="d-flex justify-content-end">
      <input type="text" id="src" style="width: 150px;" class="mx-2 form-control" placeholder="Search..." onkeyup="<?=$jscript?>">
  
      <select style="width: 100px;" class="form-control mb-1" id="status" onchange="<?=$jscript?>">
        <option value="-1" selected>All</option>
        <option value="0">Pending</option>
        <option value="1">Accepeted</option>
      </select>
      &nbsp;&nbsp;
    <button onclick="ajax_new('application.php','maincontent');" class="btn btn-sm btn-success" style="width: 150px;" class="mx-2 form-control"> Register New</button>
    </td>
  </tr>
</table>
<br>
<div id="tmp_tmp">
  <? include('tmp_registration.php'); ?>
</div>
</div>