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
$filepath=$file_name_all1="";
	include_once("../class/Appointment.php");

include_once("../class/Doctor.php");
include_once("../class/User.php");
$obj1=new Doctor(); 
$obj2=new User(); 
$obj=new Appointment(); 
$did=$uid=$des=$sid="";
if(isset($_GET["Id"]))
	{
		$did=$_GET["Id"];
	}
	if(isset($_GET["Skill"]))
	{
		$Skill=$_GET["Skill"];
	}
	if(isset($_GET["Policy"]))
	{
		$Policy=$_GET["Policy"];
	}
$rec1=$obj1->seluid($did);

$result=mysqli_fetch_array($rec1);
//print_r($result[0]);
$rec=$obj2->select1($result[0]);
$result1=mysqli_fetch_array($rec);
//print_r($result1);
//var_dump($_POST);
if(isset($_POST["btnSub"]))
{
	
	$des=$_POST["txtDes"];
	$id=$did;
	$uid=$_SESSION["uid"];
	if(isset($_FILES['FileImg'])){
    								
    							foreach($_FILES["FileImg"]["name"] as $file=>$name)
    							{
    									$menuimage=$_FILES["FileImg"]["name"][$file];
	    								$menuimage_tmp=$_FILES["FileImg"]["tmp_name"][$file];
	    								$path="reports/".$id.$uid.$menuimage;
	                  					$pathmenu=preg_replace("/\s+/","",$path);
	                  					$menuimage_ext=array('jpg','png','gif','jpeg','pdf','doc');
	                  					$upload_menuimage_ext=pathinfo($menuimage,PATHINFO_EXTENSION);
	                  					//list($txt, $ext) = explode(".", $menuimage);
	         
	                  					if(move_uploaded_file($menuimage_tmp, $pathmenu))
	                  					{
	                  						$file_name_all1.=$path.",";
	                  						$filepath = rtrim($file_name_all1,',');
	                  					}

	                  			}
	                  		}
	                  		/*$file1=$_FILES["txtFile1"]["name"];
		$file1s=$_FILES["txtFile1"]["size"];
		$file1t=$_FILES["txtFile1"]["type"];
		$file1tmp=$_FILES["txtFile1"]["tmp_name"];
		
		if($file1!="")
		{
			move_uploaded_file($file1tmp,"reports/".$id.$uid.$file1);
			$a="reports/".$id.$uid.$file1;
		}*/
	$obj->set_Doctorid($id);
	$obj->set_Userid($uid);
	$obj->set_Description($des);
	$obj->set_Report($filepath);

	$obj->insert($obj);
	//print_r($obj);
	//header('location:../patient/confirmregistration.php');
}
$data="	<div class='layout'><br>  <br><br> <div class='page-header'><center><h1>Book Appointment</h1></center></div> 
<section class='about text-center' id='about'>
			
		 <form  method='post' id='appointment-form' enctype='multipart/form-data'>
        	<div class='form-group'>
       			<label class='col-sm-2 col-sm-offset-4 control-label'>Doctor name</label>
					<div class='col-sm-2'>
			      		 <input type='text' value='".$result1[0]."". $result1[5]."' name='txtdnm' >
					</div>
			</div>
			<br><br>
       		<div class='form-group'>
       			<label class='col-sm-2 col-sm-offset-4 control-label'>Email</label>
					<div class='col-sm-2'>
			      		 <input type='text' value='".$result1[3]."' name='txtdnm' ></input>
					</div>
			</div>
           <br>
           <div class='form-group'>
       			<label class='col-sm-2 col-sm-offset-4 control-label'>Address</label>
					<div class='col-sm-2'>
			      		 <textarea  >".$result1[2].",".$result1[4]."</textarea>
					</div>
			</div>
           <br><br>
           <div class='form-group'>
       			<label class='col-sm-2 col-sm-offset-4 control-label'>Contact</label>
					<div class='col-sm-2'>
			      		 <input type='text' value='".$result1[1]."' name='txtdnm' >
					</div>
			</div>
           <br>
          <div class='form-group'>
       			<label class='col-sm-2 col-sm-offset-4 control-label'>Image</label>
					<div class='col-sm-2'>
			      		 <img src='../img/".$result1[6]."' height='100' weight='100' >
					</div>
			</div>
           <br><br>
           <div class='form-group'>
       			<label class='col-sm-2 col-sm-offset-4 control-label'>Gender</label>
					<div class='col-sm-2'>
			      		 <input type='text' value='".$result1[7]."' name='txtdnm' >
					</div>
			</div>
          	<br><br><br>
           <div class='form-group'>
       			<label class='col-sm-2 col-sm-offset-4 control-label'>Skill</label>
					<div class='col-sm-2'>
			      		 <input type='text' value='$Skill' name='txtSkill' ></input>
					</div>
			</div>
			<br><br>
           <div class='form-group'>
       			<label class='col-sm-2 col-sm-offset-4 control-label'>policy</label>
					<div class='col-sm-2'>
			      		 <textarea name='txtpol' >$Policy </textarea>
					</div>
			</div>";


 echo $data;

 ?>
 <br><br>
 <div class="form-group">
       			<label class="col-sm-2 col-sm-offset-4 control-label">Problem Description</label>
					<div class='col-sm-2'>
			      		 <textarea rows="5" cols="25" name="txtDes" required></textarea>
					</div>
			</div>
			<div class="form-group">
									<label for="exampleInputFile" class="col-sm-2 col-sm-offset-4 control-label">Attach report If any</label>
									<div class="col-sm-2">
										<input type="file" name="FileImg[]" multiple="multiple">
									</div>
									<!-- <div class="col-sm-5">
										<input type="file" name="txtFile1" >
									</div> -->
			</div>
			<br><br><br><br><br><br>
 <div class="form-group">
       			<button type="submit" name="btnSub" title="Submit" class="btn"><span><span>Submit</span></span></button>
			</div>
 

</form>
</section>
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