<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $subject=$_POST['subject'];
   $message=$_POST['message'];
    $greske=[];

   $reEmail="/^[a-z0-9\.]{1,25}@[a-z0-9]{1,25}(\.[a-z0-9]{1,25})+$/";
   if(!preg_match($reEmail,$email)){
       array_push($greske,"Email is bad");
   }

   $reSubject="/^[A-Za-z\s0-9]{3,50}$/";
   if(!preg_match($reSubject,$subject)){
    array_push($greske,"Subject is bad");
   }

   $reMessage="/^[A-Za-z\s0-9]{3,250}$/";
   if(!preg_match($reMessage,$message)){
    array_push($greske,"Message is bad");
   }
   
   if(count($greske)==0){
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                //$mail->SMTPDebug = 2;                                 
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'eshopper12341234@gmail.com';                 // SMTP username
                $mail->Password = 'PartizaN';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom($email, 'Mailer');
                $mail->addAddress('eshopper12341234@gmail.com');     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $email." ".$subject;
                $mail->Body    = $message;
                $mail->AltBody = 'Stigo mejl?';

                $mail->send();
                echo "Email has been sent to administrator exepct answer as soon as posible!";
   }
   catch(PDOException $e){
       die($e->getMessage());
   }
  
}
}