<?php 
	include_once("header.php");
?>
<br><br><br><br><br><br>
<style> 
input[type=text] {
    width: 200px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 20%;
}

.layout{
    background-color: #f0f8ff;
}


</style>
<script type="text/javascript">
	function delete_id(id)
	{
		var r= confirm("Are you sure you want to delete?");
		
		if(r== true)
		{
			window.location.href='delete.php?tbl=doctor& delete_id='+id;	
		}
		
	}
</script>
<div class="warper container-fluid">

<?php

include_once("../class/User.php");
include_once("../class/Doctor.php");
include_once("../class/Medicalstore.php");
include_once("../class/Appointment.php");
$_POST["txtpre"]=$_POST["chksta"]="";
$obj=new User();
$obj1=new Doctor();
$obj2=new Medicalstore();
$obj3=new Appointment();
$rec1=$obj1->select1();
$total=mysqli_num_rows($rec1);
$start=0;
$limit=3;
if(isset($_GET['id1'])){
	$id1=$_GET['id1'];
	$start=($id1-1)*$limit;
}
else{
	$id1=1;
}

$page=ceil($total/$limit);
$uid=$_SESSION["uid"];
//print_r($uid);
$rec4=$obj1->seldid($uid);
$result4=mysqli_fetch_array($rec4);

$rec1=$obj3->sel($result4[0],$start,$limit);


$data="<body><div class='layout'><div class=warper container-fluid>
					 
			    <div class='panel panel-default'>
				<div class='panel-heading'><h2><strong> Approved Patient List</strong></h2></div>
				    <div class='panel-body'>
					<form class='form-horizontal' method='post' >
					<div align='left'>
					   <input type='text' Name='btnSearch' placeholder='Search By Name...'>
					   
					</div>
					
					
                <br/><br>
<table cellpadding=0 cellspacing=0 border=0 class='table table-striped table-bordered' id=basic-datatable>
                            <thead>
                                <tr>
									
									<th>Patientname</th>
									<th>problem Description</th>
									<th>DateTime</th>
									<th>Visited</th>
									<th>Prescription</th>
									<th></th>
									<th>Delete</th>
                                </tr>
                            </thead><tbody>";
while($result1=mysqli_fetch_array($rec1))
{							
$rec=$obj->select1($result1[1]);
$rec2=$obj2->select1($result1[2]);

while($result=mysqli_fetch_array($rec))
{	

		if($result1[4]==1 || $result1[4]==3){
			$data.="<b><tr class='odd gradeX'>";
			if(isset($_POST["btnSearch"])){
	$nm=$_POST["btnSearch"];
	$rec3=$obj->sel($nm);
	$result5=mysqli_fetch_array($rec3);
	//print_r($result5[0]);


			if($result5[0]==$result1[1])
			{
				$data.="<td>".$result[0]."</td>
	<td>".$result1[3]."</td>
	<td>
	".$result1[5]."
	
	</td>
	<td>";

	if($result1[4]==3){
		$sta="checked";
	$data.="<input type='checkbox' name='chksta' id='chksta' <?php echo $sta ;?>";
	
	}
	else{
		$data.="<input type='checkbox' name='chksta' id='chksta' ";
	}	
	$data.="</td>
	<td>
	<textarea name='txtpre' id='txtpre' rows='5' cols='40'>".$result1[6]."</textarea>
	</td>
	
<td>--------</td>
	<td>
	<a href='javascript:delete_id(".$result1[0].")'><i class='fa fa-trash'></i>
	 </a>
	 </td></tr></b>";
		
		}
		}	
			else{
	$data.="<td>".$result[0]."</td>
	<td>".$result1[3]."</td>
	<td>
	".$result1[5]."
	
	</td>
	";
	if($result1[4]!=""){
		if($result1[4]==3){
		$sta="checked";
	$data.="<td><input type='checkbox' name='chksta' id='chksta' <?php echo $sta ;?>";
	$data.="</td>
	<td>
	<textarea name='txtpre' id='txtpre' rows='5' cols='40'>".$result1[6]."</textarea>
	</td>
	<td>
	-----------
	</td>
	";
	}
	else{
		$data.="<td>----------</td>
	<td>
	-------------
	</td><td>
	<a href='approvedpat1.php?Id2=".$result1[1]."'>Send to medicalstore
					  </a>
	</td>";
	}

	}
	
		$data.="";

	$data.="
	<td>
	<a href='javascript:delete_id(".$result1[0].")'><i class='fa fa-trash'></i>
	 </a>
	 </td></tr></b>";
		
		}
	}
	
}
}
if(isset($_REQUEST["Id2"]))
{
	$id=$_REQUEST["Id2"];
	if(isset($_REQUEST["txtpre"]))
	{
	$pre=$_REQUEST["txtpre"];
	print_r($pre);
	}
	if(isset($_POST["chksta"]))
	{
	$st=3;
	$sta="checked";
	}
	
	$obj3->set_Statusid($st);
	$obj3->set_Prescription($pre);
	$obj3->update1($obj3,$id,$result4[0]);
}

$data.="</tbody></table></form>";

echo $data;
?>
<ul class="pagination">
<?php
if($id1>1){	
?>
<li><a href="?id1=<?php echo ($id1-1) ;?>">Previous</a></li>
<?php

}
?>
<?php
	for($i=1;$i<=$page;$i++){
		
?>

		<li><a href="?id1=<?php echo $i ;?>"><?php echo $i ;?></a></li>
		<?php
	}
		?>
		
		<?php
if($id1!=$page){	
?>
<li><a href="?id1=<?php echo ($id1+1) ;?>">Next</a></li>
<?php

}
?>
		</ul>
</div>
                </div></body>


        </div>
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