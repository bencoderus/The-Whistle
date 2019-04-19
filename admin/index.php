<?php
require('../config.php');
include('../class/admin.php');
session_start();
if(isset($_SESSION['admin'])){
header("Location: dashboard");
exit(); }
if(isset($_POST['submit']))
{
$username=strtolower($_POST['username']);
$pass=$_POST['pass'];
$pass=sha1($pass);
/*$sql="SELECT * FROM admin WHERE username='$username' and password='$pass'";
$query=$dbcon->query($sql);

$count=$query->num_rows;
*/
$count=Admin::login($username, $pass);
if ($count==1)
{
$_SESSION["admin"]=$username;
header("Location: dashboard"); 
}
else
{
$msg="Invalid username and password";
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Portal</title>
    
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/theme.css'>
<link rel='stylesheet' href='../css/style.css'>

<link rel='stylesheet' href='../css/login.css'>
<link rel='stylesheet' href='../css/font-awesome.css' media='all' />
<meta name='viewport' content='width=device-width, initial-scale=1'>
	<script src='../js/jquery-3.3.1.min.js'></script>
<script src='../js/bootstrap.min.js'></script>

<style>
</style>
</head>
<body>
    <form class="form-signin contents" action="" method="POST">
      <div class="text-center mb-4">
<?php

if(isset($_GET['infomsg']))
{
  $infomsg=cleaninput($_GET['infomsg']);
  echo " <div class='alert alert-warning'><b>$infomsg</b></div><br>";

}

?>    


   <span class="text-success">   <i class="fa fa-user-circle fa-5x"></i></span>
        <h1 class="h4 mb-3 font-weight-normal">ADMIN PORTAL</h1>
        <p>Welcome Admin, provide your details below</p>
      </div>
      <?php
      if(!empty($msg))
      {
      	echo "<br><div class='alert alert-danger'>$msg</div>";
      }
      ?>
    
      <div class="form-group">
    <label>Username</label>
      <input type="text" name="username" class="form-control" placeholder="Username" onchange="uv(this.value)" required>
        <div id="uv">
    </div>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
      </div>
<center>
      <button class="btn btn-success" name="submit" type="submit">Login now</button></center>
    <p/>  <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2020 <?php echo($appname); ?></p>
    </form>
</body>
</html>