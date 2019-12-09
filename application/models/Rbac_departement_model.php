<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rbac_departement_model extends CI_Model
{

    

    function __construct()
    {
        parent::__construct();
    }

    public function insertData($table,$data)
    {
        $this->db->insert($table, $data);
    }  

    // get total rows
    function total_rows_departement($q = NULL) {
        $this->db->like('deptname', $q);
        $this->db->from('rbac_dept');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_departement($limit, $start = 0, $q = NULL) {
        $this->db->order_by('deptname', 'ASC');
        $this->db->like('deptname', $q);
        $this->db->from('rbac_dept');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    // update data
    public function updateDataDepartement($table, $data, $iddept_old)
    {
        $this->db->where('iddept', $iddept_old);
        $this->db->update("$table", $data);

        return true;
    }

    function deleteDataDepartement($iddept)
    {
        $this->db->where('iddept', $iddept);
        $this->db->delete('rbac_dept');
    }

}

