<?Php 
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}
$provid = $_GET['provid'];

echo '<select id="cityid" name="cityid" class="form-control" onchange="loadPage(\'selectbarangay.php?cityid=\'+this.value+\'&provid=\'+object(\'provid\').value,\'tmp_b\');">';
echo '<option value="0">Select City</option>';
				$rs1 = mysqli_query($db_connection,'SELECT cityid,city from tblloc_city where cityid=370 AND provid='.$provid.' ORDER BY city');
				while ($rw1 = mysqli_fetch_array($rs1)) { $sel = '';
					if ($cityid==$rw1['cityid']) { $sel = 'selected="selected"'; }
					echo '<option value="'.$rw1['cityid'].'" '.$sel.'>'.$rw1['city'].'</option>';
				}
				echo '</select>';
?>