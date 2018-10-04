<?php


$conn=mysqli_connect("sql203.epizy.com","epiz_22655721","puS1cE6Nj","epiz_22655721_test")or die("Can't Connect...");

if (isset($_POST['submit'])) {
  
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);
$mailid = mysqli_real_escape_string($conn, $_POST['mail']);
$mailSub ='Comment Mailing';

$sql = "INSERT INTO test (firstname,lastname,comment) VALUES ('$firstname', '$lastname', '$comment')";

    mysqli_query($conn, $sql);


require 'PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'testingphpmail25@gmail.com';
	$mail->Password = '123@abcd';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = '465';
	
	$mail->From = 'tiwin@gmail.com';
	$mail->FromName = 'Tiwin';
	$mail->addAddress($mailid);
	$mail->addReplyTo('tiwin@gmail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = $mailSub;
	//$link = 'http://kitkatsoftwaretechnologies.com/password/forget.php?email=';
	$mail->Body    = 'Comment is ' . $comment;;
	
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send()) {
		echo "fail"; 
	} else {
		echo "success"; 
	}


}

?>
