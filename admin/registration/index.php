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
    
    function accept_application(regid){
      
	    var regid_x = object('regid_x'+regid).value;
			let myForm = new FormData();
			myForm.append('firstname', regid_x);
      		myForm.append('regid', regid);
    		swal({
				title: "Application",
				text: "Are you sure want to accept the application of "+regid_x+"?",
				icon: "info",
				buttons: true,
				dangerMode: true,
			})
			.then((willAdd) => {
				if (willAdd) {
					$.ajax({
						url: 'sample.php',
						type: "POST",
						data: myForm,
						beforeSend: function () {$("#body-overlay").show();},
						contentType: false,
						processData: false,
						success: function (data) {
							$("#tmp"+regid).html(data);
							$("#tmp"+regid).css('opacity', '1');
							$("#body-overlay").hide();
						   
							Swal('Success', 'Successfull Processed Request', 'error');

						},
						error: function () {
							Swal('Error', 'Error Processing Request', 'error');
						}
					});
				} else {}
			});		
	}

	function reject_application(rejectid) {
    var reject_a = document.getElementById('reject_a' + rejectid).value;
	  var reason = document.getElementById('reason').value;
    let myForm = new FormData();
    myForm.append('firstname', reject_a);
    myForm.append('reject_a', rejectid);
	  myForm.append('reason', reason);
    
    swal({
        title: "Application",
        text: "Are you sure you want to reject the application of " + reject_a + "?",
        icon: "info",
        buttons: true,
        dangerMode: true,
    })
    .then((willAdd) => {
        if (willAdd) {
            $.ajax({
                url: 'sample.php',
                type: "POST",
                data: myForm,
                beforeSend: function () {
                    $("#body-overlay").show();
                },
                contentType: false,
                processData: false,
                success: function (data) {
                    $("#tmp" + rejectid).html(data);
                    $("#tmp" + rejectid).css('opacity', '1');
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

  
  
  <body>
    <div class="container-scroller">
      <? include('../nav/topnav.php'); ?>
      <div class="container-fluid page-body-wrapper">
        <? include('../nav/sidenav.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper">
           <div id="body-overlay"><div><img src="../images/processing.gif" width="80%" /></div></div>
            <div id="maincontent">
              <? include('registration.php'); ?>
              <br>
            </div>

          <? include('../nav/footer.php'); ?>
        </div>
      </div>
    </div>
    <? include('../nav/footer_script.php'); ?>
  </body>
</html>