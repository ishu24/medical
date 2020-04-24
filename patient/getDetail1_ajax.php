<?php 
	include_once("header.php");
?>
<br><br>
<style>
.layout{
    background-color: #f0f8ff;
}

</style>

<?php

	include_once("../class/Doctor.php");
$obj=new Doctor(); 
include_once("../class/User.php");
$obj1=new User(); 
$temp="";
if(isset($_GET["city"]))
{
$city=$_GET["city"];

$rec1=$obj1->select3($city);

$data="	  <div class='layout'><br> <br><br> <div class='page-header'><center><h1>specialist List</h1></center>
<br></div>
 ";
 //print_r($rec1);
 while($result1=mysqli_fetch_array($rec1)){
 	$rec=$obj->selall($result1[0]);
//print_r($rec);
 	while($result=mysqli_fetch_array($rec))
{	
	//print_r($result);
	$data.="<div class='row'>
				<div class='col-md-offset-1 col-md-3'>
                	<div class='panel panel-primary' style='width: 250px; height: 250px; '>
            <div class='panel-heading'><h4>".$result[5]."</h4></div>
			<div class='panel-body'><a href='submitappointment.php?Id=".$result[0]."&Skill=".$result[5]."&Policy=".$result[4]."'>
                        <div class='preview preview-md'><img style='width: 220px; height: 160px; ' src='../img/".$result[5]."'></div>
					<br />
						</div></a>
                    </div></div>";
 }
 }

 $data.="</div";
 echo $data;
}
 ?>

<?php 
	include_once("footer.php");
?>
	

	<!-- script tags
	============================================================= -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="js/gmaps.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>