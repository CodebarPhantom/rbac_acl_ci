<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rbac_users_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    
    /* For All Insert */ 
    public function insertData($table,$data)
    {
        $this->db->insert($table, $data);
    }

    
    // Query Data from Table with Order;
    public function getDataAll($table, $order_column, $order_type){
        $this->db->order_by("$order_column", "$order_type");
        $query = $this->db->get("$table");
        $result = $query->result();
        $this->db->save_queries = false;
        return $result;
    }

    public function updateDataUser($table, $data, $iduser)
    {
        $this->db->where('iduser', $iduser);
        $this->db->update("$table", $data);

        return true;
    }

    function updatePasswordData($table, $upd_data, $iduser)
    {
        $this->db->where('iduser', $iduser);
        $this->db->update("$table", $upd_data);
        return true;
    }

    function deleteDataUser($iduser)
    {
        $this->db->where('iduser', $iduser);
        $this->db->delete('rbac_users');
    }

    function total_rows_user($q = NULL) {        
   
        $this->db->like('u.user_name', $q);
        $this->db->from('rbac_users as u');
        $this->db->join('rbac_dept as d', 'u.iddept = d.iddept', 'left');
        $this->db->join('roles as r', 'r.idroles = u.user_level', 'left');
        
    return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_user($limit, $start = 0, $q = NULL) {
        $this->db->order_by('u.user_name', 'ASC');  
        $this->db->like('u.user_name', $q);  
        $this->db->from('rbac_users as u');
        $this->db->join('rbac_dept as d', 'u.iddept = d.iddept', 'left');        
        $this->db->join('roles as r', 'r.idroles = u.user_level', 'left');
        $this->db->limit($limit, $start);
    return $this->db->get()->result();
    }

    
    

}

