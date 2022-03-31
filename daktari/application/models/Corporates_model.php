<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Corporates_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	function getIdentificationTypes(){
		$this->db->select("*");
		$this->db->from("identification_types");
		$ids = $this->db->get()->result_array();
		return $ids;
	}
	function activateOrg($id)
	{
		$
		$this->db->set('activation_status', 2);
		$this->db->where('org_id', $id);

		$status = $this->db->update('organization_status');
		return $status;
	}
}
