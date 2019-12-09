<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rbac extends CI_Controller{

  private $contoller_name;
  private $function_name;

  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('errorpage/error403');
    }
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


  function index(){
    
   $user_level = $this->session->userdata('user_level');   
   $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
      if($check_permission->num_rows() == 1){        

        $page_data['page_name'] = 'dashboard';
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


        $page_data['lang_date'] = $this->lang->line('date');
        $page_data['lang_search'] = $this->lang->line('search');
        
        

        $this->load->view('rbac/index',$page_data);
     }else{
        redirect('errorpage/error403');
     }

  }


  function list_users(){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
      if($check_permission->num_rows() == 1){    

    $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'rbac/list-users?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rbac/list-users?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rbac/list-users';
            $config['first_url'] = base_url() . 'rbac/list-users';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rbac_users_model->total_rows_user($q);
        $rbac_users = $this->Rbac_users_model->get_limit_data_user($config['per_page'], $start, $q);
        
        $this->pagination->initialize($config);

        $page_data['page_name'] = 'list_users';
        $page_data['lang_dashboard'] = $this->lang->line('dashboard');
        $page_data['lang_dashboard_hotel'] = $this->lang->line('dashboard_hotel');
        $page_data['lang_submit'] = $this->lang->line('submit');
        $page_data['lang_close'] = $this->lang->line('close');
        $page_data['lang_input_success'] = $this->lang->line('input_success');
        $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
        $page_data['lang_delete_success'] = $this->lang->line('delete_success');
        $page_data['lang_delete_data'] = $this->lang->line('delete_data');
        $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
        $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
        $page_data['lang_update_success'] = $this->lang->line('update_success');
        $page_data['lang_success_update_data'] = $this->lang->line('success_update_data');
        $page_data['lang_update_password_failure'] = $this->lang->line('update_password_failure');
        $page_data['lang_failure_update_password'] = $this->lang->line('failure_update_password');
        $page_data['lang_new_password_must_same'] = $this->lang->line('new_password_must_same');  

        $page_data['lang_user'] = $this->lang->line('user');        
        $page_data['lang_username'] = $this->lang->line('username');
        $page_data['lang_password'] = $this->lang->line('password');
        $page_data['lang_new_password'] = $this->lang->line('new_password');
        $page_data['lang_confirm_password'] = $this->lang->line('confirm_password');
        $page_data['lang_change_password_for'] = $this->lang->line('change_password_for');
        $page_data['lang_change_password'] = $this->lang->line('change_password');
        $page_data['lang_email'] = $this->lang->line('email');
        $page_data['lang_level'] = $this->lang->line('level');
        $page_data['lang_choose_level'] = $this->lang->line('choose_level');
        $page_data['lang_status'] = $this->lang->line('status');
        $page_data['lang_active'] = $this->lang->line('active');
        $page_data['lang_inactive'] = $this->lang->line('inactive');
        $page_data['lang_choose_status'] = $this->lang->line('choose_status');
        $page_data['lang_add_user'] = $this->lang->line('add_user');
        $page_data['lang_edit_user'] = $this->lang->line('edit_user');
        $page_data['lang_delete_user'] = $this->lang->line('delete_user');
        $page_data['lang_list_users'] = $this->lang->line('list_users');
        $page_data['lang_departement'] = $this->lang->line('departement');
        $page_data['lang_add_departement'] = $this->lang->line('add_departement');
        $page_data['lang_list_departement'] = $this->lang->line('list_departement');
        $page_data['lang_choose_departement'] = $this->lang->line('choose_departement');
        $page_data['lang_choose_hotels'] = $this->lang->line('choose_hotels');


        $page_data['rbac_users_data'] = $rbac_users;
        $page_data['q'] = $q;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;

    $this->load->view('rbac/index',$page_data);
      }else{
        redirect('errorpage/error403');
    }
  }

  function insert_user(){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
      if($check_permission->num_rows() == 1){    
    $data = array(
      'iddept' => $this->input->post('iddept',TRUE),
      'user_name' => $this->input->post('user_name', TRUE),
      'user_email' => $this->input->post('user_email', TRUE),
      'user_password' => SHA1($this->input->post('user_password', TRUE)),
      'user_level' => $this->input->post('user_level', TRUE),
      'user_status' => $this->input->post('user_status', TRUE)
      );  
     
        $this->Rbac_users_model->insertData( 'rbac_users',$data);
        $this->session->set_flashdata('input_success','message');
        
        redirect(site_url('rbac/list-users'));
        }else{
        redirect('errorpage/error403');
    }
      
  }

  function update_user(){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){    
    $data = array(
      'iddept' => $this->input->post('iddept',TRUE),      
      'user_name' => $this->input->post('user_name', TRUE),
      'user_email' => $this->input->post('user_email', TRUE),
      'user_level' => $this->input->post('user_level', TRUE),
      'user_status' => $this->input->post('user_status', TRUE)
      );  
     
        $this->Rbac_users_model->updateDataUser('rbac_users', $data, $this->input->post('iduser', TRUE));
        $this->session->set_flashdata('update_success','message');
        redirect(site_url('rbac/list-users'));
      }else{
        redirect('errorpage/error403');
    }
  }

  function delete_user($iduser){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
      if($check_permission->num_rows() == 1){    
          $this->Rbac_users_model->deleteDataUser($iduser);
          $this->session->set_flashdata('delete_success','message');
          redirect(site_url('rbac/list-users'));
        }else{
          redirect('errorpage/error403');
      }
      
  }

  function update_password_user(){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
      if($check_permission->num_rows() == 1){    
        $iduser = $this->input->post('iduser');
        $newpass = $this->input->post('newpassword');
        $conpass = $this->input->post('conpassword');

        //$us_id = $this->session->userdata('user_id');
     
        if (empty($newpass)) {
            $this->session->set_flashdata('update_password_failure','message');
            redirect(base_url().'rbac/list-users');
        } elseif (empty($conpass)) {
          $this->session->set_flashdata('update_password_failure','message');
            redirect(base_url().'rbac/list-users');
        } elseif ($newpass != $conpass) {
           $this->session->set_flashdata('update_password_notsame','message');
            redirect(base_url().'rbac/list-users');
        } else {
            $upd_data = array(
              'user_password' => SHA1($this->input->post('newpassword', TRUE)),
                    //'updated_user_id' => $us_id,
                    //'updated_datetime' => $tm,
            );
            if ($this->Rbac_users_model->updatePasswordData('rbac_users', $upd_data, $iduser)) {
                $this->session->set_flashdata('update_success','message');
                redirect(base_url().'rbac/list-users');
            }
        }
      }else{
        redirect('errorpage/error403');
    }
  }


  function list_departement(){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
      if($check_permission->num_rows() == 1){    
    $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'rbac/list-departement?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rbac/list-departement?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rbac/list-departement';
            $config['first_url'] = base_url() . 'rbac/list-departement';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rbac_departement_model->total_rows_departement($q);
        $rbac_departement = $this->Rbac_departement_model->get_limit_data_departement($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $page_data['page_name'] = 'list_departement';        
        

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

        $page_data['lang_edit_departement'] = $this->lang->line('edit_departement');
        $page_data['lang_delete_departement'] = $this->lang->line('delete_departement');       
        $page_data['lang_search_departement'] = $this->lang->line('search_departement');
        $page_data['lang_background_color'] = $this->lang->line('background_color');
        $page_data['lang_choose_bg_color'] = $this->lang->line('choose_bg_color');
   


        $page_data['rbac_departement_data'] = $rbac_departement;
        $page_data['q'] = $q;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;

       
        $this->load->view('rbac/index', $page_data);
    }else{
      redirect('errorpage/error403');
    }

  }

  function insert_departement(){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
      if($check_permission->num_rows() == 1){    
    $data = array(      
      'deptname' => ucwords($this->input->post('departement',TRUE)),
      'background_class' => $this->input->post('bgcolor',TRUE)
      );  
        $this->Rbac_departement_model->insertData('rbac_dept',$data);
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('rbac/list-departement'));
        }else{
        redirect('errorpage/error403');
    }      
  }

  function update_departement(){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
      if($check_permission->num_rows() == 1){    
    $data = array(
      'deptname' => ucwords($this->input->post('departement',TRUE)),
      'background_class' => $this->input->post('bgcolor',TRUE)
      );  
     
        $this->Rbac_departement_model->updateDataDepartement('rbac_dept', $data, $this->input->post('iddept_old', TRUE));
        $this->session->set_flashdata('update_success','message');
        
        redirect(site_url('rbac/list-departement'));
      }else{
        redirect('errorpage/error403');
    }
      
  }

  function delete_departement($iddept){
    $user_level = $this->session->userdata('user_level');   
    $check_permission =  $this->Rolespermissions_model->check_permissions($this->contoller_name,$this->function_name,$user_level);    
    if($check_permission->num_rows() == 1){     
    $this->Rbac_departement_model->deleteDataDepartement($iddept);
    $this->session->set_flashdata('delete_success','message');
    redirect(site_url('rbac/list-departement'));
    }else{
      redirect('errorpage/error403');
    }

  }



  
  

}
