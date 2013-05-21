<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Asamir
 */
class Login extends CI_Controller {

    var $data = array();

    function __construct() {
        parent::__construct();

        $this->template->set_template('admin');
    }

    public function index() {
        if($this->input->post('submit')){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            if($username == 'klamona' && $password == 'klamona@1'){
                $this->session->set_userdata('is_login' , true);
                redirect(site_url('admin/assessment'));
            }else{
                redirect(site_url('admin/login'));
            }
        }
        
        $this->template->write_view('content', 'backend/login_view', $this->data);
        $this->template->render();
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }

}

?>
