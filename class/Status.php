<?php

class Status
{
	private $_Statusid;
	private $_Statusname;
	public function set_Statusid($Statusid)
	{
		$this->_Statusid=$Statusid;
	}
	public function get_Statusid()
	{
		return $this->_Statusid;
	}
	public function set_Statusname($Statusname)
	{
		$this->_Statusname=$Statusname;
	}
	public function get_Statusname()
	{
		return $this->_Statusname;
	}
	public function select($id)
	{
			$conn=new mysqli("localhost","root","","db_medical");
			$qry="SELECT * FROM `status` WHERE Statusid='$id'";
			$data=mysqli_query($conn,$qry);
			//echo $qry;
			return $data;
	}
}

?>