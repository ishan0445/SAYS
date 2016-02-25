<?php 
include 'connect.php';
//Checks if there is a login cookie
if(isset($_COOKIE['ID_my_site'])) {
	//if there is, it logs you in and directes you to the members page
	$username = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM login WHERE userid = '$username'")or die(mysql_error());
	while($info = mysql_fetch_array( $check )) {
		if ($pass != $info['Password'])   {  }
		else  {  header("Location: members.php");    }
	}
}   //if the login form is submitted

if (isset($_POST['submit'])) { // if form has been submitted    // makes sure they filled it in
	if(!$_POST['username'] | !$_POST['pass']) {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('You did not fill in a required field.');\n";
		echo "window.location='index.php'";
		echo "</script>";
		die();
	}  // checks it against the database
	$check = mysql_query("SELECT * FROM login WHERE userid = '".$_POST['username']."'") or die(mysql_error());    //Gives error if user dosen't exist
	$check2 = mysql_num_rows($check);
	if ($check2 == 0) {
		echo "<script language=\"JavaScript\">\n";
        echo "alert('That user does not exist in our database.');\n";
        echo "window.location='index.php'";
        echo "</script>";
        die();
	}
	while($info = mysql_fetch_array( $check )) {
		$_POST['pass'] = stripslashes($_POST['pass']);
		$info['Password'] = stripslashes($info['Password']);
		$_POST['pass'] = md5($_POST['pass']);    //gives error if the password is wrong
		if ($_POST['pass'] != $info['Password']) {
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Incorrect password, Please try again.');\n";
			echo "window.location='index.php'";
			echo "</script>";
			die();
		}
		else {    // if login is ok then we add a cookie
			$_POST['username'] = stripslashes($_POST['username']);
			$hour = time() + 3600;
			setcookie("ID_my_site", $_POST['username'], $hour);
			setcookie("Key_my_site", $_POST['pass'], $hour);	    //then redirect them to the members area
			$search = mysql_query("SELECT * from login WHERE userid='".$_POST['username']."' AND password='".$_POST['pass']."' AND active=1") or die(mysql_error());
			$check = mysql_num_rows($search);
			if ($check) {
				$search = mysql_query("SELECT * from login WHERE userid='".$_POST['username']."' AND password='".$_POST['pass']."' AND Flogin=1") or die(mysql_error());
				$check = mysql_num_rows($search);
				if ($check) {
					header("Location: members.php");
				}
				else {
					mysql_query("UPDATE login SET Flogin=1 WHERE userid='".$_POST['username']."' AND password='".$_POST['pass']."'") or die(mysql_error());
					header("Location: changepassword.php");
				}
			} else {
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Activate your account through Email Verification!');\n";
				echo "window.location='logout.php'";
				echo "</script>";
				die();
			}
		}
	}
}
else   {	   } // if they are not logged in
?>