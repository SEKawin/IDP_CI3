<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Job_description extends CI_Controller
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
		$this->load->model('job_description_m', 'job_description_m');
	}


	public function index()
	{
		$this->load->view('form/jd_form/form');
	}

	public function ajax_list()
	{
		$list = $this->job_description_m->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rows) {
			$no++;
			$row = array();
			$row[] = $rows->years;
			$row[] = 'ใบกำหนดหน้าที่ประจำปี' . $rows->years;
			$row[] = '
					<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
					<a class="btn btn-success" href="' . base_url('uploads/job_description/' . $rows->file_upload) . '" role="button" target="_blank">ดูรายละเอียด</a>
					<a class="btn btn-danger" href="' . base_url('uploads/job_description/' . $rows->file_upload) . '" download role="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> ดาวโหลด</a>
					</div>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->job_description_m->count_all(),
			"recordsFiltered" => $this->job_description_m->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add()
	{
		$code = $this->session->userdata('code');

		$data = array(
			'years' => date('Y'),
			'emp_code' => $code,
		);

		if (!empty($_FILES['file_upload']['name'])) {
			$upload = $this->_do_upload();
			$data['file_upload'] = $upload;
		}

		$insert = $this->job_description_m->add_jd_form($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$data = $this->job_description_m->get_by_id($id);

		if (file_exists('upload/job_description' . $data->file_upload))
			unlink('upload/job_description' . $data->file_upload);

		$this->job_description_m->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function _do_upload()
	{
		$code = $this->session->userdata('code');

		$config['upload_path']   = 'uploads/job_description'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
		$config['allowed_types'] = 'PDF|pdf|jpg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
		$config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
		$config['max_width']     = 1024; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
		$config['max_height']    = 768;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
		// $config['encrypt_name']  = TRUE; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน
		$config['file_name'] = 'JD_' . $code . '_' . date('Y');

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_upload')) //upload and validate
		{
			$data['inputerror'][] = 'file_upload';
			$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
}
