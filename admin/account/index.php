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
  <head>
    <script>
      function add_user(){
        var username = object('username').value;
        var firstname = object('firstname').value;
        var middlename = object('middlename').value;
        var lastname = object('lastname').value;
        var email = object('email').value;
        var password = object('password').value;
        var typeid = object('typeid').value;
        var add_account_a = object('add_account_a')

        let myForm = new FormData();
        myForm.append('username', username);
        myForm.append('firstname', firstname);
        myForm.append('middlename', middlename);
        myForm.append('lastname', lastname);
        myForm.append('email', email);
        myForm.append('password', password);
        myForm.append('typeid', typeid);
        myForm.append('add_account_a', add_account_a)

        swal({
        title: "Add New User",
        text: "Are you sure you to add new account?",
        icon: "info",
        buttons: true,
        dangerMode: true,
        }).then((willAdd) => {
            if (willAdd) {
                $.ajax({
                    url: 'account.php',
                    type: "POST",
                    data: myForm,
                    beforeSend: function () {
                        $("#body-overlay").show();
                    },
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $("#maincontent").html(data);
                        $("#body-overlay").hide();
                        swal('Success', 'Successfully Processed Request', 'success');
                    },
                    error: function () {
              swal('Error', 'Error Processing Request', 'error');
                    }
                });
          TINY.box.hide();
            }
        });

      }
    </script>
  </head>
  <? include('../nav/header.php'); ?>
  <body>
    <div class="container-scroller">
      <? include('../nav/topnav.php'); ?>
      <div class="container-fluid page-body-wrapper">
        <? include('../nav/sidenav.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div id="maincontent">
              <?include('account.php')?>
            </div>
          </div>
          <? include('../nav/footer.php'); ?>
        </div>
      </div>
    </div>
    <? include('../nav/footer_script.php'); ?>
  </body>
</html>