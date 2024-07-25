<?
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}

$studentid = secureData($_GET['studentid'], 'd');

$category = GetData("SELECT categoryid FROM tblregistrations WHERE regid='$studentid'");
$studentnumber = GetData("SELECT studentnumber FROM tblregistrations WHERE regid='$studentid'");
$firstname = GetData("SELECT firstname FROM tblregistrations WHERE regid='$studentid'");
$lastname = GetData("SELECT lastname FROM tblregistrations WHERE regid='$studentid'");
$emailaddress = GetData("SELECT emailaddress FROM tblregistrations WHERE regid='$studentid'");

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<div class="container-fluid mt-3">
    <h3 class="text-center">Applicant Information</h3>
    <div class="row">
        <div class="col">
            <label>Category:</label>
            <input class="form-control" type="text" value="<?=$category?>" disabled>

            <label>Student Number:</label>
            <input class="form-control" type="text" value="<?=$studentnumber?>" disabled>

            <label>Full Name:</label>
            <input class="form-control" type="text" value="<?=$firstname. ' ' .$lastname?>" disabled>

            <label>Email address:</label>
            <input class="form-control" type="text" value="<?=$emailaddress?>" disabled>
        </div>
    </div>
</div>
