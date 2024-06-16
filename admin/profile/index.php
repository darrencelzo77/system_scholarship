<?php
if (session_id() == '') {
    session_start();
}
if (isset($_SESSION['accountid'])) {
    if (file_exists('systemconfig.inc')) {
        include_once('systemconfig.inc');
    }
    if (file_exists('includes/systemconfig.inc')) {
        include_once('includes/systemconfig.inc');
    }
    if (file_exists('../includes/systemconfig.inc')) {
        include_once('../includes/systemconfig.inc');
    }
} else {
    header('location: ../');
    exit(0);
}
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
        margin-left: 20px;
    }
</style>

<h4>User Profile</h4>

<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Account Information</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Edit Information</a>                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-form-label">Username:</label>
                                        <div class="col-sm-10">
                                        <input type="text" readonly class="form-control" id="staticEmail" value="<?=Username($_SESSION['accountid'])?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-form-label">Full Name:</label>
                                        <div class="col-sm-10">
                                        <input type="text" readonly class="form-control" id="staticEmail" value="<?=Name($_SESSION['accountid'])?>">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="staticEmail" class="col-form-label">Middlename:</label>
                                        <div class="col-sm-10">
                                        <input type="text" readonly class="form-control" id="staticEmail" value="email@example.com">
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-6">
                                    <!-- <div class="form-group row">
                                        <label for="staticEmail" class="col-form-label">Lastname:</label>
                                        <div class="col-sm-10">
                                        <input type="text" readonly class="form-control" id="staticEmail" value="email@example.com">
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-form-label">Email:</label>
                                        <div style="margin-left: 22px;" class="col-sm-10">
                                        <input type="text" readonly class="form-control" id="staticEmail" value="<?=Email($_SESSION['accountid'])?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-form-label">Password</label>
                                        <div class="col-sm-10">
                                        <input type="password" readonly class="form-control" id="staticEmail" value="<?=Pass($_SESSION['accountid'])?>">
                                        <span class="float-right mt-1"><input type="checkbox"> Show Password</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            mendoza
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>