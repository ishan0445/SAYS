<!doctype html>
<html ng-app>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <table ng-align="center" style="width:100%;height:100%;" ng-border="0" ng-cellpadding="0" ng-cellspacing="0">
  <?php include_once 'header.php'; ?>
  <tr>
  <td class="tdleft" align="center">
  <table style="width:90%;height:100%;">
  <tr>
  <td style="height:5%;">&nbsp;</td>
  </tr>
  <tr>
  <td style="height:5%;" align="center">Forgot User ID/Password Page</td>
  </tr>
  <tr>
  <td style="height:90%;">&nbsp;</td>
  </tr>
  </table>
  </td>
  <td class="mybackground" align="center">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width:100%;height:100%;">
  <table ng-align="center" style="width:50%;height:20%;" ng-border="0" ng-cellpadding="0" ng-cellspacing="0">
  <tr>
  <td>Enter Your Email ID</td>
  <td><input class="box" type="text" name="email" placeholder="  Enter your email id"></td>
  </tr>
  <tr>
  <td colspan="2" align="center"><input class="lbtn" type="submit" name="submit" value="Submit"></td>
  </tr>
  </table>
  </form>
  </td>
  </tr>
  <?php include_once 'footer.php';?>
  <?php 
        include_once 'connect.php';
        if (isset($_POST['submit'])) {
        	$search = mysql_query("SELECT * FROM login WHERE `Email ID`='".$_POST['email']."'") or die(mysql_error());
        	$check = mysql_num_rows($search);
        	if ($check) {
        		$hash = md5(rand(0,1000));
        		$password = rand(1000,5000);
        		$insert = "UPDATE login SET password='".md5($password)."', hash='".$hash."', active=0, Flogin=0
  		        WHERE `Email ID`='".$_POST['email']."'";
        		$add_member = mysql_query($insert) or die(mysql_error());
        		$select = "SELECT userid FROM login WHERE `Email ID` = '".$_POST['email']."'";
        		$retval = mysql_query($select) or die(mysql_error());
        		$username = mysql_fetch_assoc($retval);
        		require_once "Mail.php";
        		$from = "Admin <admin@says.com>";
        		$to = $_POST['email'];
        		$subject = "Reset Password";
        		$body = '
Your Password has been reset.
You can login with the following credentials after you have activated your account by pressing the url below again.
        		
------------------------
Username: '.$username['userid'].'
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
        		echo "alert('Password is send Successfully along with its User ID through Email.');\n";
        		echo "window.location='index.php'";
        		echo "</script>";
        		die();
        	}
        	else {
        		echo "<script language=\"JavaScript\">\n";
        		echo "alert('Email ID does not exist, Please try again.');\n";
        		echo "window.location='forgetpass.php'";
        		echo "</script>";
        		die();
        	}
        }
  ?>
  </table>
  </body>
</html>