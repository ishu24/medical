<?php

class Usertype
{
	private $_Usertypeid;
	private $_Usertypename;
	public function set_Usertypeid($Usertypeid)
	{
		$this->_Usertypeid=$Usertypeid;
	}
	public function get_Usertypeid()
	{
		return $this->_Usertypeid;
	}
	public function set_Usertypename($Usertypename)
	{
		$this->_Usertypename=$Usertypename;
	}
	public function get_Usertypename()
	{
		return $this->_Usertypename;
	}
}

?>