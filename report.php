<?php
$nav3="active";
include('head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report a tip today - <?php echo($appname); ?></title>
</head>
<body>
<div class="carousel-item active">
      <img class="d-block w-100" src="images/home.jpg" alt="First slide">

        <div class="carousel-caption sliderposition">
<h1 class="text-light">Submit Tip - Whistleblowing</h1>
<p class="lead">Every information submitted on our portal is secured</p>
</div></div><br>

    <div class="container">
    
<?php
if(isset($_POST['submit']))
{
$tiptype=$_POST['tiptype'];
$orgtype=$_POST['orgtype'];
$orgname=$_POST['orgname'];
$tdate=strtotime($_POST['tdate']);
$des=$_POST['des'];
$orgaddress=$_POST['orgaddress'];
$amount=$_POST['amount'];
$fullname=$_POST['fullname'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$folder="documents/";
$date=time();
$allowed_types=array('.jpg', '.pdf', '.wav', '.mp4', '.mp3', '.doc', '.docx', '.png', '.jpeg');
$filename=$_FILES["file"]["name"];
$ext=substr($filename, strpos($filename, '.'), strlen($filename)-1);
$ext=strtolower($ext);
$newfile="report" .time().$ext;
if(!isset($_FILES["file"]) || $_FILES["file"]["size"]==0)
{
echo"<div class='alert alert-warning'>No file was selected</div>";
}
elseif(!in_array($ext, $allowed_types))
{
echo"<div class='alert alert-warning'>$ext is not an allowed type</div>";
} elseif(!file_exists($folder)) { echo"<div class='alert alert-warning'>folder don't exist</div>";
} elseif(!is_writable($folder)) {
echo"<div class='alert alert-warning'>folder not writable</div>";
}
else
{
if(move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$newfile))
{
$sql="INSERT INTO report(orgtype,orgname,orgaddress,type,tdate,note,amount,file,fullname,email,mobileno,date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=$dbcon->prepare($sql);
$stmt->bind_param("ssssisissssi", $orgtype, $orgname, $orgaddress, $tiptype, $tdate, $des, $amount, $newfile, $fullname, $email, $mobile, $date);
$send=$stmt->execute();
if($send)
{
$msg="Your report has been submit, we will get back to you shortly!";
echo "<div class='alert alert-success'>$msg</div>";
}
else
{
$error=mysqli_error($con);
echo"<div class='alert alert-warning'>Failed! $error</div>";
}
}
else
{
echo"<div class='alert alert-warning'>Upload Failed!</div>";
}
}
}
?><br>
<form action='' enctype='multipart/form-data' method='POST'>    
    <div class="row form-group">
    <div class="col-lg-3"><label>Tip Type:</div>
    <div class="col-lg-9">
<select name='tiptype' required>
<option value=''>
Select
</option>
<option value='Diversion of resources'>
Diversion of resources
</option>
<option value='Non remittance of public funds'>
Non remittance of public funds
</option>

<option value='Fradulent payments'>
Fradulent payments
</option>
<option value='Fruad'>
Fruad
</option>
<option value='Corruption'>
Corruption
</option>
<option value='Manipulation of data/record'>
Manipulation of data/record
</option>
<option value='Laundering of funds'>
Laundering of funds
</option>
<option value='Mismanagement of public funds'>
Mismanagement of public funds
</option>
<option value='Conversion of public funds for personal use'>
Conversion of public funds for personal use
</option>
<option value='Uncategorised'>
Uncategorised
</option>
</select>
    </div>
    </div>
    <div class="row form-group">
    <div class="col-lg-3"><label>Organization Type:</div>
    <div class="col-lg-9">
    <input type='radio' name='orgtype' value='Ministry'> Ministry     <input type='radio' name='orgtype' value='Department'> Department     <input type='radio' name='orgtype' value='Agency'> Agency 
    </div>
    </div>
<br>
<div class='row form-group'>
        <div class="col-lg-3"><label>Organization Name:</div>
    <div class="col-lg-9">
    <input type='text' name='orgname' class='form-control' required>
    </div>
    </div>

    <div class='row form-group'>
        <div class="col-lg-3"><label>Organization Address:</div>
    <div class="col-lg-9">
    <textarea name='orgaddress' rows='3' class='form-control' placeholder='Brief description' required>
    </textarea>
    </div>
    </div>
    <div class='row form-group'>
        <div class="col-lg-3"><label>Date of transaction:</div>
    <div class="col-lg-9">
    <input type='date' name='tdate' class='form-control' required>
    </div>
    </div>

    <div class='row form-group'>
        <div class="col-lg-3"><label>Description:</div>
    <div class="col-lg-9">
    <textarea name='des' rows='3' class='form-control' placeholder='Brief description' required>
    </textarea>
    </div>
    </div>
    
    <div class='row form-group'>
        <div class="col-lg-3"><label>Amount (&#8358;) concerned:</div>
    <div class="col-lg-9">
    <input type='number' name='amount' class='form-control' required>
    </div>
    </div>
    
    <div class='row form-group'>
        <div class="col-lg-3"><label>Supporting Document:</div>
    <div class="col-lg-9">
    <input type='file' name='file' required>
    </div>
    </div>

    
    <div class='row form-group'>
        <div class="col-lg-3"><label>Full name:</div>
    <div class="col-lg-9">
    <input type='text' name='fullname' class='form-control' required>
    </div>
    </div>

    
    <div class='row form-group'>
        <div class="col-lg-3"><label>Telephone:</div>
    <div class="col-lg-9">
    <input type='number' name='mobile' min="11" class='form-control' required>
    </div>
    </div>

<div class='row form-group'>
        <div class="col-lg-3"><label>Email:</div>
    <div class="col-lg-9">
    <input type='email' name='email' class='form-control'  required>
    </div>
    </div>
    
<div class='form-group text-center'>
<button class='btn btn-lg btn-danger' name='submit' type='submit'>Submit Tip!</button>
</div>
</form>
</body>
</html>
<?php
include('foot.php')
?>