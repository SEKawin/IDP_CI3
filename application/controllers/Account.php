<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Account extends CI_Controller
{

	public $PAGE;

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') !== true) {
			redirect('login');
		}

		// Load Pagination library
		$this->load->library('pagination');

		// Load database
		$this->load->model('account_m', 'account_m');
		$this->load->model('managa_m', 'managa_m');
	}

	public function index()
	{
		$this->load->view('account/account_v');
	}

	public function ajax_list()
	{
		$list = $this->managa_m->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rows) {
			$no++;
			$row = array();
			$row[] = $rows->code;
			$row[] = $rows->salutation . '' . $rows->firstname_th . ' ' . $rows->lastname_th;
			$row[] = $rows->position;
			$row[] = $rows->department_code . ' ' . $rows->department_title;
			if ($rows->removed == '0') {
				$row[] = '<spen class ="text-success"> ใช้งาน </spen>';
			} else {
				$row[] = '<spen class ="text-success"> ลาออก </spen>';
			}
			$row[] = '
                    <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit Account"
                    onclick="edit_account(' . "'" . $rows->code . "'" . ')">
                    <i class="fa fa-pencil-square-o"></i> ปรับปรุง</a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Remove Account"
                    onclick="delete_account(' . "'" . $rows->code . "'" . ')">
                    <i class="fa fa-trash-o"></i></i> นำออก</a> </td>
                    ';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->managa_m->count_all(),
			"recordsFiltered" => $this->managa_m->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function manage()
	{
		$data['list_office'] = $this->account_m->list_office();
		$data['list_department'] = $this->account_m->list_department();
		$data['list_division'] = $this->account_m->list_division();
		$data['list_section'] = $this->account_m->list_section();

		$this->load->view('account/manage_v', $data);
	}

	public function approver_list()
	{
		$data['approver_mgr'] = $this->account_m->get_approver_mgr();
		$data['approver_super'] = $this->account_m->get_approver_super();
		$data['list_emp'] = $this->account_m->get_all_account();

		$this->load->view('account/approver_v', $data);
	}


	public function ajax_add_account()
	{
		$this->_validate();
		// DATA PREPARATION
		$data = array(
			'code' => $this->input->post('code'),
			'firstname_th' => $this->input->post('firstname_th'),
			'lastname_th' => $this->input->post('lastname_th'),
			'username' => $this->input->post('code'),
			'salutation' => $this->input->post('salutation'),
			'firstname_en' => $this->input->post('firstname_en'),
			'lastname_en' => $this->input->post('lastname_en'),
			'sex' => $this->input->post('sex'),
			'idcard' => $this->input->post('idcard'),
			'position' => $this->input->post('position'),
			'startwork' => $this->input->post('startwork'),
			'birthdate' => $this->input->post('birthdate'),
			'education' => $this->input->post('education'),
			'section_code' => $this->input->post('section_code'),
			'section_title' => $this->input->post('section_title'),
			'division_code' => $this->input->post('division_code'),
			'division_title' => $this->input->post('division_title'),
			'department_code' => $this->input->post('department_code'),
			'department_title' => $this->input->post('department_title'),
			'office_code' => $this->input->post('office_code'),
			'office_title' => $this->input->post('office_title'),
			'email' => $this->input->post('email'),
			'password' => md5(substr($this->input->post('idcard'), -4)),
		);

		$code = $data['code'];
		$insert_id = $this->account_m->save_account($data);
		$this->idp_form->save_new_idp($insert_id);

		echo json_encode(array("status" => true));
	}

	public function ajax_edit_account($emp_code)
	{

		$data = $this->account_m->get_account_code($emp_code);

		echo json_encode($data);
	}

	public function ajax_views_account($emp_code)
	{
		$data = $this->account_m->get_account_code($emp_code);
		echo json_encode($data);
	}

	public function ajax_update_account()
	{
		$this->_validate();
		date_default_timezone_set('Asia/Bangkok');
		$date_now = date("Y-m-d H:i:s");
		$data = array(
			'code' => $this->input->post('code'),
			'firstname_th' => $this->input->post('firstname_th'),
			'lastname_th' => $this->input->post('lastname_th'),
			'username' => $this->input->post('code'),
			'salutation' => $this->input->post('salutation'),
			'firstname_en' => $this->input->post('firstname_en'),
			'lastname_en' => $this->input->post('lastname_en'),
			'sex' => $this->input->post('sex'),
			'idcard' => $this->input->post('idcard'),
			'position' => $this->input->post('position'),
			'startwork' => $this->input->post('startwork'),
			'birthdate' => $this->input->post('birthdate'),
			'education' => $this->input->post('education'),
			'section_code' => $this->input->post('section_code'),
			'section_title' => $this->input->post('section_title'),
			'division_code' => $this->input->post('division_code'),
			'division_title' => $this->input->post('division_title'),
			'department_code' => $this->input->post('department_code'),
			'department_title' => $this->input->post('department_title'),
			'office_code' => $this->input->post('office_code'),
			'office_title' => $this->input->post('office_title'),
			'email' => $this->input->post('email'),
			'password' => md5(substr($this->input->post('idcard'), -4)),
			'update_on' => $date_now,
		);

		$this->account_m->update_account(array('code' => $this->input->post('code')), $data);

		echo json_encode(array("status" => true));
	}

	public function remove($emp_code)
	{
		//remove file
		$this->account_m->remove_by_code($emp_code);

		echo json_encode(array("status" => true));
	}
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = true;

		if ($this->input->post('code') == '') {
			$data['inputerror'][] = 'code';
			$data['error_string'][] = '*กรุณาใส่ รหัสพนักงาน';
			$data['status'] = false;
		}

		if ($this->input->post('salutation') == '') {
			$data['inputerror'][] = 'salutation';
			$data['error_string'][] = '*กรุณาใส่ คำนำหน้า';
			$data['status'] = false;
		}

		if ($this->input->post('firstname_th') == '') {
			$data['inputerror'][] = 'firstname_th';
			$data['error_string'][] = '*กรุณาใส่ ชื่อ ';
			$data['status'] = false;
		}

		if ($this->input->post('lastname_th') == '') {
			$data['inputerror'][] = 'lastname_th';
			$data['error_string'][] = '*กรุณาใส่ นามสกุล';
			$data['status'] = false;
		}

		if ($this->input->post('department_code') == '') {
			$data['inputerror'][] = 'department_code';
			$data['error_string'][] = 'กรุณาระบุ รหัสฝ่าย';
			$data['status'] = false;
		}
		if ($this->input->post('department_title') == '') {
			$data['inputerror'][] = 'department_title';
			$data['error_string'][] = 'กรุณาระบุ ชื่อฝ่าย';
			$data['status'] = false;
		}
		if ($this->input->post('idcard') == '') {
			$data['inputerror'][] = 'idcard';
			$data['error_string'][] = 'กรุณาใส่ รหัวบัตรประชาชน';
			$data['status'] = false;
		}
		if ($this->input->post('firstname_en') == '') {
			$data['inputerror'][] = 'firstname_en';
			$data['error_string'][] = 'กรุณาใส่ ชื่อ (อังกฤษ)';
			$data['status'] = false;
		}
		if ($this->input->post('lastname_en') == '') {
			$data['inputerror'][] = 'lastname_en';
			$data['error_string'][] = 'กรุณาใส่ นามสกุล (อังกฤษ)';
			$data['status'] = false;
		}
		if ($this->input->post('sex') == '') {
			$data['inputerror'][] = 'sex';
			$data['error_string'][] = 'กรุณาระบุ เพศ';
			$data['status'] = false;
		}
		if ($this->input->post('position') == '') {
			$data['inputerror'][] = 'position';
			$data['error_string'][] = 'กรุณาระบุ ตำแหน่ง';
			$data['status'] = false;
		}
		if ($this->input->post('startwork') == '') {
			$data['inputerror'][] = 'startwork';
			$data['error_string'][] = 'กรุณาระบุวันที่เริ่มทำงาน';
			$data['status'] = false;
		}
		if ($this->input->post('birthdate') == '') {
			$data['inputerror'][] = 'birthdate';
			$data['error_string'][] = 'กรุณาระบุ วันเกิด';
			$data['status'] = false;
		}
		if ($this->input->post('education') == '') {
			$data['inputerror'][] = 'education';
			$data['error_string'][] = 'กรุณาใส่ การศึกษา';
			$data['status'] = false;
		}

		// if ($this->input->post('email') == '') {
		//     $data['inputerror'][] = 'email';
		//     $data['error_string'][] = 'กรุณาใส่ อีเมล์';
		//     $data['status'] = false;
		// }

		if ($this->input->post('section_code') == '') {
			$data['inputerror'][] = 'section_code';
			$data['error_string'][] = 'กรุณาใส่ รหัสแผนก';
			$data['status'] = false;
		}
		if ($this->input->post('section_title') == '') {
			$data['inputerror'][] = 'section_title';
			$data['error_string'][] = 'กรุณาใส่ ชื่อแผนก';
			$data['status'] = false;
		}
		if ($this->input->post('division_code') == '') {
			$data['inputerror'][] = 'division_code';
			$data['error_string'][] = 'กรุณาใส่ รหัสส่วน';
			$data['status'] = false;
		}
		if ($this->input->post('division_title') == '') {
			$data['inputerror'][] = 'division_title';
			$data['error_string'][] = 'กรุณาใส่ ชื่อส่วน';
			$data['status'] = false;
		}
		if ($this->input->post('office_code') == '') {
			$data['inputerror'][] = 'office_code';
			$data['error_string'][] = 'กรุณาใส่ ชื่อสำนัก';
			$data['status'] = false;
		}
		if ($this->input->post('office_title') == '') {
			$data['inputerror'][] = 'office_title';
			$data['error_string'][] = 'กรุณาใส่ ชื่อสำนัก';
			$data['status'] = false;
		}

		if ($data['status'] === false) {
			echo json_encode($data);
			exit();
		}
	}

	public function hrd_list()
	{
		$data['hrd_staff'] = $this->account_m->get_hrd();
		$data['hrd_mgr'] = $this->account_m->get_hrd_mgr();
		$data['hrd_manager'] = $this->account_m->get_hrd_manager();
		$this->load->view('account/hrd_v', $data);
	}

	public function hrd_add()
	{
		$code = $this->input->post('code');

		$success = false;
		// VALIDATE PARAMETER
		if ($code == NULL) {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "กรุณากรอกรหัสพนักงาน");
			redirect('account/hrd_list');
		}

		$code = str_pad($code, 6, '0', STR_PAD_LEFT);

		// CHECK ACCOUNT
		$this->db->select('code');
		$this->db->where('code', $code);
		$this->db->where('resign', 0);
		$query = $this->db->get('account');
		$account = $query->row();

		if ($account == NULL) {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "รหัสพนักงาน {$code} ไม่มีอยู่ในระบบ");
			redirect('account/hrd_list');
		}

		// CHECK IF ACCOUNT EXIST IN ATTEND
		$role = 2;
		if ($this->account_m->is_exist($code, $role) == TRUE) {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "{$code} ลงทะเบียนแล้ว");
			redirect('account/hrd_list');
		}

		// เพิ่มสิทธิ์พนักงาน
		if (!empty($account)) {
			$this->db->set('account_code', $account->code);
			$this->db->set('role_id', '2');
			$this->db->insert('account_of_role');
			$success = true;
		}

		if ($success == true) {
			$this->session->set_flashdata('alert', 'success');
			$this->session->set_flashdata('message', "เพิ่ม {$code} รายการเรียบร้อยแล้ว");
		} else {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "เพิ่ม {$code} รายการไม่สำเร็จ");
		}

		redirect('account/hrd_list');
	}

	public function hrd_mgr_add()
	{
		$code = $this->input->post('code');

		$success = false;
		// VALIDATE PARAMETER
		if ($code == NULL) {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "กรุณากรอกรหัสพนักงาน");
			redirect('account/hrd_list');
		}

		$code = str_pad($code, 6, '0', STR_PAD_LEFT);

		// CHECK ACCOUNT
		$this->db->select('code');
		$this->db->where('code', $code);
		$this->db->where('resign', 0);
		$query = $this->db->get('account');
		$account = $query->row();

		if ($account == NULL) {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "รหัสพนักงาน {$code} ไม่มีอยู่ในระบบ");
			redirect('account/hrd_list');
		}

		// CHECK IF ACCOUNT EXIST IN ATTEND
		$role = 4;
		if ($this->account_m->is_exist($code, $role) == TRUE) {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "{$code} ลงทะเบียนแล้ว");
			redirect('account/hrd_list');
		}

		// เพิ่มสิทธิ์พนักงาน
		if (!empty($account)) {
			$this->db->set('account_code', $account->code);
			$this->db->set('role_id', '4');
			$this->db->insert('account_of_role');
			$success = true;
		}

		if ($success == true) {
			$this->session->set_flashdata('alert', 'success');
			$this->session->set_flashdata('message', "{$code} เพิ่มรายการเรียบร้อยแล้ว");
		} else {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "{$code} เพิ่มรายการไม่สำเร็จ");
		}

		redirect('account/hrd_list');
	}

	public function hrd_remove($code = '')
	{
		$success = false;

		if ($code != '') {
			$this->db->where('account_code', $code);
			$this->db->where('role_id', '2');
			$this->db->delete('account_of_role');

			$success = true;
		}

		if ($success == true) {
			$this->session->set_flashdata('alert', 'success');
			$this->session->set_flashdata('message', 'ลบรายการเรียบร้อยแล้ว');
		} else {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', 'ลบรายการไม่สำเร็จ');
		}

		redirect('account/hrd_list');
	}

	public function hrd_mgr_remove($id = '')
	{
		$success = false;

		if ($id != '') {
			$this->db->where('account_code', $id);
			$this->db->where('role_id', '4');
			$this->db->delete('account_of_role');

			$success = true;
		}

		if ($success == true) {
			$this->session->set_flashdata('alert', 'success');
			$this->session->set_flashdata('message', 'ลบรายการเรียบร้อยแล้ว');
		} else {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', 'ลบรายการไม่สำเร็จ');
		}

		redirect('account/hrd_list');
	}

	public function hrd_manager_add()
	{
		$code = $this->input->post('code');

		$success = false;
		// VALIDATE PARAMETER
		if ($code == NULL) {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "กรุณากรอกรหัสพนักงาน");
			redirect('account/hrd_list');
		}

		$code = str_pad($code, 6, '0', STR_PAD_LEFT);

		// CHECK ACCOUNT
		$this->db->select('code');
		$this->db->where('code', $code);
		$this->db->where('resign', 0);
		$query = $this->db->get('account');
		$account = $query->row();

		if (!empty($account)) {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "รหัสพนักงาน {$code} ไม่มีอยู่ในระบบ");
			redirect('account/hrd_list');
		}

		// CHECK IF ACCOUNT EXIST IN ATTEND
		$role = 5;
		if ($this->account_m->is_exist($code, $role) == TRUE) {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "{$code} ลงทะเบียนแล้ว");
			redirect('account/hrd_list');
		}

		// เพิ่มสิทธิ์พนักงาน
		if (!empty($account)) {
			$this->db->set('account_code', $account->code);
			$this->db->set('account_role_id', 5);
			$this->db->insert('account_of_role');
			$success = true;
		}

		if ($success == true) {
			$this->session->set_flashdata('alert', 'success');
			$this->session->set_flashdata('message', "เพิ่ม {$code} รายการเรียบร้อยแล้ว");
		} else {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', "เพิ่ม {$code} รายการไม่สำเร็จ");
		}

		redirect('account/hrd_list');
	}

	public function hrd_manager_remove($code = '')
	{
		$success = false;

		if ($code != '') {
			$this->db->where('account_code', $code);
			$this->db->where('account_role_id', '5');
			$this->db->delete('account_of_role');

			$success = true;
		}

		if ($success == true) {
			$this->session->set_flashdata('alert', 'success');
			$this->session->set_flashdata('message', 'ลบรายการเรียบร้อยแล้ว');
		} else {
			$this->session->set_flashdata('alert', 'danger');
			$this->session->set_flashdata('message', 'ลบรายการไม่สำเร็จ');
		}

		redirect('account/hrd_list');
	}
}
