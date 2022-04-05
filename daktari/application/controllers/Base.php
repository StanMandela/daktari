<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller
{

	/**
	 * Base Controller for Dawati Enterprise Application Analytics Website
	 * @author  Mwaura Gitonga
	 * @date 12.05.2021
	 * @email gitongakmwaura@gmail.com
	 * @signed U70xdn
	 */
	public function index()
	{

		$this->session->keep_flashdata('success');

		$this->load->view('landing.php');

	}

	/**
	 *Creating a Business to Bussiness account:
	 */

	public function logout()
	{
		//unset all user & session data and redirect to index page

		$this->session->unset_userdata('status');
		$this->session->unset_userdata('user_group');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('company_id');
		$this->session->unset_userdata('user_id');
		$this->session->sess_destroy();
		//$this->load->view('login.php');
		redirect('/');
	}
	public function isLoggedIn(){
		if ($this->session->userdata('status')== true) {
			return true;
		} else {
			redirect('login');
		}
	}
	public function about_us(){
		$this->load->view('my_views/about_us.php');
	}
	public function treatment(){
			$this->load->view('my_views/treatment.php');
	}
	public function diagnosis(){
			$this->load->view('my_views/diagnosis.php');
	}
	public function early_breast_cancer_treatment(){
			$this->load->view('my_views/early_breast_cancer_treatment.php');
	}
	public function medical_oncology(){
			$this->load->view('my_views/medical_oncology.php');
	}
	public function contact_us(){
			$this->load->view('my_views/contact_us.php');
	}
	public function appointment(){
		$this->load->view('my_views/appointment.php');
	}
	public function blog(){
		$this->load->view('my_views/blog.php');
	}
	public function book(){
		$this->load->view('my_views/book.php');
	}


}
