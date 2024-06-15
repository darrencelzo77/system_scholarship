<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}
?>
<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="#" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <!-- <span hidden class="icon logo" aria-hidden="false"></span> -->
                <div class="logo-text">
                    <span class="logo-title"><?=Type($_SESSION['typeid'])?></span>
                    <span class="logo-subtitle"><?=Username($_SESSION['accountid'])?></span>
                </div>
            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <?
                $current_page = basename($_SERVER['REQUEST_URI'], ".php");
                //echo $current_page;
                $dashboard_active = '';
                $registration_active = '';
                $scholarship_active = '';
                $report_active = '';
                $account_active = '';
                $requirement_active = '';
                $category_active = '';


                if ($current_page == 'dashboard') { 
                    $dashboard_active = 'class="active"';
                } else if ($current_page == 'registration') {
                    $registration_active = 'class="active"';
                }else if ($current_page == 'scholarship') {
                    $scholarship_active = 'class="active"';
                }else if ($current_page == 'report') {
                    $report_active = 'class="active"';
                }else if ($current_page == 'account') {
                    $account_active = 'class="active"';
                }else if ($current_page == 'requirement') {
                    $requirement_active = 'class="active"';
                }else if ($current_page == 'category') {
                    $category_active = 'class="active"';
                }


                ?> 
                <li>
                    <a <?=$dashboard_active?> href="../dashboard"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a <?=$registration_active?> href="../registration">
                        <span class="icon message" aria-hidden="true"></span>
                        Registration
                    </a>
                    <span class="msg-counter">7</span>
                </li>

                <li hidden>
                    <a href="comments.html">
                        <span class="icon message" aria-hidden="true"></span>
                        Application
                    </a>
                    <span class="msg-counter">7</span>
                </li>

                <li hidden>
                    <a href="comments.html">
                        <span class="icon message" aria-hidden="true"></span>
                        Slots
                    </a>
                    <span class="msg-counter">7</span>
                </li>

                <li>
                    <a <?=$scholarship_active?>  href="../scholarship">
                        <span class="icon message" aria-hidden="true"></span>
                        Scholarship List
                    </a>
                    <span class="msg-counter">7</span>
                </li>

                <li>
                    <a <?=$report_active?>  href="../report">
                        <span class="icon message" aria-hidden="true"></span>
                        Reports
                    </a>
                    <span class="msg-counter">7</span>
                </li>
            </ul>


            <span class="system-menu__title">Setup Manager</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a <?=$account_active?> href="../account"><span class="icon edit" aria-hidden="true"></span>Account Setup</a>
                </li>

                <li>
                    <a <?=$requirement_active?>  href="../requirement"><span class="icon setting" aria-hidden="true"></span>Requirements Setup</a>
                </li>

                <li>
                    <a <?=$category_active?>  href="../category"><span class="icon setting" aria-hidden="true"></span>Category Setup</a>
                </li>











                <!-- Do not displace this code -->
                <!-- Do not displace this code -->
                <li hidden>
                    <a class="show-cat-btn" href="##">
                        <span class="icon user-3" aria-hidden="true"></span>Users
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="users-01.html">Users-01</a>
                        </li>
                        <li>
                            <a href="users-02.html">Users-02</a>
                        </li>
                    </ul>
                </li>
                <!-- Do not displace this code -->
                <!-- Do not displace this code -->
            </ul>
        </div>
    </div>
</aside>