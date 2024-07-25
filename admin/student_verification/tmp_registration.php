<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
  if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
  if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
  if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
  header('location: ../'); exit(0); 
}

if (!isset($_GET['date1'])) {$from = date('Y-m-d', strtotime('-31 days'));}
if (!isset($_GET['date2'])) {$to = date('Y-m-d', strtotime('7 days'));}

?>

<div class="card">
  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-hover  ">
        <thead> 
          <tr>
            <th>#</th>
            <th>Entry Date</th>
            <th>Fullname</th>
            <th>Email Address</th>
            <th>Level</th>
            <th>Picture</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <?php

          if (isset($_GET['date1'])){$from = date('Y-m-d',strtotime($_GET['date1']));}
          if (isset($_GET['date2'])){$to = date('Y-m-d',strtotime($_GET['date2']));}
          $c = 1;
          $q = "SELECT * FROM tblregistrations WHERE is_online=1 AND  DATE(regdate)  >= '$from' AND DATE(regdate) <='$to'";
// $q = "SELECT * FROM tblregistrations";

          if(isset($_GET['src'])){
            if($_GET['src']==''){ $q .= ' ';} else { $q .= ' AND (firstname LIKE \'%'.$_GET['src'].'%\'
              OR lastname LIKE \'%'.$_GET['src'].'%\'
              OR trackingnumber LIKE \'%'.$_GET['src'].'%\')';}
          }

         

          if(isset($_GET['levelid'])){
            if($_GET['levelid']==-1){ 
              $q .= ' ';
            } else if($_GET['levelid']==1){
              $q .= ' AND levelid=1 ';
            } else {
              $q .= ' AND levelid=2';
            }
          }
          $count = 1;
          $rs = mysqli_query($db_connection, $q);
          while ($rw = mysqli_fetch_array($rs)) {
            foreach ($rw as $key => $value) {
              $rw[$key] = htmlspecialchars($value);
            }
            $category = GetData('select category from tblcategory where categoryid='.$rw['categoryid']);
            $level = GetData('select level from tbllevel where levelid='.$rw['levelid']);
            echo '<tr>';
            echo'<td>'.$count++.'</td>';
            echo'<td>'.date("M d, Y",strtotime($rw['regdate'])).'</td>';
            echo '<td>' . $rw['firstname'].' '.$rw['lastname'] . '</td>';
            echo '<td>' . $rw['emailaddress'] . '</td>';


            if($rw['is_verify']){
              echo'<td>'.$level.'</td>';
              echo'<td><a href="javsacript:void();" onclick="openCustom(\'view_view.php?regid='.$rw['regid'].'\',600,600)">View Pic</a></td>';
               echo '<td><label class="badge badge-success">Verified</label></td>';
            } else {
               echo'<td>'.$level.'</td>';
                 echo'<td><a href="javsacript:void();" onclick="openCustom(\'view_view.php?regid='.$rw['regid'].'\',600,600)">View Pic</a></td>';
               echo '<td><label class="badge badge-secondary">Pending</label>&nbsp;
               <a href="javascript:void()" onclick="send_crendentials('.$rw['regid'].');">Send Credentials</a>
               </td>';
            }

            
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>