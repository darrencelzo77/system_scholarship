<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}




$jscript = "ajax_new_without_reload('tmp_report.php?date1='+object('date1').value
                                                  +'&date2='+object('date2').value
                                                  +'&src='+object('src').value
                                                  +'&status='+object('status').value
                                                  +'&categoryid='+object('categoryid').value
                                                  +'&is_online='+object('is_online').value
                                                  +'&levelid='+object('levelid').value,'tmp_tmp');";

$from = date('Y-m-d', strtotime('-31 days'));
$to = date('Y-m-d');



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div align="left">
  <h3>Reports</h3>
</div>

<table width="100%">
  <tr>
    <td align="left">
      FROM:&nbsp;<input type="date" value="<?=$from; ?>" id="date1" onchange="<?=$jscript; ?>" />
  
      TO:<input type="date" value="<?=$to; ?>" id="date2" onchange="<?=$jscript; ?>" />
    </td>
  
    <td align="right" class="d-flex justify-content-end">
      <input type="text" id="src" style="width: 150px;" class="mx-2 form-control" placeholder="Search..." onkeyup="<?=$jscript?>">
  
   <select style="width: 150px;" class="form-control mb-1" id="categoryid" onchange="<?=$jscript?>">
            <option value="-1" selected>All Categories</option>
           <?
           $rs = mysqli_query($db_connection,'select categoryid, cat from tblcategory');
           while($rw = mysqli_fetch_array($rs)){
                echo'<option value="'.$rw['categoryid'].'">'.$rw['cat'].'</option>';
           }
            ?>
          </select>
  &nbsp;&nbsp;

   <select style="width: 110px;" class="form-control mb-1" id="levelid" onchange="<?=$jscript?>">
            <option value="-1" selected>All Level</option>
            <option value="1">Elementary/Highscholl</option>
            <option value="2">College</option>
          </select>
        &nbsp;&nbsp;

         <select hidden style="width: 110px;" class="form-control mb-1" id="status" onchange="<?=$jscript?>">
            <option value="-1" selected>All Status</option>
            <option value="0">Pending</option>
            <option value="1">Accepted</option>
            <option value="2">Rejected</option>
          </select>
        &nbsp;&nbsp;

          <select style="width: 150px;" class="form-control mb-1" id="is_online" onchange="<?=$jscript?>">
            <option value="-1" selected>Online/Walk-in</option>
            <option value="1">Online Application</option>
            <option value="0">Walk-in Application</option>
          </select>&nbsp;&nbsp;
          <button onclick="ajax_new('report.php','maincontent');" class="btn btn-sm btn-secondary">Reset</button>
          &nbsp;&nbsp;  

          <?
          $open_view = "openCustom('../forms/report_printable?date1='+object('date1').value
                                                  +'&date2='+object('date2').value
                                                  +'&src='+object('src').value
                                                  +'&status='+object('status').value
                                                  +'&categoryid='+object('categoryid').value
                                                  +'&is_online='+object('is_online').value
                                                  +'&levelid='+object('levelid').value,900,900);";
          ?>
          <button onclick="<?=$open_view?>" class="btn btn-sm btn-primary">Print</button>
        &nbsp;&nbsp;

    </td>
  </tr>
</table>
<br>
<div id="tmp_tmp">
  <? include('tmp_report.php'); ?>
</div>
</div>