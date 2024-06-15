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
<!DOCTYPE html>
<html lang="en">
<? include('../nav/header.php'); ?>
<body>
  <div class="layer"></div>
  <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
  <div class="page-flex">
    <? include('../nav/sidenav.php'); ?>
    <div class="main-wrapper">
      <? include('../nav/topnav.php'); ?>
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <div id="maincontent">
            scholarship
          </div>
        </div>
      </main>
      <? include('../nav/footer.php'); ?>
    </div>
  </div>
  <? include('../nav/footer_script.php'); ?>
</body>
</html>