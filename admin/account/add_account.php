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

<h4 class="text-center">Add User Account</h4>

<div class="container-fluid">
    <div class="row">
        <input type="hidden" id="add_account_a">
        <div class="col-6 mb-3">
            <label>Username:</label>
            <input type="text" id="username" class="form-control">
        </div>
        <div class="col-6 mb-3">
            <label>Firstname:</label>
            <input type="text" id="firstname" class="form-control">
        </div>
        <div class="col-6 mb-3">
            <label>Middlename:</label>
            <input type="text" id="middlename" class="form-control">
        </div>
        <div class="col-6 mb-3">
            <label>Lastname:</label>
            <input type="text" id="lastname" class="form-control">
        </div>
        <div class="col-12">
            <label>Email:</label>
            <input type="text" id="email" class="form-control">
        </div>
        <div class="col-12 mb-3">
            <label>Password:</label>
            <input type="text" id="password" class="form-control">
        </div>

        <div class="col-6 mb-3">
            <?php echo '<select class="form-control" id="typeid">';
                echo '<option value="0">Usertype</option>';
                $rs1 = mysqli_query($db_connection,'SELECT typeid, type from tblacctype order by typeid');
                while ($rw1 = mysqli_fetch_array($rs1)) { $sel = '';
                    echo '<option value="'.$rw1['typeid'].'" '.$sel.'>'.$rw1['type'].'</option>';
                }
            echo '</select>'; ?>
        </div>

        <div class="col-6 mb-3">
            <?php echo '<select class="form-control" id="branchid">';
                echo '<option value="0">Select Branch</option>';
                $rs1 = mysqli_query($db_connection,'SELECT branchid, branchname from tblbranch order by branchid');
                while ($rw1 = mysqli_fetch_array($rs1)) { $sel = '';
                    echo '<option value="'.$rw1['branchid'].'" '.$sel.'>'.$rw1['branchname'].'</option>';
                }
            echo '</select>'; ?>
        </div>
    </div>
    <div align="right">
        <a href="javascript:void(0);" class="btn btn-dark btn-sm mt-3" onclick="add_user();">Proceed</a>
    </div>
</div>