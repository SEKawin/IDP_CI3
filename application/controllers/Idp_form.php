<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Idp_form extends CI_Controller
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
        $this->load->model('idp_form_m', 'idp_form_m');
        $this->load->model('approval_m', 'approval_m');
    }

    public function ajax_list_emp()
    {
        $list = $this->idp_form_m->get_datatables();

        $data = array();

        $no = $_POST['start'];

        foreach ($list as $rows) {
            $no++;
            $row = array();

            $row[] = $rows->years;

            if ($rows->status_idp_form == 0) :
                $row[] = '<span style="font-size: 15px"
                         class="badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="text-light btn btn-sm btn-primary" onclick="form_idp_plan(' . "'" . $rows->competency_form_id . "'" . ')" role="button">
                            <i class="fa fa-pencil-square"></i>จัดทำแผนพัฒนาบุคลากรรายบุคคล
                         </a>';
            elseif ($rows->status_idp_form == 1) :
                // Tracking Form
                $row[] = ' <span style="font-size: 15px"
                        class=" badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="ติดตามสถานะ"
                        onclick="view_idp_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                        </a>';
            elseif ($rows->status_idp_form == 2) :
                // Form Approval
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-success">ได้รับการอนุมัติ</span>';
                $row[] = '<div class="btn-group" role="group">
                            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
                                onclick="view_self_competency_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                            </a>
                        </div>';
            elseif ($rows->status_idp_form == 3) :
                $row[] = '<span style="font-size: 15px"
                class="badge badge-warning">แก้ไขแบบฟอร์ม</span>';
                $row[] = '<a class="text-light btn btn-sm btn-warning" onclick="form_idp_plan_edit(' . "'" . $rows->competency_form_id . "'" . ')" role="button">
                   <i class="fa fa-pencil-square"></i> จัดทำแผนพัฒนาบุคลากรรายบุคคล
                </a>';
            endif;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->idp_form_m->count_all(),
            "recordsFiltered" => $this->idp_form_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list_mgr()
    {
        $list = $this->idp_form_m->get_datatables_mgr();
        // var_dump($list);    
        $data = array();

        $no = $_POST['start'];

        foreach ($list as $rows) {
            $no++;
            $row = array();

            $row[] = $rows->code . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th;
            $row[] = $rows->years;

            if ($rows->mgr_status == 0) :
                $row[] = '<span style="font-size: 15px"
                         class="badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="text-light btn btn-sm btn-primary" onclick="idp_form_approval_mgr(' . "'" . $rows->competency_form_id . "'" . ')" role="button">
                            <i class="fa fa-pencil-square"></i> อนุมัติแบบฟอร์ม
                         </a>';
            elseif ($rows->mgr_status == 1) :
                // Tracking Form
                $row[] = ' <span style="font-size: 15px"
                        class=" badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="ติดตามสถานะ"
                            onclick="view_idp_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                        </a>';
            elseif ($rows->mgr_status == 2) :
                // Form Approval
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-success">ได้รับการอนุมัติ</span>';
                $row[] = '<div class="btn-group" role="group">
                            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
                                onclick="view_self_competency_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                            </a>
                        </div>';
            endif;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->idp_form_m->count_all(),
            "recordsFiltered" => $this->idp_form_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list_gm()
    {
        $list = $this->idp_form_m->get_datatables_gm();
        // die;
        $data = array();

        $no = $_POST['start'];

        foreach ($list as $rows) {
            $no++;
            $row = array();

            $row[] = $rows->code . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th;

            $row[] = $rows->years;

            if ($rows->gm_status == 0) :
                $row[] = '<span style="font-size: 15px"
                         class="badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="text-light btn btn-sm btn-primary" onclick="idp_form_approval_gm(' . "'" . $rows->competency_form_id . "'" . ')" role="button">
                            <i class="fa fa-pencil-square"></i> อนุมัติแบบฟอร์ม
                         </a>';
            elseif ($rows->gm_status == 1) :
                // Tracking Form
                $row[] = ' <span style="font-size: 15px"
                        class=" badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="ติดตามสถานะ"
                            onclick="view_idp_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                        </a>';
            elseif ($rows->gm_status == 2) :
                // Form Approval
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-success">ได้รับการอนุมัติ</span>';
                $row[] = '<div class="btn-group" role="group">
                            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
                                onclick="view_self_competency_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                            </a>
                        </div>';
            endif;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->idp_form_m->count_all(),
            "recordsFiltered" => $this->idp_form_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list_mgr_hrd()
    {
        $list = $this->idp_form_m->get_datatables_mgr_hrd();
        // var_dump($list);
        // die;
        $data = array();

        $no = $_POST['start'];

        foreach ($list as $rows) {
            $no++;
            $row = array();

            $row[] = $rows->code . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th;

            $row[] = $rows->years;

            if ($rows->mgr_hrd_status == 0) :
                $row[] = '<span style="font-size: 15px"
                         class="badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="text-light btn btn-sm btn-primary" onclick="idp_form_approval_mgr_hrd(' . "'" . $rows->competency_form_id . "'" . ')" role="button">
                            <i class="fa fa-pencil-square"></i> อนุมัติแบบฟอร์ม
                         </a>';
            elseif ($rows->mgr_hrd_status == 1) :
                // Tracking Form
                $row[] = ' <span style="font-size: 15px"
                        class=" badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="ติดตามสถานะ"
                            onclick="view_idp_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                        </a>';
            elseif ($rows->mgr_hrd_status == 2) :
                // Form Approval
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-success">ได้รับการอนุมัติ</span>';
                $row[] = '<div class="btn-group" role="group">
                            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
                                onclick="view_self_competency_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                            </a>
                        </div>';
            endif;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->idp_form_m->count_all(),
            "recordsFiltered" => $this->idp_form_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_list_od()
    {
        $list = $this->idp_form_m->get_datatables_od();
        // var_dump($list);
        // die;
        $data = array();

        $no = $_POST['start'];

        foreach ($list as $rows) {
            $no++;
            $row = array();

            $row[] = $rows->code . ' ' . $rows->firstname_th . ' ' . $rows->lastname_th;

            $row[] = $rows->years;

            if ($rows->od_status == 0) :
                $row[] = '<span style="font-size: 15px"
                         class="badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="text-light btn btn-sm btn-primary" onclick="idp_form_approval_od(' . "'" . $rows->competency_form_id . "'" . ')" role="button">
                            <i class="fa fa-pencil-square"></i> อนุมัติแบบฟอร์ม
                         </a>';
            elseif ($rows->od_status == 1) :
                // Tracking Form
                $row[] = ' <span style="font-size: 15px"
                        class=" badge badge-secondary">รอดำเนินการ</span>';
                $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="ติดตามสถานะ"
                            onclick="view_idp_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                        </a>';
            elseif ($rows->od_status == 2) :
                // Form Approval
                $row[] = '<span style="font-size: 15px"
                class=" badge badge-success">ได้รับการอนุมัติ</span>';
                $row[] = '<div class="btn-group" role="group">
                            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="รายละเอียดแบบฟอร์ม"
                                onclick="view_self_competency_form(' . "'" . $rows->competency_form_id . "'" . ')">รายละเอียดแบบฟอร์ม
                            </a>
                        </div>';
            endif;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->idp_form_m->count_all(),
            "recordsFiltered" => $this->idp_form_m->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['list_emp'] = $this->account_m->get_all_account();

        $this->load->view('templates/header');
        $this->load->view('form/idp_form/form', $data);
        // $this->load->view('templates/footer');
    }

    public function competency_form($idp_form_id)
    {
        $data = $this->idp_form_m->competency_form($idp_form_id);
        foreach ($data as $r) :
            $data_comptetncy = [
                'cc_result' => json_decode($r->cc_result),
                'mc_result' => json_decode($r->mc_result),
                'know_result' => json_decode($r->know_result),
                'skill_result' => json_decode($r->skill_result),
                'perattr_result' => json_decode($r->perattr_result)
            ];
        endforeach;
        echo json_encode($data_comptetncy);
        // var_dump($data_json);
    }

    public function add_idp_plan_form()
    {
        $emp_code = $this->session->userdata('code');
        // $this->_validate();

        $idp_form_id = $this->input->post('idp_form_id');

        //input from by params
        $idp_cc = json_encode($this->input->post('params_cc'));
        $idp_mc = json_encode($this->input->post('params_mc'));
        $idp_know = json_encode($this->input->post('params_know'));
        $idp_skill = json_encode($this->input->post('params_skill'));
        $idp_perattr = json_encode($this->input->post('params_perattr'));

        //Add IDP Plan Form
        $status_idp_form = 1; //status form is send form

        $this->idp_form_m->update_idp_plan_form($idp_form_id, $status_idp_form, $idp_cc, $idp_mc, $idp_know, $idp_skill, $idp_perattr);

        //ผู้ต้นสังกัดอนุัมติ
        $data = array('mgr_code' => $this->input->post('mgr_code'));
        $mgr_code = substr($data['mgr_code'], 0, 6);

        // Add approval mgr of idp_plan_form
        $this->approval_m->add_approval_idp_plan_form($idp_form_id, $mgr_code);

        // Mail Alert
        $position = "ผู้จัดการต้นสังกัด";
        $this->send_mail_approval($emp_code, $mgr_code, $position);

        echo json_encode(array("status" => true));
    }

    public function update_idp_plan_form()
    {
        $emp_code = $this->session->userdata('code');

        $idp_form_id = $this->input->post('idp_form_id');

        //input from by params
        echo $idp_cc = json_encode($this->input->post('params_cc'));
        echo '<br>';
        echo $idp_mc = json_encode($this->input->post('params_mc'));
        echo '<br>';
        echo $idp_know = json_encode($this->input->post('params_know'));
        echo '<br>';
        echo $idp_skill = json_encode($this->input->post('params_skill'));
        echo '<br>';
        echo $idp_perattr = json_encode($this->input->post('params_perattr'));
        $status_idp_form = 1; //status form is send form
        die;
        $this->idp_form_m->update_idp_plan_form($idp_form_id, $status_idp_form, $idp_cc, $idp_mc, $idp_know, $idp_skill, $idp_perattr);

        //ผู้ต้นสังกัดอนุัมติ
        $data = array('mgr_code' => $this->input->post('mgr_code'));
        $mgr_code = substr($data['mgr_code'], 0, 6);

        $this->approval_m->update_approval_idp_plan_form($idp_form_id, $mgr_code);

        // Mail Alert
        $position = "ผู้จัดการต้นสังกัด";

        $this->send_mail_approval($emp_code, $mgr_code, $position);

        echo json_encode(array("status" => true));
    }

    public function view_idp_plan_form($idp_form_id)
    {
        // IDP Plan Form
        $idp_form = $this->idp_form_m->view_idp_plan_form($idp_form_id);
        // var_dump($idp_form);
        foreach ($idp_form as $rows) :
            $emp_code = $rows->emp_code;
            $mgr_code = $rows->mgr_code;
            $gm_code = $rows->gm_code;
            $mgr_hrd_code = $rows->mgr_hrd_code;
            $od_code = $rows->od_code;
        endforeach;

        //Acount data
        $emp = $this->account_m->get_account_code($emp_code);
        $mgr = $this->account_m->get_account_code($mgr_code);
        $gm = $this->account_m->get_account_code($gm_code);
        $mgr_hrd = $this->account_m->get_account_code($mgr_hrd_code);
        $gm_od = $this->account_m->get_account_code($od_code);

        foreach ($idp_form as $rows) :
            $data = [
                'idp_cc' => json_decode($rows->idp_cc),
                'idp_mc' => json_decode($rows->idp_mc),
                'idp_know' => json_decode($rows->idp_know),
                'idp_skill' => json_decode($rows->idp_skill),
                'idp_perattr' => json_decode($rows->idp_perattr),
                'data_status' => $idp_form,
                'emp' => $emp,
                'mgr' => $mgr,
                'gm' => $gm,
                'mgr_hrd' => $mgr_hrd,
                'gm_od' => $gm_od,
            ];
            // var_dump($data);
            echo json_encode($data);

        endforeach;
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = true;

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

    public function idp_approval_form_mgr()
    {
        $idp_form_id = $this->input->post('idp_form_id');

        $mgr_status = $this->input->post('mgr_status');

        $remark = $this->input->post('remark_mgr');

        $idp_form = $this->idp_form_m->view_idp_plan_form($idp_form_id);

        foreach ($idp_form as $rows) :
            $emp_code = $rows->emp_code;
            $mgr_code = $rows->mgr_code;
        endforeach;

        $data = $this->approval_m->organ_chart($mgr_code);

        foreach ($data as $rows) :
            $gm_code = $rows->gm_code;
        endforeach;

        if ($mgr_status == 1) :

            $this->approval_m->idp_approval_mgr($idp_form_id, $mgr_status, $gm_code);
            // Mail Alert 
            $position = "ผู้จัดการ AGM/GM";

            $this->send_mail_approval($emp_code, $mgr_code, $position);

        elseif ($mgr_status == 2) :
            $status_idp_form = 3; // Disapporavl

            $this->approval_m->idp_approval_mgr2($idp_form_id, $mgr_status);

            $this->approval_m->update_idp_form($idp_form_id, $status_idp_form, $remark);

            $this->send_mail_emp($emp_code, $mgr_status, $remark);

        endif;

        echo json_encode(array("status" => true));
    }

    public  function idp_approval_form_gm()
    {
        $idp_form_id = $this->input->post('idp_form_id');

        $gm_status = $this->input->post('gm_status');

        $remark = $this->input->post('remark_gm');

        $idp_form = $this->idp_form_m->view_idp_plan_form($idp_form_id);

        foreach ($idp_form as $rows) :

            $emp_code = $rows->emp_code;

        endforeach;

        if ($gm_status == 1) :
            $mgr_hrd_code = '005078';

            $this->approval_m->idp_approval_gm($idp_form_id, $gm_status, $mgr_hrd_code);

            $position = "ผู้จัดการ Mgr HRD ";

            $this->send_mail_approval($emp_code, $mgr_hrd_code, $position);

        elseif ($gm_status == 2) :
            $status_idp_form = 3; // Disapporavl

            $this->approval_m->idp_approval_gm2($idp_form_id, $gm_status);

            $this->approval_m->update_idp_form($idp_form_id, $status_idp_form, $remark);

            $this->send_mail_emp($emp_code, $gm_status, $remark);
        endif;

        echo json_encode(array("status" => true));
    }

    public function idp_approval_form_mgr_hrd()
    {
        $idp_form_id = $this->input->post('idp_form_id');

        $mgr_hrd_status = $this->input->post('mgr_hrd_status');

        $remark = $this->input->post('remar_mgr_hrd');

        $idp_form = $this->idp_form_m->view_idp_plan_form($idp_form_id);

        foreach ($idp_form as $rows) :

            $emp_code = $rows->emp_code;

        endforeach;

        $od_code = '008980';

        if ($mgr_hrd_status == 1) :

            $this->approval_m->idp_approval_mgr_hrd($idp_form_id, $mgr_hrd_status, $od_code);

            $position = "ผู้จัดการ OD";

            $this->send_mail_approval($emp_code, $od_code, $position);

        elseif ($mgr_hrd_status == 2) :
            $status_idp_form = 3; // Disapporavl

            $this->approval_m->idp_approval_mgr_hrd2($idp_form_id, $mgr_hrd_status);

            $this->approval_m->update_idp_form($idp_form_id, $status_idp_form, $remark);

            $this->send_mail_emp($emp_code, $mgr_hrd_status, $remark);
        endif;
        echo json_encode(array("status" => true));
    }

    public function idp_approval_form_od()
    {
        $idp_form_id = $this->input->post('idp_form_id');

        $od_status = $this->input->post('od_status');

        $remark = $this->input->post('remark_od');

        $idp_form = $this->idp_form_m->view_idp_plan_form($idp_form_id);

        foreach ($idp_form as $rows) :

            $emp_code = $rows->emp_code;

        endforeach;

        if ($od_status == 1) :
            $status_idp_form = 2; //Approval Success

            $this->approval_m->idp_approval_od($idp_form_id, $od_status);

            $this->approval_m->update_idp_form($idp_form_id, $status_idp_form, $remark);

            $this->send_mail_emp($emp_code, $od_status, $remark);

        elseif ($od_status == 2) :

            $status_idp_form = 3; // Disapporavl

            $this->approval_m->update_idp_form($idp_form_id, $status_idp_form, $remark);

            $this->send_mail_emp($emp_code, $od_status, $remark);
        endif;

        echo json_encode(array("status" => true));
    }

    public function send_mail_approval($emp_code, $code, $position)
    {
        $data['emp'] = $this->account_m->get_account_code($emp_code);
        $data['mgr'] = $this->account_m->get_account_code($code);
        foreach ($data['mgr'] as $rows) :
            $to_email = $rows->email;
        endforeach;

        $data['position'] = $position;

        $message = $this->load->view('mail_notify/notify_to_approval_idp', $data, TRUE);

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
        $send = $this->email->send();
        $showerror = $this->email->print_debugger();
    }

    public function send_mail_emp($emp_code, $status, $remark)
    {
        $data['emp'] = $this->account_m->get_account_code($emp_code);
        foreach ($data['emp'] as $rows) :
            $to_email = $rows->email;
        endforeach;

        if ($status == 1) :
            $data['status'] = '<b style="color: green;">ได้รับอนุมัติแบบฟอร์ม IDP Plan Form</b>';
            $data['remark'] = '-';
        elseif ($status == 2) :
            $data['status'] = '<b style="color: red;">ไม่ผ่านการอนุมัติแบบฟอร์ม IDP Plan Form</b>';
            $data['remark'] = $remark;
        endif;

        $message = $this->load->view('mail_notify/notify_to_emp_idp', $data, TRUE);

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
        $send = $this->email->send();
        $showerror = $this->email->print_debugger();
    }
}
