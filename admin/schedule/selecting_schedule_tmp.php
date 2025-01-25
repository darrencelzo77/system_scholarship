<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
  if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
  if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
  if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
  header('location: ../'); exit(0); 
}


if (!isset($_GET['from'])) {$from = date('Y-m-d');}
if (!isset($_GET['to'])) {$to = date('Y-m-d', strtotime('+31 days'));}



?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-hover">
              <tr>
                <td>Schedid</td>
                <td>Schedule Date</td>
                <td hidden>Status</td>
                <td>Slot/s</td>
                <td>Occupied Slot/s</td>
                <td>Action</td>
              </tr>
              <?
              if (isset($_GET['from'])){$from = date('Y-m-d',strtotime($_GET['from']));}
              if (isset($_GET['to'])){$to = date('Y-m-d',strtotime($_GET['to']));}
              $q = 'SELECT * FROM tblschedule WHERE  DATE(scheddate)  >= \''.$from.'\' AND DATE(scheddate) <= \''.$to.'\' ';
              $rs = mysqli_query($db_connection, $q);
              while ($rw = mysqli_fetch_array($rs)) {
                  foreach ($rw as $key => $value) {
                    $rw[$key] = htmlspecialchars($value);
                  }

                  //$remaining = $rw['slot'] - $rw['slot_count'];
                  echo'<tr>';
                    echo'<td>'.$rw['schedid'].'</td>';
                    echo'<td>'.date("F d, Y",strtotime($rw['scheddate'])).'</td>';
                    echo'<td>'.$rw['slot'].'</td>';
                    echo'<td>'.$rw['slot_count'].'</td>';
                    echo'<input type="hidden" value="'.date("F d, Y", strtotime($rw['scheddate'])).'" id="dddd'.$rw['schedid'].'"/>';
					
					echo'<input type="hidden" value="'.$regid.'" id="regid"/>';
                    if($rw['slot']==$rw['slot_count']){
                      echo'<td><label class="badge badge-primary">FULL</label></td>';
                    } else {
                      echo'<td><a href="javascript:void(0);" onclick="schedule_it('.$rw['schedid'].',\''.$_GET['fullname'].'\');">Select</a></td>';
                    }
                    echo'</tr>';
              }
              ?>

            </table>
        </div>
    </div>
</div>