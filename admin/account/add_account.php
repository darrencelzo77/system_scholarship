<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}
$accountid=0;

if(isset($_GET['toedit'])){
    $accountid = $_GET['toedit'];
}


$username = GetData('select username from tblaccount where accountid='.$accountid);
$firstname = GetData('select firstname from tblaccount where accountid='.$accountid);
$middlename = GetData('select middlename from tblaccount where accountid='.$accountid);
$lastname = GetData('select lastname from tblaccount where accountid='.$accountid);
$password = GetData('select accountpassword from tblaccount where accountid='.$accountid);
$typeid = GetData('select typeid from tblaccount where accountid='.$accountid);


?>

<h4 class="text-center">
<?
if($accountid){
    echo'Update User Account';
} else {
    echo'Add User Account';
}
?>


</h4>

<div class="container-fluid">
    <div class="row">
        <input type="hidden" id="add_account_a">
        <div class="col-6 mb-3">
            <label>Username:</label>
            <input type="text" id="username" value="<?=$username?>" class="form-control">
        </div>
        <div class="col-6 mb-3">
            <label>Firstname:</label>
            <input type="text" id="firstname" value="<?=$firstname?>" class="form-control">
        </div>
        <div class="col-6 mb-3">
            <label>Middlename:</label>
            <input type="text" id="middlename" value="<?=$middlename?>" class="form-control">
        </div>
        <div class="col-6 mb-3">
            <label>Lastname:</label>
            <input type="text" id="lastname" value="<?=$lastname?>" class="form-control">
        </div>
        <div class="col-12">
            <label>Email:</label>
            <input type="text" id="email" value="<?=$email?>" class="form-control">
        </div>
        <div class="col-12 mb-3">
            <label>Password:</label>
            <input type="text" id="password" value="<?=$password?>" class="form-control">
        </div>

        <div class="col-6 mb-3">
            <?php echo '<select class="form-control" id="typeid">';
                echo '<option value="0">Usertype</option>';
                $rs1 = mysqli_query($db_connection,'SELECT typeid, type from tblacctype order by typeid');
                while ($rw1 = mysqli_fetch_array($rs1)) { $sel = '';
                    if($typeid=$rw['typeid']) {$sel = 'selected="selected"';}
                    echo '<option value="'.$rw1['typeid'].'" '.$sel.'>'.$rw1['type'].'</option>';
                }
            echo '</select>'; ?>
        </div>

        
    </div>
    <div align="right">
        <?
        if($accountid){
            echo'<a href="javascript:void(0);" class="btn btn-dark btn-sm mt-3" onclick="edit_user('.$accountid.');">Update</a>';
        } else {
            echo'<a href="javascript:void(0);" class="btn btn-dark btn-sm mt-3" onclick="add_user();">Proceed</a>';
        }
        ?>
        
    </div>
</div>