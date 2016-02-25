<?php   // Connects to your Database
include 'connect.php';
if(isset($_COOKIE['ID_my_site']))   {
	$username = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM login WHERE userid = '$username'")or die(mysql_error());
	while($info = mysql_fetch_array( $check ))   {     //if the cookie has the wrong password, they are taken to the login page
		if ($pass != $info['Password'])   { header("Location: index.php");   }     //otherwise they are shown the admin area
		else   {   ?>
		
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
            <td bgcolor="#edeff2" style="width:30%;height:70%;font-size:18px;" align="center">
            <table style="width:90%;height:60%;" ng-align="center">
                  <tr>
                      <td align="center" style="font-weight: bold;"><a href="changepassword.php"><font color="#3127aa">Change Password</font></a></td>
                  </tr>
                  <tr>
                      <td align="center" style="font-weight: bold;"><a href="logout.php"><font color="#3127aa">Logout</font></a></td>
                  </tr>
            </table>
            </td>
            <td style="background: url(images/Main%20Page%20Background.png) no-repeat center;
                       -webkit-background-size: contain; -moz-background-size: contain;
                       -o-background-size: contain; background-color: #ffffff; background-size: contain;
                       width: 70%; height: 70%;"></td>
            </tr>
            <?php include_once 'footer.php';?>
            </table>
            </body>
            </html>  
		<?php }
	}
}

else     //if the cookie does not exist, they are taken to the login screen
{	  header("Location: index.php");   }   
?>