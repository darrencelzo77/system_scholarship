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
    mysqli_query($db_connection,'insert into tblschedule_details set regid='.
                        escape_str($db_connection,$_POST['regid']).',schedid=\''.
                        escape_str($db_connection,$_POST['schedid']).'\' ');
    mysqli_query($db_connection,'update tblregistrations set is_complete=2 where regid='.$_POST['regid'].' ');
    mysqli_query($db_connection,'update tblschedule set
            slot_count = slot_count + 1 where schedid='.$_POST['schedid'].' ');

    include('../email/schedule_message.php');
}


if(isset($_POST['edit'])){
    $sched_id = GetData('select schedid from tblschedule_details where regid='.$_POST['regid2']);
    mysqli_query($db_connection,'update tblschedule set
            slot_count = slot_count - 1 where schedid='.$sched_id.' ');
    mysqli_query($db_connection,'delete from tblschedule_details where regid='.$_POST['regid2']);


    ///////////

    mysqli_query($db_connection,'insert into tblschedule_details set regid='.
                        escape_str($db_connection,$_POST['regid2']).',schedid=\''.
                        escape_str($db_connection,$_POST['schedid2']).'\' ');
    mysqli_query($db_connection,'update tblregistrations set is_complete=2 where regid='.$_POST['regid2'].' ');
    mysqli_query($db_connection,'update tblschedule set
            slot_count = slot_count + 1 where schedid='.$_POST['schedid2'].' ');

    include('../email/schedule_message_edit.php');
}


$from = date('Y-m-d', strtotime('-31 days'));
$to = date('Y-m-d');

$jscript = 'ajax_new(\'schedule_tmp.php?str=\'+object(\'str\').value
                +\'&from_=\'+object(\'from_\').value
                +\'&to_=\'+object(\'to_\').value,\'tmp_show\');';



?>


<div align="left">
    <h3>Schedule Educational Assistance</h3>
</div>

<div align="right">
    <table>

<!-- <div>
  FROM:&nbsp;
  <input onchange="<?=$jscript?>" type="date" id="from_" value="<?=$from?>"/>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  TO:&nbsp;
  <input onchange="<?=$jscript?>" type="date" id="to_" value="<?=$to?>"/>
</div> -->
        <tr>
            <td>Search here:&nbsp;</td>
            <td><input onkeyup="<?=$jscript?>" type="text" id="str" style="width:250px;" placeholder="Search by Tracking # or name..." /></td>
            <td><button onclick="<?=$jscript?>" class="btn btn-sm btn-secondary">Search</button></td>
       </tr>
    </table>
    <div id="tmp_show">
        <? include('schedule_tmp.php'); ?>
    </div>
</div>

<!-- 


$startYear = 2024;
$endYear = 2029;
$schedId = 1;
$insertValues = [];

for ($year = $startYear; $year <= $endYear; $year++) {
    for ($month = 1; $month <= 12; $month++) {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = sprintf("%04d-%02d-%02d 00:00:00", $year, $month, $day);
            $insertValues[] = "($schedId, '$date')";
            $schedId++;
        }
    }
}

$insertStatement = "INSERT INTO schedule (schedid, scheddate) VALUES " . implode(", ", $insertValues) . ";";

echo $insertStatement;


 -->