<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rolespermissions_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insertData($table,$data){
        $this->db->insert($table, $data);
    }

    function update_data_roles($table, $data, $idroles){
        $this->db->where('idroles', $idroles);
        $this->db->update("$table", $data);

        return true;
    }

    function update_data_permissionsgroup($table, $data, $idpermissions_group){
        $this->db->where('idpermissions_group', $idpermissions_group);
        $this->db->update("$table", $data);

        return true;
    }

    function update_data_permissions($table, $data, $idpermissions_group){
        $this->db->where('idpermissions', $idpermissions_group);
        $this->db->update("$table", $data);

        return true;
    }

    public function getDataAll($table, $order_column, $order_type){
        $this->db->order_by("$order_column", "$order_type");
        $query = $this->db->get("$table");
        $result = $query->result();
        $this->db->save_queries = false;
        return $result;
    }

    function total_rows_roles($q = NULL) {  
	    $this->db->like('roles_name', $q);
        $this->db->from('roles');
    return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_roles($limit, $start = 0, $q = NULL) {        
        $this->db->order_by('roles_name', 'ASC');
	    $this->db->like('roles_name', $q);
        $this->db->from('roles');
        $this->db->limit($limit, $start);
    return $this->db->get()->result();
    }

    function total_rows_permissions_group($q = NULL) {  
	    $this->db->like('permissions_groupname', $q);
        $this->db->from('permissions_group');
    return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_permissions_group($limit, $start = 0, $q = NULL) {        
        $this->db->order_by('permissions_groupname', 'ASC');
	    $this->db->like('permissions_groupname', $q);
        $this->db->from('permissions_group');
        $this->db->limit($limit, $start);
    return $this->db->get()->result();
    }


    function total_rows_permissions($q = NULL) {  
        $this->db->select('pm.idpermissions, pg.idpermissions_group, pg.permissions_groupname, pm.code_class, pm.code_method, pm.code_url, pm.type, pg.display_icon as parent_icon, pm.display_icon as child_icon, pm.display_name, pm.status');
	    $this->db->like('pm.idpermissions_group', $q);
        $this->db->from('permissions as pm');
        $this->db->join('permissions_group as pg','pm.idpermissions_group=pg.idpermissions_group','left');
    return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_permissions($limit, $start = 0, $q = NULL) {      
        
        $this->db->select('pm.idpermissions, pg.idpermissions_group, pg.permissions_groupname, pm.code_class, pm.code_method, pm.code_url, pm.type, pg.display_icon as parent_icon, pm.display_icon as child_icon, pm.display_name, pm.status');
	    $this->db->like('pm.idpermissions_group', $q);
        $this->db->from('permissions as pm');
        $this->db->join('permissions_group as pg','pm.idpermissions_group=pg.idpermissions_group','left');
        $this->db->order_by('pg.permissions_groupname ASC, pm.display_name ASC');	  
        $this->db->limit($limit, $start);
    return $this->db->get()->result();
    }


    function check_permissions($controller_name, $function_name, $user_level){
        $this->db->select("rp.id, rp.idroles,  pg.permissions_groupname, rp.status");

        $this->db->from("roles_permissions as rp");
        
        $this->db->join("permissions as pr"," pr.idpermissions = rp.idpermissions","left");
        $this->db->join("permissions_group as pg","pg.idpermissions_group = pr.idpermissions_group","left");
        $this->db->where("pr.code_class='$controller_name' and pr.code_method = '$function_name' and rp.idroles = '$user_level' and rp.status = '1'");
        $this->db->limit('1');
        return $this->db->get();	
    }

    function matrix_permissions($idroles) { 
        $this->db->select('pm.idpermissions, pg.idpermissions_group, pg.permissions_groupname, pm.code_class, pm.code_method, pm.code_url, pm.type, pg.display_icon as parent_icon, pm.display_icon as child_icon, pm.display_name, pm.status');	    
        $this->db->from('permissions as pm');
        $this->db->join('permissions_group as pg','pm.idpermissions_group=pg.idpermissions_group','left');
        $this->db->join('roles_permissions as rp'," rp.idpermissions=pm.idpermissions",'left');
               
        $this->db->where("rp.idroles='$idroles'");
        $this->db->order_by('pg.permissions_groupname ASC');	  
        
    return $this->db->get()->result();
    }



    function get_permissions_group(){  
        $this->db->select('idpermissions_group, permissions_groupname, display_icon, status');
	    
        $this->db->from('permissions_group');
        return $this->db->get()->result();
    }
    function get_permissions($idpermissions_group, $idroles){
        $this->db->select('rp.id, pr.idpermissions, pr.idpermissions_group, pr.display_name, pr.display_icon, pr.status');	    
        $this->db->from('permissions as pr');
        $this->db->join('roles_permissions as rp',"pr.idpermissions=rp.idpermissions and rp.idroles='$idroles'",'left');
        $this->db->where("pr.idpermissions_group = '$idpermissions_group' and pr.status='1'");
        $this->db->order_by('pr.display_name ASC');
        return $this->db->get()->result();
    }
    
    function get_checkedlist_permissions($idpermissions, $idroles){
        $this->db->select('id, idroles, idpermissions,  status');
        $this->db->from('roles_permissions');
        $this->db->where("idroles = '$idroles' and idpermissions = '$idpermissions' and status ='1'");
        $this->db->limit('1');       
        return $this->db->get();


    }

    function insert_roles_data($table, $data_roles){
        $this->db->insert_batch($table, $data_roles);
    }

    function cheked_roles_permissions($idroles){
        $this->db->select('idpermissions, idroles');
        $this->db->from('roles_permissions');
        //$this->db->where('idpermissions',$idpermissions);
        $this->db->where('idroles',$idroles);
        
        return $this->db->get();
    }

    function delete_roles_data( $idroles, $table){
        $this->db->select('idpermissions, idroles');
        //$this->db->from('roles_permissions');
       // $this->db->where('idpermissions',$idpermissions);
        $this->db->where('idroles',$idroles);
        $this->db->delete($table);
    }

    

}