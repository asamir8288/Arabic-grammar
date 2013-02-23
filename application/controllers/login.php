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
    }

    public function index() {
        $this->data['submit_url'] = site_url('login/index');       

         if ($_POST) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $logged_in = Current_User::login($email, $password);
            
            if($logged_in !=false){
                redirect(site_url('dashboard'));
            }else{
                redirect(site_url('/'));
            }
        }
        
        $this->template->write_view('content', 'backend/login', $this->data);
        $this->template->render();
    }
    
    public function logout(){
        Current_User::logout();
        redirect(site_url('/'));
    }

}

?>
