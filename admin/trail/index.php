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
<h3>Audit Trail</h3>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-hover ">
        <thead> 
          <tr>
            <th>Activity ID</th>
            <th>Account Name</th>
            <th>Date</th>
            <th>Activity</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $q = "SELECT * FROM tblactivity ";
          $rs = mysqli_query($db_connection, $q);
          while ($rw = mysqli_fetch_array($rs)) {
            foreach ($rw as $key => $value) {
              $rw[$key] = htmlspecialchars($value);
            }
            echo'<tr>';
            echo'<td>'.$rw['activityid'].'</td>';
            echo'<td>'.Name($rw['accountid']).'</td>';
            echo'<td>'.$rw['activitydate'].'</td>';
            echo'<td>'.$rw['activity'].'</td>';
            echo'</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>