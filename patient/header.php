<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>DOCTOR - Responsive HTML &amp; Bootstrap Template</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="css/style.css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=BenchNine:300,400,700" rel="stylesheet" type="text/css">
	<script src="js/modernizr.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
		<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/ >
	<!--[if lt IE 9]>
      <script src='js/html5shiv.js'></script>
      <script src='js/respond.min.js'></script>
    <![endif]-->

</head>
<body>
	
	<!-- ====================================================
	header section -->
	
					      <?php
session_start();
include_once("../class/User.php");
	$obj=new User(); 
	$Uid=$Utid="";
	
	if(isset($_SESSION["uid"]))
	{
	$Uid=$_SESSION["uid"];
$Utid=$_SESSION["utid"];

	}
$data="<header class='top-header'>
		<div class='container'>
			<div class='row'>
				<div class='col-xs-5 header-logo'>
					<br>
					<a href='index.html'><img src='img/logo.png' alt='' class='img-responsive logo'></a>
				</div>

				<div class='col-md-7'>
					<nav class='navbar navbar-default'>
					  <div class='container-fluid nav-bar'>
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class='navbar-header'>
					      <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
					        <span class='sr-only'>Toggle navigation</span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					      </button>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>";


	
		
    if($Uid==NULL)
	{        
            
       $data.="   <ul class='nav navbar-nav navbar-right'>
					        <li><a href='index.php' >Home</a></li>
					        <li ><a href='aboutus.php' title='aboutus' >About Us</a></li>
							<li ><a href='login.php' title='login' >Login</a></li>
					        <li ><a href='registration.php' title='Register' >Register</a></li>
					      </ul>";
  
    }
	else
	{
		$rec=$obj->display1($Uid);
   $result=mysqli_fetch_array($rec);
		if($Utid=='2')
		{
	$data.=" <ul class='nav navbar-nav navbar-right'>
					        <li><a href='index.php' >Home</a></li>
					        <li ><a href='aboutus.php' title='aboutus' >About Us</a></li>
				<li ><a href='bookappointment.php' title='Appointment' >Book-Appointment</a></li>
				<li ><a href='appointment.php?Id=".$Uid."' title='Appointment' >Appointments</a></li>
				";
		}
		if($Utid=='1')
		{
	$data.=" <ul class='nav navbar-nav navbar-right'>
					        <li><a href='index.php' >Home</a></li>
					        <li ><a href='aboutus.php' title='aboutus' >About Us</a></li>
				
				               ";
		}
		else if($Utid=='3')
		{
			$data.=" <ul class='nav navbar-nav navbar-right'>
					        <li><a href='index.php' >Home</a></li>
					        <li ><a href='aboutus.php' title='aboutus' >About Us</a></li>
				<li ><a href='patientdoc.php' title='Appointment' >Patients</a></li>
				               ";
		}
		else if($Utid=='4')
		{
			$data.=" <ul class='nav navbar-nav navbar-right'>
					        <li><a href='index.php' >Home</a></li>
					        <li ><a href='aboutus.php' title='aboutus' >About Us</a></li>
				<li ><a href='patientmed.php' title='Appointment' >Customers</a></li>
				               ";
		}
		$data.="<li ><a href='profile.php?id=".$result[7]."' title='Sign In' >$result[0]</a></li>
				
                                <li ><a href='logout.php' title='logout' >Log out</a></li>";
                               
		
	}		
	 $data.="   </ul></div>";
	echo $data;	
	?>
					     
					    </div><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- end of header area -->
