<?php
if(session_id()==''){session_start();}
$err = '';
if(isset($_POST['signin'])) {
    include('admin/includes/systemconfig.inc');
  $p = mysqli_real_escape_string($db_connection,$_POST['userpassword']);
  $rs = mysqli_query($db_connection,'SELECT * FROM tblregistrations WHERE emailaddress=\''.
    mysqli_real_escape_string($db_connection,$_POST['emailaddress']).'\' AND 
    userpassword=\''.$p.'\' AND is_verify=1 AND is_online=1 limit 0,1');
  $rw = mysqli_fetch_array($rs);
  if (mysqli_num_rows($rs) == 1) {
    $_SESSION['regid'] = $rw['regid'];
    header('location: application');
    exit(0);
  } else {
    $err =  '<span style="color:red; font-size:16pm;" class="blink">
      This account in not register. <a href="register">Click here to sign up.</a>
    </span>';
  }
} 
if(isset($_SESSION['regid'])) {
  include_once('admin/includes/systemconfig.inc');
  header('location: application');
  exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Student</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
   <style>
    /*.blink {
      animation: 2s linear infinite condemned_blink_effect;
    }
    @keyframes condemned_blink_effect {
        0% {
        visibility: hidden;
        }
        50% {
        visibility: hidden;
        }
        100% {
        visibility: visible;
        }
    }*/
  
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>EducAssis</b>System
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="emailaddress" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="userpassword" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> <? if($err){echo $err;} ?>
        <div align="right">
         
          <!-- /.col -->
          <div class="col-4">
            <input  type="submit" class="btn btn-primary btn-block" name="signin" value="Sign In">
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
</body>
</html>
