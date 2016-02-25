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
  <td style="height:5%;" align="center">Change Password Page</td>
  </tr>
  <tr>
  <td style="height:85%;">&nbsp;</td>
  </tr>
  </table>
  </td>
  <td class="mybackground" align="center">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width:100%;height:100%;">
  <table ng-align="center" style="width:50%;height:50%;" ng-border="0" ng-cellpadding="0" ng-cellspacing="0">
  <tr>
  <td>Enter User ID</td>
  <td><input class="box" type="text" name="username" placeholder="  Enter your user id"></td>
  </tr>
  <tr>
  <td>Enter Current Password</td>
  <td><input class="box" type="password" name="pass" placeholder="  Enter your current password"></td>
  </tr>
  <tr>
  <td>Enter New Password</td>
  <td><input class="box" type="password" name="pass1" placeholder="  Enter your New Password"></td>
  </tr>
  <tr>
  <td>Retype New Password</td>
  <td><input class="box" type="password" name="pass2" placeholder="  Retype your New Password"></td>
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
        	$_POST['pass'] = md5($_POST['pass']);
        	$search = mysql_query("SELECT * FROM login WHERE userid='".$_POST['username']."' AND password='".$_POST['pass']."'") or die(mysql_error());
        	$check = mysql_num_rows($search);
        	if ($check) {
        		if ($_POST['pass1'] != $_POST['pass2']) {
        			echo "<script language=\"JavaScript\">\n";
        			echo "alert('New Password Fields do not match, Please try again.');\n";
        			echo "window.location='changepassword.php'";
        			echo "</script>";
        			die();
        		}
        		else {
        			$password = md5($_POST['pass1']);
        			mysql_query("UPDATE login SET password='".$password."' WHERE userid='".$_POST['username']."'") or die(mysql_error());
        			echo "<script language=\"JavaScript\">\n";
        			echo "alert('Password is changed Successfully, Please Login once again.');\n";
        			echo "window.location='index.php'";
        			echo "</script>";
        			die();
        		}
        	}
        	else {
        		echo "<script language=\"JavaScript\">\n";
        		echo "alert('Incorrect User ID or password, Please try again.');\n";
        		echo "window.location='changepassword.php'";
        		echo "</script>";
        		die();
        	}
        }
  ?>
  </table>
  </body>
</html>