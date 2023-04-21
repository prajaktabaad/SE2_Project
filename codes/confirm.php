<?php
include('connect.php');

require 'E:\XAMAPP\htdocs\PHPMailer\src\PHPMailer.php';
require 'E:\XAMAPP\htdocs\PHPMailer\src\SMTP.php';
require 'E:\XAMAPP\htdocs\PHPMailer\src\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $update="update `nightout` set approve='Approved' where ID=$id";
    $select="select * from `nightout` where ID=$id";
    $result=mysqli_query($con,$update);
    $result1=mysqli_query($con,$select);
    $row=mysqli_fetch_assoc($result1);

    $p_email =$row['p_email'];
    $name =$row['S_name'];
    $fromdate =$row['from_date'];
    $todate =$row['to_date'];


    
    $mail = new PHPMailer(true);
    
    
    //SMTP Settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'albertkristine20@gmail.com';          //SMTP username (your Gmail email address)
    $mail->Password   = 'tvfmjzzbnzshpkrn';                     //SMTP password (app password generated from Google account)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
    //Recipients
    $mail->setFrom('albertkristine20@gmail.com', 'COEP Hostel');
    $mail->addAddress($p_email, 'Guardian of '. $name);     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Regarding Nightout Application of ' . $name ;
    $mail->Body    = 'This is regarding to inform you that ' . $name . ' has applied for nightout on ' . $fromdate . ' till ' .$todate;
    $mail->XMailer = '';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    
    if ($mail->send()) {
        echo "<script>alert('Email sent successfully!');</script>";
    } else {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
    
}

include('nightout.php');
?>
