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
			window.location.href='delete.php?tb1=appointment&delete_id='+id;	
		}
		
	}
</script>
<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />

<style type="text/css">
    a.fancybox embed {
        border: none;
        box-shadow: 0 1px 7px rgba(0,0,0,0.6);
        -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
    } 
    a.fancybox:hover embed {
        position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
    }
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>

<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'embed' : 'embed.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
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
$_POST['txtDate']=$_POST['txtTime']="";
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

//print_r($id);
//var_dump($_POST);

$data="<body><div class='layout'><div class=warper container-fluid>
					 
			    <div class='panel panel-default'>
				<div class='panel-heading'><h2><strong>Patient List</strong></h2></div>
				    <div class='panel-body'>
					<form class='form-horizontal' method='post' action=''>
					<div align='right'>
					  <a href='approvedpat.php'> <input type='button' class='btn btn-info' Name='btnAdd' value=' Approved patient '></a>
					</div>
					
                <br/>
<table class='table table-striped table-bordered' id=basic-datatable>
                            <thead>
                                <tr>
									
									<th>Patientname</th>
									<th>problem Description</th>
									<th>Reports</th>
									<th>DateTime</th>
									<th>Approve / Disapprove</th>
									<th>Delete</th>
                                </tr>
                            </thead><tbody>";
while($result1=mysqli_fetch_array($rec1))
{							
$rec=$obj->select1($result1[1]);
$rec2=$obj2->select1($result1[2]);

while($result=mysqli_fetch_array($rec))
{	
		
	$data.="<b><tr class='odd gradeX'>
	<td>".$result[0]."</td>
	<td>".$result1[3]."</td>
	<td>";
	$Evidencemenu=$result1[7];
		$arraymenu=explode(',', $Evidencemenu);
	foreach($arraymenu as $array_menu)
	                						{
												$data.="
												
												
												<embed class='fancybox' src='".$array_menu."' width='100' height='100' />
												";
											}
	$data.="</td>
	";
	if($result1[5]!=""){
	$data.="<td>
    ".$result1[5]."
	</td>";
	
	}
	else{
		$data.="<td>---------</td>";
	}
	if($result1[5]==""){
		$data.="	<td><a href='patientdoc1.php?id=".$result1[1]."'>Approve
					  </a>
					
	</td>";
	}
	else{
		$data.="<td>---------</td>";
	}
	
	$data.="<td>
	<a href='javascript:delete_id(".$result1[0].")'><i class='fa fa-trash'></i>
	 </a>
	 </td></tr></b>";
		
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