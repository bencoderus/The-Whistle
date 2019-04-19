<?php
include('head.php');
if(isset($_POST['message']))
{
$to="bencoderus@gmail.com";
$subject=$_POST['subject'];
$email=$_POST['email'];
$message=$_POST['message'];
$msg="$message <br><br> $email";
$send=mail($to, $subject, $msg);
if($send)
{
echo "<div class='alert alert-success'><b>
Mail was successfully sent !
</b></div>";
}
else
{
echo "<br><div class='alert alert-warning'><b>
Mail can not be sent now!
</b></div>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body>
    
<div class="carousel-item active">
      <img class="d-block w-100" src="images/home.jpg" alt="First slide">

        <div class="carousel-caption sliderposition">
<h1 class="text-light">Contact us</h1>
</div></div><br>

    <div class="container"><br><br>
<div class="row">
<div class="col-lg-6">
<form action='' method='POST'>
		<br>
		<label for='subject'>Your email:</label>
			
		<br>
<input type='email' class='form-control' name='email' placeholder='Your email' required>
<br>

			<label for='subject'>Subject:</label>
			
			<br>
	<input type='text' class='form-control' name='subject' placeholder='Subject' required>
		<br>
		<label for='message'>Message:</label>
		
		<br>
	<textarea class='form-control' name='message' placeholder='Type message' rows='5' required></textarea>
        <br>
        <center>
		<button type ='submit' class='btn btn-danger' name='submit'><b> <i class='fa fa-send'></i> Send message</b></button>
</center>		</form><br>


</div>
<div class="col-lg-6"></div>
</div>

    </div>
</body>
</html>
<?php
include('foot.php');
?>