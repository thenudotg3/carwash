registration2.php
<?php 

{
    $fname=$_POST['fullname'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $verification_code = sha1($email . time()) ;
    $verification_URL = 'http://localhost/email-verification/verify.php?code=' . $verification_code;

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNo='$mobno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, MobileNo, Email,  Password, verificaton_code , is_active) value('$fname', '$mobno', '$email', '$password', '$verification_code' , false )");
    $result= mysqli_query($connection,$query);

    $to	 		  = $email; // receiver
	$sender		  = 'thenu.inbox@gmail.com'; // email address of the sender
	$mail_subject = 'verify email address';
	$email_body   = '<p>Dear'.$fname.'</p>';
    $email_body   = '<p> thankyou for signing up.there is more step. click below link to verify your email address in order to activate your account.</p>';
	$email_body   ='<p>'.$verification_URL . '</p>';
    $email_body   ='<p>Thankyou! <br> R&R autocare</P>';
    $header       = "From: {$sender}\r\nContent-Type: text/html;";

	$send_mail_result = mail($to, $mail_subject, $email_body, $header);

	if ( $send_mail_result ) {
        echo'check your email';
		// mail sent successfully
	} else {
		echo'error lamaya';// mail could not be sent 
	}


    /*if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    } */
}

}

?>