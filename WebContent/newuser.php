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
  <td style="height:5%;" align="center">New User Registration Page</td>
  </tr>
  <tr>
  <td style="height:5%;">&nbsp;</td>
  </tr>
  <tr>
  <td style="height:85%;">Instructions -<br/>
  <br/>User ID should be unique. Write down or remember User ID for Login purpose.<br/>
  <br/>Mobile Number field should not have more than 10 digits.<br/>
  <br/>PIN Code field should not have more than 6 digits.<br/>
  <br/>Activate your account using verification mail that is sent to your Email address.<br/>
  </td>
  </tr>
  </table>
  </td>
  <td class="mybackground" align="center">
  <form method="post" action="register.php" style="width:100%;height:100%;">
  <table ng-align="center" style="width:50%;height:100%;" ng-border="0" ng-cellpadding="0" ng-cellspacing="0">
  <tr>
  <td style="width:50%;" colspan="2">Enter User ID</td>
  <td><input class="box" type="text" name="username" placeholder="  Enter your user id"></td>
  </tr>
  <tr>
  <td colspan="2">Enter Email ID</td>
  <td><input class="box" type="text" name="email" placeholder="  Enter your email id"></td>
  </tr>
  <tr>
  <td colspan="2">Full Name</td>
  <td><input class="box" type="text" name="name" placeholder="  Enter your Full Name"></td>
  </tr>
  <tr>
  <td colspan="2">Mobile Number</td>
  <td><input class="box" type="text" name="number" placeholder="  Enter your Mobile Number"></td>
  </tr>
  <tr>
  <td colspan="2">Address</td>
  </tr>
  <tr>
  <td style="width:25%;">&nbsp;</td>
  <td>Line 1</td>
  <td><input class="box" type="text" name="line1" placeholder="  Enter your House No.,Street No."></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td>Line 2</td>
  <td><input class="box" type="text" name="line2" placeholder="  Enter your Area"></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td>PIN/ZIP Code</td>
  <td><input class="box" type="text" name="pincode" placeholder="  Enter your PIN Code"></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td>City</td>
  <td><input class="box" type="text" name="city" placeholder="  Enter your City"></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td>State</td>
  <td><input class="box" type="text" name="state" placeholder="  Enter your State"></td>
  </tr>
  <tr>
  <td colspan="3" align="center"><input class="lbtn" type="submit" name="submit" value="Submit"></td>
  </tr>
  </table>
  </form>
  </td>
  </tr>
  <?php include_once 'footer.php';?>
  </table>
  </body>
</html>