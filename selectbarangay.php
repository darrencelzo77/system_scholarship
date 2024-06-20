<?Php 
if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
if (file_exists('admin/includes/systemconfig.inc')) {include_once('admin/includes/systemconfig.inc'); }
if (file_exists('../admin/includes/systemconfig.inc')) {include_once('../admin/includes/systemconfig.inc'); }

$cityid = $_GET['cityid'];
$provid = $_GET['provid'];

echo '<select class="form-control" name="brgyid" id="brgyid">';
echo '<option value="0">Select Barangay</option>';

				$rs1 = mysqli_query($db_connection,'SELECT brgyid,barangay from tblloc_barangay where
													cityid='.$cityid.' ORDER BY barangay');
				while ($rw1 = mysqli_fetch_array($rs1)) { $sel = '';
					if ($brgyid==$rw1['brgyid']) { $sel = 'selected="selected"'; }
					echo '<option value="'.$rw1['brgyid'].'" '.$sel.'>'.ucwords(strtolower($rw1['barangay'])).'</option>';
				}
				echo '</select>';
				

?>