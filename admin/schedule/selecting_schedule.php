<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
  if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
  if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
  if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
  header('location: ../'); exit(0); 
}

$regid = secureData($_GET['regid'],'d');
$fullname = GetData('select concat(firstname,\' \',lastname) as name from tblregistrations where regid='.$regid);


$from = date('Y-m-d', strtotime('-31 days'));
$to = date('Y-m-d');


$jss = 'ajax_new(\'selecting_schedule_tmp.php?from=\'+object(\'from\').value
                                            +\'&to=\'+object(\'to\').value
											+\'&regid=\'+object(\'regid\').value
											+\'&fullname=\'+object(\'fullname\').value,\'tmp_kkk\');'



?>
<h3>Pick schedule for:&nbsp;</h3>

<div>
  <h5><?=$fullname?></h5>
</div>
<input type="hidden" id="regid" value="<?=$regid?>"/>
<input type="hidden" id="fullname" value="<?=$fullname?>"/>
<div>
  FROM:&nbsp;
  <input onchange="<?=$jss?>" type="date" id="from" value="<?=$from?>"/>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  TO:&nbsp;
  <input onchange="<?=$jss?>" type="date" id="to" value="<?=$to?>"/>
</div>
<br>
<div id="tmp_kkk"><? include('selecting_schedule_tmp.php'); ?></div>



