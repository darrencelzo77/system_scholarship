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

<div align="left">
    <h3>List of Accepted Applicants</h3>
</div>
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
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?
                        $qr = mysqli_query($db_connection, "SELECT * FROM tblregistrations WHERE is_accept = 1");

                        while ($rw = mysqli_fetch_array($qr)) {
                            foreach ($rw as $key => $value) {
                                $rw[$key] = htmlspecialchars($value);
                            }
                            $open_view = 'openCustom(\'../forms/form?studentid='.secureData($rw['regid']).'\',900,900);';
                            echo '<tr>';
                            echo '<td>' . Cat($rw['categoryid']) . '</td>';
                            echo '<td onclick="'.$open_view.'">' . $rw['firstname'] . ' ' . $rw['lastname'] . '</td>';
                            echo '<td>' . $rw['emailaddress'] . '</td>';
                            echo '<td> 
                            <a class="btn btn-success btn-sm">Schedule</a>
                            <a class="btn btn-success btn-sm">CALL</a>
                            </td>';
                            echo '</tr>';


                        }


                        ?>
                    </tbody>
                </tr>
            </table>
        </div>
    </div>
</div>