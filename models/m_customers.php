<?php

class Customers{
	private $customerID, $emailAddress, $Name, $Password, $Phone;

	public function __construct($emailAddress, $Name, $Password, $Phone){

		$this->emailAddress = $emailAddress;
		$this->Name = $Name;
		$this->Password = $Password;
		$this->Phone = $Phone;
	}

	public function get_emailAddress(){
		return $this->emailAddress;
	}
	public function get_Name(){
		return $this->Name;
	}
	public function get_Password(){
		return $this->Password;
	}
	public function get_Phone(){
		return $this->Phone;
	}


	public function set_emailAddress($value){
		$this->emailAddress = $value;
	}
	public function set_Name($value){
		$this->Name = $value;
	}
	public function set_Password($value){
		$this->Password = $value;
	}
	public function set_Phone($value){
		$this->Phone = $value;
	}
}
class CusDB{
	public function get_cus_db(){
		$cus_list_db = array();
			foreach($_SESSION['list_cus'] as $key => $value){
				$cus_list_db[] = new Customers($value['email'],$value['name'],$value['password'],$value['phone']);
			}
		return $cus_list_db;
	}

	public function search_cus($search_value){
		$search_value = trim($search_value);
		$cus_list_db = array();
			if($search_value == ''){
				$cus_list_db = $this->get_cus_db();
			}else{
				foreach($_SESSION['list_cus'] as $key => $value){
					if(strripos($value['name'],$search_value) !== false){
							$cus_list_db[] = new Customers($value['email'],$value['name'],$value['password'],$value['phone']);
							break;
					}
				}
			}
			return $cus_list_db;
		}
}
?>