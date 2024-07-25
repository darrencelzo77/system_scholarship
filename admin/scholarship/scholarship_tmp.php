<?php
if (session_id() == '') {
    session_start();
}
if (isset($_SESSION['accountid'])) {
    if (file_exists('systemconfig.inc')) {
        include_once('systemconfig.inc');
    }
    if (file_exists('includes/systemconfig.inc')) {
        include_once('includes/systemconfig.inc');
    }
    if (file_exists('../includes/systemconfig.inc')) {
        include_once('../includes/systemconfig.inc');
    }
} else {
    header('location: ../');
    exit(0);
}

?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <tr>
                    <thead>
                        <th>Category ID</th>
                        <th>Fullname</th>
                        <th>Email Address</th>
                        <!-- <th>Status</th> -->
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?
                        $qr = mysqli_query($db_connection, "SELECT a.*, b.regid as regid2,c.schedid,c.scheddate
                            FROM tblregistrations a
                            LEFT JOIN tblschedule_details b ON a.regid = b.regid
                            LEFT JOIN tblschedule c ON b.schedid = c.schedid
                            WHERE a.is_verify=1 AND a.is_updated=1 AND a.is_accept = 1 ");

                        while ($rw = mysqli_fetch_array($qr)) {
                            foreach ($rw as $key => $value) {
                                $rw[$key] = htmlspecialchars($value);
                            }
                            $open_view = 'openCustom(\'../forms/form?studentid='.secureData($rw['regid']).'\',900,900);';
                            echo '<tr>';
                            echo '<td>' . Cat($rw['categoryid']) . '</td>';
                            echo '<td title="Click to view the application form" style="cursor: pointer;" onclick="'.$open_view.'">' . $rw['firstname'] . ' ' . $rw['lastname'] . '</td>';
                            echo '<td>' . $rw['emailaddress'] . '</td>';
                           
                            if($rw['is_online']){
                                if($rw['is_complete']==0){
                                    echo'<td><label class="badge badge-warning">Online - PENDING</label></td>';
                                } else if($rw['is_complete']==2){//naka schedule
                                    echo'<td><label class="badge badge-success">Online - SCHEDULED</label>&nbsp;&nbsp;';
                                        if($rw['scheddate']){echo  date("F d, Y",strtotime($rw['scheddate']));}
                                    echo'</td>';
                                } else {
                                    echo'<td><label class="badge badge-primary">Online - COMPLETED</label></td>';
                                }
                            } else {
                                if($rw['is_complete']==0){
                                    echo'<td><label class="badge badge-warning">Walk-in - PENDING</label>&nbsp;&nbsp;';
                                        if($rw['regdate']){echo  date("F d, Y",strtotime($rw['regdate']));}
                                    echo'</td>';
                                } else {
                                    echo'<td><label class="badge badge-primary">Walk-in - COMPLETED</label></td>';
                                }
                            }



                            if($rw['is_complete']==1){
                                 echo'<td><label class="badge badge-success">Completed</label>&nbsp;&nbsp;';
                            } else {
                                 echo '<td> <a class="btn btn-primary btn-sm"
                                 onclick="completed_function('.$rw['regid'].');"
                                 >Mark as Done</a></td>';
                            }
                           


                            echo '</tr>';


                        }


                        ?>
                    </tbody>
                </tr>
            </table>
        </div>
    </div>
</div>