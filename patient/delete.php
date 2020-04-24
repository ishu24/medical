<?php
$id="";
if(isset($_GET["delete_id"]))
{
	$id=$_GET["delete_id"];	
	$tb=$_GET["tb1"];
	if($tb=="appointment")
	{
		include_once("../class/Appointment.php");
		$obj=new Appointment();
		$obj->set_Appointmentid($id);
		$obj->delete($obj);	
		header('location:../patient/patientdoc.php');
	}	
	
	
}
?>
