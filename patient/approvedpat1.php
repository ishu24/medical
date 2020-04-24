<?php
	include_once("header.php");
?>
<br><br><br><br>
<style>
.layout{
    background-color: #f0f8ff;
}

</style>
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
//print_r($uid);
$rec4=$obj1->seldid($uid);
$result4=mysqli_fetch_array($rec4);
$pre="";
if(isset($_POST["btnSub"])){
	if(isset($_GET["Id2"]))
{
	$id=$_GET["Id2"];
	
	$pre=$_POST["txtPre"];
	
	if(isset($_POST["chksta"]))
	{
	$st=3;
	$sta="checked";
	}
	
	$obj3->set_Statusid($st);
	$obj3->set_Prescription($pre);
	$obj3->update1($obj3,$id,$result4[0]);
	header('location:../patient/approvedpat.php');
}
}

?>
<div class="layout">
<section class="about text-center" id="about">
		<div class="container">
			
			 <br><br>
				<h1>Patient detail</h1>
				
				<form  method="post" id="form-validate">
       		<div class="form-group">
				<label class="col-sm-4 control-label">status</label>
				<div class="col-sm-1">
						<input name="chksta" type="checkbox" class="form-control tagsinput">
				</div>
			</div>
           <br><br><br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Prescription</label>
				<div class="col-sm-5">
						<textarea name="txtPre"  class="form-control tagsinput"></textarea>
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
  