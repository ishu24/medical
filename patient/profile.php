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
<style>
.layout{
    background-color: #f0f8ff;
}

</style>    
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
<br><br><br><br><br><br>
<div class="row-fluid">
                 <!-- BEGIN PROFILE PORTLET-->
                 <div class=" profile span12">
                    
                     <?php
include_once("../class/User.php");
$obj=new User(); 
if(isset($_GET["id"])){
    $Uid=$_GET["id"];
}
//$Uid=$_SESSION["uid"];
$rec=$obj->display1($Uid);

if($result=mysqli_fetch_array($rec))
{   
    


        $data="   <div class='layout'> <div class='span10'>
                    
                       
                         <div class='space15'></div>
                         
                         <div class='row-fluid'>
                             <div class='span8 bio'>
         
                <div class='panel panel-default'>
                
                <div class='panel-heading'><h2>BIO GRAPH</h2></div>
                    <div class='panel-body'>
                            
                                 
                                <thead>
                                 <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered' id=basic-datatable>
                        
                                <tr><td> <label>First Name </label></td><td> ".$result[0]."</td></tr>
                                 <tr><td><label>Last Name </label></td><td> ".$result[1]."</td></tr>
                                 <tr><td> <label>Birthday </label></td><td> ".$result[5]."</td></tr>
                                 <tr><td><label>Mobileno </label></td><td> ".$result[2]."</td></tr>
                                 <tr><td><label>Address </label></td><td> ".$result[3]."</td></tr>
                                 <tr><td><label>City </label></td><td> ".$result[6]."</td></tr>
                                 <tr><td><label>Email </label></td><td> <a href='#'>".$result[4]."</a></td></tr>
                                 <div class='space15'></div>
                                 </table>
                                </thead>

                                
                            <div class='span8'>
                               <center>  <a href='editprofile.php'><input type='button' class='btn' value='Edit Profile'></input> </a></center>
                             </div>";
         ;
}
$data.="</div>
                </div></div></div></div>";
echo $data;                             
 ?>
   
                     </div> 
                      </div> 
                        
                          <!-- END PROFILE PORTLET-->
              
<?php 
    include_once("footer.php");
?>
    

    
</body>
</html>