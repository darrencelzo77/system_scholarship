<?php

    if(session_id()==''){session_start();} 
    if (isset($_SESSION['accountid'])){ 
      if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
      if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
      if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
    } else {
      header('location: ../'); exit(0); 
    }

    $email = GetData('select emailaddress from tblregistrations where regid='.$_POST['regid_edit']);
    $is_online = GetData('select is_online from tblregistrations where regid='.$_POST['regid_edit']);
    $userpassword = GetData('select userpassword from tblregistrations where regid='.$_POST['regid_edit']);
    $name = GetData("SELECT CONCAT_WS(' ', firstname, middlename, lastname) AS name FROM tblregistrations WHERE regid=".$_POST['regid_edit']);

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/Exception.php';
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';
		
		
        // Send confirmation email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'scholarship941@gmail.com';
        $mail->Password = 'mpefvbprqizgbtyb';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('scholarship941@gmail.com', 'scholarship_system');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Completed Transaction';

        $trackno = GenerateTracking();

        if($is_online){
            $mail->Body = ''.ucwords($name). ' Congratulations Your application in Educational Assistance Program has been completed.<br>You
            This is your tracking number '.$trackno.'<br><br>
            This is your login credentials.<br>
            Email: '.$email.'<br>
            Password: '.$userpassword.'<br><br>
                 You can login to the website for Educational Assistance to track the status of your application.';
        } else {
            $mail->Body = ''.ucwords($name). ' Congratulations Your application in Educational Assistance Program has been completed.<br>You
            This is your tracking number '.$trackno.'<br><br>
           
                 You can now settle your concern in the staff in munisipyo. if any.';
        }
        
        
        try {
            $mail->send();
            mysqli_query($db_connection, 'UPDATE tblregistrations SET is_complete=1 WHERE regid='.$_POST['regid_edit']);
            mysqli_query($db_connection,'update tblschedule_details set is_complete=1 where regid='.$_POST['regid_edit'].' AND is_complete=0 ');
			echo '';
			
			//$str =  '<div align="center" style="color:green;">Successfully Processed Request</div>';
			
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

// $db_connection->close();

?>
