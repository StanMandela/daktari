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

}
