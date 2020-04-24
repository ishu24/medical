<?php 
	include_once("header.php");
?>
<style>
.layout{
    background-color: #f0f8ff;
}

</style>
<br><br><br><br>
<?php
include_once("../class/User.php");
$obj=new User();
$_email=$_pwd=$_Utype="";
$_SESSION["email"]="";	
$_SESSION["uid"]="";
$_SESSION["utid"]="";	
//var_dump($_POST);
if(isset($_POST["btnSub"]))
{
$email=$_POST["txtEmail"];
$pwd=$_POST["txtPwd"];
$obj->set_Email($email);
		$ans1=$obj->Checklogin($email,$pwd);
	if($result = mysqli_fetch_array($ans1))
	{
		$_Userid=$result[0];
		$_Email =$result[3];
		$_Password =$result[4];
		$_Usertypeid=$result[8];
		$_SESSION["email"]=$_Email;
	//	$obj1->set_userid($userid);
		$_SESSION["utid"]=$_Usertypeid;
		$_SESSION["uid"]=$_Userid;
		if($email==$_Email)
		{
			if($pwd==$_Password)
			{
				
				if($_Usertypeid == 1)
				{
					header('location:../admin/index.php');	
				}
				else if($_Usertypeid == 2)
				{									
						header ('location:../patient/index.php');
				}
				else if($_Usertypeid == 4)
				{
						header ('location:../patient/index.php');
				}
				else if($_Usertypeid == 3)
				{
						header ('location:../patient/index.php');
				}
				
			}
			else
			{
				echo "Password Does not Match";	
			}
		}
		else
		{
			echo "User name Does not Match";	
		}
	}
	else
	{
				echo "<script type='text/javascript'>alert('username not match')</script>";
	}		
}
?>
<div class="layout">
<section class="about text-center"  id="about">
		<div class="container" class="layout">
			
				<h2>Forgot Password</h2>
				
							<form method="post" action="confirmmail.php">
								<br>
							<div class="form-group">
       			<label class="col-sm-1 col-sm-offset-4 control-label">Email</label>
					<div class="col-sm-3">
			      		 <input type="text" class="form-control tagsinput" Name="txtEmail" Required>
					</div>
			</div>
			<br><br>
			<input type="submit" value="Send" name="btnSub" class="btn">
						</form>	 
				
					</div>
	</section><!-- end of about section -->

		<br><br><br><br><br><br><br><br>
		
		 <?php
	include_once("footer.php");
?>  
	