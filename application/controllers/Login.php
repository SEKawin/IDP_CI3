<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->no_cache();

		$this->load->library('mydate'); //เปิดใช้งาน library mydate

		// Load database
		$this->load->model('account_m', 'account');
	}

	public function index()
	{
		$this->no_cache();

		$this->load->view('login_v');
	}

	public function process_auth_login()
	{
		$username = $this->input->post('username', true);

		$password = md5($this->input->post('password', true));

		$validate = $this->account->validate_login_db($username, $password);

		if ($validate->num_rows() > 0) {
			$data = $validate->row_array();
			$account_id = $data['account_id'];
			$username = $data['username'];
			$role = $data['role'];
			$code = $data['code'];
			$salutation = $data['salutation'];
			$firstname_th = $data['firstname_th'];
			$lastname_th = $data['lastname_th'];
			$position = $data['position'];
			$department_code = $data['department_code'];
			$department_title = $data['department_title'];
			$startwork = $data['startwork'];
			$dob = $data['birthdate'];
			$email = $data['email'];
			$workday = $this->CalDateWork($startwork);
			$birthdate = $this->CalDateWork($dob);
			$name_role = $data['name_role'];
			$office_title = $data['office_title'];
			$office_code = $data['office_code'];
			$department_title = $data['department_title'];
			$role_name = $data['role_name'];

			$sessdata = array(
				'account_id' => $account_id,
				'username' => $username,
				'role' => $role,
				'code' => $code,
				'salutation' => $salutation,
				'firstname_th' => $firstname_th,
				'lastname_th' => $lastname_th,
				'position' => $position,
				'department_code' => $department_code,
				'department_title' => $department_title,
				'startwork' => $startwork,
				'workday' => $workday,
				'birthdate' => $birthdate,
				'email' => $email,
				'name_role' => $name_role,
				'role_name' => $role_name,
				'office_title' => $office_title,
				'office_code' => $office_code,
				'department_title' => $department_title,
				'logged_in' => true,
			);
			$sessdata = $this->session->set_userdata($sessdata);
			redirect('home');
		} else {
			echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
			redirect('login');
		}
	}

	// Logout from admin page
	public function logout()
	{
		$this->session->unset_userdata('account_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->sess_destroy();
		redirect('login');
	}

	/** Clear the old cache (usage optional) **/
	protected function no_cache()
	{
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', false);
		header('Pragma: no-cache');
	}

	public function CalDateWork($Caldate)
	{
		$date = strtotime($Caldate);
		$today = time();

		return $this->timespan($date, $today);
	}

	public function timespan($seconds = 1, $time = '')
	{

		if (!is_numeric($seconds)) {
			$seconds = 1;
		}

		if (!is_numeric($time)) {
			$time = time();
		}

		if ($time <= $seconds) {
			$seconds = 1;
		} else {
			$seconds = $time - $seconds;
		}

		$str = '';
		$years = floor($seconds / 31536000);

		if ($years > 0) {
			$str .= $years . ' ปี ';
		}

		$seconds -= $years * 31536000;
		$months = floor($seconds / 2628000);

		if ($years > 0 or $months > 0) {
			if ($months > 0) {
				$str .= $months . ' เดือน , ';
			}

			$seconds -= $months * 2628000;
		}

		// $days = floor($seconds / 86400);

		// if ($months > 0 or $weeks > 0 or $days > 0) {
		//     if ($days > 0) {
		//         $str .= $days . ' วัน, ';
		//     }

		//     $seconds -= $days * 86400;
		// }

		return substr(trim($str), 0, -1);
	}
}
