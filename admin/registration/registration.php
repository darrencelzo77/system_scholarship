<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}



$jscript = "ajax_new_without_reload('tmp_registration.php?date1='+object('date1').value
                                                  +'&date2='+object('date2').value
                                                  +'&src='+object('src').value
                                                  +'&status='+object('status').value,'tmp_tmp');";

$from = date('Y-m-d', strtotime('-31 days'));
$to = date('Y-m-d');
?>

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
    <button onclick="alert('if walk in dito mo ikakana');" class="btn btn-sm btn-success" style="width: 150px;" class="mx-2 form-control"> Register New</button>
    </td>
  </tr>
</table>
<br>
<div id="tmp_tmp">
  <? include('tmp_registration.php'); ?>
</div>
</div>