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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
</head>
<? include('../nav/header.php'); ?>
<script>
    //schedule_it
    function schedule_it(schedid,regid,fullname){
        var scheddate = object('dddd'+schedid).value;
            let myForm = new FormData();
            myForm.append('regid', regid);
            myForm.append('scheddate', scheddate);
            myForm.append('schedid', schedid);
           
            swal({
                title: "Schedule",
                text: "Are you sure want to schedule this student at " +scheddate+ " ?",
                icon: "info",
                buttons: true,
                dangerMode: true,
            })
            .then((willAdd) => {
                if (willAdd) {
                    $.ajax({
                        url: 'schedule.php',
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


     function schedule_it_edit(schedid,regid,fullname){
        var scheddate = object('dddd'+schedid).value;
            let myForm = new FormData();
            myForm.append('regid2', regid);
            myForm.append('scheddate2', scheddate);
            myForm.append('schedid2', schedid);
            myForm.append('edit', 1);
           
            swal({
                title: "Schedule",
                text: "Are you sure want to re-schedule this student at " +scheddate+ " ?",
                icon: "info",
                buttons: true,
                dangerMode: true,
            })
            .then((willAdd) => {
                if (willAdd) {
                    $.ajax({
                        url: 'schedule.php',
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
            <? include('schedule.php')?>
        </div>
        </div>
        <? include('../nav/footer.php'); ?>
    </div>
    </div>
</div>
<? include('../nav/footer_script.php'); ?>
</body>
</html>