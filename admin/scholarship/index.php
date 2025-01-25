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
    //completed_function
     function completed_function(regid){
      let myForm = new FormData();
          myForm.append('regid_edit', regid);
        swal({
        title: "Application",
        text: "Are you sure that this application has been completed?",
        icon: "info",
        buttons: true,
        dangerMode: false,
      })
      .then((willAdd) => {
        if (willAdd) {
          $.ajax({
            url: 'scholarship.php',
            type: "POST",
            data: myForm,
            beforeSend: function () {$("#body-overlay").show();},
            contentType: false,
            processData: false,
            success: function (data) {
              $("#maincontent").html(data);
              $("#maincontent").css('opacity', '1');
              $("#body-overlay").hide();
               
               swal('Success', 'Successfully Processed Request', 'success');

            },
            error: function () {
              Swal('Error', 'Error Processing Request', 'error');
            }
          });
        } else {}
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
              <?include('scholarship.php')?>
            </div>
          </div>
          <? include('../nav/footer.php'); ?>
        </div>
      </div>
    </div>
    <? include('../nav/footer_script.php'); ?>
  </body>
</html>