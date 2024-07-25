<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}




$from = date('Y-m-d', strtotime('-31 days'));
$to = date('Y-m-d', strtotime('7 days'));

$jscript = 'ajax_new(\'view_schedule_tmp.php?str=\'+object(\'str\').value
                +\'&from_=\'+object(\'from_\').value
                +\'&to_=\'+object(\'to_\').value
                +\'&stat=\'+object(\'stat\').value,\'tmp_show\');';



?>


<div align="left">
    <h3>View Schedule</h3>
</div>

<div align="right">
    <table>
    <tr>
        <td> FROM:&nbsp;
  <input onchange="<?=$jscript?>" type="date" id="from_" value="<?=$from?>"/></td>
        <td>TO:&nbsp;
  <input onchange="<?=$jscript?>" type="date" id="to_" value="<?=$to?>"/></td>
        <td>
            <select onchange="<?=$jscript?>" id="stat">
                <option value="0">ALL</option>
                <option value="2">Scheduled</option>
                <option value="1">Done</option>
            </select>

        </td>
   </tr>
        <tr>
            <td>Search here:&nbsp;</td>
            <td><input onkeyup="<?=$jscript?>" type="text" id="str" style="width:250px;" placeholder="Search by Tracking # or name..." /></td>
            <td><button onclick="<?=$jscript?>" class="btn btn-sm btn-secondary">Search</button></td>
       </tr>
    </table>
    <div id="tmp_show">
        <? include('view_schedule_tmp.php'); ?>
    </div>
</div>

