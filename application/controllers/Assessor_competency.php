<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Assessor_competency extends CI_Controller
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
		$this->load->model('assessor_competency_m', 'assessor_competency_m');
		$this->load->model('approval_m', 'approval_m');
		$this->load->model('idp_form_m', 'idp_form_m');
	}
	public function index()
	{
		$data['list_emp'] = $this->account_m->get_all_account();

		$this->load->view('templates/header');
		$this->load->view('form/assessor_competency/form', $data);
		// $this->load->view('templates/footer');
	}

	// datatable พนักงานเห็นแบบฟอร์ม
	public function ajax_list()
	{
		$list = $this->assessor_competency_m->get_datatables();

		$data = array();

		$no = $_POST['start'];

		foreach ($list as $rows) {
			$no++;
			$row = array();

			$row[] = $rows->years;
			if ($rows->status_form == 0) :
				$row[] = '<span style="font-size: 15px"
               				 class="badge badge-secondary">รอดำเนินการ</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
							onclick="view_assessor_competency_form(' . "'" . $rows->self_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
						</a>';
			elseif ($rows->status_form == 1) :
				$row[] = ' <span style="font-size: 15px"
                					class=" badge badge-success">ผ่านการประเมิน</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
							onclick="view_assessor_competency_form(' . "'" . $rows->self_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
						</a>';
			else :
				$row[] = '<span style="font-size: 15px"
                					class=" badge badge-danger">ไม่ผ่านการประเมิน</span>';
				$row[] = '<div class="btn-group" role="group">
							<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
								onclick="view_assessor_competency_form(' . "'" . $rows->self_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
							</a>
						</div>';
			endif;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->assessor_competency_m->count_all(),
			"recordsFiltered" => $this->assessor_competency_m->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	// datatable หัวหน้าผู้ประเมิน
	public function ajax_competency_assessor()
	{
		$list = $this->assessor_competency_m->get_datatables_assessor();
		$data = array();

		$no = $_POST['start'];

		foreach ($list as $rows) {
			$no++;
			$row = array();

			$row[] = $rows->years;
			$row[] = $rows->code . ' ' . $rows->salutation . '' . $rows->firstname_th . ' ' . $rows->lastname_th;
			$row[] = $rows->department_code . ' ' . $rows->department_title;
			if ($rows->status_form == 0) :
				$row[] = '<span style="font-size: 15px"
                				class="badge badge-secondary">รอดำเนินการ</span>';
				$row[] = '<a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="ประเมินแบบฟอร์ม"
						onclick="form_assessor(' . "'" . $rows->self_form_id . "'" . ')">ประเมินแบบฟอร์ม
				 		</a>';
			elseif ($rows->status_form == 1) :
				$row[] = ' <span style="font-size: 15px"
								class="badge badge-success">ได้ทำการประเมิน</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
				 		onclick="view_assessor_competency_form(' . "'" . $rows->self_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
				 		</a>';
			else :
				$row[] = '<span style="font-size: 15px"
               				 class=" badge badge-danger">ไมผ่่านการประเมิน</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
						onclick="view_assessor_competency_form(' . "'" . $rows->self_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
						</a>';
			endif;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->assessor_competency_m->count_all(),
			"recordsFiltered" => $this->assessor_competency_m->count_filtered_assessor(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	// datatable ผู้อนุมัติต้นสังกัด
	public function ajax_assessor_competency_approval()
	{
		$list = $this->assessor_competency_m->get_datatables_approval();

		$data = array();

		$no = $_POST['start'];

		foreach ($list as $rows) {
			$no++;
			$row = array();

			$row[] = $rows->years;
			$row[] = $rows->code . ' ' . $rows->salutation . '' . $rows->firstname_th . ' ' . $rows->lastname_th;
			$row[] = $rows->department_code . ' ' . $rows->department_title;
			if ($rows->mgr_status == 0) :
				$row[] = '<span style="font-size: 15px"
                				class="badge badge-secondary">รอดำเนินการ</span>';
				$row[] = '<a class="btn btn-sm btn-secondary" href="javascript:void(0)" title="อนุมัติแบบฟอร์ม"
						onclick="form_approval_mgr(' . "'" . $rows->self_form_id . "'" . ')">อนุมัติแบบฟอร์ม
				 		</a>';
			elseif ($rows->mgr_status == 1) :
				$row[] = ' <span style="font-size: 15px"
				class="badge badge-success">ผ่านการอนุมัติ</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
				 		onclick="view_assessor_competency_form(' . "'" . $rows->self_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
				 	</a>';
			else :
				$row[] = '<span style="font-size: 15px"
               				 class=" badge badge-danger">ไม่ผ่านการอนุมัติ</span>';
				$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
						onclick="view_assessor_competency_form(' . "'" . $rows->self_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
						</a>';
			endif;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->assessor_competency_m->count_all(),
			"recordsFiltered" => $this->assessor_competency_m->count_filtered_approval(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	// View of Supervisory
	function view_assessor_competency($form_id)
	{
		$code = $this->session->userdata('code');

		$data_form = $this->assessor_competency_m->view_assessor_competency($form_id);

		$form_maker = $this->assessor_competency_m->form_maker($form_id);

		$form_assessor = $this->assessor_competency_m->form_assessor($form_id);

		$status_form = $this->assessor_competency_m->check_approval_competency($form_id);

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
				'form_assessor' => $form_assessor,
			];

			echo json_encode($data);

		endforeach;
	}
	// View of Supervisory

	public function update_competency_form()
	{
		$years = $this->input->post('years');
		$emp_code = $this->input->post('emp_code');

		$core_competency = json_encode($this->input->post('core'));

		$manage_competency = json_encode($this->input->post('manage'));

		$knowledge = json_encode($this->input->post('know'));

		$skill = json_encode($this->input->post('skill'));

		$personal_attributes = json_encode($this->input->post('perattr'));

		$status_form = '1'; // ผู้ประเมินทำการประเมินเรียบร้อย

		$competency_form_id = $this->input->post('form_id');
		$mgr_code = substr($this->input->post('mgr_code'), 0, 6);

		//Update Competency Form By Supervisory
		$this->assessor_competency_m->update_competency_form($competency_form_id, $core_competency, $manage_competency, $knowledge, $skill, $personal_attributes, $status_form);

		//Send Alert to Mgr
		$this->approval_m->add_approval_competency_form($competency_form_id, $mgr_code);
		$topic = 'Competency Gap Assessment';
		$this->send_notify_form($emp_code, $mgr_code, $years, $topic);

		echo json_encode(array("status" => true));
	}

	// view of Mgr. Approval
	function view_approval_competency($form_id)
	{
		$code = $this->session->userdata('code');

		$data_form = $this->assessor_competency_m->view_approval_competency($form_id);

		$form_maker = $this->assessor_competency_m->form_maker($form_id);

		$form_assessor = $this->assessor_competency_m->form_assessor($form_id);

		$status_form = $this->assessor_competency_m->check_approval_competency($form_id);
		
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
				'form_assessor' => $form_assessor,
			];

			echo json_encode($data);

		endforeach;
	}
	// view of Mgr. Approval

	// MGR Approval Form
	function approval_form_mgr()
	{
		$mgr_code = $this->session->userdata('code');

		$years = $this->input->post('years');
		$emp_code = $this->input->post('emp_code');
		//update Form Competency of Mgr approval

		$core_competency = json_encode($this->input->post('core'));
		$manage_competency = json_encode($this->input->post('manage'));
		$knowledge = json_encode($this->input->post('know'));
		$skill = json_encode($this->input->post('skill'));
		$personal_attributes = json_encode($this->input->post('perattr'));

		$form_id = $this->input->post('form_id');
		$mgr_status = $this->input->post('status');

		// Update Form Competency Form By MGR
		$this->assessor_competency_m->update_competency_form($form_id, $core_competency, $manage_competency, $knowledge, $skill, $personal_attributes, $status_form = 1);
		// approval by Mgr
		$this->approval_m->competency_form_approval($form_id, $mgr_status, $mgr_code);

		// add row IDP plan
		$this->idp_form_m->create_idp_plan_form($form_id, $years, $emp_code);

		// Send Mail Alert to EMP 
		$this->send_notify_emp($emp_code, $years);

		$this->result_competency($form_id);

		echo json_encode(array("status" => true));
	}
	// MGR Approval Form

	public function send_notify_form($emp_code, $code, $years, $topic)
	{
		$data['emp'] = $this->account_m->get_account_code($emp_code);

		$data['mgr'] = $this->account_m->get_account_code($code);

		foreach ($data['mgr'] as $rows) :
			$to_email = $rows->email;
		endforeach;

		$data['years'] = $years;

		$data['topic'] = $topic;

		if ($topic = 'Self-Competency Gap Assessment') :
			$message = $this->load->view('mail_notify/notify_to_mgr', $data, TRUE);
		elseif ($$topic == 'Competency Gap Assessment') :
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

	public function send_notify_emp($emp_code, $years)
	{
		$data['emp'] = $this->account_m->get_account_code($emp_code);

		foreach ($data['emp'] as $rows) :
			$to_email = $rows->email;
		endforeach;

		$data['years'] = $years;

		$message = $this->load->view('mail_notify/notify_to_emp', $data, TRUE);

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
		$data_form = $this->assessor_competency_m->view_approval_competency($form_id);
		// var_dump($data_form);
		foreach ($data_form as $rows) :
			$form_id = $rows->self_form_id;
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
				endif;
			endif;
		endforeach;

		$data = json_encode($data1);
		$this->db->set('cc_result', $data);
		$this->db->where('self_form_id', $form_id);
		$this->db->update('idp_assessor_competency_form');

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
		// var_dump($data2);
		$data = json_encode($data2);
		$this->db->set('mc_result', $data);
		$this->db->where('self_form_id', $form_id);
		$this->db->update('idp_assessor_competency_form');

		foreach ($knowledge as $rows) :
			$rows->competency;
			$result = $rows->actual - $rows->expected;
			if ($result < 0) :
				$data3[] = $rows->competency;
			endif;
		endforeach;

		// var_dump($data3);
		$data = json_encode($data3);
		$this->db->set('know_result', $data);
		$this->db->where('self_form_id', $form_id);
		$this->db->update('idp_assessor_competency_form');

		foreach ($skill as $rows) :
			$rows->competency;
			$result = $rows->actual - $rows->expected;
			if ($result < 0) :
				$data4[] = $rows->competency;
			endif;
		endforeach;

		// var_dump($data4);
		$data = json_encode($data4);
		$this->db->set('skill_result', $data);
		$this->db->where('self_form_id', $form_id);
		$this->db->update('idp_assessor_competency_form');

		foreach ($personal_attributes as $rows) :
			$competency = $rows->competency;
			$result = $rows->actual - $rows->expected;
			if ($result < 0) :
				$data5[] = $competency;
			endif;
		endforeach;

		// var_dump($data5);
		$data = json_encode($data5);
		$this->db->set('perattr_result', $data);
		$this->db->where('self_form_id', $form_id);
		$this->db->update('idp_assessor_competency_form');
	}
}
