<?php

    if(session_id()==''){session_start();} 
    if (isset($_SESSION['accountid'])){ 
      if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
      if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
      if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
    } else {
      header('location: ../'); exit(0); 
    }

    $email = GetData('select emailaddress from tblregistrations where regid='.$_POST['regid']);
    $name = GetData("SELECT CONCAT_WS(' ', firstname, middlename, lastname) AS name FROM tblregistrations WHERE regid=".$_POST['regid']);

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
        $mail->Subject = 'Application Accepted';


        $mail->Body = ''.ucwords($name). ' You are accepted in your Education Assistance Application. You can verify it to the portal by typing your tracking number.';
        
        try {
            $mail->send();
            mysqli_query($db_connection, 'UPDATE tblregistrations SET is_accept=1 WHERE regid='.$_POST['regid']);
			echo '';
			
			echo '<span style="color:green;">Email Sent</span>';
			
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

// $db_connection->close();

?>
