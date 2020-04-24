<html style="overflow: hidden;" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <title>Profile</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="" name="description">
   <meta content="" name="author">
     

</head>

<?php
	include_once("header.php");
?>
        
<div class="row-fluid">
                 <!-- BEGIN PROFILE PORTLET-->
                 <div class=" profile span12">
                    
                     <?php
include_once("../class/User.php");
$obj=new User(); 
$temp="";
$Uid=$_SESSION["uid"];
$rec=$obj->display1($Uid);

if($result=mysqli_fetch_array($rec))
{	
	


        $data.="    <div class='span10'>
                    
                       
						 <div class='space15'></div>
                         
						 <div class='row-fluid'>
                             <div class='span8 bio'>
     	 
			    <div class='panel panel-default'>
				
				<div class='panel-heading'><strong><h3>BIO GRAPH</h3></strong></div>
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
                                 <a href='editprofile.php'><input type='button' class='btn' value='Edit Profile'></input> </a>
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
    <!-- JQuery v1.9.1 -->
	<script src="assets/js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/underscore/underscore-min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    
    <!-- Globalize -->
    <script src="assets/js/globalize/globalize.min.js"></script>
    
    <!-- NanoScroll -->
    <script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    
    <!-- Chart JS -->
    <script src="assets/js/plugins/DevExpressChartJS/dx.chartjs.js"></script>
    <script src="assets/js/plugins/DevExpressChartJS/world.js"></script>
   	<!-- For Demo Charts -->
    <script src="assets/js/plugins/DevExpressChartJS/demo-charts.js"></script>
    <script src="assets/js/plugins/DevExpressChartJS/demo-vectorMap.js"></script>
    
    <!-- Sparkline JS -->
    <script src="assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- For Demo Sparkline -->
    <script src="assets/js/plugins/sparkline/jquery.sparkline.demo.js"></script>
    
    <!-- Angular JS -->
    <script src="../../../ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.14/angular.min.js"></script>
    <!-- ToDo List Plugin -->
    <script src="assets/js/angular/todo.js"></script>
    
    
    
    <!-- Calendar JS -->
    <script src="assets/js/plugins/calendar/calendar.js"></script>
    <!-- Calendar Conf -->
    <script src="assets/js/plugins/calendar/calendar-conf.js"></script>
	
    
    
    <!-- Custom JQuery -->
	<script src="assets/js/app/custom.js" type="text/javascript"></script>
    

    
	<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    
    ga('create', 'UA-56821827-1', 'auto');
    ga('send', 'pageview');
    
    </script>
</body>
</html>
