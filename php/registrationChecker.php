<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require_once("konekcija.php");
    $greske=[];
    $statusniKod=201;
    $message=null;
    $name=$_POST['name'];
    $lastName=$_POST['lastName'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmePassword=$_POST['confirmePassword'];

    $reName="/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/";
    $reLastName="/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/";
    $reAddress="/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*\s[0-9]{1,4}(\/[0-9]{1,4})?$/";
    $rePhone="/^06[0-9]{1}[0-9]{6}([0-9]{1})?$/";
    $reUsername="/^[A-Za-z]{1}[A-Za-z0-9]{2,14}$/";
    $rePassword="/^[\S]{6,25}$/";

    if(!preg_match($reName,$name)){
        array_push($greske,"Name is not correct!");
        $statusniKod=422;
        
    }
    if(!preg_match($reLastName,$lastName)){
        array_push($greske,"Last name is not correct!");
        $statusniKod=422;
    }
    if(!preg_match($reAddress,$address)){
        array_push($greske,"Address is not correct!");
        $statusniKod=422;
    }
    if(!preg_match($rePhone,$phone)){
        array_push($greske,"Phone number is not correct!");
        $statusniKod=422;
    }
    if(!preg_match($reUsername,$username)){
        array_push($greske,"Username is not correct!");
        $statusniKod=422;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($greske,"Email is not correct!");
        $statusniKod=422;
    }
    if(!preg_match($rePassword,$password)){
        array_push($greske,"Password is not correct!");
        $statusniKod=422;
    }
    if($confirmePassword!=$password){
        array_push($greske,"Passwords don't match!");
        $statusniKod=422;
    }

    if(count($greske)==0){
        $pass=md5($password);
        $upis=$connection->prepare("INSERT INTO korisnik (ime,prezime,username,adresa,email,password,telefon,aktivacioni_kod,datum_registracije) VALUES (:ime,:prezime,:username,:adresa,:email,:password,:telefon,:aktivacioni_kod,:datum_registracije)");
        $vremeRegistrovanja=mkTime();
        $aktivacioniKod=md5($vremeRegistrovanja.$email);
        $upis->bindParam(':ime',$name);
        $upis->bindParam(':prezime',$lastName);
        $upis->bindParam(':username',$username);
        $upis->bindParam(':adresa',$address);
        $upis->bindParam(':email',$email);
        $upis->bindParam(':password',$pass);
        $upis->bindParam(':telefon',$phone);
        $upis->bindParam(':aktivacioni_kod',$aktivacioniKod);
        $upis->bindParam(':datum_registracije',$vremeRegistrovanja);
        
        try{
            $upis->execute();
            $message="Your data is proceed to database! Confirme regitration by clicking the link in your email!";
            // Import PHPMailer classes into the global namespace
            // These must be at the top of your script, not inside a function
            

            //Load Composer's autoloader
         //require 'vendor/autoload.php';

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
                $mail->setFrom('eshopper12341234@gmail.com', 'Mailer');
                $mail->addAddress($email);     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Ecommerce account activation';
                $mail->Body    = "Hi $name $lastName, thank you for your registration!
                                    To acctivate your account just click on following link: <a href='localhost/eshopper/activated.php?kod=$aktivacioniKod'>Activate</a>";
                $mail->AltBody = 'Stigo mejl?';

                $mail->send();
            } catch (Exception $e) {
                $message= "Message could not be sent. Mailer Error: , $mail->ErrorInfo";
            }
        }catch(PDOException $e){
            $statusniKod=500;
            $message="Problem with server!" . $e->getMessage();
        }


        
    }else{
        $message="Data you entered is not valid!";
    }
    http_response_code($statusniKod);
    echo $message;
    ?>