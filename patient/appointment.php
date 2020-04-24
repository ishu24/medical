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

include_once("../class/Appointment.php");
$obj1=new Appointment(); 
include_once("../class/Doctor.php");
$obj2=new Doctor(); 
include_once("../class/User.php");
$obj3=new User(); 
include_once("../class/Status.php");
$obj4=new Status(); 

if(isset($_GET["Id"]))
{
		$uid=$_GET["Id"];
		$rec1=$obj1->select($uid);
}
$data="	 <div class='layout'><br> <br><br> <div class='page-header'><center><h1>All previous Appointment List</h1></center></div> ";

while($result1=mysqli_fetch_array($rec1))
{	
	$rec2=$obj2->seluid($result1[2]);
	while($result2=mysqli_fetch_array($rec2))
	{
		$rec3=$obj3->select1($result2[0]);
		while($result3=mysqli_fetch_array($rec3))
		{
			$rec4=$obj4->select($result1[4]);
			while($result4=mysqli_fetch_array($rec4))
		{
	$data.="<div class='row'>
				<div class='col-md-offset-1 col-md-3'>
                	<div class='panel panel-primary' style='width: 250px; height: 110px; '>
          				Doctor Name::".$result3[0]."<br>
          				Description:".$result1[3]."<br>
          				Status:".$result4[1]."<br>
          				Date-time:".$result1[5]."<br>
          				Priscription:".$result1[6]."
                    </div>
                </div>";
            }
        }
    }
 }
    $data.="</div><br><br><br><br>";
 echo $data;
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