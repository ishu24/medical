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
$temp="";
$rec=$obj->select1();
if(isset($_POST["btnsrch"]))
{
	$city=$_POST["txtsrch"];
	echo "<script type='text/javascript'>location.href = 'getDetail1_ajax.php?city=".$city."'</script>";

}
$data="	  <div class='layout'><br> <br><br> <div class='page-header'><center><h1>specialist List</h1></center>
<br></div>
<div class='row'>
<div class='col-md-offset-10 col-md-2'>
	<form method='post'>
		<label>Search By City</label>&nbsp;
		<input name='txtsrch' type='text'>
		<input type='submit' name='btnsrch'>
	</form>
	</div></div>
	<br>
	<div id='pan'></div>
 ";
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
 $data.="</div";
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