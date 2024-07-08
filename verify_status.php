<?php
if(session_id()==''){session_start();}  
if (file_exists('admin/includes/systemconfig.inc')) {include_once('admin/includes/systemconfig.inc'); }



if(isset($_GET['trackingnumber'])){
    $trackingnumber = $_GET['trackingnumber'];
    //echo $trackingnumber;
    $is_exist = GetData('select trackingnumber from tblregistrations where trackingnumber=\''.$trackingnumber.'\'');

    if(!$is_exist){
        header('location: ./?getthis');
    } 

        
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

    <link rel="icon" type="image/x-icon" href="admin/images/logo_u.png">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
     <script src="admin/js/sweetalert.min.js"></script>
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
    
</header>

<br>


    <div class="home-analytics-container">
    
    </div>
    
    <div class="home-help-container">
    <span id="application" style="margin-top:30px;"></span>
         <div class="card">
                            <div class="card-body">
                             <?
                        $firstname = GetData('select firstname from tblregistrations where trackingnumber=\''.$trackingnumber.'\' ');
                                ?>
                                <h5 class="card-title" >Application</h5>&nbsp;&nbsp;
                                Hi <?= $firstname?>
                               
<div class="card-text mt-5">
                                    <h6>Your tracking number is <?=$trackingnumber?>.</h6>

                                   
                               
                                    <h6>Your application has been approved. Kindly wait for further announcement.</h6>

                                   
                                </div>
                                    <br>
                                
                                <div align="right"><a href="./" class="home-btn btn-sm mt-2">Back</a></div>
                            </div>
                        </div>
        </div>


        <div class="home-analytics-container" style="margin-top:-150px;">
    
        </div>

     


    

<script src="admin/plugins/jquery/jquery.min.js"></script>
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin/dist/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>