<?php

/**
PROJECT:  ONENAIRA PROJECT
AUTHOR: BENART IDUWE
DATE: MAY 2018
VERSION: 1.0


**/
require('config.php');
date_default_timezone_set("Africa/Lagos");
session_start();

?>
<?php
if(empty($nav1))
{
  $nav1=""; 
}
if(empty($nav2))
{
  $nav2=""; 
}
if(empty($nav3))
{
  $nav3=""; 
}
if(empty($nav4))
{
  $nav4=""; 
}
if(empty($nav5))
{
  $nav5=""; 
}

if(empty($nav6))
{
  $nav6=""; 
}
?>

	<!DOCTYPE HTML>
<html>
<head>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/theme.css'>
<link rel='stylesheet' href='../css/style.css'>
<link rel='stylesheet' href='../css/font-awesome.css' media='all' />
<meta name='viewport' content='width=device-width, initial-scale=1'>
<style>
.space
{
  padding-left: 12px;
  padding-right: 12px;
}
</style>
<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>

<!----Nav bar------>
<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark hdd">
  <div class="container">
  <a class="navbar-brand text-light h4" href="<?php echo($appurl); ?>"><b><?php echo($appname); ?></b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item <?php echo($nav1); ?>">
        <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php echo($nav2); ?>">
        <a class="nav-link" href="../about">About</a>
      </li>

      <li class="nav-item <?php echo($nav3); ?>">
        <a class="nav-link" href="../report">Report</a>
      </li>

      <li class="nav-item <?php echo($nav4); ?>">
        <a class="nav-link" href="../contact">Contact</a>
      </li>
    </ul>

  </div></div>
</nav>
<br><br>