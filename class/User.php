<?php

class User
{
	private $_Userid;
	private $_Firstname;
	private $_Lastname;
	private $_Email;
	private $_Password;
	private $_Address;
	private $_City;
	private $_Contact;
	private $_Usertypeid;
	private $_Image;
	private $_DOB;
	private $_Gender;	

	public function set_Userid($Userid)
	{
		$this->_Userid=$Userid;
	}
	public function get_Userid()
	{
		return $this->_Userid;
	}
	public function set_Firstname($Firstname)
	{
		$this->_Firstname=$Firstname;
	}
	public function get_Firstname()
	{
		return $this->_Firstname;
	}
	public function set_Lastname($Lastname)
	{
		$this->_Lastname=$Lastname;
	}
	public function get_Lastname()
	{
		return $this->_Lastname;
	}
	public function set_Email($Email)
	{
		$this->_Email=$Email;
	}
	public function get_Email()
	{
		return $this->_Email;
	}
	public function set_Password($Password)
	{
		$this->_Password=$Password;
	}
	public function get_Password()
	{
		return $this->_Password;
	}
	public function set_Address($Address)
	{
		$this->_Address=$Address;
	}
	public function get_Address()
	{
		return $this->_Address;
	}
	public function set_City($City)
	{
		$this->_City=$City;
	}
	public function get_City()
	{
		return $this->_City;
	}
	public function set_Contact($Contact)
	{
		$this->_Contact=$Contact;
	}
	public function get_Contact()
	{
		return $this->_Contact;
	}
	public function set_Usertypeid($Usertypeid)
	{
		$this->_Usertypeid=$Usertypeid;
	}
	public function get_Usertypeid()
	{
		return $this->_Usertypeid;
	}
	public function set_Image($Image)
	{
		$this->_Image=$Image;
	}
	public function get_Image()
	{
		return $this->_Image;
	}
	public function set_DOB($DOB)
	{
		$this->_DOB=$DOB;
	}
	public function get_DOB()
	{
		return $this->_DOB;
	}
	public function set_Gender($Gender)
	{
		$this->_Gender=$Gender;
	}
	public function get_Gender()
	{
		return $this->_Gender;
	}
	
	public function display1($uid)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT Firstname,Lastname,Contact,Address,Email,DOB,City,Userid FROM User WHERE Userid=".$uid;
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	
	public function select(){
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="SELECT max(Userid) FROM `user`";
		$data=mysqli_query($conn,$qry);
		return $data;
		//echo $qry;
	}
	
	public function select1($Uid)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT Firstname,Contact,Address,Email,City,Lastname,Image,Gender,Password FROM `User` WHERE Userid='$Uid'";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
	public function select2()
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT Userid,Firstname FROM User WHERE Usertypeid=4";
			$data=mysqli_query($conn,$qry);
			return $data;
	}
	public function select3($city)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT Userid FROM User WHERE City='$city' and Usertypeid=3";
			$data=mysqli_query($conn,$qry);
			//echo $data;
			return $data;
	}
	public function sel($nm)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT Userid  FROM User WHERE Firstname='$nm'";
			$data=mysqli_query($conn,$qry);
			return $data;
	}
	public function Checklogin($email,$password)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="SELECT * FROM `user` WHERE `Email`='$email' and `Password`='$password'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}

	public function insert(User $rec)
	{
		
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="INSERT INTO `user`(`Firstname`,`Lastname`,`Email`,`Password`,`Address`,`City`,`Contact`,`Usertypeid`,`Image`,`DOB`,`Gender`) VALUES ('".$rec->get_Firstname()."','".$rec->get_Lastname()."','".$rec->get_Email()."','".$rec->get_Password()."','".$rec->get_Address()."','".$rec->get_City()."','".$rec->get_Contact()."',".$rec->get_Usertypeid().",'".$rec->get_Image()."','".$rec->get_DOB()."','".$rec->get_Gender()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update1(user $rec,$uid)
	{
		$conn=new mysqli("localhost","root","","db_medical");
		$qry="UPDATE `user` SET `Firstname`='".$rec->get_Firstname()."',`Lastname`='".$rec->get_Lastname()."',`Contact`='".$rec->get_Contact()."',`Address`='".$rec->get_Address()."',`Email`='".$rec->get_Email()."',`DOB`='".$rec->get_DOB()."' WHERE `Userid`=$uid";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
		//return $data;
	}
	
}

?>