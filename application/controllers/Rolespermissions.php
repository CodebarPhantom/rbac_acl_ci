<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rolespermissions extends CI_Controller{

  private $contoller_name;
  private $function_name;

  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('errorpage/error403');    }
      $this->contoller_name = $this->router->class;
      $this->function_name = $this->router->method;
      $this->load->model('Rbac_users_model');      
      $this->load->model('Rbac_departement_model');     
      $this->load->model('Dashboard_model');      
      $this->load->model('Rolespermissions_model');
      $this->load->library('form_validation');
      $this->load->library('pagination');
      $this->load->library('session');     
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->helper('mydate');
      $this->load->helper('text');

      
  }

  function roles(){
    $user_level = $this->session->userdata('user_level');
    
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){
      $q = urldecode($this->input->get('q', TRUE));
      $start = intval($this->input->get('start'));
      
      if ($q <> '') {
          $config['base_url'] = base_url() . 'rolespermissions/roles?q=' . urlencode($q);
          $config['first_url'] = base_url() . 'rolespermissions/roles?q=' . urlencode($q);
      } else {
          $config['base_url'] = base_url() . 'rolespermissions/roles';
          $config['first_url'] = base_url() . 'rolespermissions/roles';
      }

      $config['per_page'] = 10;
      $config['page_query_string'] = TRUE;
      $config['total_rows'] = $this->Rolespermissions_model->total_rows_roles($q);
      $getroles_data = $this->Rolespermissions_model->get_limit_data_roles($config['per_page'], $start, $q);

      $this->load->library('pagination');
      $this->pagination->initialize($config);

      $page_data['page_name'] = 'roles';
      
      $page_data['lang_dashboard'] = $this->lang->line('dashboard');
      $page_data['lang_dashboard_hotel'] = $this->lang->line('dashboard_hotel');
      $page_data['lang_add_city'] = $this->lang->line('add_city');
      $page_data['lang_list_users'] = $this->lang->line('list_users');
      $page_data['lang_hotel'] = $this->lang->line('hotel');
      $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
      $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
      $page_data['lang_competitor_hotels'] = $this->lang->line('competitor_hotels');
      $page_data['lang_analysis'] = $this->lang->line('analysis');        
      $page_data['lang_hotel_comp_anl'] = $this->lang->line('hotel_comp_anl');        
      $page_data['lang_dsr'] = $this->lang->line('dsr');
      $page_data['lang_city'] = $this->lang->line('city');
      $page_data['lang_add_city'] = $this->lang->line('add_city');
      $page_data['lang_list_city'] = $this->lang->line('list_city');
      $page_data['lang_departement'] = $this->lang->line('departement');
      $page_data['lang_add_departement'] = $this->lang->line('add_departement');
      $page_data['lang_list_departement'] = $this->lang->line('list_departement');
      $page_data['lang_setting'] = $this->lang->line('setting');
      $page_data['lang_user'] = $this->lang->line('user');
      $page_data['lang_search'] = $this->lang->line('search');
      $page_data['lang_pnl'] = $this->lang->line('pnl');
      $page_data['lang_pnl_category'] = $this->lang->line('pnl_category');
      $page_data['lang_pnl_list'] = $this->lang->line('pnl_list');
      $page_data['lang_budget'] = $this->lang->line('budget');
      $page_data['lang_pnl_budget'] = $this->lang->line('pnl_budget');
      $page_data['lang_expense'] = $this->lang->line('expense');
      $page_data['lang_pnl_expense'] = $this->lang->line('pnl_expense');
      $page_data['lang_category_hotels'] = $this->lang->line('category_hotels');
      $page_data['lang_statistic_dsr'] = $this->lang->line('statistic_dsr');

      $page_data['lang_input_success'] = $this->lang->line('input_success');
      $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
      $page_data['lang_delete_success'] = $this->lang->line('delete_success');
      $page_data['lang_delete_data'] = $this->lang->line('delete_data');
      $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
      $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
      $page_data['lang_update_success'] = $this->lang->line('update_success');
      $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
      $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
      $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
      $page_data['lang_submit'] = $this->lang->line('submit');
      $page_data['lang_close'] = $this->lang->line('close');

      $page_data['lang_add_roles'] = $this->lang->line('add_roles');
      $page_data['lang_edit_roles'] = $this->lang->line('edit_roles');
      $page_data['lang_search_roles'] = $this->lang->line('search_roles');
      $page_data['lang_roles_name'] = $this->lang->line('roles_name');
      $page_data['lang_status'] = $this->lang->line('status');
      $page_data['lang_active'] = $this->lang->line('active');
      $page_data['lang_inactive'] = $this->lang->line('inactive');
      $page_data['lang_choose_status'] = $this->lang->line('choose_status');

      $page_data['getroles_data'] = $getroles_data;
      $page_data['q'] = $q;
      $page_data['pagination'] = $this->pagination->create_links();
      $page_data['total_rows'] = $config['total_rows'];
      $page_data['start'] = $start;

        $this->load->view('rbac/index',$page_data);
     }else{
        redirect('errorpage/error403');
     }
  }

  function insert_roles(){
    $user_level = $this->session->userdata('user_level');    
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){
    $data = array(
      'roles_name' => ucwords($this->input->post('roles_name',TRUE)),
      'status'=> $this->input->post('status',TRUE),
      'created_date'=>date('Y-m-d H:i:s')
      );  
        $this->Rolespermissions_model->insertData('roles',$data);
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('rolespermissions/roles'));
        }else{
        redirect('errorpage/error403');
    }
  }

  function update_roles(){
    $user_level = $this->session->userdata('user_level');
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){
    $data = array(
      'roles_name' => ucwords($this->input->post('roles_name',TRUE)),
      'status'=>$this->input->post('status',TRUE)
      );  
     
        $this->Rolespermissions_model->update_data_roles('roles', $data, $this->input->post('idroles', TRUE));
        $this->session->set_flashdata('update_success','message');
        redirect(site_url('rolespermissions/roles'));
      }else{
        redirect('errorpage/error403');
    }
  }

  function permissions_group(){
    $user_level = $this->session->userdata('user_level');
    
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){
      $q = urldecode($this->input->get('q', TRUE));
      $start = intval($this->input->get('start'));
      
      if ($q <> '') {
          $config['base_url'] = base_url() . 'rolespermissions/permissions-group?q=' . urlencode($q);
          $config['first_url'] = base_url() . 'rolespermissions/permissions-group?q=' . urlencode($q);
      } else {
          $config['base_url'] = base_url() . 'rolespermissions/permissions-group';
          $config['first_url'] = base_url() . 'rolespermissions/permissions-group';
      }

      $config['per_page'] = 10;
      $config['page_query_string'] = TRUE;
      $config['total_rows'] = $this->Rolespermissions_model->total_rows_permissions_group($q);
      $getpermissions_group_data = $this->Rolespermissions_model->get_limit_data_permissions_group($config['per_page'], $start, $q);

      $this->load->library('pagination');
      $this->pagination->initialize($config);

      $page_data['page_name'] = 'permissions_group';
      
      

      $page_data['lang_input_success'] = $this->lang->line('input_success');
      $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
      $page_data['lang_delete_success'] = $this->lang->line('delete_success');
      $page_data['lang_delete_data'] = $this->lang->line('delete_data');
      $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
      $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
      $page_data['lang_update_success'] = $this->lang->line('update_success');
      $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
      $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
      $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
      $page_data['lang_submit'] = $this->lang->line('submit');
      $page_data['lang_close'] = $this->lang->line('close');

      $page_data['lang_add_permissions_group'] = $this->lang->line('add_permissions_group');
      $page_data['lang_edit_permissions_group'] = $this->lang->line('edit_permissions_group');
      $page_data['lang_search_permissions_group'] = $this->lang->line('search_permissions_group');
      $page_data['lang_permissions_group_name'] = $this->lang->line('permissions_group_name');
      $page_data['lang_status'] = $this->lang->line('status');
      $page_data['lang_active'] = $this->lang->line('active');
      $page_data['lang_inactive'] = $this->lang->line('inactive');
      $page_data['lang_choose_status'] = $this->lang->line('choose_status');
      $page_data['lang_display_icon'] = $this->lang->line('display_icon');

      $page_data['getpermissions_group_data'] = $getpermissions_group_data;
      $page_data['q'] = $q;
      $page_data['pagination'] = $this->pagination->create_links();
      $page_data['total_rows'] = $config['total_rows'];
      $page_data['start'] = $start;

        $this->load->view('rbac/index',$page_data);
     }else{
        redirect('errorpage/error403');
     }
  }

  function insert_permissions_group(){
    $user_level = $this->session->userdata('user_level');    
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){
    $data = array(
      'permissions_groupname' => ucwords($this->input->post('permissions_groupname',TRUE)),
      'status'=> $this->input->post('status',TRUE),
      'display_icon'=>$this->input->post('display_icon',TRUE),
      'created_date'=>date('Y-m-d H:i:s')
      );  
        $this->Rolespermissions_model->insertData('permissions_group',$data);
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('rolespermissions/permissions-group'));
        }else{
        redirect('errorpage/error403');
    }
  }

  function update_permissions_group(){
    $user_level = $this->session->userdata('user_level');
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){
    $data = array(
      'permissions_groupname' => ucwords($this->input->post('permissions_groupname',TRUE)),
      'status'=> $this->input->post('status',TRUE),
      'display_icon'=>$this->input->post('display_icon',TRUE),
      );  
     
        $this->Rolespermissions_model->update_data_permissionsgroup('permissions_group', $data, $this->input->post('idpermissions_group', TRUE));
        $this->session->set_flashdata('update_success','message');
        redirect(site_url('rolespermissions/permissions-group'));
      }else{
        redirect('errorpage/error403');
    }
  }

  function permissions(){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){   
      $q = urldecode($this->input->get('q', TRUE));
      $start = intval($this->input->get('start'));
      
      if ($q <> '') {
          $config['base_url'] = base_url() . 'rolespermissions/permissions?q=' . urlencode($q);
          $config['first_url'] = base_url() . 'rolespermissions/permissions?q=' . urlencode($q);
      } else {
          $config['base_url'] = base_url() . 'rolespermissions/permissions';
          $config['first_url'] = base_url() . 'rolespermissions/permissions';
      }

      $config['per_page'] = 10;
      $config['page_query_string'] = TRUE;
      $config['total_rows'] = $this->Rolespermissions_model->total_rows_permissions($q);
      $getpermissions_data = $this->Rolespermissions_model->get_limit_data_permissions($config['per_page'], $start, $q);

      $this->load->library('pagination');
      $this->pagination->initialize($config);

      $page_data['page_name'] = 'permissions';
      
     
      $page_data['lang_search'] = $this->lang->line('search');
     

      $page_data['lang_input_success'] = $this->lang->line('input_success');
      $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
      $page_data['lang_delete_success'] = $this->lang->line('delete_success');
      $page_data['lang_delete_data'] = $this->lang->line('delete_data');
      $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
      $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
      $page_data['lang_update_success'] = $this->lang->line('update_success');
      $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
      $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
      $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
      $page_data['lang_submit'] = $this->lang->line('submit');
      $page_data['lang_close'] = $this->lang->line('close');

      $page_data['lang_permissions_group'] = $this->lang->line('permissions_group');
      $page_data['lang_choose_permissions_group'] = $this->lang->line('choose_permissions_group');
      $page_data['lang_add_permissions'] = $this->lang->line('add_permissions');
      $page_data['lang_edit_permissions'] = $this->lang->line('edit_permissions');
      $page_data['lang_search_permissions'] = $this->lang->line('search_permissions');
      $page_data['lang_permissions_name'] = $this->lang->line('permissions_name');
      $page_data['lang_status'] = $this->lang->line('status');
      $page_data['lang_active'] = $this->lang->line('active');
      $page_data['lang_inactive'] = $this->lang->line('inactive');
      $page_data['lang_choose_status'] = $this->lang->line('choose_status');
      $page_data['lang_display_icon'] = $this->lang->line('display_icon');
      $page_data['lang_choose_type'] = $this->lang->line('choose_type');


      $page_data['getpermissions_data'] = $getpermissions_data;
      $page_data['q'] = $q;
      $page_data['pagination'] = $this->pagination->create_links();
      $page_data['total_rows'] = $config['total_rows'];
      $page_data['start'] = $start;

        $this->load->view('rbac/index',$page_data);
     }else{
        redirect('errorpage/error403');
     }
  }

  function insert_permissions(){
   $user_level = $this->session->userdata('user_level');    
   $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
   if($check_permission->num_rows() == 1){
    $data = array(
      'idpermissions_group' => $this->input->post('idpermissions_group',TRUE),
      'code_class'=>$this->input->post('code_class',TRUE),
      'code_method'=>$this->input->post('code_method',TRUE),
      'code_url'=>$this->input->post('code_url',TRUE),
      'display_name' => ucwords($this->input->post('display_name',TRUE)),
      'display_icon'=>$this->input->post('display_icon',TRUE),
      'status'=> $this->input->post('status',TRUE),
      'type'=> $this->input->post('type',TRUE),
      'created_date'=>date('Y-m-d H:i:s')
      );  
        $this->Rolespermissions_model->insertData('permissions',$data);
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('rolespermissions/permissions'));
        }else{
        redirect('errorpage/error403');
    }
  }

  function update_permissions(){
    $user_level = $this->session->userdata('user_level');    
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){
    $data = array(
      'idpermissions_group' => $this->input->post('idpermissions_group',TRUE),
      'code_class'=>$this->input->post('code_class',TRUE),
      'code_method'=>$this->input->post('code_method',TRUE),
      'code_url'=>$this->input->post('code_url',TRUE),
      'display_name' => ucwords($this->input->post('display_name',TRUE)),
      'display_icon'=>$this->input->post('display_icon',TRUE),
      'status'=> $this->input->post('status',TRUE),
      'type'=> $this->input->post('type',TRUE)
      );  
        $this->Rolespermissions_model->update_data_permissions('permissions', $data, $this->input->post('idpermissions', TRUE));
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('rolespermissions/permissions'));
        }else{
        redirect('errorpage/error403');
    }
  }

  function roles_permissions($idroles){

    $user_level = $this->session->userdata('user_level');    
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){
    $page_data['page_name'] = 'permissions_roles';
    $page_data['lang_search'] = $this->lang->line('search');    

    $page_data['lang_input_success'] = $this->lang->line('input_success');
    $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
    $page_data['lang_delete_success'] = $this->lang->line('delete_success');
    $page_data['lang_delete_data'] = $this->lang->line('delete_data');
    $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
    $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
    $page_data['lang_update_success'] = $this->lang->line('update_success');
    $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
    $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
    $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
    $page_data['lang_submit'] = $this->lang->line('submit');
    $page_data['lang_close'] = $this->lang->line('close');

    $getpermissions_data = $this->Rolespermissions_model->matrix_permissions($idroles);
    $page_data['getpermissions_data'] = $getpermissions_data;
    $page_data['getpermissions_group_data'] = $this->Rolespermissions_model->get_permissions_group();
    $page_data['idroles_edit'] = $idroles;
    $this->load->view('rbac/index',$page_data);

     }else{
        redirect('errorpage/error403');
    }
  }

  function insert_roles_permissions(){
    $user_level = $this->session->userdata('user_level');    
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){
        $idroles_edit= $this->input->post('idroles_edit', TRUE); 
        $idpermissions = $_POST['permissions'];  
        $data_roles = array();
        $count_roles = 0;
        foreach($idpermissions as $idrp ){       
            
          if($idrp != ''){
              
              $dt_roles = $this->Rolespermissions_model->cheked_roles_permissions($idroles_edit)->num_rows();
              if($dt_roles > 0){
                  $this->Rolespermissions_model->delete_roles_data($idroles_edit,'roles_permissions'); 
              }
                array_push($data_roles,array(
                  'idroles'=> $idroles_edit,
                  'status'=> '1',
                  'idpermissions'=>$idpermissions[$count_roles],
                  'created_date' => date("Y-m-d H:i:s")
                  
                ));
                $count_roles++; 
          }  
        }
        $this->Rolespermissions_model->insert_roles_data('roles_permissions',$data_roles);
        $this->session->set_flashdata('update_success','message');
        redirect($_SERVER['HTTP_REFERER']);
      }else{
        redirect('errorpage/error403');
      }
  } 

}  