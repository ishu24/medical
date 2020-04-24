<?php 
	include_once("header.php");
?>
<br><br><br><br><br><br>
<style>
.layout{
    background-color: #f0f8ff;
}

</style>
<!-- script tags
	============================================================= -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="js/gmaps.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>


<script src="/js/jquery.datetimepicker.full.min.js"></script>
<script src="/js/jquery.datetimepicker.full.js"></script>
<script src="/js/jquery.datetimepicker.js"></script>
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
<script type="text/javascript">
	jQuery('#datetimepicker1').datetimepicker({ format: 'dd/MM/yyyy hh:mm' });
</script>
<div class="warper container-fluid">

<?php

include_once("../class/User.php");
include_once("../class/Doctor.php");
include_once("../class/Medicalstore.php");
include_once("../class/Appointment.php");

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
$rec5=$obj2->select($uid);
$result5=mysqli_fetch_array($rec5);
//print_r($result5[0]);
$rec4=$obj1->seldid1($result5[0]);

$data="<body><div class='layout'><div class=warper container-fluid>
					 
			    <div class='panel panel-default'>
				<div class='panel-heading'><h2><strong>Visited Customer List</strong></h2></div>
				    <div class='panel-body'>
					<form class='form-horizontal' method='post' action=''>
					
					
                <br/>
<table cellpadding=0 cellspacing=0 border=0 class='table table-striped table-bordered' id=basic-datatable>
                            <thead>
                                <tr>
									
									<th>Patientname</th>
									<th>Contact</th>
									<th>problem Description</th>
							
									<th>Prescription</th>
									
                                </tr>
                            </thead><tbody>";

                  while($result4=mysqli_fetch_array($rec4)){
                  	//print_r($result4);
                  	$rec1=$obj3->sel($result4[0],$start,$limit);

                  
while($result1=mysqli_fetch_array($rec1))
{							
$rec=$obj->select1($result1[1]);
$rec2=$obj2->select1($result1[2]);

while($result=mysqli_fetch_array($rec))
{	
		if($result1[4]==4){
			if(isset($_GET["Id2"]))
			{
		$id=$_GET["Id2"];
		
		$st=4;
		
		
		$obj3->set_Statusid($st);
		
		$obj3->update2($obj3,$id,$result1[2]);
		}
	$data.="<b><tr class='odd gradeX'>
	<td>".$result[0]."</td>
	<td>
   	".$result[1]."
	</td>
	<td>".$result1[3]."</td>
	
	<td>
	".$result1[6]."
	</td>
	</tr></b>";
	}
		
}
}
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
	

	
</body>
</html>