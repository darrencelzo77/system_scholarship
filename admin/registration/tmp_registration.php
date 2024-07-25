<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
  if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
  if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
  if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
  header('location: ../'); exit(0); 
}

if (!isset($_GET['date1'])) {$from = date('Y-m-d', strtotime('-31 days'));}
if (!isset($_GET['date2'])) {$to = date('Y-m-d', strtotime('7 days'));}
?>
<script>
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



  document.addEventListener("DOMContentLoaded", function() {
    var radios = document.querySelectorAll('input[name="levelid"]');
    var seniorSection = document.getElementById('seniorSection');
    var collegeSection = document.getElementById('collegeSection');
    var seniorLabel = document.getElementById('seniorLabel');
    var seniorInput = document.getElementById('senior');
    var collegeLabel = document.getElementById('collegeLabel');
    var collegeInput = document.getElementById('college');

    radios.forEach(function(radio) {
      radio.addEventListener('change', function() {
        var levelid = this.value;
        if (levelid === '1') {
          document.getElementById('semid').style.display = 'none';
          seniorSection.style.display = 'none';
          collegeSection.style.display = 'none';
          seniorLabel.style.display = 'none';
          seniorInput.style.display = 'none';
          collegeLabel.style.display = 'none';
          collegeInput.style.display = 'none';
        } else if (levelid === '2') {
          document.getElementById('semid').style.display = 'block';
          seniorSection.style.display = 'block';
          collegeSection.style.display = 'block';
          seniorLabel.style.display = 'block';
          seniorInput.style.display = 'block';
          collegeLabel.style.display = 'block';
          collegeInput.style.display = 'block';
        }
      });
    });
  }); 
</script>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-hover  ">
        <thead> 
          <tr>
            <th>#</th>
            <th>Reg Date</th>
            <th>Category</th>
            <th>Tracking Number</th>
            <th>Fullname</th>
            <th>Email Address</th>
            <th>Status</th>
            <th>Type</th>
            <th>Level</th>
            <th>Action</th>
             <th>View</th>

          </tr>
        </thead>
        <tbody>
          <?php

          if (isset($_GET['date1'])){$from = date('Y-m-d',strtotime($_GET['date1']));}
          if (isset($_GET['date2'])){$to = date('Y-m-d',strtotime($_GET['date2']));}
          $c = 1;
          $q = "SELECT * FROM tblregistrations WHERE is_verify=1 AND is_updated=1 AND DATE(regdate)  >= '$from' AND DATE(regdate) <='$to'";
// $q = "SELECT * FROM tblregistrations";

          if(isset($_GET['src'])){
            if($_GET['src']==''){ $q .= ' ';} else { $q .= ' AND (firstname LIKE \'%'.$_GET['src'].'%\'
                                OR lastname LIKE \'%'.$_GET['src'].'%\'
                                OR trackingnumber LIKE \'%'.$_GET['src'].'%\')';}
          }

          if(isset($_GET['status'])){
            if($_GET['status']==-1){ 
              $q .= ' ';
            } else if($_GET['status']==0){ 
              $q .= ' AND is_accept=0 AND is_reject=0 ';
            } else if($_GET['status']==1){ 
              $q .= ' AND is_accept=1 AND is_reject=0 ';
            } else {
              $q .= ' AND is_accept=0 AND is_reject=1 ';
            }
          }


          if(isset($_GET['categoryid'])){
            if($_GET['categoryid']==-1){ 
              $q .= ' ';
            } else {
              $q .= ' AND categoryid='.$_GET['categoryid'].' ';
            }
          }


          if(isset($_GET['is_online'])){
            if($_GET['is_online']==-1){ 
              $q .= ' ';
            } else if($_GET['is_online']==1){
              $q .= ' AND is_online=1 ';
            } else {
              $q .= ' AND is_online=0';
            }
          }



          if(isset($_GET['levelid'])){
            if($_GET['levelid']==-1){ 
              $q .= ' ';
            } else if($_GET['levelid']==1){
              $q .= ' AND levelid=1 ';
            } else {
              $q .= ' AND levelid=2';
            }
          }
          $count = 1;
          $rs = mysqli_query($db_connection, $q);
          while ($rw = mysqli_fetch_array($rs)) {
            foreach ($rw as $key => $value) {
              $rw[$key] = htmlspecialchars($value);
            }
            $category = GetData('select category from tblcategory where categoryid='.$rw['categoryid']);
            $level = GetData('select level from tbllevel where levelid='.$rw['levelid']);
            echo '<tr>';
            echo'<td>'.$count++.'</td>';
            echo'<td>'.date("M d, Y",strtotime($rw['regdate'])).'</td>';
            echo '<td title="'.$category.'">'.Cat($rw['categoryid']).'</td>';
            echo '<td>' . $rw['trackingnumber'].'</td>';
            echo '<td>' . $rw['firstname'].' '.$rw['lastname'] . '</td>';
            echo '<td>' . $rw['emailaddress'] . '</td>';

            if ($rw['is_accept'] == 0 && $rw['is_reject'] == 0) {
              echo '<td><label class="badge badge-secondary">Pending</label></td>';
              if($rw['is_online']){
                echo'<td>Online</td>';
              } else {
                echo'<td>Walk-in</td>';
              }
              echo'<td>'.$level.'</td>';
              echo '<td>
              <span id="tmp' . $rw['regid'] . '">
              <input type="hidden" value="' . $rw['firstname'] . '" id="regid_x' . $rw['regid'] . '"/>
              <a href="javascript:void(0);" class="view" title="View" data-toggle="tooltip" 
                    onclick="openCustom(\'../forms/form?studentid=' . secureData($rw['regid']) . '\',900,900);"><i class="material-icons">&#xE417;</i></a>
              <a href="javascript:void(0);" class="accept" title="Accept" data-toggle="tooltip" 
                    onclick="accept_application(' . $rw['regid'] . ');"><i class="material-icons">&#xe86c;</i></a>
              <a href="javascript:void(0);" class="reject" title="Reject" data-toggle="tooltip" 
                    onclick="TINY.box.show({url:\'reject.php?regid='.secureData($rw['regid']).'\',width:400,height:150 })";><i class="material-icons">&#xE5C9;</i></a>
              </td>';
              echo '</span>';
            } else if($rw['is_reject'] == 1 && $rw['is_accept'] == 0){
              echo '<td><label class="badge badge-danger">Rejected</label></td>';
              if($rw['is_online']){
                echo'<td>Online</td>';
              } else {
                echo'<td>Walk-in</td>';
              }
              echo'<td>'.$level.'</td>';
              echo'<td> <a href="javascript:void(0);" class="view" title="View" data-toggle="tooltip" 
                    onclick="openCustom(\'../forms/form?studentid=' . secureData($rw['regid']) . '\',900,900);"><i class="material-icons">&#xE417;</i></a></td>';
            } else {
              echo '<td><label class="badge badge-success">Accepted</label></td>';
              if($rw['is_online']){
                echo'<td>Online</td>';
              } else {
                echo'<td>Walk-in</td>';
              }
              echo'<td>'.$level.'</td>';
              echo'<td> <a href="javascript:void(0);" class="view" title="View" data-toggle="tooltip" 
                    onclick="openCustom(\'../forms/form?studentid=' . secureData($rw['regid']) . '\',900,900);"><i class="material-icons">&#xE417;</i></a></td>';
            }
            $click_me = 'openCustom(\'../forms/view_documents.php?regid='.secureData($rw['regid']).'\',900,900);';
            echo'<td><a href="javascript:void();" onclick="'.$click_me.'">View Documents</a></td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>