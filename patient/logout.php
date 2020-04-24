<?php
session_start();
include_once("../class/User.php");
$obj=new User();
//$dt="20".date('y-m-d h:i:s ');

$uid=$_SESSION["uid"];
			
					
					$obj->set_Userid($uid);
		
$_SESSION["unm"]="";
		$_SESSION["uid"]="";
		$_SESSION["utid"]="";
				header("location:../patient/index.php");
?>		