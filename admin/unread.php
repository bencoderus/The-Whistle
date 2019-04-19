<?php
include('../head.php');
include('check.php');
$user=$_SESSION['admin'];
$rsql="SELECT * FROM report WHERE status=0";
$rquery=$dbcon->query($rsql);
$rcount=$rquery->num_rows;
$datetime=date("d M, Y h:i:A", time());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unread Report</title>
</head>
<body>
<br><br>
<div class='container'>
<div class="row">
<div class="col-lg-10"><h3 class='text-success'>UNREAD REPORTS</h3></div>
<div class="col-lg-2"><h6 class='text-dark'><i class='fa fa-bell'></i> <?php echo($rcount); ?> UNREAD</h3></div>
</div>
<br>
<?php
$sql="SELECT * FROM report WHERE status=0 AND trash=0 ORDER BY id DESC";
$query=$dbcon->query($sql);
$count=$query->num_rows;
if($count < 1)
{
echo "<h2 class='text-center'>NO REPORT TIP HAS BEEN RECIEVED YET</h2>";
} 
else
{
while($row=$query->fetch_assoc())
{
$id=$row['id'];
$tiptype=$row['type'];
$orgtype=$row['orgtype'];
$orgname=$row['orgname'];
$tdate=ago($row['tdate']);
$des=$row['note'];
$orgaddress=$row['orgaddress'];
$amount=$row['amount'];
$fullname=ucwords($row['fullname']);
$mobile=$row['mobileno'];
$email=$row['email'];
$date=ago($row['date']);
echo "<b>$fullname</b> just reported a $tiptype case related to <b>$orgname</b> $date <a href='view?id=$id' class='font-weight-bold'>[Learn More]</a> <br><hr> ";
}
}
?></div>
    </div>
</body>
</html>
<?php
include('../foot.php');
?>