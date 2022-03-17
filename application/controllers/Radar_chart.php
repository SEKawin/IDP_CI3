<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Radar_chart extends CI_Controller
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
		$this->load->model('assessor_competency_m', 'assessor_competency_m');
		$this->load->model('idp_form_m', 'idp_form_m');
		$this->load->model('approval_m', 'approval_m');
		$this->load->model('RadarChart_m', 'RadarChart_m');
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('form/radar_chart/form');
	}

	public function ajax_list()
	{
		$list = $this->RadarChart_m->get_datatables();

		$data = array();

		$no = $_POST['start'];

		foreach ($list as $rows) {
			$no++;
			$row = array();

			$row[] = $rows->years;
			$row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Radar Chart"
						onclick="view_radarChart(' . "'" . $rows->emp_code . "','" . $rows->years . "'" . ')">ดู Radar Chart
						</a>';

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

	public function ajax_all()
	{
		$list = $this->RadarChart_m->get_datatables_all();
		// var_dump($list);
		// die;
		$data = array();

		$no = $_POST['start'];

		foreach ($list as $rows) {
			$no++;
			$row = array();

			$row[] = $rows->years;
			$row[] = $rows->emp_code.' '.$rows->firstname_th.' '.$rows->lastname_th;
			$row[] = $rows->department_code . ' ' . $rows->department_title;
			$row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Radar Chart"
						onclick="view_radarChart(' . "'" . $rows->emp_code . "','" . $rows->years . "'" . ')">ดู Radar Chart
						</a>';


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

	public function view_radar_chart($code, $years)
	{
		$data = $this->account_m->get_account_code($code);
		foreach ($data as $r) :
			$emp_code = $r->code;
			$name = $r->salutation . '' . $r->firstname_th . ' ' . $r->lastname_th;
			$position = $r->position;
			$department = $r->department_code . ' ' . $r->department_title;
			$startwork = date("d-m-Y", strtotime($r->startwork));
		endforeach;

		$data = $this->self_competency_m->view_self_competency_form_by_code($code, $years);
		foreach ($data as $rows) :
			$self_data = [
				'core_competency' => json_decode($rows->core_competency),
				'manage_competency' => json_decode($rows->manage_competency),
				'knowledge' => json_decode($rows->knowledge),
				'skill' => json_decode($rows->skill),
				'personal_attributes' =>  json_decode($rows->personal_attributes),
			];

		endforeach;

		$data = $this->assessor_competency_m->view_competency_by_code($code, $years);

		foreach ($data as $rows) :
			$core_num = count(json_decode($rows->core_competency));
			$mc_num =  json_decode($rows->manage_competency);

			if ($mc_num == '') :
				$manage_num = 0;
			else :
				$manage_num = count($mc_num);
			endif;
			$know_num = count(json_decode($rows->knowledge));
			$skill_num = count(json_decode($rows->skill));
			$perattr_num = count(json_decode($rows->personal_attributes));
			$func_num  = $know_num + $skill_num + $perattr_num;

			$superviosr = [
				'core_competency' => json_decode($rows->core_competency),
				'manage_competency' => json_decode($rows->manage_competency),
				'knowledge' => json_decode($rows->knowledge),
				'skill' => json_decode($rows->skill),
				'personal_attributes' => json_decode($rows->personal_attributes),
			];
		endforeach;

		// var_dump($superviosr);

		$data = [
			'emp_code' => $emp_code,
			'name' => $name,
			'position' => $position,
			'department' => $department,
			'startwork' => $startwork,
			'core_num' => $core_num,
			'manage_num' => $manage_num,
			'func_num' => $func_num,
			'self_data' => $self_data,
			'superviosr' => $superviosr,
		];

		echo json_encode($data);
	}
}
