<?php

    if(session_id()==''){session_start();} 
    if (isset($_SESSION['accountid'])){ 
      if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
      if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
      if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
    } else {
      header('location: ../'); exit(0); 
    }

   

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
        $mail->addAddress($emailaddress);
        $mail->isHTML(true);
        $mail->Subject = 'Pre-registration';


        $mail->Body = 'Your Pre-registration has been received, please wait for your verification.';
        
        try {
            $mail->send();
            echo '';
			
			//$str =  '<div align="center" style="color:green;">Successfully Processed Request</div>';
			
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

// $db_connection->close();

?>
