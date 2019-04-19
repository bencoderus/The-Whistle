
<?php
include('../config.php');
include('../class/admin.php');
if(isset($_POST['submit']))
{
    //COLLECT VALUES
$email=$_POST['email'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$date=time();
$cpass=$_POST['cpass'];
$equery=$dbcon->query("SELECT email FROM admin WHERE email='$email'");
$cemail=$equery->num_rows;
$uquery=$dbcon->query("SELECT email FROM admin WHERE username='$user'");
$cuser=$uquery->num_rows;
if($cemail > 0)
{
  $msg="Email already exist!";
}
elseif($cuser > 0)
{
  $msg="Username already exist!";
}
elseif($pass!=$cpass)
{
  $msg="Password doesnt match";
}
else
{
  $obj=new Admin($user, $pass, $email);
  $send=$obj->save();
  if($send)
  {
$msg="Registration successful";
  }
  else
  {
$msg="Registration Failed!";
  }
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
<link rel='stylesheet' href='../css/login.css'>
<link rel='stylesheet' href='../css/font-awesome.css' media='all' />
<meta name='viewport' content='width=device-width, initial-scale=1'>
	<script src='../js/jquery-3.3.1.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<style>
body
{
    color: white;
}
</style>
</head>
<body>
    
    <form class="form-signin contents" action="" method="POST">
      <div class="text-center mb-4">
   <span class="text-success">   <i class="fa fa-user-circle fa-5x"></i></span>
        <br><h1 class="h4 mb-3 font-weight-normal">ADMIN INSTALLATION</h1>
        <p>Hello, please provide your details below</p>
      </div>
      <?php
      if(!empty($msg))
      {
      	echo "<br><div class='alert alert-warning'>$msg</div>";
      }
      ?>

      <div class="form-group">
      <label>Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>


      <div class="form-group">

<label>Username:</label>
  <input type="text" name="user" maxlength="20" class="form-control" placeholder="Username" required>
</div>


      <div class="form-group">

<label>Password:</label>
  <input type="password" name="pass" class="form-control" placeholder="Password" required>
</div>
      <div class="form-group">

<label>Confirm Password:</label>
  <input type="password" name="cpass" class="form-control" placeholder="Retype Password" required>
</div>

      <button class="btn btn-success btn-block" name="submit" type="submit">Become an admin</button>
    <p/>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2020 Yabatech</p>
    </form>
</body>
</html>
