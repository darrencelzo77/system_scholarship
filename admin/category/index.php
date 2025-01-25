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
  function add_category(){
    var category = object('category').value;
    //if (sectionid != 0) {
      let myForm = new FormData();
      myForm.append('category', category);
      myForm.append('add', 1);
      swal({
        title: "Basic Information",
        text: "Are you sure want to update your information?",
        icon: "info",
        buttons: true,
        dangerMode: false,
      })
      .then((willAdd) => {
        if (willAdd) {
          $.ajax({
            url: 'category.php',
            type: "POST",
            data: myForm,
            beforeSend: function () {$("#body-overlay").show();},
            contentType: false,
            processData: false,
            success: function (data) {
              $("#maincontent").html(data);
              $("#maincontent").css('opacity', '1');
              $("#body-overlay").hide();
              swal('Success', 'Successfully Process Request', 'success');
            },
            error: function () { Swal('Error', 'Error Processing Request', 'error');}
          });
        } else {}
      });   
    //}else{swal('Error on Section','Please select section','error');}
  }

   function edit_category(categoryid){
    var category = object('category').value;
    //if (sectionid != 0) {
      let myForm = new FormData();
      myForm.append('category', category);
      myForm.append('categoryid', categoryid);
      myForm.append('edit', 2);
      swal({
        title: "Basic Information",
        text: "Are you sure want to update your information?",
        icon: "info",
        buttons: true,
        dangerMode: false,
      })
      .then((willAdd) => {
        if (willAdd) {
          $.ajax({
            url: 'category.php',
            type: "POST",
            data: myForm,
            beforeSend: function () {$("#body-overlay").show();},
            contentType: false,
            processData: false,
            success: function (data) {
              $("#maincontent").html(data);
              $("#maincontent").css('opacity', '1');
              $("#body-overlay").hide();
              swal('Success', 'Successfully Process Request', 'success');
            },
            error: function () { Swal('Error', 'Error Processing Request', 'error');}
          });
        } else {}
      });   
    //}else{swal('Error on Section','Please select section','error');}
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
              <? include('category.php'); ?>
          </div>
        </div>
        <? include('../nav/footer.php'); ?>
      </div>
    </div>
  </div>
  <? include('../nav/footer_script.php'); ?>
</body>
</html>