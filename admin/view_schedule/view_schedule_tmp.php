<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
  if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
  if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
  if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
  header('location: ../'); exit(0); 
}

if (!isset($_GET['from_'])) {$from = date('Y-m-d', strtotime('-9 days'));}
if (!isset($_GET['to_'])) {$to = date('Y-m-d', strtotime('7 days'));}



?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <td>Schedule Date</td>
                <td>Tracking Number</td>
                <td>Student Name</td>
                <td>Year Level</td>
                <td>Status</td>
              </tr>
              <?
               if (isset($_GET['from_'])){$from = date('Y-m-d',strtotime($_GET['from_']));}
              if (isset($_GET['to_'])){$to = date('Y-m-d',strtotime($_GET['to_']));}

              $q = 'SELECT a.*, b.regid as regid2,c.schedid,c.scheddate
              FROM tblregistrations a, tblschedule_details b, tblschedule c
              WHERE a.is_verify=1 AND a.is_updated=1 AND a.regid=b.regid AND b.schedid=c.schedid AND a.is_accept = 1  AND a.is_online=1 AND 
              DATE(c.scheddate)  >= \''.$from.'\' AND DATE(c.scheddate) <= \''.$to.'\'
              ';

              if(isset($_GET['str'])){
                if($_GET['str']=='') {
                  $q .= ' ';
                } else {
                  $q .= ' AND a.firstname LIKE \'%'.escape_str($db_connection,$_GET['str']).'%\' 
                        OR a.lastname LIKE \'%'.escape_str($db_connection,$_GET['str']).'%\'
                        OR a.trackingnumber LIKE \'%'.escape_str($db_connection,$_GET['str']).'%\' ';
                }
              }


              if(isset($_GET['stat'])){
                if($_GET['stat']==0) {
                  $q .= ' ';
                } else if ($_GET['stat']==2){
                  $q .= ' AND a.is_complete=2 ';
                } else {
                  $q .= ' AND a.is_complete=1 ';
                }
              }
              //echo $q;
              $q .= ' order by scheddate';
              $rs = mysqli_query($db_connection, $q);
              while ($rw = mysqli_fetch_array($rs)) {
                  foreach ($rw as $key => $value) {
                    $rw[$key] = htmlspecialchars($value);
                  }
                  $level = GetData('select level from tbllevel where levelid='.$rw['levelid']);
                  echo'<tr>';
                    echo'<td><b>'.date("F j, Y",strtotime($rw['scheddate'])).'</b></td>';
                    echo'<td>'.$rw['trackingnumber'].'</td>';
                    echo'<td>'.$rw['firstname'].' '.$rw['lastname'].'</td>';
                    echo'<td>'.$level.'</td>';

                    if($rw['is_complete']==2){
                       echo'<td><label class="badge badge-primary">Scheduled</label>&nbsp;&nbsp;';
                       echo'</td>';
                    } else if ($rw['is_complete']==1) {
                        echo'<td><label class="badge badge-success">Done</label>&nbsp;&nbsp;';
                       echo'</td>';

                    }
                   

                  echo'</tr>';
              }
              ?>

            </table>
        </div>
    </div>
</div>

