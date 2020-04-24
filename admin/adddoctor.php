<?php
	include_once("header.php");
?>
<div class="warper container-fluid">
<br><br><br>
<?php
include_once("../class/User.php");
include_once("../class/Doctor.php");
$obj=new User();
$obj1=new Doctor();
$pwd=$ut=$cpwd=$fnm=$lnm=$con=$add=$city=$email=$dob=$gen=$img=$lno=$skill=$med=$simg=$pol="";
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
	$pol=$_POST["txtPol"];
	$img=$_FILES["txtFile"]["name"];
	$imgs=$_FILES["txtFile"]["size"];
	$imgt=$_FILES["txtFile"]["type"];
	$imgtmp=$_FILES["txtFile"]["tmp_name"];
	if($img!="")
	{
		move_uploaded_file($imgtmp,"../img/".$img);
		$a="../img/".$img;
	}
	$simg=$_FILES["txtFile1"]["name"];
	$simgs=$_FILES["txtFile1"]["size"];
	$simgt=$_FILES["txtFile1"]["type"];
	$simgtmp=$_FILES["txtFile1"]["tmp_name"];
	if($simg!="")
	{
		move_uploaded_file($simgtmp,"../img/".$simg);
		$a1="../img/".$simg;
	}
	if(isset($_POST["optCity"]))
	{
	$city=$_POST["optCity"];
	}
	if(isset($_POST["optMeds"]))
	{
	$med=$_POST["optMeds"];
	}
	$ut=3;
	
	if(isset($_POST["optGen"]))
	{
	$gen=$_POST["optGen"];
	}
	$skill=$_POST["txtSkill"];
	$lno=$_POST["txtLic"];
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
		
		$rec=$obj->select();
		//print_r ($rec);
	$result1=mysqli_fetch_array($rec);
	$obj1->set_License($lno);
	$obj1->set_Policy($pol);
	$obj1->set_Skill($skill);
	$obj1->set_Simg($simg);
	$obj1->set_Meadicalstoreid($med);
	//print_r ($result1);
	$obj1->insert($obj1,$result1[0]);
	//header('location:../admin/display_doctor.php');	
	//print_r ($obj1);
	}
	else
	{
		 echo "<script type='text/javascript'>alert('password doesn't match!')</script>";
	}
}
if(isset($_POST["btnDis"]))
{
			
			header("location:display_doctor.php");

}

?>

<div class="page-header"><h3>ADD DOCTOR</h3></div>
      		<div class="row">
               <div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-body">
						<form class="form-horizontal" method="post" >
     	
	<div align="right">
           <a href="display_doctor.php"> <input type="button" class="btn btn-info" Name="btnDis" value="Display"></a>
	  </div>
</form>
	  <br>

            	<form class="form-horizontal" method="post" enctype="multipart/form-data" >
     	
		 <div class="form-group">
       <label class="col-sm-2 control-label">First Name</label>
		<div class="col-sm-3">
       <input type="text" class="form-control tagsinput" Name="txtFnm" Required>
		</div>
		<label class="col-sm-2 control-label">Last Name</label>
		<div class="col-sm-3">
       <input type="text" class="form-control tagsinput" Name="txtLnm" Required>
		</div>
         </div>
		  
         <hr class="dotted"></hr>
		
		 <div class="form-group">
       <label class="col-sm-2 control-label">Email</label>
		<div class="col-sm-8">
       <input type="email" class="form-control tagsinput" Name="txtEmail" Required>
		</div>
         </div>
		 <hr class="dotted"></hr>
		
		 <div class="form-group">
       <label class="col-sm-2 control-label">License No.</label>
		<div class="col-sm-8">
       <input type="text" class="form-control tagsinput" Name="txtLic" Required>
		</div>
         </div>
		  <hr class="dotted"></hr>
		<div class="form-group">
       <label class="col-sm-2 control-label">Insurance Policy</label>
		<div class="col-lg-8">
       <textarea  class="form-control tagsinput" Name="txtPol"  required></textarea>
		</div>
         </div>
         <hr class="dotted"></hr>
		 <div class="form-group">
       <label class="col-sm-2 control-label">Skill</label>
		<div class="col-sm-8">
       <input type="text" class="form-control tagsinput" Name="txtSkill" Required>
		</div>
         </div>
		
		

 <hr class="dotted"></hr>
		<div class="form-group">
       <label class="col-sm-2 control-label">Address</label>
		<div class="col-lg-8">
       <textarea  class="form-control tagsinput" Name="txtAdd"  required></textarea>
		</div>
         </div>
		
		<hr class="dotted"></hr>
               <div class="form-group">

       <label class="col-sm-2 control-label">City</label>
		<div class="col-sm-8">
		 <input type="text" class="form-control" Name="txtCnm" >
      <select class="form-control" name="optCity"  required>
			<option value="">---select city---</option>
			<option value="Ahmedabad">Ahmedabad</option>
			 <option value="Gandhinager">Gandhinager</option>
			 <option value="Baroda">Baroda</option>
			 <option value="Surat">Surat</option>
		</select>
         </div>
		 </div>
           
		 		
         <hr class="dotted"></hr>
        <div class="form-group">
		<label class="col-sm-2 control-label">Gender</label>
										<div class="col-sm-4">
                                        <div class="switch-button info showcase-switch-button">
                                            <input id="switch-button-6" name="optGen" type="radio" value="male">
                                            <label for="switch-button-6">male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input id="switch-button-7" name="optGen" type="radio" value="female">
                                            <label for="switch-button-7">female</label>
                                        </div>
                                     </div>
		</div>
		
		 <hr class="dotted"></hr>
		 <div class="form-group">
       <label class="col-sm-2 control-label">Date of birth</label>
		<div class="col-sm-8">
       <input type="date" class="form-control tagsinput" Name="txtDob" Required>
		</div>
         </div>
		  
		 		 </br>
				 <hr class="dotted"></hr>
				  <?php
				 include_once("../class/Medicalstore.php");
				 include_once("../class/User.php");
$obj1=new Medicalstore();
$obj2=new User();
$rec1=$obj2->select2();



 $data="   <div class='form-group'>

       <label class='col-sm-2 control-label'>Medicalstore</label>
		<div class='col-sm-8'>
		 <input type='text' class='form-control' Name='txtMeds' >
      <select class='form-control' name='optMeds' required>
			<option >---select Medicalstore ---</option>";
			

while($result1=mysqli_fetch_array($rec1))
{
	$rec=$obj1->select($result1[0]);
	while($result2=mysqli_fetch_array($rec)){
		$data.="<option value='".$result2[0]."'>".$result1[1]."</option>";
	}
            			 
}
		$data.="</select> </div>
		 </div>
		 ";
        echo $data;
		 ?>
             
           
		 		 </br>
				 <hr class="dotted"></hr>
		
		 <div class="form-group">
       <label class="col-sm-2 control-label">Contact</label>
		<div class="col-sm-8">
       <input type="text" class="form-control tagsinput" Name="txtCon" maxlength="10" Required>
		</div>
         </div>
       
		  <hr class="dotted"></hr>
		
		 <div class="form-group">
       <label class="col-sm-2 control-label">Password</label>
		<div class="col-sm-8">
       <input type="password" class="form-control tagsinput" Name="txtPwd" Required>
		</div>
         </div>
		  <hr class="dotted"></hr>
		
		 <div class="form-group">
       <label class="col-sm-2 control-label">Confirm password</label>
		<div class="col-sm-8">
       <input type="password" class="form-control tagsinput" Name="txtCpwd"  Required>
		</div>
         </div>
		    <hr class="dotted"></hr>
		 <div class="form-group">
       <label class="col-sm-2 control-label">Image</label>
		<div class="col-sm-7">
		<input type="file" Name="txtFile" value="<?php echo $img; ?>">
           <!-- 	<img src="<?php echo $img; ?>" height="100" weight="100" />
		 -->
		</div>
         </div>
          <hr class="dotted"></hr>
		 <div class="form-group">
       <label class="col-sm-2 control-label">Skill Image</label>
		<div class="col-sm-7">
		<input type="file" Name="txtFile1" value="<?php echo $simg; ?>">
           	<!-- <img src="<?php echo $img; ?>" height="100" weight="100" />
		 -->
		</div>
         </div>
		 		       <div class="form-group"> 
	   <div align="center">
      <input type="submit" class="btn btn-info" Name="btnSub" value="submit">
	  </div>
	  </div>
			 	</form>
			</div></div>
            </div> </div>  
<a href='index.php' ><h4>&lt;&lt;&nbsp;Back</h4></a>
            
</div>
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
