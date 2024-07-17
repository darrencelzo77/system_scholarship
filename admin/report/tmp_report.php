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
            <th>Reg Date</th>
            <th>Category</th>
            <th>Fullname</th>
            <th>Email Address</th>
            <th>Type</th>
            <th>Level</th>
          </tr>
        </thead>
        <tbody>
          <?php

          if (isset($_GET['date1'])){$from = date('Y-m-d',strtotime($_GET['date1']));}
          if (isset($_GET['date2'])){$to = date('Y-m-d',strtotime($_GET['date2']));}
          $c = 1;
          $q = "SELECT * FROM tblregistrations WHERE DATE(regdate)  >= '$from' AND DATE(regdate) <='$to'";
// $q = "SELECT * FROM tblregistrations";

          if(isset($_GET['src'])){
            if($_GET['src']==''){ $q .= ' ';} else { $q .= ' AND (firstname LIKE \'%'.$_GET['src'].'%\'
                                OR lastname LIKE \'%'.$_GET['src'].'%\'
                                OR trackingnumber LIKE \'%'.$_GET['src'].'%\')';}
          }

          if(isset($_GET['status'])){
            if($_GET['status']==-1){ 
              $q .= ' ';
            } else if($_GET['status']==0){ 
              $q .= ' AND is_accept=0 AND is_reject=0 ';
            } else if($_GET['status']==1){ 
              $q .= ' AND is_accept=1 AND is_reject=0 ';
            } else {
              $q .= ' AND is_accept=0 AND is_reject=1 ';
            }
          }


          if(isset($_GET['categoryid'])){
            if($_GET['categoryid']==-1){ 
              $q .= ' ';
            } else {
              $q .= ' AND categoryid='.$_GET['categoryid'].' ';
            }
          }


          if(isset($_GET['is_online'])){
            if($_GET['is_online']==-1){ 
              $q .= ' ';
            } else if($_GET['is_online']==1){
              $q .= ' AND is_online=1 ';
            } else {
              $q .= ' AND is_online=0';
            }
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

          $q .= ' AND is_accept=1 ';
          $rs = mysqli_query($db_connection, $q);
          while ($rw = mysqli_fetch_array($rs)) {
            foreach ($rw as $key => $value) {
              $rw[$key] = htmlspecialchars($value);
            }
            $category = GetData('select category from tblcategory where categoryid='.$rw['categoryid']);
            $level = GetData('select level from tbllevel where levelid='.$rw['levelid']);
            if($rw['is_online']){
              $x = 'Online';
            } else {
              $x = 'Walk-in';
            }
            echo '<tr>';
            echo'<td>'.$count++.'</td>';
            echo'<td>'.date("M d, Y",strtotime($rw['regdate'])).'</td>';
            echo '<td title="'.$category.'">'.Cat($rw['categoryid']).'</td>';
            echo '<td>' . $rw['firstname'].' '.$rw['lastname'] . '</td>';
            echo '<td>' . $rw['emailaddress'] . '</td>';
            echo '<td>' . $x . '</td>';
            echo '<td>' . $level . '</td>';

         
            echo '</tr>';
            $male = 1;
            $female = 2;
            //$count_sex += $rw['sexid'];
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>