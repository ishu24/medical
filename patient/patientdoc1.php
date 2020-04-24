<?php 
	include_once("header.php");
?>
<br><br><br><br><br><br>
<style>
.layout{
    background-color: #f0f8ff;
}

</style>
<

<?php

include_once("../class/User.php");
include_once("../class/Doctor.php");
include_once("../class/Medicalstore.php");
include_once("../class/Appointment.php");
$obj=new User();
$obj1=new Doctor();
$obj2=new Medicalstore();
$obj3=new Appointment();
$uid=$_SESSION["uid"];
$rec4=$obj1->seldid($uid);
$result4=mysqli_fetch_array($rec4);
if(isset($_POST["btnSub"])){
	if(isset($_GET['id']))
{
	$status=1;
	
	 $dt=$_POST["txtDate"];
	 $tm=$_POST["txtTime"];
	 $combinedDT = $dt;
	 $combinedDT.=" ";
	$combinedDT.=$tm;
		$id=$_GET['id'];
	
	$obj3->set_Statusid($status);
	$obj3->set_Dtime($combinedDT);
		$obj3->update($obj3,$id,$result4[0]);
//print_r($obj3);
		header('location:../patient/patientdoc.php');

}
}


?>
<div class="layout">
<section class="about text-center" id="about">
		<div class="container">
			
			 
				<h1>Patient detail</h1>
				
				<form  method="post" id="form-validate">
					<br>
       		<div class="form-group">
				<label class="col-sm-1 col-sm-offset-4 control-label">Date</label>
				<div class="col-sm-2">
						<input type='date' id='txtDate'  name='txtDate' >
				</div>
			</div>
           <br><br><br>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-4 control-label">Time</label>
				<div class="col-sm-1">
						<input type='time' id='txtTime' name='txtTime' />
				</div>
			</div>
			
				
       		</div>				 
                   <div class="buttons-set">
           <br><br>
                        <button type="submit" name="btnSub" title="Submit" class="btn"><span><span>Submit</span></span></button>
        </div>
                 
							</form>
			
		
	</section><!-- end of about section -->

			<?php
	include_once("footer.php");
?>        
  