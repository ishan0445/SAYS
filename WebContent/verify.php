  <?php
  include_once 'connect.php';
  if(isset($_GET['emailv']) && !empty($_GET['emailv']) AND isset($_GET['hashv']) && !empty($_GET['hashv'])){
  	// Verify data
  	$email = mysql_escape_string($_GET['emailv']); // Set email variable
  	$hash = mysql_escape_string($_GET['hashv']); // Set hash variable
  	$search = mysql_query("SELECT * FROM login WHERE `Email ID`='".$email."' AND hash='".$hash."' AND active=0") or die(mysql_error());
  	$match  = mysql_num_rows($search);
  	if($match > 0){
  		// We have a match, activate the account
  		mysql_query("UPDATE login SET active=1 WHERE `Email ID`='".$email."' AND hash='".$hash."' AND active=0") or die(mysql_error());
  		echo "<script language=\"JavaScript\">\n";
  		echo "alert('Your account has been activated, you can now login');\n";
  		echo "window.location='index.php'";
  		echo "</script>";
  		die();
  	}
  	else{
  		// No match -> invalid url or account has already been activated.
  		echo "<script language=\"JavaScript\">\n";
  		echo "alert('The url is either invalid or you already have activated your account.');\n";
  		echo "window.location='index.php'";
  		echo "</script>";
  		die();
  	}
  }
  ?>