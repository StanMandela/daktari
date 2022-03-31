<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * The Data Model for Dawati Enterprise
 *
 * @author Stanley Mandela
 * @date  20.06.2021
 * @mail  smstan8@gmail.com
 */

class Learning_model  extends CI_Model
{

	public function get_content_video($course_id){
		$this->db->select("course_id,courses.name,description,author,usergroup,courses.date_created,
		courses.last_modified,cover_image, user_groups.name as grp_name");
		$this->db->from("courses");
		$this->db->join("user_groups","user_groups.id =courses.usergroup");
		$query = $this->db->get();
		return $query->result();
	}
	public function getCourseDetails($course_id){


	}

}
