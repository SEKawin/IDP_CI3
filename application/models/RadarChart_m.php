<?php defined('BASEPATH') or exit('No direct script access allowed');
class RadarChart_m extends CI_Model
{
    public $account = 'account';
    public $competency_mapping = 'competency_mapping';
    //self competency
    public $self_competency_form = 'self_competency_form';
    public $approval_self_competency = 'approval_self_competency';
    //assessor competency
    public $assessor_competency_form = 'assessor_competency_form';
    public $approval_competency = 'approval_competency';
    //IDP PLAN FORM\
    public $idp_form = 'idp_idp_form';
    public $approval_idp_form = 'approval_idp_form';

    public $column_order = array(null, 'years', 'emp_code'); //set column field database for datatable orderable
    public $column_search = array('years', 'emp_code'); //set column field database for datatable searchable

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    // Server Side Table
    private function _get_datatables_query()
    {
        $code = $this->session->userdata('code');

        $this->db->from($this->self_competency_form);
        $this->db->join($this->approval_self_competency, 'approval_self_competency.self_form_id = self_competency_form.id', 'LEFT');
        $this->db->join($this->assessor_competency_form, 'assessor_competency_form.self_form_id = self_competency_form.id', 'LEFT');
        $this->db->join($this->approval_competency, 'approval_competency.competency_form_id = assessor_competency_form.self_form_id', 'LEFT');
        $this->db->where('self_competency_form.emp_code', $code);
        $this->db->where('assessor_competency_form.emp_code', $code);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                }
                //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {

            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query_all()
    {
        $code = $this->session->userdata('code');

        $this->db->from($this->self_competency_form);
        $this->db->join($this->account, 'account.code = self_competency_form.emp_code', 'LEFT');
        $this->db->join($this->approval_self_competency, 'approval_self_competency.self_form_id = self_competency_form.id', 'LEFT');
        $this->db->join($this->assessor_competency_form, 'assessor_competency_form.self_form_id = self_competency_form.id', 'LEFT');
        $this->db->join($this->approval_competency, 'approval_competency.competency_form_id = assessor_competency_form.self_form_id', 'LEFT');
        // $this->db->where('self_competency_form.emp_code', $code);
        // $this->db->where('assessor_competency_form.emp_code', $code);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                }
                //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {

            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_all()
    {
        $this->_get_datatables_query_all();

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_all()
    {
        $this->_get_datatables_query_all();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->idp_form);
        return $this->db->count_all_results();
    }
}
