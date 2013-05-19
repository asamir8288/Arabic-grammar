<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of site
 *
 * @author Asamir
 */
class Site extends CI_Controller{
    
    var $data = array();
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){       
        $this->load->view('frontend/templates/home_template');
    }
    
    public function signup(){
        if($this->input->post('submit')){
            $posted_data = $_POST;
            $posted_data['confirmation_code'] = md5(uniqid(rand()));
            
            $u = new Users();
            $u->addUser($posted_data);
            
            Current_User::login($this->input->post('email'), $this->input->post('password'));
            
            redirect(site_url('dashboard'));
        }
        
        $this->data['grades'] = LookupGradesTable::getAllGrades();
        
        $this->template->add_js('layout/js/site_url_global.js');
        $this->template->add_js('layout/js/jquery.validate.min.en.js');
        $this->template->add_js('layout/js/pages/signup.js');
        
        $this->template->write_view('content', 'frontend/signup_view', $this->data);
        $this->template->render();
    }
    
    public function get_grade_years($grade_id){
        $years = new LookupAcademicYears();
        $this->data['academicYears'] = $years->getAcademicYears($grade_id);
        
        $this->load->view('frontend/lists/acadimic_years', $this->data);
    }
    
    public function dashboard(){
        $this->template->write_view('content', 'frontend/dashboard', $this->data);
        $this->template->render();
    }
}

?>
