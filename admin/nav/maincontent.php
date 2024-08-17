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

<!-- Quick Action Toolbar Starts-->
<!-- <div class="row quick-action-toolbar">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-header d-block d-md-flex">
        <h5 class="mb-0">Quick Actions</h5>
        <p class="ml-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p>
      </div>
      <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"> <i class="icon-user mr-2"></i> Add Client</button>
        </div>
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"><i class="icon-docs mr-2"></i> Create Quote</button>
        </div>
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"><i class="icon-folder mr-2"></i> Enter Payment</button>
        </div>
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"><i class="icon-book-open mr-2"></i>Create Invoice</button>
        </div>
      </div>
    </div>
  </div>
</div> -->
<!-- Quick Action Toolbar Ends-->
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="d-sm-flex align-items-baseline report-summary-header">
              <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
            </div>
          </div>
        </div>
        <div class="row report-inner-cards-wrapper">
          <div class=" col-md -6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">Application Counts</span>
              <h4><?=GetData('select count(*) from tblregistrations');?></h4>
              <!-- <span class="report-count"> 2 Reports</span> -->
            </div>
            <div class="inner-card-icon bg-success">
              <i class="icon-user"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">FEMALE</span>
              <h4><?=GetData('select count(*) from tblregistrations where sexid=2');?></h4>
              <!-- <span class="report-count"> 3 Reports</span> -->
            </div>
            <div class="inner-card-icon bg-danger">
              <i class="icon-briefcase"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">MALE</span>
              <h4><?=GetData('select count(*) from tblregistrations where sexid=1');?></h4>
              <!-- <span class="report-count"> 5 Reports</span> -->
            </div>
            <div class="inner-card-icon bg-warning">
              <i class="icon-globe-alt"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">ACCEPTED</span>
              <h4><?=GetData('select count(*) from tblregistrations where is_accept=1');?></h4>
              <!-- <span class="report-count"> 9 Reports</span> -->
            </div>
            <div class="inner-card-icon bg-primary">
              <i class="icon-check"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="card">
  <div class="card-body">  
    <h4>Statistics</h4>

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Category Name</th>
            <th>Applicants</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $rs = mysqli_query($db_connection, 'SELECT a.categoryid, a.category, a.cat, 
              COUNT(b.categoryid) as ccc
            FROM tblcategory a
            LEFT JOIN tblregistrations b ON a.categoryid = b.categoryid
            GROUP BY a.categoryid
            ORDER BY a.category');
          while($row = mysqli_fetch_array($rs)) {
            echo '<tr>
                    <td>'.$row['cat'].'</td>
                    <td>'.$row['ccc'].'</td>
                  </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<br>



<div class="card">
  <div class="card-body"> <h4>Recent</h4>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <tr>
          <thead>
            <th>Category ID</th>
            <th>Fullname</th>
          </thead>

          <tbody>
            <?
			$rs = mysqli_query($db_connection,'select categoryid, CONCAT(firstname,\' \',lastname) as name
					from tblregistrations order by regid DESC');
			while($rw = mysqli_fetch_array($rs)){
				echo'<tr>
					<td>'.$rw['categoryid'].'</td>
					<td>'.$rw['name'].'</td>
				</tr';
			}
			?>
          </tbody>
        </tr>

      </table>
    </div>
  </div>
</div>