<?php
$id="";
if(isset($_GET["delete_id"]))
{
	$id=$_GET["delete_id"];	
	$tb=$_GET["tbl"];
	if($tb=="doctor")
	{
		include_once("../class/Doctor.php");
		$obj=new Doctor();
		$obj->set_Doctorid($id);
		$obj->delete($obj);	
		header("location:display_doctor.php");
	}	
	else if($tb=="medicalstore")
	{
		include_once("../class/Medicalstore.php");
		$obj=new medicalstore();
		$obj->set_Medicalstoreid($id);
		$obj->delete($obj);	
		header("location:display_medicalstore.php");
	}
	
}
?>
