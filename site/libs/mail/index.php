<?php  
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
	require 'vendor/autoload.php';

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'nluu1235@gmail.com';                 // SMTP username
    $mail->Password = 'kakalatoi';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; 
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                   // TCP port to connect to

    //Recipients
    $mail->setFrom('nluu1235@gmail.com', $_POST['txtName']);
    $mail->addAddress('nluu246@gmail.com', 'Admin');


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['txtSubject'];
    $mail->Body    = $_POST['txtContent'];

    $mail->send();
    header("Location:".URL);
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>