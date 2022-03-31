<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * The Data Model for Dawati Enterprise
 *
 * @author Mwaura Gitonga
 * @date  25.05.2021
 * @mail  gitongakmwaura@gmail.com
 *      Signed :----U70XDN-------
 */
class Data_model extends CI_Model
{
	public function getCourses($company_id){
		$this->db->select("course_id,courses.name,description,author,usergroup,courses.date_created,
		courses.last_modified,cover_image, user_groups.name as grp_name");
		$this->db->from("courses");
		$this->db->join("user_groups","user_groups.id =courses.usergroup");
		$this->db->join("companies","companies.id =courses.company_id");
		$this->db->where("companies.id",$company_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getCourseTopics($course_id){
		$this->db->select("*");
		$this->db->from("topics");
		$this->db->where("course_id", $course_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function getCourseSubTopics($topic_id){
		$this->db->select("*");
		$this->db->from("subtopics");
		$this->db->where("topic_id", $topic_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function getVideos($user_id){

		$this->db->select("subtopics.name as subtopic, video_content.id, video_content.file_name, video_content.date_uploaded, video_content.last_modified,
			 topics.name as topic, courses.name as course, user_groups.name as usergroup");
		$this->db->from("courses");
		$this->db->join("topics", "courses.course_id = topics.course_id");
		$this->db->join("subtopics", "courses.course_id = subtopics.course_id");
		$this->db->join("video_content", "video_content.subtopic_id = subtopics.id");
		$this->db->join("user_groups", "video_content.usergroup = user_groups.id");
		$this->db->join("companies", "courses.company_id = companies.id");
		$this->db->where("video_content.admin_id", $user_id);
		$this->db->group_by("video_content.id");
		$query = $this->db->get();
		return $query->result();
	}
		public function getLVideos(){
			$this->db->select("topics.name as topic, courses.name as course");
			$this->db->from("courses");
			$this->db->join("topics", "courses.course_id = topics.course_id");
//			$this->db->join("subtopics", "courses.course_id = subtopics.course_id");
//			$this->db->join("video_content", "video_content.subtopic_id = subtopics.id");
//			$this->db->join("usr_groups", "video_content.usergroup = user_groups.id");
		$query = $this->db->get();
		return $query->result();
	}
	public function getVideoDetails($file_id){

			$this->db->select("subtopics.id as subtopic_id, subtopics.name as subtopic, video_content.id, video_content.file_name, video_content.date_uploaded, video_content.last_modified,
			 topics.name as topic, topics.id as topic_id, courses.name as course, courses.course_id, 
			 user_groups.name as usergroup, user_groups.id as usergroup_id");
			$this->db->from("courses");
			$this->db->join("topics", "courses.course_id = topics.course_id");
			$this->db->join("subtopics", "courses.course_id = subtopics.course_id");
			$this->db->join("video_content", "video_content.subtopic_id = subtopics.id");
			$this->db->join("user_groups", "video_content.usergroup = user_groups.id");
			$this->db->where('video_content.id', $file_id);
			$query = $this->db->get();
			return $query->row();
	}
	public  function getVideosWithID($where,$course_id){
		$this->db->select("video_content.id,video_content.file_name,video_content.subtopic_id,usergroup,subtopics.course_id");
		$this->db->from("video_content");
		$this->db->join("subtopics","subtopics.id=video_content.subtopic_id" );
		$this->db->where('subtopics.course_id',$course_id );
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	public function getBooks(){

			$this->db->select("subtopics.name as subtopic, book_content.id, book_content.file_name, book_content.date_uploaded, book_content.last_modified,
			 topics.name as topic, courses.name as course, user_groups.name as usergroup");
			$this->db->from("courses");
			$this->db->join("topics", "courses.course_id = topics.course_id");
			$this->db->join("subtopics", "courses.course_id = subtopics.course_id");
			$this->db->join("book_content", "book_content.subtopic_id = subtopics.id");
			$this->db->join("user_groups", "book_content.usergroup = user_groups.id");
		$query = $this->db->get();
		return $query->result();
	}


	public function getCourseMultimedia($subtopicID){
		$this->db->select('subtopics.name as subtopics,
		video_content.id,video_content.file_name');
		$this->db->from('video_content');
		$this->db->join('subtopics', 'video_content.subtopic_id= subtopics.id');
		$this->db->where('video_content.subtopic_id',$subtopicID);
		$this->db->group_by('id');
		//$this->db->group_by('multimedia_content.file_name');
		$query = $this->db->get();
		return $query->result();
	}
	public function courseExists($name)
	{
		$this->db->select("*");
		$this->db->from("courses");
		$this->db->like("name", $name);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function checkcourseExists($course_id){

		$this->db->select("*");
		$this->db->from("courses");
		$this->db->where("course_id", $course_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function checkgroupExists($group_id){
		$this->db->select("*");
		$this->db->from("user_groups");
		$this->db->where("id", $group_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function insert($table, $array)
	{
		return $this->db->insert($table, $array);
	}

	public function insertCourse($table, $array)
	{
		 $this->db->insert($table, $array);
		return $this->db->insert_id();

	}

	public function insertTopic($table, $array)
	{
		 $this->db->insert($table, $array);
		 //get insert iD to generate topic ID
		 $id = $this->db->insert_id();
		$topic_id = "T" . str_pad($id , 3, "0", STR_PAD_LEFT);
		//update row with topic ID
		$data= array(
			'topic_id' => $topic_id
		);
		$this->db->where('id', $id);
		if ($this->db->update("topics", $data)) {
			return true;
		} else {
			return false;
		}
	}
	public function deleteCourse($course_id){
		$this->db->where('course_id', $course_id);
		$this->db->delete('courses');
	}
	public function delete($table, $column, $course_id){
		echo "here";
		$this->db->where("$column", $course_id);
		//var_dump(($this->db->delete("$table")));

	}


	public function insertSubTopic($table, $array)
	{
		 $this->db->insert($table, $array);
		 //get insert iD to generate topic ID
		 $id = $this->db->insert_id();
		$topic_id = "T" . str_pad($id , 3, "0", STR_PAD_LEFT);
		//update row with topic ID
		$data= array(
			'subtopic_id' => $topic_id
		);
		$this->db->where('id', $id);
		if ($this->db->update("subtopics", $data)) {
			return true;
		} else {
			return false;
		}
	}


	public function dataExistsMultiple($table, $field1, $value1){
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($field1, $value1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function userExists($user_id)
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("id", $user_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function userGroupExists($name)
	{
		$this->db->select("*");
		$this->db->from("user_groups");
		$this->db->where("name", $name);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function addUser($userArray)
	{
		 $this->db->insert('users', $userArray);
		$user_id=$this->db->insert_id();
		return $user_id;

	}
	public function updateUserCompany($userId,$companyId,$admin_id){

		$this->db->where('id', $userId);
		$data =array(
			'company_id'=>$companyId,
			'admin_id'=>$admin_id
		);
		$this->db->update('users',$data);

		return true;
	}
	public function addUserGroup($data)
	{
		return $this->db->insert('user_groups', $data);
	}


	public function getUsers($company_id){
		$this->db->select("users.id, first_name, last_name, gender,  username, mobile, email_address, password, employee_id, users.company_id, 
		user_group_id, users.date_created, users.last_modified, companies.name as company, user_groups.name as dept");
		$this->db->from("users");
		$this->db->join("companies", "users.company_id = companies.id ");
		$this->db->join("user_groups", "users.user_group_id = user_groups.id ");
		$this->db->where("companies.id", $company_id);
		$this->db->where("user_groups.id !=", 2);
		$this->db->where("user_groups.id !=", 1);
		$query = $this->db->get();
		return $query->result();
	}

	//TODO combine the two funcs below into one
	public function getUserDetails($input){
		$this->db->select("users.id, first_name, last_name, gender,  username, mobile, email_address, password, employee_id, users.company_id, 
		user_group_id, users.date_created, users.last_modified, companies.name as company, user_groups.name as dept");
		$this->db->from("users");
		$this->db->join("companies", "users.company_id = companies.id ");
		$this->db->join("user_groups", "users.user_group_id = user_groups.id ");
		$this->db->where("users.id", $input);
		$query = $this->db->get();
		return $query->row();
	}
	public function updateUserPass($user_id,$dbData){
		$data = array(
			'password' => $dbData['password'],
			'last_modified'=> $dbData['last_modified']
			);
		$this->db->where('id', $user_id);
		$this->db->update('users',$data);
		return 'true';


	}

	/**
	 * @param $email
	 * @return array|mixed|object|null
	 * used by function to send email
	 */
	public function get_user_details($email){
		$this->db->select("users.id, first_name, last_name, gender,  username, mobile, email_address, password, employee_id, users.company_id, 
		user_group_id, users.date_created, users.last_modified, companies.name as company, user_groups.name as dept");
		$this->db->from("users");
		$this->db->join("companies", "users.company_id = companies.id ");
		$this->db->join("user_groups", "users.user_group_id = user_groups.id ");
		$this->db->where("users.email_address", $email);
		$query = $this->db->get();
		return $query->row();
	}

	public  function  getUserGroups($company_id){
		$this->db->select("user_groups.id, user_groups.name, user_groups.company_id, user_groups.access_level,
		user_groups.date_created, user_groups.last_modified, companies.name as company, access_levels.name as access_level");
		$this->db->from("user_groups");
		$this->db->join('companies', "user_groups.company_id = companies.id");
		$this->db->join('access_levels', "user_groups.access_level = access_levels.id");
		$this->db->where("user_groups.company_id",$company_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getCompanies(){
		$this->db->select("*");
		$this->db->from("companies");
		$query = $this->db->get();
		return $query->result();
	}
	public function getCompanyDetails(){
		$this->db->select("*");
		$this->db->from("companies");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}

	public function  getAccessLevels(){
		$this->db->select("*");
		$this->db->from("access_levels");
		$query = $this->db->get();
		return $query->result();
	}
	public function getUsergroupName($group_id){

		$this->db->select("*");
		$this->db->from("user_groups");
		$this->db->where("id", $group_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function  getMaleUsers($company_id){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("gender", "Male");
		$this->db->where("company_id", $company_id);
		$query = $this->db->get();
		return $query->num_rows();

	}
	public function  getFemaleUsers($company_id){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("gender", "Female");
		$this->db->where("company_id", $company_id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getUserCourses($user_group_id){

		$this->db->select("*");
		$this->db->from("courses");
		$this->db->where("usergroup", $user_group_id);
		$query = $this->db->get();
		return $query->result();

	}
	public function fileName($file_id){
		$this->db->from('video_content');
		$this->db->where('id', $file_id);
		$this->db->join('multimedia', 'multimedia.series_id = multimedia_content.multimedia_series');
		$query = $this->db->get();
		return $query->row();
	}
	public function getCourse($courseID){
		$this->db->select("course_id,courses.name,description,author,usergroup,courses.date_created,
		courses.last_modified,cover_image, user_groups.name as grp_name");
		$this->db->from("courses");
		$this->db->join("user_groups","user_groups.id =courses.usergroup");
		$this->db->where('course_id', $courseID);
		$query = $this->db->get();
		return $query->result();
	}
	public function getRecentCourses($where){
		$this->db->select("course_id,courses.name,description,author,usergroup,courses.date_created,
		courses.last_modified,cover_image, user_groups.name as grp_name");
		$this->db->from("courses");
		$this->db->join("user_groups","user_groups.id =courses.usergroup");
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}
	public function getUserGroup($course_id){
		$this->db->select("*");
		$this->db->from("user_groups");
		$this->db->where("id", $course_id);
		$query = $this->db->get();
		return $query->row();

	}
	public function insertLearning($data){
		return $this->db->insert('user_learning', $data);

	}

	public function updateLearning($course_id, $user_id, $time)
	{

		//var_dump($data['user_id']);
		$this->db->set('last_seen', $time);
		$this->db->where('user_id', $user_id);
		$this->db->where('course_id', $course_id);

		$query = $this->db->update('user_learning');

		if ($query) {
			return true;
		} else {
			return false;
		}

	}
	public function learningProgress($user_id){
		$this->db->select("course_id");
		$this->db->from("user_learning");
		$this->db->where("user_id", $user_id);
		$this->db->order_by("course_id");
		$query = $this->db->get();
		return $query->result();
	}
	public function userlearningProgress($user_id,$course_id){
		$this->db->select("course_id");
		$this->db->from("user_learning");
		$this->db->where("user_id", $user_id);
		$this->db->where("course_id", $course_id);
		$query = $this->db->get();
		return $query->result();

	}

	public function updateCourse($courseArray,$course_id){


		$this->db->where('course_id', $course_id);

		$query= $this->db->update('courses',$courseArray);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function update($table, $column,$id, $dataArray){
		$this->db->where("$column",  $id);
		$query= $this->db->update("$table",$dataArray);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function updateUser($insertData,$user_id){

		$this->db->where('id', $user_id);

		$query= $this->db->update('users',$insertData);

		if ($query) {
			return true;
		} else {
			return false;
		}

	}
	public function updateUsergroup($insertData,$group_id){

		$this->db->where('id', $group_id);

		$query= $this->db->update('user_groups',$insertData);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public  function deleteUserGroup($user_group_id){
		$this->db->where('id', $user_group_id);
		$query= $this->db->delete('user_groups');
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function deleteUser($user_id){
		$this->db->where('id', $user_id);
		$query= $this->db->delete('users');

		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function getCourseContent($course_id){
		$this->db->select("video_content.id,video_content.file_name,video_content.subtopic_id,");
		$this->db->from("video_content");
		$this->db->join("subtopics","subtopics.id=video_content.subtopic_id");
		$this->db->join("topics","topics.id=subtopics.topic_id");
		$this->db->join("courses","courses.course_id=topics.course_id");
		$this->db->where("courses.course_id",$course_id);
		$query = $this->db->get();
		return $query->result();
	}
	public  function getNextVideo($multimedia_id){
		$this->db->select("video_content.file_name,video_content.subtopic_id,");
		$this->db->from("video_content");
		$this->db->where("video_content.id",$multimedia_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_answered_online_exam($id)
	{
		$this->db->select ('online_exam.*,online_exam_user_answer_option.*,online_exam_user_status.*,');
		$this->db->from('online_exam_user_answer_option');
		$this->db->join('online_exam', 'online_exam.onlineExamID = online_exam_user_answer_option.onlineExamID' );
		$this->db->join('online_exam_user_status', 'online_exam_user_status.onlineExamID = online_exam.onlineExamID' );
		$this->db->join('online_exam_question', 'online_exam_question.onlineExamID = online_exam.onlineExamID' );
		$this->db->join('question_bank', 'question_bank.questionBankID = online_exam_question.questionID' );
		$this->db->where('online_exam.published', 1);
		$this->db->where('question_bank.groupID',$id);
		$this->db->group_by('online_exam_user_answer_option.onlineExamUserAnswerOptionID');
		$this->db->order_by('online_exam_user_answer_option.onlineExamUserAnswerOptionID');
		$query = $this->db->get ();
		return $query->result ();

	}

	public function get_anwers($id){
		$this->db->select ('online_exam.*,online_exam_user_answer_option.*,,online_exam_user_status.*');
		$this->db->from('onlines_exam_user_answer_option');
		$this->db->join('online_exam', 'online_exam.onlineExamID = online_exam_user_answer_option.onlineExamID' );
		$this->db->join('online_exam_user_status', 'online_exam_user_status.onlineExamID = online_exam.onlineExamID' );
		$this->db->join('online_exam_question', 'online_exam_question.onlineExamID = online_exam.onlineExamID' );
		$this->db->join('question_bank', 'question_bank.questionBankID = online_exam_question.questionID' );
		$this->db->where('online_exam.published', 1);
		$this->db->where('question_bank.groupID',$id);
		$this->db->group_by('online_exam_user_answer_option.onlineExamUserAnswerOptionID');
		$query = $this->db->get ();
		return $query->result ();
	}
	public  function get_question($groupID){

		$this->db->select('online_exam.onlineExamID');
		$this->db->from('online_exam');
		$this->db->join('online_exam_question', 'online_exam_question.onlineExamID = online_exam.onlineExamID', 'inner');
		$this->db->join('question_bank', 'question_bank.questionBankID = online_exam_question.questionID', 'inner');
		$this->db->where('groupID',$groupID);
		$this->db->group_by('online_exam.onlineExamID');
		$query = $this->db->get ();
		return $query->result ();
	}

}
