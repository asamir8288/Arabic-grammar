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
class Site extends CI_Controller {

    var $data = array();

    function __construct() {
        parent::__construct();

        $this->template->set_template('admin');
    }
    
    public function sayings(){
        $page_id = 'sayings';

        $p = new Pages();
        $page = $p->getPage($page_id);
        
        if ($this->input->post('submit')) {
            $page_data = array();
            $page_data['page_id'] = $page_id;
            $page_data['content'] = $this->input->post('content');
            $page_data['page_title'] = $this->input->post('page_title');
            
            if ($page) {
                $p->updatePage($page_data);
            } else {
                $p->addPage($page_data);
            }

            redirect(site_url('admin/site/sayings'));
        }

        $this->data['page'] = $page;
        
        $this->template->write_view('content', 'backend/pages/page_view', $this->data);
        $this->template->render();
    }

    public function about_us() {
        $page_id = 'about-us';

        $p = new Pages();
        $page = $p->getPage($page_id);
        
        if ($this->input->post('submit')) {
            $page_data = array();
            $page_data['page_id'] = $page_id;
            $page_data['content'] = $this->input->post('content');
            $page_data['page_title'] = $this->input->post('page_title');
            
            if ($page) {
                $p->updatePage($page_data);
            } else {
                $p->addPage($page_data);
            }

            redirect(site_url('admin/site/about_us'));
        }

        $this->data['page'] = $page;
        
        $this->template->write_view('content', 'backend/pages/page_view', $this->data);
        $this->template->render();
    }

}

?>
