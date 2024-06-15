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
								<h4 class="card-title">Scholarship Application Form</h4>

								<div class="mt-5">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="student_number">Student No.:</label>
                                                <input type="text" id="student_number" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label for="firstname">Firstname:</label>
                                                <input type="text" id="firstname" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label for="lastname">Lastname:</label>
                                                <input type="text" id="lastname" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label for="email">Email Address:</label>
                                                <input type="text" id="email" class="form-control">
                                            </div>
                                        </div>

                                        <button class="btn btn-primary btn-sm float-right mb-3">Submit</button>
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
</script>
</body>
</html>
