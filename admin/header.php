<!DOCTYPE html>
<html lang="en">


<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin panel</title>

	<meta name="description" content="">
	<meta name="author" content="ishani">
	

	<!-- Typeahead Styling  -->
    <link rel="stylesheet" href="assets/css/plugins/typeahead/typeahead.css" />
   
    <!-- Switch Buttons  -->
    <link rel="stylesheet" href="assets/css/switch-buttons/switch-buttons.css" />
    
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css" /> 

	<!-- Typeahead Styling  -->
    <link rel="stylesheet" href="assets/css/fontawesome/font-awesome.css" />
    
    <!-- TagsInput Styling  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    
    <!-- Chosen Select  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-chosen/chosen.css" />
    
    <!-- Datetime picker Picker  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css" />
    
    
	<!-- Calendar Styling  -->
    <link rel="stylesheet" href="assets/css/plugins/calendar/calendar.css" />
    
    <!-- Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
    
    <!-- Base Styling  -->
    <link rel="stylesheet" href="assets/css/app/app.v1.css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
 
<body >
<?php 
  session_start();
		include_once("../class/User.php");
	$obj=new User(); 
	$Uid=$Utid="";
	$Uid=$_SESSION["uid"];
$Utid=$_SESSION["utid"];

	$rec=$obj->display1($Uid);

$data="	<aside class='left-panel'>
    		
            <div class='user text-center'>";

	if($result=mysqli_fetch_array($rec))
	{
			$data.="<h4 class='user-name'>Welcome ".$result[0]."&nbsp;".$result[1]."</h4>";
	}

	$data.="</div>
	<nav class='navigation'>
            	<ul class='list-unstyled'>
                	<li class='active'><a href='index.php'><i class='fa fa-bookmark-o'></i><span class='nav-label'>Dashboard</span></a></li>
               ";
	
	
      
       $data.="    
                    <li class='has-submenu'><a href='adddoctor.php'><i class='fa fa-stethoscope'></i> <span class='nav-label'>Doctor</span></a>
                    	<ul class='list-unstyled'>
						<li><a href='adddoctor.php'>Add Doctor</a></li>
                        	<li><a href='display_doctor.php'>View Doctor</a></li>
							                         </ul>
                    </li>
					 <li class='has-submenu'><a href='addmedicalstore.php'><i class='fa fa-home'></i> <span class='nav-label'>Medical Store</span></a>
                    	<ul class='list-unstyled'>
						<li><a href='addmedicalstore.php'>Add Medicalstore</a></li>
                        	<li><a href='display_medicalstore.php'>View Medicalstore</a></li>
							                         </ul>
                    </li>
					
					
				";

	 $data.="    </ul>
            </nav>
            
    </aside>";
	echo $data;	
		
  ?>  
    <!-- Aside Ends-->
    
    <section class="content">
    	
        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <form role="search" class="navbar-left app-search pull-left hidden-xs">
              <input type="text" placeholder="Enter keywords..." class="form-control form-control-circle">
         	</form>
            
            <nav class=" navbar-default hidden-xs" role="navigation">
                <ul class="nav navbar-nav">
                <li><a href="../patient/index.php">Go to website</a></li>
                
              </ul>
            </nav>
            
            <ul class="nav-toolbar">
            	                <li class="dropdown"><a href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                	<div class="dropdown-menu lg pull-right arrow panel panel-default arrow-top-right">
                    	<div class="panel-heading">
                        	More 
                        </div>
                        <div class="panel-body text-center">
                        	<div class="row">
                            	<div class="col-xs-6"><a href="profileA.php" class="text-green"><span class="h2"><i class="fa fa-user"></i></span><p class="text-gray">My Profile</p></a></div>
                                
								<div class="col-xs-6"><a href="logout.php" class="text-yellow"><span class="h2"><i class="fa fa-sign-out"></i></span><p class="text-gray">Log Out</p></a></div>
                                
                            </div>
                        </div>
                    </div>
                </li>
				
            </ul>
        </header>
        <!-- Header Ends -->
		