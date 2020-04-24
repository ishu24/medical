<?php

class Medicalstore
{
	private $_Medicalstoreid;
	private $_Userid;
	private $_Since;
	
	public function set_Medicalstoreid($Medicalstoreid)
	{
		$this->_Medicalstoreid=$Medicalstoreid;
	}
	public function get_Medicalstoreid()
	{
		return $this->_Medicalstoreid;
	}
	public function set_Userid($Userid)
	{
		$this->_Userid=$Userid;
	}
	public function get_Userid()
	{
		return $this->_Userid;
	}
	public function set_Since($Since)
	{
		$this->_Since=$Since;
	}
	public function get_Since()
	{
		return $this->_Since;
	}
	public function insert(Medicalstore	$rec,$uid)
	{
		
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="INSERT INTO `medicalstore`(`Userid`,`Since`) VALUES ($uid,'".$rec->get_Since()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function select1($id)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="SELECT * FROM `medicalstore` WHERE Medicalstoreid='$id'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select($id)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="SELECT * FROM `medicalstore` WHERE Userid=$id";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function select2()
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT * FROM `medicalstore`";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function delete(Medicalstore $rec)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="DELETE FROM `medicalstore` WHERE `Medicalstoreid`=".$rec->get_Medicalstoreid();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}
	public function sel($start,$limit)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT * FROM `medicalstore` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	
}

?>