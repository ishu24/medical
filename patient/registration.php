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
$obj=new User();
$pwd=$ut=$cpwd=$fnm=$lnm=$con=$add=$city=$email=$dob=$gen=$img="";

if(isset($_POST["btnSub"]))
{
	$fnm=$_POST["txtFnm"];
	$lnm=$_POST["txtLnm"];
	$email=$_POST["txtEmail"];
	$dob=$_POST["txtDob"];
	$pwd=$_POST["txtPwd"];
	$cpwd=$_POST["txtCpwd"];
	$con=$_POST["txtCon"];
	$add=$_POST["txtAdd"];
	$img=$_FILES["txtFile"]["name"];
	$imgs=$_FILES["txtFile"]["size"];
	$imgt=$_FILES["txtFile"]["type"];
	$imgtmp=$_FILES["txtFile"]["tmp_name"];
	if($img!="")
	{
		move_uploaded_file($imgtmp,"../img/".$img);
		$a="../img/".$img;
	}
	if(isset($_POST["optCity"]))
	{
	$city=$_POST["optCity"];
	}
	$ut=2;
	if(isset($_POST["optGen"]))
	{
	$gen=$_POST["optGen"];
	}
		if($pwd==$cpwd)
	{
	
		$obj->set_Firstname($fnm);
		$obj->set_Lastname($lnm);
		$obj->set_Email($email);
		$obj->set_Password($pwd);
		$obj->set_Address($add);
		$obj->set_City($city);
		$obj->set_Contact($con);
		$obj->set_Usertypeid($ut);
		$obj->set_Image($img);
		$obj->set_DOB($dob);
		$obj->set_Gender($gen);
	$obj->insert($obj);

	//header('location:../patient/confirmregistration.php');	
	//echo $obj;
	}
	else
	{
		 echo "<script type='text/javascript'>alert('password doesn't match!')</script>";
	}
}


?>
<div class="layout">
<section class="about text-center" id="about">
		<div class="container">
			
			 <table class="table">
				<h2>Register</h2>
				
				<form  method="post" id="form-validate">
       
           <div class="form-group">
       			<label class="col-sm-4 control-label">First Name</label>
					<div class="col-sm-5">
			      		 <input type="text" class="form-control tagsinput" Name="txtFnm" Required>
					</div>
			</div>
			<br><br><br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Last Name</label>
					<div class="col-sm-5">
			       		<input type="text" class="form-control tagsinput" Name="txtLnm" Required>
					</div>
        	 </div>
        	 <br><br>
        	 <div class="form-group">
				<label class="col-sm-4 control-label">Date of Birth</label>
					<div class="col-sm-5">
			       		<input type="text" class="form-control tagsinput" Name="txtDob" Required>
					</div>
        	 </div>
        	 <br><br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Gender</label>
				<div class="col-sm-2">
						<input type="radio"  name="optGen" id="optMale" value="male" checked />Male
						&nbsp;&nbsp;
						<input type="radio"  name="optGen" id="optFemale" value="female" /> Female
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Address</label>
				<div class="col-sm-5">
						<textarea name="txtAdd"  class="form-control tagsinput" required></textarea>
				</div>
			</div>
			<br><br><br>
			<div class="form-group">
				<label class="col-sm-4 control-label">City</label>
				<div class="col-sm-5">
						<select  name="optCity" required class="form-control tagsinput">
			<option value="">---select city---</option>
			<option value="Ahmedabad">Ahmedabad</option>
			 <option value="Gandhinager">Gandhinager</option>
			 <option value="Baroda">Baroda</option>
			 <option value="Surat">Surat</option>
		</select>
				</div>
			</div>
			<br><br>
			<div class="form-group">
       			<label class="col-sm-4 control-label">Email</label>
					<div class="col-sm-5">
			      		 <input type="text" class="form-control tagsinput" Name="txtEmail" Required>
					</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Contact No.</label>
					<div class="col-sm-5">
			       		<input type="text" class="form-control tagsinput" Name="txtCon" Required>
					</div>
        	 </div>
        	 <br><br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Image</label>
					<div class="col-sm-5">
			       		<input type="file"  Name="txtFile" Required>
					</div>
        	 </div>
				<br><br>
		   	<div class="form-group">
       			<label class="col-sm-4 control-label">Password</label>
					<div class="col-sm-5">
			      		 <input type="password" class="form-control tagsinput" Name="txtPwd" Required>
					</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="col-sm-4 control-label">Confirm Password</label>
					<div class="col-sm-5">
			       		<input type="password" class="form-control tagsinput" Name="txtCpwd" Required>
					</div>
        	 </div>
				
       		</div>				 
                   <div class="buttons-set">
           <br><br>
                        <button type="submit" name="btnSub" title="Submit" class="btn"><span><span>Submit</span></span></button>
        </div>
                 
							</form>
			</table>
		</div>
	</section><!-- end of about section -->

			<?php
	include_once("footer.php");
?>        
  