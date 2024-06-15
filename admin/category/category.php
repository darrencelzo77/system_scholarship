<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
  if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
  if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
  if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
  header('location: ../'); exit(0); 
}


if(isset($_POST['add'])){
  mysqli_query($db_connection,'insert into tblcategory set category=\''.
    escape_str($db_connection,$_POST['category']).'\' ');
}

if(isset($_POST['edit'])){
  mysqli_query($db_connection,'update tblcategory set category=\''.
    escape_str($db_connection,$_POST['category']).'\' where categoryid='.$_POST['categoryid']);
}



?>

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <div align="left">
        <h4>Category</h4>
      </div>
      <div align="right">
        <button class="btn btn-dark btn-sm" onclick="ajax_new('category_add.php','maincontent');">Add New</button>
      </div>
      <table class="table table-sm table-striped">
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
            <button onclick="ajax_new(\'category_add.php?categoryid='.secureData($rw['categoryid']).'\',\'maincontent\')" class="btn btn-secondary btn-sm">EDIT</button>
            </td>'; 
            echo'</tr>';
          }
          ?>  
        </tbody>
      </table>
    </div>
  </div>
</div>