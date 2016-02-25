<!doctype html>
<html ng-app>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <table ng-align="center" style="width:100%;height:100%;" ng-border="0" ng-cellpadding="0" ng-cellspacing="0">
  <?php include_once 'header.php'; ?>
  <?php include_once 'connect.php'; ?>
  <?php include_once 'login.php';?>
  <tr>
  <td class="tdleft" align="center">
  <form method="post" action="login.php">
  <table style="width:90%;height:60%;" ng-align="center">
  <tr>
  <td>User ID</td>
  <td><input class="box" type="text" name="username" placeholder="  Enter your user id"></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
  <td>Password</td>
  <td><input class="box" type="password" name="pass" placeholder="  Enter your password"></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
  <td colspan="2" align="center"><input class="lbtn" type="submit" name="submit" value="Log In"></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
  <td align="left" colspan="2"><a href="forgetpass.php">Forget User ID/Password?</a></td>
  </tr>
  <tr>
  <td align="left" colspan="2"><a href="newuser.php">New User?</a></td>
  </tr>
  </table>
  </form>
  </td>
  <td class="mybackground">
  <table>
  <tr>
  <td style="width:5%;">&nbsp;</td>
  <td>
  <p>Store At Your Service (SAYS) helps you find more relevant products (with price updates) and offers (with their terms and conditions).</p>
  <p>Get latest updates in our store.</p>
  <p>Get price updates on products purchased.</p>
  <p>Place direct order on based on your last purchase.</p>
  <p>Sign in to get regular customer bonus offers.</p>
  <p>Use SAYS to make shopping a better experience!</p>
  <br>
  <br>
  <p align="center" style="font-size:20px;">Happy Shopping with SAYS!!!</p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <?php include_once 'footer.php';?>
  <?php include_once 'verify.php';?>
  </table>
  </body>
</html>