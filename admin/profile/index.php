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
  table.table td a {
    color: black;
  }
</style>
<? include('../nav/header.php'); ?>
  <script>
  
function update_acc(accountid){     
    let myForm = new FormData();
    myForm.append('uname', object('uname').value);
    myForm.append('fname', object('fname').value);
      myForm.append('mname', object('mname').value);
      myForm.append('lname', object('lname').value);
      myForm.append('email', object('email').value);
      myForm.append('pass', object('pass').value);
    
    swal({
        title: "Update Information",
        text: "Are you sure you want to update your information?",
        icon: "info",
        buttons: true,
        dangerMode: true,
    })
    .then((willAdd) => {
        if (willAdd) {
            $.ajax({
                url: 'profile.php',
                type: "POST",
                data: myForm,
                beforeSend: function () {
                    $("#body-overlay").show();
                },
                contentType: false,
                processData: false,
                success: function (data) {
                    $("#maincontent").html(data);
                    $("#maincontent").css('opacity', '1');
                    $("#body-overlay").hide();
                    swal('Success', 'Successfully Processed Request', 'success');
                },
                error: function () {
                    swal('Error', 'Error Processing Request', 'error');
                }
            });
            //TINY.box.hide();
        }
    });
}

  </script>

  
  
  <body>
    <div class="container-scroller">
      <? include('../nav/topnav.php'); ?>
      <div class="container-fluid page-body-wrapper">
        <? include('../nav/sidenav.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper">
           <div id="body-overlay"><div><img src="../images/processing.gif" width="80%" /></div></div>
            <div id="maincontent">
              <? include('profile.php'); ?>
              <br>
            </div>

          <? include('../nav/footer.php'); ?>
        </div>
      </div>
    </div>
    <? include('../nav/footer_script.php'); ?>
  </body>
</html>