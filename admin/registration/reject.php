<?
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

  $regid = secureData($_GET['regid'], 'd');
  $name = GetData("SELECT firstname from tblregistrations WHERE regid='$regid'");

?>

<div class="container">
    <label>Enter Reason:</label>
    <input type="hidden" value="<?=$name?>" id="reject_a<?=$regid?>">
    <input type="text" class="form-control" id="reason">
    <a href="javascript:void(0);" class="btn btn-primary btn-sm float-right mt-1" onclick="reject_application(<?=$regid?>);">Submit</a>
</div>
