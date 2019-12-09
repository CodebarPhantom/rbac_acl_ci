<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rbaclogin extends CI_Controller{
  function __construct(){
    parent::__construct();
      $this->load->model('Rbaclogin_model');
      $this->load->library('session');
      $this->load->library('form_validation');
      
      $this->load->helper('form');
      $this->load->helper('url');
  }

  function index(){
      if ($this->session->userdata('user_email')) {
        redirect('rbac', 'refresh');
    } else {
      $this->load->view('login_rbac');
    }
    
  }

  function auth(){

      $data = array(
          'user_email' => $this->input->post('email'),
          'user_password' => $this->input->post('password'),
      );
          $result = $this->Rbaclogin_model->verifyLogIn($data);

          if ($result['validation']) {
              $iduser = $result['iduser'];
              $user_email = $result['user_email'];
              $user_name = $result['user_name'];
              $user_level = $result['user_level'];

              $userdata = array(
                  'iduser' => $iduser,
                  'user_name' => $user_name,
                  'user_email' => $user_email,
                  'user_level' => $user_level,
                  'logged_in' => TRUE
              );

              $this->session->set_userdata($userdata);

              
               redirect(base_url().'rbac', 'refresh');
              
              
          } else {
              $this->session->set_flashdata('alert_msg', array('failure', 'Login', $result['validation']));
              redirect(base_url('rbaclogin'), 'refresh');
          }
      
  

   
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('rbaclogin');
  }

}
