<?php

class Doctor
{
	private $_Doctorid;
	private $_Userid;
	private $_Meadicalstoreid;
	private $_License;
	private $_Skill;
	private $_Simg;

	public function set_Doctorid($Doctorid)
	{
		$this->_Doctorid=$Doctorid;
	}
	public function get_Doctorid()
	{
		return $this->_Doctorid;
	}
	public function set_Userid($Userid)
	{
		$this->_Userid=$Userid;
	}
	public function get_Userid()
	{
		return $this->_Userid;
	}
	public function set_Meadicalstoreid($Meadicalstoreid)
	{
		$this->_Meadicalstoreid=$Meadicalstoreid;
	}
	public function get_Meadicalstoreid()
	{
		return $this->_Meadicalstoreid;
	}
	public function set_License($License)
	{
		$this->_License=$License;
	}
	public function get_License()
	{
		return $this->_License;
	}
	public function set_Policy($Policy)
	{
		$this->_Policy=$Policy;
	}
	public function get_Policy()
	{
		return $this->_Policy;
	}
	public function set_Skill($Skill)
	{
		$this->_Skill=$Skill;
	}
	public function get_Skill()
	{
		return $this->_Skill;
	}
	public function set_Simg($Simg)
	{
		$this->_Simg=$Simg;
	}
	public function get_Simg()
	{
		return $this->_Simg;
	}
	

	public function display1($uid,$did)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT Firstname,Lastname,Contact,Address,Email FROM User WHERE `Userid`='$uid' and `Doctorid`='$did'";
			$data=mysqli_query($conn,$qry);
			//echo $qry;

			return $data;
    }
	public function select1()
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT * FROM `doctor`";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function sel($start,$limit){
		$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT * FROM `doctor` limit $start,$limit";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function seluid($did)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT Userid FROM `doctor` WHERE Doctorid='$did'";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function seldid($uid)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT Doctorid FROM `doctor` WHERE Userid='$uid'";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function selall($uid)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT * FROM `doctor` WHERE Userid='$uid'";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function seldid1($mid)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT Doctorid FROM `doctor` WHERE Meadicalstoreid='$mid'";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function Checklogin($email,$password)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="SELECT * FROM `user` WHERE `Email`='$email' and `Password`='$password'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}

	public function insert(Doctor $rec,$uid)
	{
		
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="INSERT INTO `doctor`(`Userid`,`Meadicalstoreid`,`License`,`Policy`,`Skill`,`Simg`) VALUES ($uid,".$rec->get_Meadicalstoreid().",'".$rec->get_License()."','".$rec->get_Policy()."','".$rec->get_Skill()."','".$rec->get_Simg()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(Doctor $rec)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="DELETE FROM `doctor` WHERE `Doctorid`=".$rec->get_Doctorid();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}

}

?>