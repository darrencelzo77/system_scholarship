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
  <? include('../nav/header.php'); ?>
  <script>
    
  </script>
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
                  <button onclick="ajax_new('category_add.php','maincontent');">Add New</button>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                     
                      <table class="table table-sm table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Category</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $c = 1;
                          $q = 'select * from tblcategory';

                          $rs = mysqli_query($db_connection,$q);
                          while($rw = mysqli_fetch_array($rs)){
                            foreach ($rw as $key => $value) {
                              $rw[$key] = htmlspecialchars($value);
                            }
                            echo'<tr>';
                            echo'<td>'.substr($rw['category'], 0,40).'</td>'; 
                            echo'<td><button onclick="view_registration('.$rw['intakeid'].');" class="btn btn-primary btn-sm">VIEW</button>
                            <button class="btn btn-secondary btn-sm">EDIT</button>
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
</html>