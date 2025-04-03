<?php

    if(session_id()==''){session_start();} 
    if (isset($_SESSION['accountid'])){ 
      if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
      if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
      if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
    } else {
      header('location: ../'); exit(0); 
    }

    $email = GetData('select emailaddress from tblregistrations where regid='.$_POST['regid2']);
     $userpassword = GetData('select userpassword from tblregistrations where regid='.$_POST['regid2']);
    $name = GetData("SELECT CONCAT_WS(' ', firstname, middlename, lastname) AS name FROM tblregistrations WHERE regid=".$_POST['regid2']);

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
        $mail->Subject = 'Schedule Details Updated';

        $trackno = GetData('select trackingnumber from tblregistrations where regid='.$_POST['regid2']);
        $mail->Body = ''.ucwords($name). ' You are accepted in your Education Assistance Application.<br><br>You
            This is your tracking number '.$trackno.'<br><br>

             This is your login credentials.<br>
            Email: '.$email.'<br>
            Password: '.$userpassword.'<br><br>

        You can login to the website for Educational Assistance to track the status of your application.
        <br><br>
         <br> This is the updated schedule. Please go to '.$_POST['scheddate2'].'. Visit in Municipality of San Jose Batangas<br><br>

         Please follow your appointment schedule. Our office is open at 8:00 am to 5:00 pm';
        
        try {
            $mail->send();
            mysqli_query($db_connection, 'UPDATE tblregistrations SET is_accept=1 WHERE regid='.$_POST['regid2']);
            echo '';
            
            //$str =  '<div align="center" style="color:green;">Successfully Processed Request</div>';
            
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }


// $db_connection->close();

?>
