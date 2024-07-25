<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}


if(isset($_POST['regid'])){
    include('../email/send_credentials.php');
}

$jscript = "ajax_new_without_reload('tmp_registration.php?date1='+object('date1').value
                                                  +'&date2='+object('date2').value
                                                  +'&src='+object('src').value,'tmp_tmp');";

$from = date('Y-m-d', strtotime('-31 days'));
$to = date('Y-m-d');



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div align="left">
  <h3>Verify Student</h3>
</div>
<table width="100%">
  <tr>
    <td align="left">
      FROM:&nbsp;<input type="date" value="<?=$from; ?>" id="date1" onchange="<?=$jscript; ?>" />
  
      TO:<input type="date" value="<?=$to; ?>" id="date2" onchange="<?=$jscript; ?>" />
    </td></tr>
</table><br>
<table width="100%">
  <tr>
    <!-- <td align="left">
      FROM:&nbsp;<input type="date" value="<?=$from; ?>" id="date1" onchange="<?=$jscript; ?>" />
  
      TO:<input type="date" value="<?=$to; ?>" id="date2" onchange="<?=$jscript; ?>" />
    </td> -->
  
    <td align="right" class="d-flex justify-content-end">
      <input type="text" id="src" style="width: 150px;" class="mx-2 form-control" placeholder="Search..." onkeyup="<?=$jscript?>">
  

   <select style="width: 110px;" class="form-control mb-1" id="levelid" onchange="<?=$jscript?>">
            <option value="-1" selected>All Level</option>
            <option value="1">Elementary/Highscholl</option>
            <option value="2">College</option>
          </select>
        &nbsp;&nbsp;

       

          <button onclick="ajax_new('registration.php','maincontent');" class="btn btn-sm btn-secondary">Reset</button>
    </td>
  </tr>
</table>
<br>
<? if($str){echo $str;} ?>
<div id="tmp_tmp">
  <? include('tmp_registration.php'); ?>
</div>
</div>