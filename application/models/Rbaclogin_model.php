<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rbaclogin_model extends CI_Model{

  function validate($email,$password){
    $this->db->where('user_email',$email);
    $this->db->where('user_password',$password);
    $result = $this->db->get('rbac_users',1);
    return $result;
  }


  public function verifyLogIn($data)
    {
        $user_email = $data['user_email'];
        $user_password = $this->encryptPassword($data['user_password']);

        $query = $this->db->get_where('rbac_users', array('user_email' => $user_email));
        $user_data = $query->row();

        if (count((array)$user_data) > 0) {
            $result = array();
            if ($user_password == $user_data->user_password) {
                if ($user_data->user_status == 0) {
                    $result['validation'] = false;
                    //$result['error'] = 'Your account is suspended! Please contact to Administrator!';
                    $this->session->set_flashdata('account_suspend','message');
                } else {
                    $result['validation'] = true;
                    $result['iduser'] = $user_data->iduser;
                    $result['user_name'] = $user_data->user_name;
                    $result['user_email'] = $user_data->user_email;
                    $result['user_level'] = $user_data->user_level;
                    $this->session->set_flashdata('success_login','message');
                }
            } else {
                $result['validation'] = false;
                //$result['error'] = 'Invalid Password!';
                $this->session->set_flashdata('invalid_password','message');
            }

            return $result;
        } else {
            $result['validation'] = false;            
            //$result['error'] = 'Email Address do not exist at the system!';
            $this->session->set_flashdata('invalid_email','message');

            return $result;
        }
    }

    public function encryptPassword($user_password)
    {
        return sha1("$user_password");
    }
}
