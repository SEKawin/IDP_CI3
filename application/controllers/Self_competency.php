<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Self_competency extends CI_Controller
{
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
		$this->load->model('self_competency_m', 'self_competency_m');
		$this->load->model('approval_m', 'approval_m');
	}
	public function index()
	{

		$data['list_emp'] = $this->account_m->get_all_account();

		$this->load->view('templates/header');
		$this->load->view('form/self_competency/form', $data);
		// $this->load->view('templates/footer');

	}

	public function ajax_list()
	{
		$list = $this->self_competency_m->get_datatables();
		// var_dump($list);
		// die;
		$data = array();

		$no = $_POST['start'];

		foreach ($list as $rows) {
			$no++;
			$row = array();

			$row[] = $rows->years;
			if ($rows->status == 0) :
				$row[] = '<span style="font-size: 15px"
                class="badge badge-secondary">รอดำเนินการ</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
							onclick="view_self_competency_form(' . "'" . $rows->id . "'" . ')">รายละเอียดแบบฟอร์ม
						</a>';
			elseif ($rows->status == 1) :
				$row[] = ' <span style="font-size: 15px"
                class=" badge badge-success">ผ่านการอนุมัติ</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
							onclick="view_self_competency_form(' . "'" . $rows->id . "'" . ')">รายละเอียดแบบฟอร์ม
						</a>';
			else :
				$row[] = '<span style="font-size: 15px"
                class=" badge badge-danger">ไม่ผ่านการอนุมัติ</span>';
				$row[] = '<div class="btn-group" role="group">
							<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
								onclick="view_self_competency_form(' . "'" . $rows->id . "'" . ')">รายละเอียดแบบฟอร์ม
							</a>
							<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="แก้ไขแบบฟอร์ม"
								onclick="edit_self_competency_form(' . "'" . $rows->id . "'" . ')">แก้ไขแบบฟอร์ม
							</a>
						</div>';
			endif;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->self_competency_m->count_all(),
			"recordsFiltered" => $this->self_competency_m->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_self_competency_approval()
	{
		$list = $this->self_competency_m->get_datatables_approval();
		// var_dump($list);
		// die;
		$data = array();

		$no = $_POST['start'];

		foreach ($list as $rows) {
			$no++;
			$row = array();

			$row[] = $rows->years;
			$row[] = $rows->code . ' ' . $rows->salutation . '' . $rows->firstname_th . ' ' . $rows->lastname_th;
			$row[] = $rows->department_code . ' ' . $rows->department_title;
			if ($rows->status == 0) :
				$row[] = '<span style="font-size: 15px"
                			class="badge badge-secondary">รอดำเนินการ</span>';
				$row[] = '<a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="อนุมัติแบบฟอร์ม"
								onclick="form_approval_mgr(' . "'" . $rows->id . "'" . ')">อนุมัติแบบฟอร์ม
				 			</a>';
			elseif ($rows->status == 1) :
				$row[] = ' <span style="font-size: 15px"
                			class=" badge badge-success">ผ่านการอนุมัติ</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
				 				onclick="view_self_competency_form(' . "'" . $rows->id . "'" . ')">รายละเอียดแบบฟอร์ม
				 			</a>';
			else :
				$row[] = '<span style="font-size: 15px"
                			class=" badge badge-danger">ไม่ผ่านการอนุมัติ</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
						onclick="view_self_competency_form(' . "'" . $rows->id . "'" . ')">รายละเอียดแบบฟอร์ม
						</a>';
			endif;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->self_competency_m->count_all(),
			"recordsFiltered" => $this->self_competency_m->count_filtered_approval(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function comeptency_mapping()
	{
		$position = $this->session->userdata('position');

		$data = $this->self_competency_m->get_competency_mapping($position);

		foreach ($data as $rows) :
			$data_json = [
				'core_competency' => json_decode($rows->core_competency),
				// 'cc_mapping' => json_decode($rows->cc_mapping),
				'manage_competency' => json_decode($rows->manage_competency),
				// 'mc_mapping' => json_decode($rows->mc_mapping),
			];
		endforeach;
		$data = [
			'data1' => $data_json,
		];

		echo json_encode($data);
	}

	public function add_selef_competency_form()
	{
		$this->_validate();

		$code = $this->session->userdata('code');
		$years = $this->input->post('years');

		// Data from Input Form Self-Competency
		$core_competency = json_encode($this->input->post('core'));
		$manage_competency = json_encode($this->input->post('manage'));
		$knowledge = json_encode($this->input->post('know'));
		$skill = json_encode($this->input->post('skill'));
		$personal_attributes = json_encode($this->input->post('perattr'));

		// Save into database
		$self_form_id = $this->self_competency_m->add_self_competency($years, $code, $core_competency, $manage_competency, $knowledge, $skill, $personal_attributes);

		$data = array('mgr_code' => $this->input->post('mgr_code'));
		$mgr_code = substr($data['mgr_code'], 0, 6);

		//Send Mail to Mgr.
		$this->approval_m->add_approval_self_competency($self_form_id, $mgr_code);
		$topic = 'Self-Competency Gap Assessment';
		$this->send_notify_form($code, $mgr_code, $years, $topic);
		//Send Mail to Mgr.

		//นำ Competency ของพนักงานใส่ให้หัวหน้าประเมิน
		//หัวหน้าผู้ประเมินแบบฟอร์ม
		$data = array('assessor_code' => $this->input->post('assessor_code'));
		$assessor_code = substr($data['assessor_code'], 0, 6);
		// นำข้อมูลไปลงในแบบฟอร์มของผู้ประเมิน
		$this->self_competency_m->add_assessor_competency_form($self_form_id, $years, $code, $assessor_code, $core_competency, $manage_competency, $knowledge, $skill, $personal_attributes);
		$topic = 'Competency Gap Assessment';
		$this->send_notify_form($code, $assessor_code, $years, $topic);
		// หัวหน้าผู้ประเมินแบบฟอร์ม

		// ดึงค่า competency ที่ได้ - เก็บลงใน field
		$this->result_competency($self_form_id);

		echo json_encode(array("status" => true));
	}
	public function update_form()
	{
		$code = $this->session->userdata('code');

		$years = date("Y");

		$core_competency = json_encode($this->input->post('core'));
		$manage_competency = json_encode($this->input->post('manage'));
		$knowledge = json_encode($this->input->post('know'));
		$skill = json_encode($this->input->post('skill'));
		$personal_attributes = json_encode($this->input->post('perattr'));

		$self_form_id = $this->self_competency_m->add_self_competency($years, $code, $core_competency, $manage_competency, $knowledge, $skill, $personal_attributes);

		//ผู้ต้นสังกัดอนุัมติ
		$data = array('mgr_code' => $this->input->post('mgr_code'));
		$mgr_code = substr($data['mgr_code'], 0, 6);
		$this->approval_m->add_approval_self_competency($self_form_id, $mgr_code);
		//ผู้ต้นสังกัดอนุัมติ

		//หัวหน้าผู้ประเมินแบบฟอร์ม
		$data = array('assessor_code' => $this->input->post('assessor_code'));
		$assessor_code = substr($data['assessor_code'], 0, 6);
		// นำข้อมูลไปลงในแบบฟอร์มของผู้ประเมิน
		$this->self_competency_m->add_assessor_competency_form($years, $code, $assessor_code, $core_competency, $manage_competency, $knowledge, $skill, $personal_attributes);
		// หัวหน้าผู้ประเมินแบบฟอร์ม

		echo json_encode(array("status" => true));
	}

	function view_self_competency_form($form_id)
	{
		$code = $this->session->userdata('code');

		$data_form = $this->self_competency_m->view_self_competency_form_by_id($form_id);

		$form_maker = $this->self_competency_m->check_form_maker($form_id);

		$status_form = $this->self_competency_m->check_approval_self_competency($form_id);

		foreach ($data_form as $rows) :

			$core_competency =  [
				'core_competency' => json_decode($rows->core_competency),
			];

			$manage_competency =  [
				'manage_competency' => json_decode($rows->manage_competency),
			];

			$knowledge =  [
				'knowledge' => json_decode($rows->knowledge),
			];

			$skill =  [
				'skill' => json_decode($rows->skill),
			];
			$personal_attributes =  [
				'personal_attributes' => json_decode($rows->personal_attributes),
			];

			$data = [
				'core_competency' => $core_competency,
				'manage_competency' => $manage_competency,
				'knowledge' => $knowledge,
				'skill' => $skill,
				'personal_attributes' => $personal_attributes,
				'data' => $data_form,
				'status_form' => $status_form,
				'form_maker' => $form_maker,
			];
			echo json_encode($data);

		endforeach;
	}

	function approval_form_mgr()
	{
		$data = array(
			'self_form_id' => $this->input->post('form_id'),
			'mgr_status' => $this->input->post('status'),
		);

		$self_form_id = $data['self_form_id'];
		$mgr_status = $data['mgr_status'];

		$this->self_competency_m->update_self_competency_form($self_form_id, $mgr_status);
		$this->approval_m->self_competency_form_approval($self_form_id, $mgr_status);

		echo json_encode(array("status" => true));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = true;

		if ($this->input->post('years') == '') :
			$data['inputerror'][] = 'years';
			$data['error_string'][] = '*ระบุประจำปี ';
			$data['status'] = false;
		endif;

		if ($this->input->post('assessor_code') == '') :
			$data['inputerror'][] = 'assessor_code';
			$data['error_string'][] = '*ระบุหัวหน้าผู้ประเมิน ';
			$data['status'] = false;
		endif;

		if ($this->input->post('mgr_code') == '') :
			$data['inputerror'][] = 'mgr_code';
			$data['error_string'][] = '*ระบุผู้อนุมัติต้นสังกัด ';
			$data['status'] = false;
		endif;

		if ($data['status'] === false) :
			echo json_encode($data);
			exit();
		endif;
	}

	function send_notify_form($emp_code, $code, $years, $topic)
	{
		$data['emp'] = $this->account_m->get_account_code($emp_code);

		$data['mgr'] = $this->account_m->get_account_code($code);

		foreach ($data['mgr'] as $rows) :
			$to_email = $rows->email;
		endforeach;

		$data['years'] = $years;

		$data['topic'] = $topic;

		if ($topic == 'Self-Competency Gap Assessment') :
			$message = $this->load->view('mail_notify/notify_to_mgr', $data, TRUE);
		elseif ($topic == 'Competency Gap Assessment') :
			$message = $this->load->view('mail_notify/notify_to_supervisory', $data, TRUE);
		endif;

		$from_email = "noreply.publictraining@gmail.com";
		// Load email library
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'noreply.publictraining@gmail.com',
			'smtp_pass' => 'HRD_publictraining',
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
		);

		$this->load->library('email', $config);
		// $this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
		$this->email->set_header('Content-type', 'text/html'); //must add this line
		$this->email->from($from_email, 'Individual Development Plan Online'); //จากอีเมล์
		$this->email->to($to_email); // ส่ง อีเมล์
		$this->email->subject('Individual Development Plan Online Alert!!!'); // หัวข้อ
		$this->email->message($message); // รายละเอียด

		// // Send mail
		// $send = $this->email->send();
		// $showerror = $this->email->print_debugger();
	}

	public function result_competency($form_id)
	{
		$data_form = $this->self_competency_m->view_self_competency_form_by_id($form_id);
		foreach ($data_form as $rows) :
			$form_id = $rows->id;
			$core_competency = json_decode($rows->core_competency);
			$manage_competency = json_decode($rows->manage_competency);
			$knowledge = json_decode($rows->knowledge);
			$skill = json_decode($rows->skill);
			$personal_attributes = json_decode($rows->personal_attributes);
		endforeach;
		
		foreach ($core_competency as $rows) :
			$rows->competency;
			if ($rows->expected != 'R') :
				$result = $rows->actual - $rows->expected;
				if ($result < 0) :
					$data1[] = $rows->competency;
				else:
					$data1 = '';
				endif;
			endif;
		endforeach;

		$data = json_encode($data1);
		$this->db->set('cc_result', $data);
		$this->db->where('id', $form_id);
		$this->db->update('idp_self_competency_form');

		if ($manage_competency != null) :

			foreach ($manage_competency as $rows) :
				$rows->competency;
				$result = $rows->actual - $rows->expected;
				if ($result < 0) :
					$data2[] = $rows->competency;
				endif;
			endforeach;

		elseif ($manage_competency == null) :

			$data2 = null;

		endif;

		$data = json_encode($data2);
		$this->db->set('mc_result', $data);
		$this->db->where('id', $form_id);
		$this->db->update('idp_self_competency_form');

		foreach ($knowledge as $rows) :
			$rows->competency;
			$result = $rows->actual - $rows->expected;
			if ($result < 0) :
				$data3[] = $rows->competency;
			endif;
		endforeach;

		$data = json_encode($data3);
		$this->db->set('know_result', $data);
		$this->db->where('id', $form_id);
		$this->db->update('idp_self_competency_form');

		foreach ($skill as $rows) :
			$rows->competency;
			$result = $rows->actual - $rows->expected;
			if ($result < 0) :
				$data4[] = $rows->competency;
			endif;
		endforeach;

		$data = json_encode($data4);
		$this->db->set('skill_result', $data);
		$this->db->where('id', $form_id);
		$this->db->update('idp_self_competency_form');

		foreach ($personal_attributes as $rows) :
			$competency = $rows->competency;
			$result = $rows->actual - $rows->expected;
			if ($result < 0) :
				$data5[] = $competency;
			endif;
		endforeach;

		$data = json_encode($data5);
		$this->db->set('perattr_result', $data);
		$this->db->where('id', $form_id);
		$this->db->update('idp_self_competency_form');
	}

	public function show_competency($form_id)
	{
		$data_form = $this->self_competency_m->view_self_competency_form_by_id($form_id);
		foreach ($data_form as $rows) :
			$form_id = $rows->id;
			$cc_result = json_decode($rows->cc_result);
			$mc_result = json_decode($rows->mc_result);
			$know_result = json_decode($rows->know_result);
			$skill_result = json_decode($rows->skill_result);
			$perattr_result = json_decode($rows->perattr_result);

			$data = [
				'form_id' => $rows->id,
				'cc_result' => $cc_result,
				'mc_result' => $mc_result,
				'know_result' => $know_result,
				'skill_result' => $skill_result,
				'perattr_result' => $perattr_result,
			];

			echo json_encode($data);
		endforeach;
	}
}
