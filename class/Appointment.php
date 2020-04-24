<?php

class Appointment
{
	private $_Appointmentid;
	private $_Userid;
	private $_Doctorid;
	private $_Description;
	private $_Statusid;
	private $_Dtime;
	private $_Prescription;
	private $_Report;

	public function set_Appointmentid($Appointmentid)
	{
		$this->_Appointmentid=$Appointmentid;
	}
	public function get_Appointmentid()
	{
		return $this->_Appointmentid;
	}
	public function set_Userid($Userid)
	{
		$this->_Userid=$Userid;
	}
	public function get_Userid()
	{
		return $this->_Userid;
	}
	public function set_Doctorid($Doctorid)
	{
		$this->_Doctorid=$Doctorid;
	}
	public function get_Doctorid()
	{
		return $this->_Doctorid;
	}
	public function set_Description($Description)
	{
		$this->_Description=$Description;
	}
	public function get_Description()
	{
		return $this->_Description;
	}
	public function set_Statusid($Statusid)
	{
		$this->_Statusid=$Statusid;
	}
	public function get_Statusid()
	{
		return $this->_Statusid;
	}
	public function set_Dtime($Dtime)
	{
		$this->_Dtime=$Dtime;
	}
	public function get_Dtime()
	{
		return $this->_Dtime;
	}
	public function set_Prescription($Prescription)
	{
		$this->_Prescription=$Prescription;
	}
	public function get_Prescription()
	{
		return $this->_Prescription;
	}
	public function set_Report($Report)
	{
		$this->_Report=$Report;
	}
	public function get_Report()
	{
		return $this->_Report;
	}
	public function select($id){
		$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT * FROM `appointment` WHERE Userid='$id'";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function insert(Appointment $rec)
	{
		
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="INSERT INTO `appointment`(`Userid`,`Doctorid`,`Description`,`Report`) VALUES (".$rec->get_Userid().",".$rec->get_Doctorid().",'".$rec->get_Description()."','".$rec->get_Report()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function sel($id,$start,$limit){
		$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT * FROM `appointment` WHERE Doctorid='$id' limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function sel1($nm){
		$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT * FROM `appointment` WHERE Doctorid='$nm'";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function update(Appointment $rec,$id,$did)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="UPDATE `appointment` SET `Statusid`=".$rec->get_Statusid().",`Dtime`='".$rec->get_Dtime()."' WHERE `Userid`=$id and `Doctorid`=$did";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
		//return $data;
	}
	public function update1(Appointment $rec,$id,$did)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="UPDATE `appointment` SET `Statusid`=".$rec->get_Statusid().",`Prescription`='".$rec->get_Prescription()."' WHERE `Userid`=$id and `Doctorid`=$did";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
		//return $data;
	}
	public function update2(Appointment $rec,$id,$did)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="UPDATE `appointment` SET `Statusid`=".$rec->get_Statusid()." WHERE `Userid`=$id and `Doctorid`=$did";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
		//return $data;
	}
	public function delete(Appointment $rec)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="DELETE FROM `appointment` WHERE `Appointmentid`=".$rec->get_Appointmentid();
		$data=mysqli_query($conn,$qry);
		echo $qry;	
	}
}

?>