<?php
if(session_id()==''){session_start();}
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}


if(isset($_POST['uname'])){
    mysqli_query($db_connection,'update tblaccount set username=\''.
            escape_str($db_connection,$_POST['uname']).'\',firstname=\''.
            escape_str($db_connection,$_POST['fname']).'\' ,middlename=\''.
            escape_str($db_connection,$_POST['mname']).'\'  ,lastname=\''.
            escape_str($db_connection,$_POST['lname']).'\' ,email=\''.
            escape_str($db_connection,$_POST['email']).'\' ,accountpassword=\''.
            escape_str($db_connection,$_POST['pass']).'\' 
            where accountid='.$_SESSION['accountid']);
}
$uname = GetData('select username from tblaccount where accountid='.$_SESSION['accountid']);
$fname = GetData('select firstname from tblaccount where accountid='.$_SESSION['accountid']);
$mname = GetData('select middlename from tblaccount where accountid='.$_SESSION['accountid']);
$lname = GetData('select lastname from tblaccount where accountid='.$_SESSION['accountid']);
$email = GetData('select email from tblaccount where accountid='.$_SESSION['accountid']);
$pass = GetData('select accountpassword from tblaccount where accountid='.$_SESSION['accountid']);
?>
<style>
    .project-tab {
        padding: 10%;
        margin-top: -8%;
    }
    .project-tab #tabs{
        background: #007b5e;
        color: #eee;
    }
    .project-tab #tabs h6.section-title{
        color: #eee;
    }
    .project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #0062cc;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 3px solid !important;
        font-size: 16px;
        font-weight: bold;
    }
    .project-tab .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        color: #0062cc;
        font-size: 16px;
        font-weight: 600;
    }
    .project-tab .nav-link:hover {
        border: none;
    }
    .project-tab thead{
        background: #f3f3f3;
        color: #333;
    }
    .project-tab a{
        text-decoration: none;
        color: #333;
        font-weight: 600;
    }
    input{
        margin-left: 0; /* Adjust margin to zero for proper alignment */
    }
    .form-group {
        margin-bottom: 1rem; /* Ensure a consistent bottom margin */
    }
</style>

<h3>User Profile</h3>
<script>
    
    
</script>
<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Account Information</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Edit Information</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="staticUsername" class="col-sm-2 col-form-label">Username:</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="staticUsername" value="<?=Username($_SESSION['accountid'])?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticFullName" class="col-sm-2 col-form-label">Full Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="staticFullName" value="<?=Name($_SESSION['accountid'])?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Email:</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="staticEmail" value="<?=Email($_SESSION['accountid'])?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="accountpassword" class="col-sm-2 col-form-label">Password:</label>
                                        <div class="col-sm-10">
                                            <input type="password" readonly class="form-control" id="accountpassword" value="<?=Pass($_SESSION['accountid'])?>">
                                            <span class="float-right mt-1"><input type="checkbox" onclick="show_me();"> Show Password</span>
                                        </div>
                                    </div>
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
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="editUsername" class="col-sm-2 col-form-label">Username:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="uname" value="<?=$uname?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="editFirstName" class="col-sm-2 col-form-label">First Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="fname" value="<?=$fname?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="editLastName" class="col-sm-2 col-form-label">Last Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="lname" value="<?=$lname?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="editEmail" class="col-sm-2 col-form-label">Email:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="email" value="<?=$email?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="editMiddleName" class="col-sm-2 col-form-label">Middle Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="mname" value="<?=$mname?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="editPassword" class="col-sm-2 col-form-label">Password:</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="pass" value="<?=$pass?>">
                                            <div class="float-right mt-1"><button onclick="update_acc(<?=$_SESSION['accountid']?>);" class="btn btn-sm btn-success">Update</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end of nav-profile -->
                    </div> <!-- end of tab-content -->
                </div> <!-- end of col-md-12 -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of card-body -->
</div> <!-- end of card -->
