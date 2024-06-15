
<?
if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
if (file_exists('admin/includes/systemconfig.inc')) {include_once('admin/includes/systemconfig.inc'); }
if (file_exists('../admin/includes/systemconfig.inc')) {include_once('../admin/includes/systemconfig.inc'); }

if(isset($_POST['register'])){
	$category = $_POST['category'];
	$studentnum = $_POST['studentnum'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];

	//echo $category, $studentnum, $firstname, $lastname, $email;

	mysqli_query($db_connection, "INSERT INTO tblregistrations SET 
								  categoryid='$category', studentnumber='$studentnum', 
								  firstname='$firstname', lastname='$lastname', emailaddress='$email'");

	$regid = mysqli_insert_id($db_connection);
	mysqli_query($db_connection, "INSERT INTO tblregistrations_requirements SET regid='$regid'");

}
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
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
	<nav class="main-header navbar navbar-expand-md navbar-light navbar-white sticky-top">
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
						<a href="#home" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="#application" class="nav-link">Application</a>
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
							<li class="breadcrumb-item"><a href="#home">Home</a></li>
							<li class="breadcrumb-item"><a href="#application">Application</a></li>
							<li class="breadcrumb-item active">Menu</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
    

		<!-- Main content -->
		<div class="content">
			<div class="container">
			<!----START---->
				<div class="row">
					<span id="home" style="margin-top:-200px;"></span>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<!-- <h5 class="card-title">Home</h5><br> -->
								<h4 class="card-title">Welcome to _____ Scholarship Program!</h4>
								
								<div class="card-text mt-5">
									<p>_____ Scholarship Program is dedicated to supporting students who demonstrate academic excellence, leadership potential, and a commitment to their communities. Our mission is to provide financial assistance to help you achieve your educational goals and make a positive impact on the world.</p><br>
								
									<h6><strong>Scholarship Amount: </strong>10,000 pesos per semsester.</h6>
									<h6><strong>Available slots: </strong>30 per semester.</h6>
									<h6><strong>Application Deadline: </strong>July 30, 2024.</h6>
								</div>

								<div class="mt-5">
									<h5>Eligibility Criteria</h5>
									<h6>Are you eligible for the ___ Scholarship? Review the criteria below:</h6>

									<h6 class="mt-5"><strong>Academic Achievement: </strong>Minimum GPA of 3.5.</h6>
									<h6><strong>Community Involvement: </strong>Demonstrated commitment to community service.</h6>
									<h6><strong>Enrollment Status: </strong>Must be a undergraduate student (minimum of 30 units).</h6>
									<h6><strong>Residency: </strong>Must be a Filipino citizen.</h6>

								</div>
							</div>
						</div>
					</div>

					
				</div>
				
				<br><br><br><br><br><br><br>
				<!-- <br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br> -->
				
				
				<div class="row">
					<span id="application" style="margin-top:-70px;"></span>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Application</h5>

								<div class="card-text mt-5">
									<h6>Applying for the _____ Scholarship. Follow these steps:</h6>

									<h6 class="mt-5"><strong>1. Register an account: </strong>Create an account to start your application.</h6>
									<h6><strong>1. Complete the application form: </strong>Fill out your personal, academic, and extracurricular details.</h6>
									<h6><strong>1. Submit Required Documents: </strong>Upload your transcripts, letters of recommendation, and a personal statement.</h6>
									<h6><strong>1. Review your information and documents: </strong>Make sure that your information is correct and submit your application.</h6>

								</div>

								<div class="mt-5">
									<h6>Required Documents:</h6>

									<h6 class="mt-5"><strong>Certificate of Registration (COR) and Certificate of Grades (COG): </strong>Current Certificate of Registration and Last Semester's Certificate of Grades.</h6>
									<h6><strong>Letters of Recommendation: </strong>Two letters from instructors or community leaders.</h6>
									<h6><strong>Personal Statement: </strong>A 500-word essay on your academic and career goals, and how this scholarship will help you achieve them.</h6>

								</div>

								<a href="application" class="btn btn-primary btn-sm mt-2">Apply Now!</a>
							</div>
						</div>
					</div>
				</div>	
				
				
				<br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br>
				
				
				<div class="row">
					<span id="about" style="margin-top:-70px;"></span>
					<div class="col-lg-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Contact</h5>
							</div>
						</div>
					</div>
				</div>	
				<br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br>
				
				<br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br>
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
</script>
</body>
</html>
