<?
if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
if (file_exists('admin/includes/systemconfig.inc')) {include_once('admin/includes/systemconfig.inc'); }
if (file_exists('../admin/includes/systemconfig.inc')) {include_once('../admin/includes/systemconfig.inc'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Scholarship | System</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="admin/js/sweetalert.min.js"></script>
	<script>
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

		function register(){
			var categoryid = object('categoryid').value;
			var surname = object('surname').value;
			var firstname = object('firstname').value;
			var middlename = object('middlename').value;
			var namextid = object('namextid').value;
            var provid = object('provid').value;
            var cityid = object('cityid').value;
            var brgyid = object('brgyid').value;
            var street = object('street').value;
            var dob = object('dob').value;
            var birthplace = object('birthplace').value;
            var citizenshipid = object('citizenshipid').value;
            var civilid = object('civilid').value;
            var sexid = object('sexid').value;
            var contact = object('contact').value;
          

			let myForm = new FormData();
			myForm.append('categoryid', categoryid);
			myForm.append('surname', surname);
			myForm.append('firstname', firstname);
			myForm.append('lastname', lastname);
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
			myForm.append('register', 1);
			swal({
				title: "Basic Information",
				text: "Are you sure that all your information are correct?",
				icon: "info",
				buttons: true,
				dangerMode: true,
			})
			.then((willAdd) => {
				if (willAdd) {
				$.ajax({
					url: 'index.php',
					type: "POST",
					data: myForm,
					beforeSend: function () {$("#body-overlay").show();},
					contentType: false,
					processData: false,
					success: function (data) {
					$("#maincontent").html(data);
					$("#maincontent").css('opacity', '1');
					$("#body-overlay").hide();
					swal('Success', 'Successfully Process Request', 'success');
					},
					error: function () { swal('Error', 'Error Processing Request', 'error');}
				});
				} else {}
			});   
			//}else{swal('Error on Section','Please select section','error');}
		}
	</script>
</head>
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
  <div id="content" class="content">
        <div class="container">
            <!----START---->
            <div class="row">
                <span id="home" style="margin-top:-200px;"></span>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Home</h5><br> -->
                            <h4 class="card-title">Scholarship Application Form</h4>

                            <div class="mt-5">
                                <form method="POST" id="myForm">
                                    <div id="elementary_form" class="form-content" style="display:block;">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <input type="radio" name="formtype" value="typeformid" onclick="showForm('elementary_form')" checked /> Elementary Student/High School
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="formtype" value="typeformid" onclick="showForm('college_form')" /> College
                                            </div>
											
                                            <div class="col-12 mb-3">
                                                <h4>Elementary Student/High School Form</h4>
                                                <select class="form-control mb-3" id="categoryid" style="width:200px;height:40px;">
                                                    <option value="0">Select Category</option>
                                                    <?php
                                                    $rs = mysqli_query($db_connection, 'SELECT categoryid, category FROM tblcategory ORDER BY category');
                                                    while ($rw = mysqli_fetch_array($rs)) {
                                                        $sel = ($sectionid == $rw['categoryid']) ? 'selected="selected"' : '';
                                                        echo '<option value="' . $rw['categoryid'] . '" ' . $sel . '>' . $rw['category'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
											
                                            </div>
									
                                            <div class="col-md-6 mb-3">
                                                <label for="surname">Surname:</label>
                                                <input type="text" id="surname" name="surname" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="firstname">Firstname:</label>
                                                <input type="text" id="firstname" name="firstname" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="middlename">Middlename:</label>
                                                <input type="text" id="middlename" name="middlename" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="namext">Name EXT.:</label>
                                                <select class="form-control mb-2" id="namextid" name="namextid">
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
                                                        <input type="text" id="street" name="street" placeholder="Enter Street Number/House#" class="form-control mb-2">
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
                                                <select class="form-control mb-2" id="citizenshipid" name="citizenshipid">
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
                                                <select class="form-control mb-2" id="civilid" name="civilid">
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
                                                <select class="form-control mb-2" id="sexid" name="sexid">
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
                                        </div>
                                    </div>
                                    
                                    <div id="college_form" class="form-content" style="display:none;">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <input type="radio" name="formtype" value="typeformid" onclick="showForm('elementary_form')" /> Elementary Student/High School
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="formtype" value="typeformid" onclick="showForm('college_form')" checked /> College
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h4>College Form</h4>
                                            </div>
                                            <div class="col-12 mb-3">
                                            <label for="name_ext">Semester:</label>
                                            <select class="form-control mb-3" id="category" style="width:200px;height:40px;">
                                                    <option value="0">Select Category</option>
                                                    <?php
                                                    $rs = mysqli_query($db_connection, 'SELECT categoryid, category FROM tblcategory ORDER BY category');
                                                    while ($rw = mysqli_fetch_array($rs)) {
                                                        $sel = ($sectionid == $rw['categoryid']) ? 'selected="selected"' : '';
                                                        echo '<option value="' . $rw['categoryid'] . '" ' . $sel . '>' . $rw['category'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                </div>
											<label for="name_ext">Semester:</label>
                                                <select class="form-control mb-2" id="semid" name="semid">
                                                    <option value="0">Select Semester</option>
                                                    <?php
                                                    $rs = mysqli_query($db_connection, 'SELECT semid, sem FROM tblsemester');
                                                    while ($rw = mysqli_fetch_array($rs)) {
                                                        $sel = ($semid == $rw['semid']) ? 'selected="selected"' : '';
                                                        echo '<option value="' . $rw['semid'] . '" ' . $sel . '>' . $rw['sem'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
											<div class="col-md-6 mb-3">
                                                <label for="surname">Surname:</label>
                                                <input type="text" id="surname" name="surname" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="firstname">Firstname:</label>
                                                <input type="text" id="firstname" name="firstname" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="middlename">Middlename:</label>
                                                <input type="text" id="middlename" name="middlename" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="name_ext">Name EXT.:</label>
                                                <select class="form-control mb-2" id="namextid" name="namextid">
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
                                                        echo '<select class="form-control" name="provid" id="provid" onchange="loadPage(\'selectcity2.php?provid=\' + this.value, \'tmp_city2\');">';
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
                                                        <span id="tmp_city2">
                                                            <select class="form-control" id="cityid" name="cityid">
                                                                <option value="0">Select City</option>
                                                            </select>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <span id="tmp_b2">
                                                            <select class="form-control" id="brgyid" name="brgyid">
                                                                <option value="0">Select Barangay</option>
                                                            </select>
                                                        </span>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" id="street" name="street" placeholder="Enter Street Number/House#" class="form-control mb-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="birthdate">Date of Birth:</label>
                                                <input type="date" id="birthdate" name="birthdate" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="birthplace">Place of Birth:</label>
                                                <input type="text" id="birthplace" name="birthplace" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="citizenship">Citizenship:</label>
                                                <select class="form-control mb-2" id="citizenshipid" name="citizenshipid">
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
                                                <select class="form-control mb-2" id="civilid" name="civilid">
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
                                                <select class="form-control mb-2" id="sexid" name="sexid">
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
                                            <!-- You can duplicate the address, birthdate, birthplace, etc. fields if needed -->
                                        </div>
                                    </div>

                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm float-right mb-3" onclick="register();">Submit</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><br>
            <!-- <br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br> -->
            <!----END----->
        </div>
    </div>
	</div>
	<aside class="control-sidebar control-sidebar-dark"></aside>
	<footer class="main-footer">
		<div class="float-right d-none d-sm-inline">
			Scholarship Management System
		</div>
		<strong>Clarence & Patrick &copy; 2024 <a href="javascript:void();"></a>.</strong> All rights reserved.
	</footer>
</div>
<script src="admin/plugins/jquery/jquery.min.js"></script>
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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

    function showForm(formId) {
        document.getElementById('elementary_form').style.display = 'none';
        document.getElementById('college_form').style.display = 'none';
        document.getElementById(formId).style.display = 'block';
    }

        // function register() {
        //     document.getElementById('myForm').submit();
        // }
</script>

</body>
</div>
</html>
