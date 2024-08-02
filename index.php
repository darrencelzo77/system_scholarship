<?php
session_start();
if (file_exists('systemconfig.inc')) { include_once('systemconfig.inc'); }
if (file_exists('admin/includes/systemconfig.inc')) { include_once('admin/includes/systemconfig.inc'); }
if (file_exists('../admin/includes/systemconfig.inc')) { include_once('../admin/includes/systemconfig.inc'); }


if(isset($_GET['logout'])){
    session_destroy();
}

if(isset($_POST['pre_register'])){
    $levelid = mysqli_real_escape_string($db_connection, $_POST['levelid2']);
    $lastname = mysqli_real_escape_string($db_connection, $_POST['lastname2']);
    $firstname = mysqli_real_escape_string($db_connection, $_POST['firstname2']);
    $middlename = mysqli_real_escape_string($db_connection, $_POST['middlename2']);
    $emailaddress = mysqli_real_escape_string($db_connection, $_POST['emailaddress2']);

     if (isset($_FILES['pic2'])) {
                    $target_dir = "requirements/";
                    $pic2 = basename($_FILES["pic2"]["name"]);
                    $target_file = $target_dir . $pic2;
                    if (move_uploaded_file($_FILES["pic2"]["tmp_name"], $target_file)) {
                        
                        
                    } else {}
                } else {$pic2 = '';}

    $query = "INSERT INTO tblregistrations 
            SET levelid='$levelid',
                pic='$pic2',
            lastname='$lastname', 
            firstname='$firstname', 
            middlename='$middlename', 
            emailaddress='$emailaddress',
            is_online=1 ";
            mysqli_query($db_connection, $query) or die(mysqli_error($db_connection));
                 include('admin/email/pre_registration_email.php');

}






if (isset($_POST['register'])) {
    $levelid = mysqli_real_escape_string($db_connection, $_POST['levelid']);
    $semid = mysqli_real_escape_string($db_connection, $_POST['semid']);
    $categoryid = mysqli_real_escape_string($db_connection, $_POST['categoryid']);
    $lastname = mysqli_real_escape_string($db_connection, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($db_connection, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($db_connection, $_POST['middlename']);
    $namextid = mysqli_real_escape_string($db_connection, $_POST['namextid']);
    $provid = mysqli_real_escape_string($db_connection, $_POST['provid']);
    $cityid = mysqli_real_escape_string($db_connection, $_POST['cityid']);
    $brgyid = mysqli_real_escape_string($db_connection, $_POST['brgyid']);
    $street = mysqli_real_escape_string($db_connection, $_POST['street']);
    $dob = mysqli_real_escape_string($db_connection, $_POST['dob']);
    $birthplace = mysqli_real_escape_string($db_connection, $_POST['birthplace']);
    $citizenshipid = mysqli_real_escape_string($db_connection, $_POST['citizenshipid']);
    $civilid = mysqli_real_escape_string($db_connection, $_POST['civilid']);
    $sexid = mysqli_real_escape_string($db_connection, $_POST['sexid']);
    $contact = mysqli_real_escape_string($db_connection, $_POST['contact']);
    $elementary = mysqli_real_escape_string($db_connection, $_POST['elementary']);
    $junior = mysqli_real_escape_string($db_connection, $_POST['junior']);
    $senior = mysqli_real_escape_string($db_connection, $_POST['senior']);
    $college = mysqli_real_escape_string($db_connection, $_POST['college']);
    $emailaddress = mysqli_real_escape_string($db_connection, $_POST['emailaddress']);
    $is_online = mysqli_real_escape_string($db_connection, $_POST['is_online']);
    $grade = mysqli_real_escape_string($db_connection, $_POST['grade']);
    $primarykeyid = mysqli_real_escape_string($db_connection, $_POST['primarykeyid']);
   
    if($grade>=70){
                if (isset($_FILES['cor'])) {
                    $target_dir = "requirements/";
                    $cor = basename($_FILES["cor"]["name"]);
                    $target_file = $target_dir . $cor;
                    if (move_uploaded_file($_FILES["cor"]["tmp_name"], $target_file)) {
                        
                        
                    } else {}
                } else {$cor = '';}


                 if (isset($_FILES['cog'])) {
                    $target_dir = "requirements/";
                    $cog = basename($_FILES["cog"]["name"]);
                    $target_file = $target_dir . $cog;
                    if (move_uploaded_file($_FILES["cog"]["tmp_name"], $target_file)) {
                        
                        
                    } else {}
                } else {$cog = '';}



                 if (isset($_FILES['indigency'])) {
                    $target_dir = "requirements/";
                    $indigency = basename($_FILES["indigency"]["name"]);
                    $target_file = $target_dir . $indigency;
                    if (move_uploaded_file($_FILES["indigency"]["tmp_name"], $target_file)) {
                        
                        
                    } else {}
                } else {$indigency = '';}


                $query = "update tblregistrations 
                          SET is_updated=1, cog='$cog',indigency='$indigency',cor='$cor',grade='$grade',semid='$semid',
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
                              contact='$contact',
                              elementary='$elementary',
                              junior='$junior',
                              senior='$senior',
                              college='$college',
                              emailaddress='$emailaddress',
                              is_online='$is_online' where regid='$primarykeyid' ";
                mysqli_query($db_connection, $query) or die(mysqli_error($db_connection));

                $regid = $_POST['primarykeyid'];
                include('admin/email/verify.php');
               
                $rs = mysqli_query($db_connection, 'SELECT * FROM ' . $_SESSION['tmp_registrations_family']) or die(mysqli_error($db_connection));
                while ($rw = mysqli_fetch_array($rs)) {
                    $query_family = 'INSERT INTO tblregistrations_family SET regid='.$regid.',family_lastname=\''
                                                            .$rw['family_lastname'].'\',family_firstname=\''
                                                            .$rw['family_firstname'].'\',family_middleinitial=\''
                                                            .$rw['family_middleinitial'].'\',relationshipid=\''
                                                            .$rw['relationshipid'].'\',family_age=\''
                                                            .$rw['family_age'].'\',familycivilid=\''
                                                            .$rw['familycivilid'].'\',educationid=\''
                                                            .$rw['educationid'].'\',occupation=\''
                                                            .$rw['occupation'].'\',income=\''
                                                            .$rw['income'].'\' ';
                    mysqli_query($db_connection, $query_family);
                }
        } else {
            if (isset($_FILES['cor'])) {
                    $target_dir = "requirements/";
                    $cor = basename($_FILES["cor"]["name"]);
                    $target_file = $target_dir . $cor;
                    if (move_uploaded_file($_FILES["cor"]["tmp_name"], $target_file)) {
                        
                        
                    } else {}
                } else {$cor = '';}


                 if (isset($_FILES['cog'])) {
                    $target_dir = "requirements/";
                    $cog = basename($_FILES["cog"]["name"]);
                    $target_file = $target_dir . $cog;
                    if (move_uploaded_file($_FILES["cog"]["tmp_name"], $target_file)) {
                        
                        
                    } else {}
                } else {$cog = '';}



                 if (isset($_FILES['indigency'])) {
                    $target_dir = "requirements/";
                    $indigency = basename($_FILES["indigency"]["name"]);
                    $target_file = $target_dir . $indigency;
                    if (move_uploaded_file($_FILES["indigency"]["tmp_name"], $target_file)) {
                        
                        
                    } else {}
                } else {$indigency = '';}


                $query = "update tblregistrations 
                          SET is_reject=1,cog='$cog',indigency='$indigency',cor='$cor',grade='$grade',semid='$semid',
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
                              contact='$contact',
                              elementary='$elementary',
                              junior='$junior',
                              senior='$senior',
                              college='$college',
                              emailaddress='$emailaddress',
                              is_online='$is_online' where regid='$primarykeyid'";
                mysqli_query($db_connection, $query) or die(mysqli_error($db_connection));

                $regid = mysqli_insert_id($db_connection);
                include('admin/email/auto_reject.php');
               
                $rs = mysqli_query($db_connection, 'SELECT * FROM ' . $_SESSION['tmp_registrations_family']) or die(mysqli_error($db_connection));
                while ($rw = mysqli_fetch_array($rs)) {
                    $query_family = 'INSERT INTO tblregistrations_family SET regid='.$regid.',family_lastname=\''
                                                            .$rw['family_lastname'].'\',family_firstname=\''
                                                            .$rw['family_firstname'].'\',family_middleinitial=\''
                                                            .$rw['family_middleinitial'].'\',relationshipid=\''
                                                            .$rw['relationshipid'].'\',family_age=\''
                                                            .$rw['family_age'].'\',familycivilid=\''
                                                            .$rw['familycivilid'].'\',educationid=\''
                                                            .$rw['educationid'].'\',occupation=\''
                                                            .$rw['occupation'].'\',income=\''
                                                            .$rw['income'].'\' ';
                    mysqli_query($db_connection, $query_family);
                }
        }
}



// if(isset($_GET['invalid'])){
//     echo'<script>alert(\'Your tracking number is invalid.\');</script>';
// }

if(isset($_GET['getthis'])){
    $rrrr =  '&nbsp;&nbsp;<span class="text-danger blink">Invalid tracking number.</span>';
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Assistance Management System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="admin/css/index.css">
	<link rel="stylesheet" href="admin/css/navbar.css">
	<link rel="stylesheet" href="admin/css/footer.css">

    <link rel="icon" type="image/x-icon" href="admin/images/logo_u.png">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="admin/js/tinybox.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function param(w,h) {
        var width  = w;
        var height = h;
        var left = (screen.width  - width)/2;
        var top = (screen.height - height)/2;
        var params = 'width='+width+', height='+height;
        params += ', top='+top+', left='+left;
        params += ', directories=no';
        params += ', location=no';
        params += ', resizable=no';
        params += ', status=no';
        params += ', toolbar=no';
        return params;
    }

    function openWin(url){
        myWindow=window.open(url,'mywin',param(800,500));
        myWindow.focus();
    }

    function openCustom(url,w,h){
        myWindow=window.open(url,'mywin',param(w,h));
        myWindow.focus();
    }
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

    function verify(){
        var trackingnumber = document.getElementById('trackingnumber').value;
        loadPage('verify_status.php?trackingnumber='+trackingnumber,'main_c');
    }
    </script><style>
    .blink {
      animation: 2s linear infinite condemned_blink_effect;
    }
    @keyframes condemned_blink_effect {
        0% {
        visibility: hidden;
        }
        50% {
        visibility: hidden;
        }
        100% {
        visibility: visible;
        }
    }
.tbox {position:absolute;  display:none; padding:14px 17px; z-index:900}
    .tinner {padding:15px; -moz-border-radius:5px; border-radius:5px; background:#fff url(admin/images/preload.gif) no-repeat 50% 50%; border-right:1px solid #333; border-bottom:1px solid #333;}
    .tmask {position:absolute; display:none; top:0px; left:0px; height:100%; width:100%; background:#000; z-index:800}
    .tclose {position:absolute; top:0px; right:0px; width:30px; height:30px; cursor:pointer; background:url(admin/images/close.png) no-repeat}
    .tclose:hover {background-position:0 -30px}
    
    #error {background:#ff6969; color:#fff; text-shadow:1px 1px #cf5454; border-right:1px solid #000; border-bottom:1px solid #000; padding:0}
    #error .tcontent {padding:10px 14px 11px; border:1px solid #ffb8b8; -moz-border-radius:5px; border-radius:5px}
    #success {background:#2ea125; color:#fff; text-shadow:1px 1px #1b6116; border-right:1px solid #000; border-bottom:1px solid #000; padding:10; -moz-border-radius:0; border-radius:0}
    #bluemask {background:#4195aa}
    #frameless {padding:0}
    #frameless .tclose {left:6px}
    
    #body-overlay { text-align:center; background-color: rgba(0, 0, 0, 0.6);z-index: 99999;position:fixed;left: 0;top: 0;width: 100%;height: 100%; display:none; }
    #body-overlay div {position:absolute;left:40%;top:20%;} 

  </style>
</body>
</head>

<body class="hold-transition layout-top-nav">
	
<div class="main--content" id="main_c">
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
<?
$link = "TINY.box.show({url:'login.php',width:500,height:300 })";

?>
          	<!-- SEARCH FORM -->
            <form  class="form-inline ml-0 ml-md-3">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a class="btn btn-secondary" href="login">Login</a>
                        </div>&nbsp;
                        <div class="input-group-append">
                            <a class="btn btn-secondary" href="register">Sign Up</a>
                        </div>
                    </div>
                </form>
				<!-- <form hidden class="form-inline ml-0 ml-md-3">
					<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" id="trackingnumber"  placeholder="Tracking Number...." aria-label="Search">
						<div class="input-group-append">
							<a class="btn btn-secondary" href="javascript:void();" 
                            onclick="verify();">
							 <i class="fas fa-search">Verify</i>
							</a><? if($rrrr){echo $rrrr;} ?>
						</div>
					</div>
				</form> -->
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
                        <span class="hbr-1-lbl">Welcome to Educational Assistance Program!</span>
                        <span class="hbr-2-lbl">What is Educational Assistance?</span>
                        <p>Educational Assistance Program is dedicated to supporting students who demonstrate academic excellence, leadership potential, and a commitment to their communities. Our mission is to provide financial assistance to help you achieve your educational goals and make a positive impact on the world.</p>
                       
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
                        <button hidden class="home-btn">
                            <a href="#application" class="h-help">APPLY NOW!</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="home-analytics-container">
    
	</div>
	<br><br><br><br><br><br>
	<div class="home-help-container">
	<span id="application" style="margin-top:-30px;"></span>
         <div class="card">
							<div class="card-body">
							
								<h5 class="card-title">Application</h5>

								<div class="card-text mt-5">
									<h6>Applying for the student assistance. Follow these steps:</h6>

									<h6 class="mt-5"><strong>1. Register an account: </strong>Create an account to start your application.</h6>
									<h6><strong>2. Complete the application form: </strong>Fill out your personal, academic, and extracurricular details.</h6>
									<h6><strong>3. Submit Required Documents: </strong>Upload your transcripts, letters of recommendation, and a personal statement.</h6>
									<h6><strong>4. Review your information and documents: </strong>Make sure that your information is correct and submit your application.</h6>

								</div>

								<div class="mt-5">
									<h6>Required Documents:</h6>

									<h6 class="mt-5"><strong>Certificate of Registration (COR) and Certificate of Grades (COG): </strong>Current Certificate of Registration and Last Semester's Certificate of Grades.</h6>
									<h6><strong>Letters of Recommendation: </strong>Two letters from instructors or community leaders.</h6>
									<h6><strong>Personal Statement: </strong>A 500-word essay on your academic and career goals, and how this scholarship will help you achieve them.</h6>

								</div>
<br>
								<a href="register" class="home-btn btn-sm mt-2">Register Now!</a>
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
			Educational Assistance Management System
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