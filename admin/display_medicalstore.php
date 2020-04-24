<?php
	include_once("header.php");
?>

<script type="text/javascript">
	function delete_id(id)
	{
		var r= confirm("Are you sure you want to delete?");
		
		if(r== true)
		{
			window.location.href='delete.php?tbl=medicalstore& delete_id='+id;	
		}
		
	}
</script>
<div class="warper container-fluid">
        	<?php

include_once("../class/User.php");
include_once("../class/Medicalstore.php");
$obj=new User();
$obj1=new Medicalstore();

$rec1=$obj1->select2();
$total=mysqli_num_rows($rec1);
$start=0;
$limit=3;
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
else{
	$id=1;
}

$page=ceil($total/$limit);
$rec1=$obj1->sel($start,$limit);

$data="<body><div class=warper container-fluid>
					 
			    <div class='panel panel-default'>
				<div class='panel-heading'><h3>MEDICALSTORE List</h3></div>
				    <div class='panel-body'>
					<form class='form-horizontal' method='post'>
					<div align='right'>
					  <a href='addmedicalstore.php'> <input type='button' class='btn btn-info' Name='btnAdd' value=' Add '></a>
					</div>
					</form>
                <br/>
<table cellpadding=0 cellspacing=0 border=0 class='table table-striped table-bordered' id=basic-datatable>
                            <thead>
                                <tr>
                                   <th>Medicalstoreid</th>
									<th>Storename</th>
									<th>Email</th>
                                    <th>Address</th>
									<th>City</th>
									<th>Contact</th>
									<th>Since</th>
									<th>Delete</th>
							    </tr>
                            </thead><tbody>";
while($result1=mysqli_fetch_array($rec1))
{							
$rec=$obj->select1($result1[1]);


while($result=mysqli_fetch_array($rec))
{	
		
			
		
	$data.="<tr class='odd gradeX'><td>".$result1[0]."</td><td>".$result[0]."</td><td>".$result[3]."</td><td>".$result[2]."</td><td>".$result[4]."</td><td>".$result[1]."</td><td>".$result1[2]."</td><td><a href='javascript:delete_id(".$result1[0].")'><i class='fa fa-trash'></i> </a></td></tr>";
		
}
}
$data.="</tbody></table>";

echo $data;
?>

<ul class="pagination">
<?php
if($id>1){
	

?>
<li><a href="?id=<?php echo ($id-1) ;?>">Previous</a></li>
<?php

}
?>
<?php
	for($i=1;$i<=$page;$i++){
		
?>

		<li><a href="?id=<?php echo $i ;?>"><?php echo $i ;?></a></li>
		<?php
	}
		?>
		<?php
if($id!=$page){	
?>
<li><a href="?id=<?php echo ($id+1) ;?>">Next</a></li>
<?php

}
?>
		</ul>
</div>
                </div></body>";

<a href='index.php' ><h4>&lt;&lt;&nbsp;Back</h4></a>

        </div>
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

