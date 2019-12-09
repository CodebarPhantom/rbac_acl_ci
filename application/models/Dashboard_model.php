<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    

    public function getDataHotel($user_ho){
        $this->db->select('u.idhotels, h.hotels_name, h.total_rooms');
        $this->db->from('smartreport_users as u');
        $this->db->join('smartreport_hotels as h', 'u.idhotels=h.idhotels','left');
        $this->db->where('parent','PARENT');
        $this->db->where('h.idhotels', $user_ho);
        $query = $this->db->get()->row();
        //$result = $query->result();
        $this->db->save_queries = false;
        return $query;
    }

    public function getpermissions_groupname(){
        $this->db->select('idpermissions_group, permissions_groupname, status');
        $this->db->from('permissions_group');
        $this->db->where('status','1');           
        return $this->db->get()->result();
        
    }

    
    public function getpermissions($idpermissions_group, $user_le){
        $this->db->select('pr.idpermissions, pr.idpermissions_group, pr.code_class, pr.code_method, pr.display_name, pr.code_url, pr.display_icon, pr.status');
        $this->db->from('permissions as pr');
        $this->db->join('roles_permissions as rp','pr.idpermissions = rp.idpermissions','left');
        $this->db->where("pr.idpermissions_group =  '$idpermissions_group' and rp.idroles = '$user_le' and pr.status = '1' and pr.type = 'TRUE' and rp.status='1'"); 
           
        return $this->db->get();
        
    }

    public function getmethod_permission($idpermissions_group, $code_method, $code_class){
        $this->db->select('idpermissions, idpermissions_group, code_class, code_method, display_name, status');
        $this->db->from('permissions');
        $this->db->where("idpermissions_group = '$idpermissions_group' and code_method = '$code_method' and  code_class = '$code_class' and status = '1'");          
        return $this->db->get()->row();
    }

    public function getroles_permissions($roles){

        $this->db->select('rp.id, rp.idroles, pg.idpermissions_group,  pg.display_icon, pg.permissions_groupname, rp.status');
        $this->db->from('roles_permissions as rp');
        $this->db->join('permissions as pr', 'rp.idpermissions = pr.idpermissions','left');
        $this->db->join('permissions_group as pg','pg.idpermissions_group = pr.idpermissions_group', 'left');
        $this->db->where("rp.idroles = '$roles' and rp.status = '1' and pg.status = '1'");    
        $this->db->group_by('pg.idpermissions_group');              
        return $this->db->get()->result();

    }
    
    
}    