<?php
// if(session_id()==''){session_start();} 
// if (isset($_SESSION['accountid'])){ 
//     if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
//     if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
//     if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
// } else {
//     header('location: ../'); exit(0); 
// }
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div hidden class="profile-image">
                    <img hidden class="img-xs rounded-circle" src="../images/faces/face8.jpg" alt="profile image">
                    <div hidden class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name"><?=Type($_SESSION['accountid']);?></p>
                    <p class="designation"><?=Username($_SESSION['accountid'])?></p>
                </div>
                <div hidden class="icon-container">
                    <i class="icon-bubbles"></i>
                    <div class="dot-indicator bg-danger"></div>
                </div>
            </a>
        </li>

        <?
        $current_page = basename($_SERVER['REQUEST_URI'], ".php");

        $dashboard = '';
        $registration = '';
        $scholarship = '';
        $report = '';
        $category = '';
        $account = '';
        $schedule = '';

        if ($current_page == 'dashboard') { 
            $dashboard = 'active';
        } else if ($current_page == 'registration') {
            $registration = 'active';
        } else if ($current_page == 'scholarship') {
            $scholarship = 'active';
        } else if ($current_page == 'report') {
            $report = 'active';
        } else if ($current_page == 'category') {
            $category = 'active';
        } else if ($current_page == 'account') {
            $account = 'active';
        }else if ($current_page == 'schedule') {
            $schedule = 'active';
        }
        ?>

        <li class="nav-item <?=$dashboard?>">
            <a class="nav-link" href="../dashboard">
                <span class="menu-title">Dashboard</span>
                <i hidden class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        


        <li class="nav-item <?=$registration?>">
            <a class="nav-link" href="../registration">
                <span class="menu-title">Registration</span>
                <i hidden class="icon-chart menu-icon"></i>
            </a>
        </li>
        
        <li class="nav-item <?=$schedule?>">
            <a class="nav-link" href="../schedule">
                <span class="menu-title">Schedule</span>
                <i hidden class="icon-chart menu-icon"></i>
            </a>
        </li>

          <li class="nav-item <?=$scholarship?>">
            <a class="nav-link" href="../scholarship">
                <span class="menu-title">Scholarship List</span>
                <i hidden class="icon-chart menu-icon"></i>
            </a>
        </li>

        <li class="nav-item <?=$report?>">
            <a class="nav-link" href="../report">
                <span class="menu-title">Reports</span>
                <i hidden class="icon-chart menu-icon"></i>
            </a>
        </li>
        <li class="nav-item <?=$category?>">
            <a class="nav-link" href="../category">
                <span class="menu-title">Category Setup</span>
                <i hidden class="icon-chart menu-icon"></i>
            </a>
        </li>

        <li class="nav-item <?=$account?>">
            <a class="nav-link" href="../account">
                <span class="menu-title">Account Setup</span>
                <i hidden class="icon-chart menu-icon"></i>
            </a>
        </li>


    </ul>
</nav>