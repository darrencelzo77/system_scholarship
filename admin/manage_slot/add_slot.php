<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}

$slot = GetData('select slot from tblschedule');

if(isset($_POST['slot'])){
  mysqli_query($db_connection,'update tblschedule set slot='.$_POST['slot'].' ');
  $slot = GetData('select slot from tblschedule');
}
?>

<h3>Set Slots</h3>
<div>
  <table>
    <tr>
      <td>Slots per Day:&nbsp;</td>
      <td><input type="number" id="slot" value="<?=$slot?>"/></td>
      <td><button onclick="update_slot();" class="btn btn-sm btn-primary">Update</button></td>
    </tr>
  </table>
</div>