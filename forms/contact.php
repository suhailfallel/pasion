<?php
  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'pasionsushism@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();

    // Replace with your email address
$to_email = "passionsushism@gmail.com";

// SMTP settings
$smtp_host = "smtp.gmail.com";
$smtp_username = "pasionsushism";
$smtp_password = "";
$smtp_port = 587;

// Form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Email content
$email_body = "Name: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";

// Load PHPMailer library
require 'phpmailer/PHPMailerAutoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer;

// Set SMTP settings
$mail->isSMTP();
$mail->Host = $smtp_host;
$mail->SMTPAuth = true;
$mail->Username = $smtp_username;
$mail->Password = $smtp_password;
$mail->SMTPSecure = 'tls';
$mail->Port = $smtp_port;

// Set email content
$mail->setFrom($email, $name);
$mail->addAddress($to_email);
$mail->Subject = $subject;
$mail->Body = $email_body;

// Send email
if (!$mail->send()) {
    // If email sending failed, return an error message
    echo "Error sending email: " . $mail->ErrorInfo;
} else {
    // If email sending was successful, return a success message
    echo "Email sent successfully";
}

   ?>
