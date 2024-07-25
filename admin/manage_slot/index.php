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
    function update_slot(){
      let myForm = new FormData();
      myForm.append('slot', object('slot').value);
    
    swal({
        title: "Update Slot",
        text: "Are you sure you want to update your slot?",
        icon: "info",
        buttons: true,
        dangerMode: true,
    })
    .then((willAdd) => {
        if (willAdd) {
            $.ajax({
                url: 'add_slot.php',
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
            <div id="maincontent">
              <? include('add_slot.php'); ?>
            </div>
          </div>
          <? include('../nav/footer.php'); ?>
        </div>
      </div>
    </div>
    <? include('../nav/footer_script.php'); ?>
  </body>
</html>