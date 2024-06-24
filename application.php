<?php
session_start();
if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
if (file_exists('admin/includes/systemconfig.inc')) {include_once('admin/includes/systemconfig.inc'); }
if (file_exists('../admin/includes/systemconfig.inc')) {include_once('../admin/includes/systemconfig.inc'); }

$_SESSION['tmp_registrations_family'] = 'tmp_registrations_family';
$result = mysqli_query($db_connection, 'DROP TABLE IF EXISTS ' . $_SESSION['tmp_registrations_family']) or die(mysqli_error($db_connection));

$str = "CREATE TABLE " . $_SESSION['tmp_registrations_family'] . " (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `family_lastname` varchar(128) DEFAULT '',
    `family_firstname` varchar(128) DEFAULT '',
    `family_middleinitial` varchar(128) DEFAULT '',
    `relationshipid` INT(11) DEFAULT 0,
    `family_age` varchar(128) DEFAULT '',
    `familycivilid` INT(11) DEFAULT 0,
    `educationid` INT(11) DEFAULT 0,
    `occupation` varchar(128) DEFAULT '',
    `income` varchar(128) DEFAULT '',
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

mysqli_query($db_connection, $str) or die(mysqli_error($db_connection));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Scholarship | System</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="admin/js/sweetalert.min.js"></script>
	<script>

        document.addEventListener('DOMContentLoaded', function() {
            const radioOptions = document.querySelectorAll('.radio-option');
            radioOptions.forEach(option => {
                const input = option.querySelector('input[type="radio"]');
                if (input.checked) {
                    option.classList.add('selected');
                }
                option.addEventListener('click', function() {
                    radioOptions.forEach(opt => opt.classList.remove('selected'));
                    option.classList.add('selected');
                    input.checked = true;
                });
            });
        });

        function loadPage(url,elementId) {
		if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
		} else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}   
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById(elementId).innerHTML="";
				document.getElementById(elementId).innerHTML=xmlhttp.responseText;	
			}
		}  
		xmlhttp.open("GET",url,true);
		xmlhttp.send();	   
	}
    
	function ajax_new_v2(url_, tmp_add_customer) {
	$.ajax({
	    url: url_,
	    method: "POST",
	    data: {record: 1},
	    success: function(data) {
	        $('#' + tmp_add_customer).html(data);
	        $('#myTable').DataTable();
	        openContainer(tmp_add_customer); 
	    	}
		});
	}

    function add_family() {
    let myForm = new FormData();
    myForm.append('family_lastname', object('family_lastname').value);
    myForm.append('family_firstname', object('family_firstname').value);
    myForm.append('family_middleinitial', object('family_middleinitial').value);
    myForm.append('relationshipid', object('relationshipid').value);
    myForm.append('family_age', object('family_age').value);
    myForm.append('familycivilid', object('familycivilid').value);
    myForm.append('educationid', object('educationid').value);
    myForm.append('occupation', object('occupation').value);
    myForm.append('income', object('income').value);
    myForm.append('add', 1);
    $.ajax({
        url: 'tmp_family.php',
        type: 'POST',
        data: myForm,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#tmp_u').html(data);
            $('#tmp_u').css('opacity', '1');
            object('family_lastname').value = '';
            object('family_firstname').value = '';
            object('family_middleinitial').value = '';
            object('relationshipid').value = 0;
            object('family_age').value = '';
            object('familycivilid').value = 0;
            object('educationid').value = 0;
            object('occupation').value = '';
            object('income').value = '';
        },
        error: function() {
            Swal('Error', 'Error Processing Request ' , 'error');
        }
    });
}





		// function ajax_new(url_, tmp_container) {
		// $('#' + tmp_container).html("<div align='center'><img src='../images/tar.gif' width='40px' /></div>");

		// $.ajax({
		// 	url: url_,
		// 	method: "post",
		// 	data: {record: 1},
		// 	success: function(data) {
		// 		$('#' + tmp_container).html(data);
		// 	}
		// });
		// }
		function object(id) { return document.getElementById(id); }

        function register() {
    var levelid = document.querySelector('input[name="levelid"]:checked');
    var semid = document.getElementById('semid').value;
    var categoryid = document.querySelector('input[name="categoryid"]:checked');
    var lastname = document.getElementById('lastname').value;
    var firstname = document.getElementById('firstname').value;
    var middlename = document.getElementById('middlename').value;
    var namextid = document.getElementById('namextid').value;
    var provid = document.getElementById('provid').value;
    var cityid = document.getElementById('cityid').value;
    var brgyid = document.getElementById('brgyid').value;
    var street = document.getElementById('street').value;
    var dob = document.getElementById('dob').value;
    var birthplace = document.getElementById('birthplace').value;
    var citizenshipid = document.getElementById('citizenshipid').value;
    var civilid = document.getElementById('civilid').value;
    var sexid = document.getElementById('sexid').value;
    var contact = document.getElementById('contact').value;
    var elementary = document.getElementById('elementary').value;
    var junior = document.getElementById('junior').value;
    var senior = document.getElementById('senior').value;
    var college = document.getElementById('college').value;
    var emailaddress = document.getElementById('emailaddress').value;
    var is_online = document.getElementById('is_online').value;


    if (levelid && levelid.value !== '1') {
        if (semid == 0) {
            swal('Error on Required Field', 'Please select semester', 'error');
            return;
        }
  
    }
    if (!categoryid) {
            swal('Error on Required Field', 'Please select a category', 'error');
            return;
        }
    if (!levelid) {
        swal('Error on Required Field', 'Please select level of education', 'error');
        return;
    }
    if (lastname == '') {
        swal('Error on Required Field', 'Please input your last name', 'error');
        return;
    }

    let myForm = new FormData();
    myForm.append('levelid', levelid.value);
    myForm.append('semid', semid);
    myForm.append('categoryid', categoryid.value);
    myForm.append('lastname', lastname);
    myForm.append('firstname', firstname);
    myForm.append('middlename', middlename);
    myForm.append('namextid', namextid);
    myForm.append('provid', provid);
    myForm.append('cityid', cityid);
    myForm.append('brgyid', brgyid);
    myForm.append('street', street);
    myForm.append('dob', dob);
    myForm.append('birthplace', birthplace);
    myForm.append('citizenshipid', citizenshipid);
    myForm.append('civilid', civilid);
    myForm.append('sexid', sexid);
    myForm.append('contact', contact);
    myForm.append('elementary', elementary);
    myForm.append('junior', junior);
    myForm.append('senior', senior);
    myForm.append('college', college);
    myForm.append('is_online', is_online);
    myForm.append('emailaddress', emailaddress);
    myForm.append('register', 1);

    swal({
        title: 'Basic Information',
        text: 'Are you sure that all your information is correct?',
        icon: 'info',
        buttons: true,
        dangerMode: true,
    }).then((willAdd) => {
        if (willAdd) {
            $.ajax({
                url: 'index.php',
                type: 'POST',
                data: myForm,
                beforeSend: function () {
                    $('#body-overlay').show();
                },
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#maincontent').html(data);
                    $('#maincontent').css('opacity', '1');
                    $('#body-overlay').hide();
                    swal('Success', 'Successfully Processed Request', 'success');
                },
                error: function () {
                    swal('Error', 'Error Processing Request', 'error');
                },
            });
        } else {
            swal('Action Cancelled', 'Your request has been cancelled.', 'info');
        }
    });
}


	</script>

</head>
<style>

.radio-option input[type="radio"] {
    display: none;
}

.radio-option {
    padding: 15px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    display: flex;
    align-items: center;
    cursor: pointer;
}

.radio-option:hover {
    background-color: #f1f1f1;
}

.radio-option.selected {
    border-color: #007bff;
    background-color: #e9f5ff;
}

.radio-icon {
    font-size: 24px;
    margin-right: 15px;
    color: #007bff;
}

.radio-description {
    margin-left: 10px;
    color: #6c757d;
}

</style>
<div id="maincontent">
<body class="hold-transition layout-top-nav">
<div class="wrapper">
	<nav hidden class="main-header navbar navbar-expand-md navbar-light navbar-white sticky-top">
		<div class="container">
			<a href="javascript:void();" onclick="window.location.href='?';" class="navbar-brand">
				<span>Insert Logo Here</span>
				<!--<img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
				<span class="brand-text font-weight-light">Scholarship</span>
			</a>

			<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse order-3" id="navbarCollapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="system_scholarship/" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="#about" class="nav-link">Contact</a>
					</li>
				</ul>

				<!-- SEARCH FORM -->
				<form class="form-inline ml-0 ml-md-3">
					<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
			 
			<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
				<!-- Notifications Dropdown Menu -->
				<li hidden class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
  
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0"> Scholarship <small>(Students)</small></h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="../system_scholarship/">Home</a></li>
							<li class="breadcrumb-item active">Menu</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
    

		<!-- Main content -->
		<div id="" class="content">
    <div class="container">
        <!----START---->
        <div class="row">
            <span id="home" style="margin-top:-200px;"></span>
            <div class="col-lg-12">
                <div class="card w-200 mx-auto">
                    <div class="card-body">
                        <h4 class="card-title">Scholarship Application Form</h4>
                        <div class="mt-5">
                            <form method="POST" id="myForm">
                            <input hidden type="text" value="2" id="is_online" name="is_online" class="form-control">
                                <div id="page_1" class="tabcontent" style="display:block;">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <input type="radio" id="levelid1" name="levelid" value="1" /> Elementary Student/High school
                                            <input type="radio" id="levelid2" name="levelid" value="2" /> College
                                        </div>
                                        <div class="col-6 mb-3">
                                            <select class="form-control" id="semid" name="semid">
                                                <option value="0">Select Semester</option>
                                                <?php
                                                $rs = mysqli_query($db_connection, 'SELECT semid, sem FROM tblsemester');
                                                while ($rw = mysqli_fetch_array($rs)) {
                                                    $sel = ($semid == $rw['semid']) ? 'selected="selected"' : '';
                                                    echo '<option value="' . $rw['semid'] . '" ' . $sel . '>' . $rw['sem'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <?php
                                            $rs = mysqli_query($db_connection, 'SELECT categoryid, cat, category FROM tblcategory ORDER BY categoryid');
                                            while ($rw = mysqli_fetch_array($rs)) {
                                                $checked = ($sectionid == $rw['categoryid']) ? 'checked="checked"' : '';
                                                echo '<div class="radio-option form-check mb-2">';
                                                echo '<input class="form-check-input  font-weight-bold ml-1" type="radio" name="categoryid" id="category' . $rw['categoryid'] . '" value="' . $rw['categoryid'] . '" ' . $checked . '>';
                                                echo '<i class="radio-icon fas fa-tag"></i>' . $rw['cat'];
                                                echo '</label>';
                                                echo '<small class="form-text radio-description">' . $rw['category'] . '</small>';
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="emailaddress">Email Address:</label>
                                            <input type="text" id="emailaddress" name="emailaddress" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="lastname">Lastname:</label>
                                            <input type="text" id="lastname" name="lastname" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="firstname">Firstname:</label>
                                            <input type="text" id="firstname" name="firstname" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="middlename">Middlename:</label>
                                            <input type="text" id="middlename" name="middlename" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="namext">Name EXT.:</label>
                                            <select class="form-control" id="namextid" name="namextid">
                                                <option value="0">Select Name EXT</option>
                                                <?php
                                                $rs = mysqli_query($db_connection, 'SELECT namextid, namext FROM tblnamext');
                                                while ($rw = mysqli_fetch_array($rs)) {
                                                    $sel = ($namextid == $rw['namextid']) ? 'selected="selected"' : '';
                                                    echo '<option value="' . $rw['namextid'] . '" ' . $sel . '>' . $rw['namext'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="address">Address:</label>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <?php
                                                    echo '<select class="form-control" name="provid" id="provid" onchange="loadPage(\'selectcity.php?provid=\' + this.value, \'tmp_city\');">';
                                                    echo '<option value="0">Select Province</option>';
                                                    $rs1 = mysqli_query($db_connection, 'SELECT provid, province FROM tblloc_province ORDER BY province');
                                                    while ($rw1 = mysqli_fetch_array($rs1)) {
                                                        $sel = ($provid == $rw1['provid']) ? 'selected="selected"' : '';
                                                        echo '<option value="' . $rw1['provid'] . '" ' . $sel . '>' . $rw1['province'] . '</option>';
                                                    }
                                                    echo '</select>';
                                                    ?>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <span id="tmp_city">
                                                        <select class="form-control" id="cityid" name="cityid">
                                                            <option value="0">Select City</option>
                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <span id="tmp_b">
                                                        <select class="form-control" id="brgyid" name="brgyid">
                                                            <option value="0">Select Barangay</option>
                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" id="street" name="street" placeholder="Enter Street Number/House#" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="dob">Date of Birth:</label>
                                            <input type="date" id="dob" name="dob" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="birthplace">Place of Birth:</label>
                                            <input type="text" id="birthplace" name="birthplace" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="citizenship">Citizenship:</label>
                                            <select class="form-control" id="citizenshipid" name="citizenshipid">
                                                <option value="0">Select Citizenship</option>
                                                <?php
                                                $rs = mysqli_query($db_connection, 'SELECT citizenshipid, citizenship FROM tblcitizenship');
                                                while ($rw = mysqli_fetch_array($rs)) {
                                                    $sel = ($citizenshipid == $rw['citizenshipid']) ? 'selected="selected"' : '';
                                                    echo '<option value="' . $rw['citizenshipid'] . '" ' . $sel . '>' . $rw['citizenship'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="civil">Civil Status:</label>
                                            <select class="form-control" id="civilid" name="civilid">
                                                <option value="0">Select Civil Status</option>
                                                <?php
                                                $rs = mysqli_query($db_connection, 'SELECT civilid, status FROM tblcivil');
                                                while ($rw = mysqli_fetch_array($rs)) {
                                                    $sel = ($civilid == $rw['civilid']) ? 'selected="selected"' : '';
                                                    echo '<option value="' . $rw['civilid'] . '" ' . $sel . '>' . $rw['status'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="sex">Sex:</label>
                                            <select class="form-control" id="sexid" name="sexid">
                                                <option value="0">Select Sex</option>
                                                <?php
                                                $rs = mysqli_query($db_connection, 'SELECT sexid, sex FROM tblsex');
                                                while ($rw = mysqli_fetch_array($rs)) {
                                                    $sel = ($sexid == $rw['sexid']) ? 'selected="selected"' : '';
                                                    echo '<option value="' . $rw['sexid'] . '" ' . $sel . '>' . $rw['sex'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="contact">Contact Number:</label>
                                            <input type="text" id="contact" name="contact" class="form-control">
                                        </div>
<br><br><br><br><br>
                                        <div class="col-12">
                                            <h4>Family Background</h4>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="family_lastname">Lastname:</label>
                                            <input type="text" id="family_lastname" name="family_lastname" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="family_firstname">Firstname:</label>
                                            <input type="text" id="family_firstname" name="family_firstname" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="family_middleinitial">Middle Initial:</label>
                                            <input type="text" id="family_middleinitial" name="family_middleinitial" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="relationshipid">Relationship:</label>
                                            <select class="form-control" id="relationshipid" name="relationshipid">
                                                <option value="0">Select Relationship</option>
                                                <?php
                                                $rs = mysqli_query($db_connection, 'SELECT relationshipid, relationship FROM tblrelationship');
                                                while ($rw = mysqli_fetch_array($rs)) {
                                                    echo '<option value="' . $rw['relationshipid'] . '">' . $rw['relationship'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="family_age">Age:</label>
                                            <input type="text" id="family_age" name="family_age" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="familycivilid">Civil Status:</label>
                                            <select class="form-control" id="familycivilid" name="familycivilid">
                                                <option value="0">Select Civil Status</option>
                                                <?php
                                                $rs = mysqli_query($db_connection, 'SELECT civilid, status FROM tblcivil');
                                                while ($rw = mysqli_fetch_array($rs)) {
                                                    echo '<option value="' . $rw['civilid'] . '">' . $rw['status'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-6 mb-3">
                                            <label for="educationid">Education Attainment:</label>
                                            <select class="form-control" id="educationid" name="educationid">
                                                <option value="0">Select Education Attainment</option>
                                                <?php
                                                $rs = mysqli_query($db_connection, 'SELECT educid, educ FROM tbleducational_attainment');
                                                while ($rw = mysqli_fetch_array($rs)) {
                                                    echo '<option value="' . $rw['educid'] . '">' . $rw['educ'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="occupation">Occupation:</label>
                                            <input type="text" id="occupation" name="occupation" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="income">Monthly Income:</label>
                                            <input type="number" id="income" name="income" class="form-control">
                                            <br>
                                            <a class="btn btn-primary btn-sm" onclick="add_family();">ADD</a>
                                        </div>

                                        <div id="tmp_u" >
                                            <table id="myTable" class="table table-striped" align="center">
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
                                            </table>
                                        </div>

                                        <br><br><br><br><br>
                                        <div class="col-12">
                                            <h4>Educational Background</h4>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="elementary">Elementary:</label>
                                            <input type="text" id="elementary" name="elementary" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="junior">Junior High school:</label>
                                            <input type="text" id="junior" name="junior" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3" id="seniorSection">
                                            <label for="senior">Senior High school:</label>
                                            <input type="text" id="senior" name="senior" class="form-control">
                                        </div>
                                        <div class="col-6 mb-3" id="collegeSection">
                                            <label for="college">Vocational/College:</label>
                                            <input type="text" id="college" name="college" class="form-control">
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm float-right mb-3" onclick="register();">Submit</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----END----->
    </div>
</div>
<aside class="control-sidebar control-sidebar-dark"></aside>
<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
        Scholarship Management System
    </div>
    <strong>Clarence & Patrick &copy; 2024 <a href="javascript:void();"></a>.</strong> All rights reserved.
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="admin/dist/js/adminlte.min.js"></script>
<script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var radios = document.querySelectorAll('input[name="levelid"]');
    var seniorSection = document.getElementById('seniorSection');
    var collegeSection = document.getElementById('collegeSection');
    var seniorLabel = document.getElementById('seniorLabel');
    var seniorInput = document.getElementById('senior');
    var collegeLabel = document.getElementById('collegeLabel');
    var collegeInput = document.getElementById('college');

    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            var levelid = this.value;
            if (levelid === '1') {
                document.getElementById('semid').style.display = 'none';
                seniorSection.style.display = 'none';
                collegeSection.style.display = 'none';
                seniorLabel.style.display = 'none';
                seniorInput.style.display = 'none';
                collegeLabel.style.display = 'none';
                collegeInput.style.display = 'none';
            } else if (levelid === '2') {
                document.getElementById('semid').style.display = 'block';
                seniorSection.style.display = 'block';
                collegeSection.style.display = 'block';
                seniorLabel.style.display = 'block';
                seniorInput.style.display = 'block';
                collegeLabel.style.display = 'block';
                collegeInput.style.display = 'block';
            }
        });
    });
});



</script>
</body>
</div>
</html>