<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/Exception.php';
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';
		  
        $emailaddress = 'darrencelzo77@gmail.com';		
        // Send confirmation email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'neustdoctrack@neust.edu.ph';
        $mail->Password = 'mpefvbprqizgbtyb';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 993;
        $mail->setFrom('neustdoctrack@neust.edu.ph', 'scholarship_system');
        $mail->addAddress($emailaddress);
        $mail->isHTML(true);
        $mail->Subject = 'Application for Education Assistance';


        $mail->Body = "Your application has been received please wait for further announcement.";
        
        try {
            $mail->send();
            echo '';
			echo '<span style="color:green;">Email Sent</span>';
			
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

// $db_connection->close();

?>
