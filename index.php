
<?
if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
if (file_exists('admin/includes/systemconfig.inc')) {include_once('admin/includes/systemconfig.inc'); }
if (file_exists('../admin/includes/systemconfig.inc')) {include_once('../admin/includes/systemconfig.inc'); }

if (isset($_POST['register'])) {
    $levelid = $_POST['levelid'];
    $semid = $_POST['semid'];
    $categoryid = $_POST['categoryid'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $namextid = $_POST['namextid'];
    $provid = $_POST['provid'];
    $cityid = $_POST['cityid'];
    $brgyid = $_POST['brgyid'];
    $street = $_POST['street'];
    $dob = $_POST['dob'];
    $birthplace = $_POST['birthplace'];
    $citizenshipid = $_POST['citizenshipid'];
    $civilid = $_POST['civilid'];
    $sexid = $_POST['sexid'];
    $contact = $_POST['contact'];
    
    // Perform database insertion
    $query = "INSERT INTO tblregistrations 
              SET semid='$semid',
                  levelid='$levelid',
                  categoryid='$categoryid', 
                  lastname='$lastname', 
                  firstname='$firstname', 
                  middlename='$middlename', 
                  namextid='$namextid', 
                  provid='$provid', 
                  cityid='$cityid', 
                  brgyid='$brgyid', 
                  street='$street', 
                  dob='$dob', 
                  birthplace='$birthplace', 
                  citizenshipid='$citizenshipid', 
                  civilid='$civilid', 
                  sexid='$sexid', 
                  contact='$contact'";
    
    mysqli_query($db_connection, $query);

    // Get the inserted registration ID
    $regid = mysqli_insert_id($db_connection);

    // Insert into tblregistrations_requirements (assuming this is another related table)
    mysqli_query($db_connection, "INSERT INTO tblregistrations_requirements SET regid='$regid'");

    // Optionally, you can redirect or return a success message here
    echo "Registration successful!";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="admin/css/index.css">
	<link rel="stylesheet" href="admin/css/navbar.css">
	<link rel="stylesheet" href="admin/css/footer.css">

    <link rel="icon" type="image/x-icon" href="../HANA/assets/img/logo.png">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</head>

<body class="hold-transition layout-top-nav">
	
<div class="main--content">
      <header id="navbar">
    <nav class="navbar-container container">
        <a href="" class="home-link">
            <img src="admin/images/logo_u.png" alt="" class="navbar-logo">
			Educational Assistant for Student
        </a>

        <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu"
            aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div id="navbar-menu" aria-labelledby="navbar-toggle">
            <ul class="navbar-links" id="navbar-links">
                <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#application" class="nav-link">Application</a></li>
           
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>

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
            </ul>
			
        </div>
		<div class="content-header">
			<div class="container">
				<div class="row mb-2">
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
					
						</ol>
					</div>
				</div>
			</div>
		</div>
    </nav>
	<div class="content-header">
			<div class="container">
				<div class="row mb-2">
					<div class="col-sm-12">
						
					</div>
					<div class="col-sm-12">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#home">Home</a></li>
							<li class="breadcrumb-item"><a href="#application">Application</a></li>
							<li class="breadcrumb-item active">Menu</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
</header>

<br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
		
        <div class="carousel-inner">
			
            <div class="carousel-item active">
                <div class="home">
                    <span id="home" style="margin-top:-100px;"></span>
					
                    <div class="home-box-info">
                        <span class="hbr-1-lbl">Welcome to _____ Scholarship Program!</span>
                        <span class="hbr-2-lbl">What is Scholarship?</span>
                        <p>_____ Scholarship Program is dedicated to supporting students who demonstrate academic excellence, leadership potential, and a commitment to their communities. Our mission is to provide financial assistance to help you achieve your educational goals and make a positive impact on the world.</p>
                        <button class="home-btn">
                            <a href="#application" class="h-help">APPLY NOW!</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="application">
                    <span id="home" style="margin-top:-200px;"></span>
                    <div class="home-box-info">
                        <span class="hbr-1-lbl">Eligibility Criteria</span>
                        <span class="hbr-2-lbl">Are you eligible for the ___ Scholarship? Review the criteria below:</span>
                        <h6 class="mt-5"><strong>Academic Achievement: </strong>Minimum GPA of 3.5.</h6>
                        <h6><strong>Community Involvement: </strong>Demonstrated commitment to community service.</h6>
                        <h6><strong>Enrollment Status: </strong>Must be a undergraduate student (minimum of 30 units).</h6>
                        <h6><strong>Residency: </strong>Must be a Filipino citizen.</h6>
                        <button class="home-btn">
                            <a href="#application" class="h-help">APPLY NOW!</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="home-analytics-container">
    
	</div>
	<br><br><br>
	<div class="home-help-container">
	<span id="application" style="margin-top:-30px;"></span>
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

								<a href="application" class="home-btn btn-sm mt-2">Apply Now!</a>
							</div>
						</div>
        </div>


        <div class="home-analytics-container">
    
        </div>

		<div class="main--contents">
		<span id="contact" style="margin-top:-200px;"></span>

 
        <div class="cus-container">
            <div class="cus-left">
                <span class="cus1">We welcome your questions, and comments.</span>
               
           
            </div>

            <div class="cus-right">
                <span>Required fields are marked *</span>
                <form action="" method="post" class="cus-fields">
                    <span>Name*</span>
                    <input type="text" name="cus-name" class="cus-inputs">
                    <span>Email*</span>
                    <input type="text" name="cus-email" class="cus-inputs">
                    <span>Subject*</span>
                    <input type="text" name="cus-subj" class="cus-inputs">
                    <span>Your Email*</span>
                    <textarea name="cus-msg" id="" cols="30" rows="5" class="cus-inputs"></textarea>
					<button class="home-btn">
                            <a href="#contact" class="h-help">Submit</a>
                        </button>
                </form>
            </div>
        </div>





    </div>


<div class="footer-containers">

<footer class="main-footer">
		<div class="float-right d-none d-sm-inline">
			Scholarship Management System
		</div>
		<strong>Clarence & Patrick &copy; 2024 <a href="javascript:void();"></a>.</strong> All rights reserved.
	</footer>
</div>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
