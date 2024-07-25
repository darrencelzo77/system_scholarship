<?php

if(session_id()==''){session_start();} 
// if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('admin/includes/systemconfig.inc')) {include_once('admin/includes/systemconfig.inc'); }
    if (file_exists('../admin/includes/systemconfig.inc')) {include_once('../admin/includes/systemconfig.inc'); }
// } else {
//     header('location: ./'); exit(0); 
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Educational Assistance Management System</title>
    <link rel="icon" type="image/x-icon" href="admin/images/logo_u.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="admin/js/sweetalert.min.js"></script>
    <script>
        function object(id) { return document.getElementById(id); }

        function pre_register() {
            var level = document.querySelector('input[name="levelid"]:checked');
            let levelid;
            if (level) {
                levelid = level.value;
            } else {
                levelid = 0;
            }
            var cor = document.getElementById('pic2');
            var pic_cor = cor.files[0];
            let myForm = new FormData();
            myForm.append('pic2', pic_cor);
            myForm.append('firstname2', object('firstname').value);
            myForm.append('middlename2', object('middlename').value);
            myForm.append('lastname2', object('lastname').value);
            myForm.append('emailaddress2', object('emailaddress').value);
            myForm.append('levelid2',levelid);
            myForm.append('pre_register', 1);

            swal({
                title: 'Pre-registration',
                text: 'Are you sure that all your information is correct?',
                icon: 'info',
                buttons: true,
                dangerMode: true,
            }).then((willAdd) => {
                if (willAdd) {
                    $.ajax({
                        url: 'index.php',
                        type: 'POST',
                        data: myForm,
                        beforeSend: function () {
                            $('#body-overlay').show();
                        },
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $('#maincontent').html(data);
                            $('#maincontent').css('opacity', '1');
                            $('#body-overlay').hide();
                            swal('Success', 'Successfully Processed Request', 'success');
                        },
                        error: function () {
                            swal('Error', 'Error Processing Request', 'error');
                        },
                    });
                } 
            });
        }


    </script>

</head>
<style>


    #body-overlay { text-align:center; background-color: rgba(0, 0, 0, 0.6);z-index: 99999;position:fixed;left: 0;top: 0;width: 100%;height: 100%; display:none; }
    #body-overlay div {position:absolute;left:40%;top:20%;} 

</style>
<div id="maincontent">
    <div id="body-overlay"><div><img src="admin/images/processing.gif" width="80%" /></div></div>
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <nav hidden class="main-header navbar navbar-expand-md navbar-light navbar-white sticky-top">
                <div class="container">
                    <a href="javascript:void();" onclick="window.location.href='?';" class="navbar-brand">
                        <span>Insert Logo Here</span>
                        <!--<img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
                        <span class="brand-text font-weight-light">Educational Assistance Form</span>
                    </a>

                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="system_scholarship/" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#about" class="nav-link">Contact</a>
                            </li>
                        </ul>

                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-0 ml-md-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- Notifications Dropdown Menu -->
                        <li hidden class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-bell"></i>
                                <span class="badge badge-warning navbar-badge">15</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-header">15 Notifications</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                                    <span class="float-right text-muted text-sm">3 mins</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0"> Pre-registration <small>(Students)</small></h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="../system_scholarship/">Home</a></li>
                                    <li class="breadcrumb-item active">Menu</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Main content -->
                <div id="" class="content">

                    <div class="container">
                        <!----START---->
                        <div class="row">
                            <span id="home" style="margin-top:-200px;"></span>
                            <div class="col-lg-12">
                                <div class="card w-200 mx-auto">
                                    <div class="card-body">
                                        <h4 class="card-title">Fill out the form</h4>
                                        <div class="mt-5">
                                            <form method="POST" id="myForm"  enctype="multipart/form-data">
                                                <input hidden type="text" value="1" id="is_online" name="is_online" class="form-control">
                                                <div id="page_1" class="tabcontent" style="display:block;">
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <input type="radio" id="levelid1" name="levelid" value="1" /> Elementary Student/High school
                                                            <input type="radio" id="levelid2" name="levelid" value="2" /> College
                                                        </div>
                                                        

                                                        <div class="col-6 mb-3">
                                                            <label for="emailaddress">Email Address:</label>
                                                            <input type="text" id="emailaddress" name="emailaddress" class="form-control">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="lastname">Lastname:</label>
                                                            <input type="text" id="lastname" name="lastname" class="form-control">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="firstname">Firstname:</label>
                                                            <input type="text" id="firstname" name="firstname" class="form-control">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="middlename">Middlename:</label>
                                                            <input type="text" id="middlename" name="middlename" class="form-control">
                                                        </div>

                                                        <div class="col-6 mb-3" id="collegeSection">
                                                            <label for="college">2 by 2 Picture:</label>
                                                            <input type="file" id="pic2" class="form-control">
                                                        </div>

                                                    </div>

                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm float-right mb-3" onclick="pre_register();">Register</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!----END----->
                    </div>
                </div>
                <aside class="control-sidebar control-sidebar-dark"></aside>
                <footer class="main-footer">
                    <div class="float-right d-none d-sm-inline">
                        Educational Assistance Management System
                    </div>
                    <strong>Clarence & Patrick &copy; 2024 <a href="javascript:void();"></a>.</strong> All rights reserved.
                </footer>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                <script src="admin/dist/js/adminlte.min.js"></script>

            </body>
        </div>
        </html>