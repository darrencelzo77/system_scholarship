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

      <table class="table table-hover ">
        <thead> 
          <tr>
            <th>Category</th>
            <th>Student Number</th>
            <th>Fullname</th>
            <th>Email Address</th>
            <th>Status</th>
            <th>Action</th>
            <th>Action</th>
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
                                                            OR studentnumber LIKE \'%'.$_GET['src'].'%\')';}
            }

            if(isset($_GET['status'])){
                if($_GET['status']==-1){ $q .= ' ';} else { $q .= ' AND is_accept='.$_GET['status'].'';}
            }

          $rs = mysqli_query($db_connection, $q);
          while ($rw = mysqli_fetch_array($rs)) {
            foreach ($rw as $key => $value) {
              $rw[$key] = htmlspecialchars($value);
            }

            echo '<tr>';
            echo '<td>' . Cat($rw['categoryid']) . '</td>';
            echo '<td>' . $rw['studentnumber'] . '</td>';
            echo '<td>' . $rw['firstname'] . ' ' . $rw['lastname'] . '</td>';
            echo '<td>' . $rw['emailaddress'] . '</td>';
            if ($rw['is_accept'] == 0 && $rw['is_reject'] == 0) {
              echo '<td><label class="badge badge-secondary">Pending</label></td>';
              echo '<td>
                    <span id="tmp' . $rw['regid'] . '">
                    <input type="hidden" value="' . $rw['firstname'] . '" id="regid_x' . $rw['regid'] . '"/>
                    <a href="javascript:void(0);" class="view" title="View" data-toggle="tooltip" onclick="openCustom(\'../forms/form?studentid=' . secureData($rw['regid']) . '\',900,900);"><i class="material-icons">&#xE417;</i></a>
                    <a href="javascript:void(0);" class="accept" title="Accept" data-toggle="tooltip" onclick="accept_application(' . $rw['regid'] . ');"><i class="material-icons">&#xe86c;</i></a>
                    <a href="javascript:void(0);" class="reject" title="Reject" data-toggle="tooltip" onclick="TINY.box.show({url:\'reject.php?regid='.secureData($rw['regid']).'\',width:400,height:150 })";><i class="material-icons">&#xE5C9;</i></a>
                    </td>';
              echo '</span>';
            } else if($rw['is_reject'] == 1 && $rw['is_accept'] == 0){
              echo '<td><label class="badge badge-danger">Rejected</label></td>';
              echo'<td></td>';
            }
            else {
              echo '<td><label class="badge badge-success">Accepted</label></td>';
              echo'<td></td>';
            }

            echo'<td><input type="checkbox" id="'.$rw['regid'].'"  name="tosend[]" /></td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>