<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	// enter your credentials
	$email = "someone@example.com";
	$password = "password";
	// initialize the object
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth = true;
	$mail->CharSet = "UTF-8";
	$mail->Username = $email;
	$mail->Password = $password;
	// enter your name to be shown
	$mail->FromName = "someone";
	$mail->From = $email;

	// csv input
	$toReadFile = trim($argv[1]);
	// mail template\content
	$mailTemplate = trim($argv[2]);
	// mail subject
	$subject = trim($argv[3]);

    $fh = fopen($toReadFile,'r');
    while ($line = fgets($fh)) {
    	$line=trim($line);
    	$line = explode(',', $line);
    	// get the data from the csv
		$toEmailId = $line[1];
		$toName = $line[0];
		
		// sample template.html to be send
		$message = file_get_contents('template_7-8-2018.html');
		$message = trim($message);
		// add custom details to the mail
		$message = str_replace('<!--name-->', $toName, $message);

		$mail->clearAllRecipients();
		$mail->addAddress($toEmailId, $toName);
		$mail->Subject = $subject;
		$mail->msgHTML($message);
		// test whther the mail is send succesfully or not
		if (!$mail->send()) {
			$error = $toEmailId."\nMailer Error: " . $mail->ErrorInfo."\n\n";
			echo  $error;
		} else {
			echo "To ".$toName."\nEmail: ".$toEmailId."\nRequest sent Successfully\n\n";
		}
	}
?>
