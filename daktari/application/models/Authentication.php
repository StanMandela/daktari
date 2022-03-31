<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Class Authentication
 */
class Authentication extends CI_Model
{
	/**
	 * @param $email
	 * @return string
	 */
	public function checkmail($email)
	{
		$this->db->from('users');
		$this->db->where('email_address', $email);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return "false";
		} else {
			return "true";
		}
	}

	/**
	 * @param $phone
	 * @return string
	 */
	public function checkmobile($phone)
	{
		$this->db->from('users');
		$this->db->where('mobile', $phone);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return "false";
		} else {
			return "true";
		}
	}

	public function addUser($data){
		$this->db->insert('users', $data);
		$users_id = $this->db->insert_id();
		//var_dump($users_id);

		return $users_id;
	}

	public function addCompanyDetails($companyDetails){
		$this->db->insert('companies', $companyDetails);
		$company_id= $this->db->insert_id();
		return $company_id;
	}
	public function updateUserCompany($userId,$companyId,$userGroupId){

		$this->db->where('id', $userId);
		$data =array(
			'company_id'=>$companyId,
			'user_group_id'=>$userGroupId
		);
		$this->db->update('users',$data);

		return true;
	}
	public function user_login($input, $password){

		if (!empty($input) || !empty($password)) {

			$emailRegex = '^[_a-z0-9-]+(.[a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})^';
			$phoneRegex = '^(?:254|\+254|0)?(7|1(?:(?:[12][0-9])|(?:0[0-8])|(?:[3][0-9])|(?:5[0-9])|(9[0-9])|(8[0-9])|(7[0-9]))[0-9]{6})^';
			if (preg_match($emailRegex, $input)) {
				$this->db->select('users.id, username,email_address,user_group_id,company_id, password');
				$this->db->from('users');
				//$this->db->join('user_status','user_status.user_id= users.user_id', 'LEFT');
				$this->db->where('email_address', $input);
				$query = $this->db->get()->row();

			} else{

				$this->db->select('users.id, username,user_group_id,company_id, password');
				$this->db->from('users');
				//$this->db->join('user_status','user_status.user_id= users.user_id','LEFT');
				$this->db->where('username', $input);
				$query=$this->db->get()->row();

			}
			//	var_dump($query[0]->password);

			if ((empty($query))) {
				return "Nonexistent";

			} else {
				$this->load->library('bcrypt');
				$user_password = $query->password;
				//compare passwords
				if ($this->bcrypt->compare($password, $user_password)) {
					return $query;
				} else {
					return false;
				}
			}
		} else {
			return false;
		}


	}


}
