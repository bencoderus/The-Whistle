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
    <title>Admin Dashboard</title>
</head>
<body>
    <br>
    <div class="container">
  <br>  <p class='text-right'>
</p>    <br>
    

<div class="row">
<div class="col-lg-9"><h3 class='text-success'>DASHBOARD</h3></div>
<div class="col-lg-3"><h6 class='text-dark'> Hello <?php echo($user); ?> <a href="logout">[LOGOUT]</a></h3></div>
</div>
<br>
<div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-bell"></i>
                  </div>
                  <div class="mr-5">Unread report</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="unread">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-fw fa-envelope"></i>
                  </div>
                  <div class="mr-5">All Reports</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="report">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="mr-5">Starred Report</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="starred">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-trash"></i>
                  </div>
                  <div class="mr-5">Trash Report</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="trash">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            </div>
<!--end of cards-->

<br><br>


<div class="row">
<div class="col-lg-10"><h3 class='text-success'>LATEST REPORTS</h3></div>
<div class="col-lg-2"><h6 class='text-dark'><i class='fa fa-bell'></i> <?php echo($rcount); ?> UNREAD</h3></div>
</div>
<br>
<?php
$sql="SELECT * FROM report WHERE status=0 ORDER BY id DESC";
$query=$dbcon->query($sql);
$count=$query->num_rows;
if($count < 1)
{
echo "<h2 class='text-center'>NO NEW REPORT TIP HAS BEEN RECIEVED YET</h2>";
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
?>
    </div>
</body>
</html>
<?php
include('../foot.php');
?>