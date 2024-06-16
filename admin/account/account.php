<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
    if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
    if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
    if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
    header('location: ../'); exit(0); 
}


if(isset($_POST['add_account_a'])){
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $typeid = $_POST['typeid'];
    $branchid = $_POST['branchid'];

    mysqli_query($db_connection, "INSERT INTO tblaccount SET username='$username', firstname='$middlename', middlename='$lastname',
                                                              email='$email', accountpassword='$password', typeid='$typeid',branchid='$branchid'");
}
?>

<div>
    <h3>Account Setup</h3>
</div>

<div align="right">
    <a href="javascript:void(0);" class="btn btn-dark btn-sm mb-3" onclick="TINY.box.show({url: 'add_account.php',width:400,height:520})">Add New</a>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <thead>
                        <th>#</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Usertype</th>
                    </thead>

                    <tbody>
                        <?
                            $qr = mysqli_query($db_connection, "SELECT * FROM tblaccount");
                            


                            $c = 1;
                            while ($rw = mysqli_fetch_array($qr)) {
                                foreach ($rw as $key => $value) {
                                  $rw[$key] = htmlspecialchars($value);
                                }

                                echo '<tr>';
                                echo '<td>'.$c++.'</td>';
                                echo '<td>'.$rw['username'].'</td>';
                                echo '<td>'.ucwords($rw['firstname']. ' '.$rw['middlename']. ' '. $rw['lastname']).'</td>';
                                echo '<td>'.$rw['email'].'</td>';
                                echo '<td>'.Type($rw['typeid']).'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </tr>
            </table>
        </div>
    </div>
</div>