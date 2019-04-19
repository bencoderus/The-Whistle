<?php
$nav1="active";
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo($appname); ?> - Report a case today</title>
    <style>
    @media only screen and (min-width: 768px) {
    	.sliderposition
    	{
    		bottom: 400px !important;
    	}
    }

    </style>
</head>
<body>

    <div class="carousel-item active">
      <img class="d-block w-100" src="images/home.jpg" alt="First slide">

        <div class="carousel-caption sliderposition">
<div class="d-none d-md-block">  
<h1 class="text-light">Federal Republic of Nigeria</h1>
<p class="lead">Federal Ministry of Finance Whistleblowing Portal</p>
<p>"Improving Public Institutional Governance"</p>
    <p><a href="report"><button class="btn btn-outline-light leadbtn btn-lg"><i class="fa fa-envelope"></i> SUBMIT A TIP TODAY</button>
    </a></p>
</div>


  </div>
<div class="leadcontent"><div class="container text-justify"> The Federal Ministry of Nigeria, FMF is a secure, online portal through which information bordering on violation of financial regulations, mismanagement of public funds and assets, finanial malpractice or fraud and theft that is deemed to be in the interest of the public can be disclosed.

<br><br>
<center>
<a href="report" class="text-dark font-weight-bold">Report a Tip Today</a></center>
</div></div>
<?php
include('foot.php');
?>    
</body>
</html>
