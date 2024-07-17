<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
  if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
  if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
  if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
  header('location: ../'); exit(0); 
}



?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-hover">
              <tr>
                <td>Tracking Number</td>
                <td>Student Name</td>
                <td>Year Level</td>
                <td>Action</td>
                <td>&nbsp;</td>
              </tr>
              <?
              $q = "SELECT * FROM tblregistrations where is_accept=1 ";

              if(isset($_GET['str'])){
                if($_GET['str']=='') {
                  $q .= ' ';
                } else {
                  $q .= ' AND firstname LIKE \'%'.escape_str($db_connection,$_GET['str']).'%\' 
                        OR lastname LIKE \'%'.escape_str($db_connection,$_GET['str']).'%\'
                        OR trackingnumber LIKE \'%'.escape_str($db_connection,$_GET['str']).'%\' ';
                }
              }

              $rs = mysqli_query($db_connection, $q);
              while ($rw = mysqli_fetch_array($rs)) {
                  foreach ($rw as $key => $value) {
                    $rw[$key] = htmlspecialchars($value);
                  }
                  $level = GetData('select level from tbllevel where levelid='.$rw['levelid']);
                  echo'<tr>';
                    echo'<td>'.$rw['trackingnumber'].'</td>';
                    echo'<td>'.$rw['firstname'].' '.$rw['lastname'].'</td>';
                    echo'<td>'.$level.'</td>';

                    if($rw['is_complete']==2){
                       echo'<td><label class="badge badge-primary">Scheduled</label></td>';

                       echo'<td><a href="javascript:void();" onclick="ajax_new(\'selecting_schedule.php?regid='.secureData($rw['regid']).'\',\'tmp_show\');">Click here to resched</a></td>';
                    } else {
                       echo'<td><a href="javascript:void();" onclick="ajax_new(\'selecting_schedule.php?regid='.secureData($rw['regid']).'\',\'tmp_show\');">Select</a></td>';

                       echo'<td>&nbsp;</td>';

                    }
                   

                  echo'</tr>';
              }
              ?>

            </table>
        </div>
    </div>
</div>

