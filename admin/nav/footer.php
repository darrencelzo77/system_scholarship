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
<footer class="footer">
    <div class="container footer--flex">
      <div class="footer-start">
        <p>2024 © Clarence & Patrick <a href="javascript:void"></a>
      </div>
      <ul hidden class="footer-end">
        <li hidden><a href="##">About</a></li>
        <li hidden><a href="##">Support</a></li>
        <li hidden><a href="##">Puchase</a></li>
      </ul>
    </div>
  </footer>