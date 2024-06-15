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
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
  table.table td a.view {
    color: #03A9F4;
  }
  table.table td a.accept {
    color: green;
  }
  table.table td a.reject {
    color: #E34724;
  }
</style>
<? include('../nav/header.php'); ?>
  <script>
    function accept_application(){
      swal({
        title: "Accept Application",
        text: "Are you sure to accept the selected application?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
		  })
    }
  </script>

  <div id="maincontent">
  <body>
    <div class="container-scroller">
      <? include('../nav/topnav.php'); ?>
      <div class="container-fluid page-body-wrapper">
        <? include('../nav/sidenav.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div id="maincontent">
              <div align="left">
                  <h3>Registration</h3>
                </div>
                 <div align="right">
                  <button hidden onclick="ajax_new('category_add.php','maincontent');">Add New</button>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                     
                      <table class="table table-hover table-sm">
                        <thead>
                          <tr>
                            <th>Category ID</th>
                            <th>Student Number</th>
                            <th>Fullname</th>
                            <th>Email Address</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $c = 1;
                          $q = 'select * from tblregistrations';

                          $rs = mysqli_query($db_connection,$q);
                          while($rw = mysqli_fetch_array($rs)){
                            foreach ($rw as $key => $value) {
                              $rw[$key] = htmlspecialchars($value);
                            }
                            echo'<tr>';
                            echo'<td>'.$rw['categoryid'].'</td>';
                            echo'<td>'.$rw['studentnumber'].'</td>'; 
                            echo'<td>'.$rw['firstname']. ' '.$rw['lastname'].'</td>'; 
                            echo'<td>'.$rw['emailaddress'].'</td>';
                            if($rw['is_accept'] == 0){
                              echo '<td><label class="badge badge-danger">Pending</label></td>';
                            }else{
                              echo '<td><label class="badge badge-success">Accepted</label></td>';
                            }
                            echo '<td>
                                    <a href="javascript:void(0);" class="view" title="View" data-toggle="tooltip" onclick="openWin(\'view_reg.php?studentid='.secureData($rw['regid']).'\');"><i class="material-icons">&#xE417;</i></a>
                                    <a href="javascript:void(0);" class="accept" title="Accept" data-toggle="tooltip" onclick="accept_application();"><i class="material-icons">&#xe86c;</i></a>
                                    <a href="javascript:void(0);" class="reject" title="Reject" data-toggle="tooltip" onclick=""><i class="material-icons">&#xE5C9;</i></a>
                                  </td>';
                            echo'</tr>';
                          }
                          ?>  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <? include('../nav/footer.php'); ?>
        </div>
      </div>
    </div>
    <? include('../nav/footer_script.php'); ?>
  </body>
  </div>
</html>