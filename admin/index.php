<?php
if(session_id()==''){session_start();}
if (!isset($_SESSION['token'])){$_SESSION['token'] = rand(1, 100);}
$err = '';
if(isset($_POST['signin']) && isset($_SESSION['token']) && $_SESSION['token']==$_POST['token']) {
    include('includes/systemconfig.inc');
  $p = mysqli_real_escape_string($db_connection,$_POST['accountpassword']);
  $rs = mysqli_query($db_connection,'SELECT * FROM tblaccount WHERE username=\''.
    mysqli_real_escape_string($db_connection,$_POST['username']).'\' AND 
    accountpassword=\''.$p.'\' limit 0,1');
  $rw = mysqli_fetch_array($rs);
  if (mysqli_num_rows($rs) == 1) {
    $_SESSION['accountid'] = $rw['accountid'];
    $_SESSION['typeid'] = GetData('SELECT typeid FROM tblaccount WHERE accountid='.$rw['accountid']);
    header('location: dashboard/');
    Audit($_SESSION['accountid'],'Login');
    exit(0);
  } else {
    $err =  '<span style="color:red; font-size:16pm;" class="blink">Invalid Username or Password</span>';
  }
} 
if(isset($_SESSION['accountid'])) {
  include_once('includes/systemconfig.inc');
  header('location: dashboard/');
  exit(0);
}
$_SESSION['token'] = rand(1, 100);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Panel</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href=".vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="images/favicon.png" />
    <style>
    .blink {
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
    }
  
  </style>
    <script>
    function show_me() {
      var x = document.getElementById("accountpassword");
      if (x.type === "password") {
      x.type = "text";
      } else {
      x.type = "password";
      }
    }
    
  </script>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img hidden src="images/logo.svg">
                </div>
                <h4>Scholarship Management System</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="POST">
                  <input hidden type="text" value="<?=$_SESSION['token'];?>" name="token">  
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="username" id="exampleInputEmail1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg"  id="accountpassword"  name="accountpassword" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="signin" value="Sign In"/>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" 
                        id="remember" onclick="show_me()"
                        class="form-check-input"> Show Password </label>
                    </div>
                    <a href="#" hidden class="auth-link text-black">Forgot password?</a>
                  </div>
                  <div hidden class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
                  </div>
                  <? if($err){echo $err;} ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
  </body>
</html>