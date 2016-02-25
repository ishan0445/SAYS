<?php  // Connects to your Database
include 'connect.php';
if (isset($_POST['submit'])) {     //This makes sure they did not leave any fields blank
	if (!$_POST['username'] | !$_POST['email'] | !$_POST['name'] | !$_POST['number'] 
			| !$_POST['line1'] | !$_POST['line2'] | !$_POST['pincode'] | !$_POST['city'] | !$_POST['state'] ) {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('You did not complete all of the required fields.');\n";
		echo "window.location='newuser.php'";
		echo "</script>";
		die();
	}    // checks if the username is in use
	if (!get_magic_quotes_gpc()) {  $_POST['username'] = addslashes($_POST['username']);  }
	$usercheck = $_POST['username'];
	$check = mysql_query("SELECT userid FROM login WHERE userid = '$usercheck'")   or die(mysql_error());
	$check2 = mysql_num_rows($check);    //if the name exists it gives an error
	if ($check2 != 0) {  
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Sorry, The User ID is already in use.');\n";
		echo "window.location='newuser.php'";
		echo "</script>";
		die();
	}   //  this makes sure both passwords entered match
	$okay = preg_match(
			'/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $_POST['email']
			);
	if ($okay) {
		$check = mysql_query("SELECT `Email ID` FROM login WHERE `Email ID` = '".$_POST['email']."'")   or die(mysql_error());
		if ($check) {
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Email ID already exist.');\n";
			echo "window.location='newuser.php'";
			echo "</script>";
			die();
		}
	} else {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Email is Invalid.');\n";
		echo "window.location='newuser.php'";
		echo "</script>";
		die();
	}
	if (!get_magic_quotes_gpc()) {
		$_POST['username'] = addslashes($_POST['username']);
	}    // now we insert it into the database
	$okay = preg_match(
			'/^\d{10}$/', $_POST['number']
			);
	if ($okay) {
	} else {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Mobile Number is Invalid.');\n";
		echo "window.location='newuser.php'";
		echo "</script>";
		die();
	}
	$okay = preg_match(
			'/^\d{6}$/', $_POST['pincode']
			);
	if ($okay) {
	} else {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('PIN Code is Invalid.');\n";
		echo "window.location='newuser.php'";
		echo "</script>";
		die();
	}
	$hash = md5(rand(0,1000));
	$password = rand(1000,5000);
	$insert = "INSERT INTO login
			VALUES ('".$_POST['username']."', '".md5($password)."', '".$_POST['email']."', '".$_POST['name']."'
					, '".$_POST['number']."', '".$_POST['line1']."', '".$_POST['line2']."', '".$_POST['pincode']."'
							, '".$_POST['city']."', '".$_POST['state']."', '".$hash."', '0', '0')";
	$add_member = mysql_query($insert) or die(mysql_error());
require_once "Mail.php"; 
$from = "Admin <admin@says.com>"; 
$to = $_POST['email']; 
$subject = "Verification Mail"; 
$body = '
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$_POST['username'].'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://says.bitnamiapp.com/index.php?emailv='.$_POST['email'].'&hashv='.$hash.'
 
'; 
$host = "smtp.gmail.com"; 
$username = "priyanshugupta60@gmail.com"; 
$password = "dgveaplmjfavafuk"; 
$headers = array ('From' => $from, 
'To' => $to, 
'Subject' => $subject); 
$smtp = Mail::factory('smtp', 
array ('host' => $host, 
'auth' => true, 
'username' => $username, 
'password' => $password)); 
$mail = $smtp->send($to, $headers, $body); 
	echo "<script language=\"JavaScript\">\n";
	echo "alert('Thankyou for Registration, Verification Mail is sent to the given email address.');\n";
	echo "window.location='index.php'";
	echo "</script>";
	die();
} ?>