<?php
session_start();
if (file_exists('systemconfig.inc')) { include_once('systemconfig.inc'); }
if (file_exists('admin/includes/systemconfig.inc')) { include_once('admin/includes/systemconfig.inc'); }
if (file_exists('../admin/includes/systemconfig.inc')) { include_once('../admin/includes/systemconfig.inc'); }



if(isset($_GET['del'])){
	mysqli_query($db_connection,'delete from '.$_SESSION['tmp_registrations_family'].' where id='.$_GET['del']);
}

if(isset($_POST['add'])){
	mysqli_query($db_connection,'insert into '.$_SESSION['tmp_registrations_family'].' set family_lastname=\''.
				escape_str($db_connection,$_POST['family_lastname']).'\',family_firstname=\''.
				escape_str($db_connection,$_POST['family_firstname']).'\',family_middleinitial=\''.
				escape_str($db_connection,$_POST['family_middleinitial']).'\',relationshipid=\''.
				escape_str($db_connection,$_POST['relationshipid']).'\',family_age=\''.
				escape_str($db_connection,$_POST['family_age']).'\',familycivilid=\''.
				escape_str($db_connection,$_POST['familycivilid']).'\',educationid=\''.
				escape_str($db_connection,$_POST['educationid']).'\',occupation=\''.
				escape_str($db_connection,$_POST['occupation']).'\',income=\''.
				escape_str($db_connection,$_POST['income']).'\' ');
}


?>
<div align="center">
<table class="table table-striped" >
    <tr>
	<thead>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Middle Initial</th>
        <th>Relationship</th>
        <th>Age</th>
        <th>Civil Status</th>
        <th>Educational Attainment</th>
        <th>Occupation</th>
        <th>Income</th>
        <th>Remove</th>
</thead>
    </tr>

    <?php
	$rs = mysqli_query($db_connection,'select * from '.$_SESSION['tmp_registrations_family'].'');
	while($rw = mysqli_fetch_array($rs)){
		foreach ($rw as $key => $value) {
            $rw[$key] = htmlspecialchars($value);
			$civil = GetData('select status from tblcivil where civilid='.$rw['familycivilid']);
			$relation = GetData('select relationship from tblrelationship where relationshipid='.$rw['relationshipid']);
			$education = GetData('select educ from tbleducational_attainment where educid='.$rw['educationid']);
        }
		
        echo '<tr>
            <td>'.$rw['family_lastname'].'</td>
            <td>'.$rw['family_firstname'].'</td>
            <td>'.$rw['family_middleinitial'].'</td>
            <td>'.$relation.'</td>
            <td>'.$rw['family_age'].'</td>
            <td>'.$civil.'</td>
           <td>'.$education.'</td>
            <td>'.$rw['occupation'].'</td>
            <td>'.$rw['income'].'</td>
            <td><a href="javascript:void();" onclick="ajax_new_v2(\'tmp_family.php?del='.$rw['id'].'\',\'tmp_u\');">Remove</a></td>
        </tr>';
    }
    ?>
</table>
</div>
