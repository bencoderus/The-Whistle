<?php
include('../head.php');
include('check.php');
include('../class/report.php');

echo "<br><br><div class='container'>";

$id=(int)$_GET['id'];

if(isset($_POST['star']))
{
$send=Report::star($id);
if($send)
{
    echo "<div class='alert alert-info'>Successful Starred!</div>";
}
else{
echo "<div class='alert alert-warning'>Unsuccessful!</div>";
}
}
if(isset($_POST['unstar']))
{
$send=Report::unstar($id);
if($send)
{
    echo "<div class='alert alert-info'>Successful Unstarred!</div>";
}
else{
echo "<div class='alert alert-warning'>Unsuccessful!</div>";
}
}
if(isset($_POST['trash']))
{
$send=Report::trash($id);
if($send)
{
    echo "<div class='alert alert-info'>Successful Trashed!</div>";
}
else{
echo "<div class='alert alert-warning'>Unsuccessful!</div>";
}
}
if(isset($_POST['untrash']))
{
$send=Report::untrash($id);
if($send)
{
    echo "<div class='alert alert-info'>Successful Untrashed!</div>";
}
else{
echo "<div class='alert alert-warning'>Unsuccessful!</div>";
}
}

$sql="SELECT * FROM report WHERE id=$id";
$query=$dbcon->query($sql);
$count=$query->num_rows;
if($count < 1)
{
echo "<h2 class='text-center'>REPORT NOT FOUND</h2>";
} 
else
{
$row=$query->fetch_array();
$tiptype=$row['type'];
$orgtype=$row['orgtype'];
$orgname=$row['orgname'];
$tdate=ago($row['tdate']);
$des=$row['note'];
$file=$row['file'];
$orgaddress=$row['orgaddress'];
$amount=$row['amount'];
$fullname=ucwords($row['fullname']);
$mobile=$row['mobileno'];
$email=$row['email'];
$trash=$row['trash'];
$starred=$row['starred'];
$date=ago($row['date']);
$status=$row['status'];
$stat=Report::getstatus($status);
if($status==0)
{
$dbcon->query("UPDATE report SET status=1 WHERE id=$id");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo("Report about " .$orgname); ?></title>
</head>
<body>
 <?php
 echo "<h3 class='text-uppercase'>REPORT ABOUT $orgname</h3><br>
 <p><b>Reported:</b> $date</p>
 <p><b>Status:</b> $stat</p>
 <p><b>Report Type:</b> $tiptype</p>
 <hr>
 <p class='text-justify'>$des</p>
<br>
 <p><b><i class='fa fa-file text-info'></i> Supporting Document:</b></p>
 <a href='../documents/$file'>View Attached Document</a>
<br><hr>

<br>
<p><b><i class='fa fa-feed text-info'></i> About Organization:</b></p>
<p><b>Organization Type:</b> $orgtype</p>
<p><b>Organization Name:</b> $orgname</p>
<p><b>Organization Address:</b> $orgaddress</p>
<br><hr>

 <p><b><i class='fa fa-envelope text-info'></i> Contact Author</b></p>
 <p><b>Full name:</b> $fullname</p>
 <p><b>Email:</b> $email</p>
 <p><b>Phone number:</b> $mobile</p>
 ";
 
 ?><center>
 <form action="" method="POST">
 <?php
 if($starred==0)
 {
echo "<button class='btn btn-info' name='star'><i class='fa fa-star'></i> Star</button>";
 }
 else
 {
    echo "<button class='btn btn-info' name='unstar'><i class='fa fa-star'></i> Unstar</button>";
 }
 if($trash==0)
 {
echo "<button class='btn btn-danger' name='trash'><i class='fa fa-trash'></i> Trash</button>";
 }
 else
 {
    echo "<button class='btn btn-danger' name='untrash'><i class='fa fa-trash'></i> Untrash</button>";
 }
 ?>
 </form>
 </center>
 </div>
</body>
</html>

<?php
}
include('../foot.php');
?>