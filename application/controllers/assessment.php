<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of assessment
 *
 * @author Asamir
 */
class Assessment extends CI_Controller {

    var $data = array();
    var $user_info = array();

    function __construct() {
        parent::__construct();

        $this->user_info = $this->session->userdata('user_info');
    }

    public function listall() {
        $this->data['mainMenu'] = MenuTable::getMainMenuCategories();
        $this->data['userAssessment'] = UserAssessmentsTable::getAllUserAssessments($this->user_info['user_id'], true);

        $this->template->add_js('layout/js/jquery-ui.min.js');
        $this->template->add_css('layout/css/jquery-ui.css');
        $this->template->add_js('layout/js/site_url_global.js');
        $this->template->add_js('layout/js/pages/frontend/assessment-basket.js');

        $this->template->write_view('content', 'frontend/assessments/listall-assessments', $this->data);
        $this->template->render();
    }

    /*
     * this function responsible for add trainings and exams to each users
     * $assessment_id
     * $assessment_type ... maybe the Exams(id=1) or Training(id=2)
     */

    public function add_to_user($menu_id = '', $assessment_type = 2, $assessment_id = '') {
        if ($menu_id) {
            $a = new Assessments();
            $assessment_id = $a->getAssessmentId($menu_id);
        }

        $valid_assessment = false;

        
        if ($assessment_id) {
            $assessment = array();
            $assessment['user_id'] = $this->user_info['user_id'];
            $assessment['assessment_id'] = $assessment_id;
            $assessment['assessment_type'] = $assessment_type;

            $ua = new UserAssessments();
            if (!$ua->isAssessmentAddedAndAvailable($assessment['user_id'], $assessment_id, $assessment_type)) {
                $ua->addAssessmentToUser($assessment);

                $valid_assessment = true;
            } else {
                $valid_assessment = 'still_running';
            }
        }
        echo json_encode($valid_assessment);
    }

    public function addby_assessment_name($assessment_name, $assessment_type = 2) {
        $a = new Assessments();
        $assessment_id = $a->getAssessmentIdByName(urldecode($assessment_name));
        $this->add_to_user('', $assessment_type, $assessment_id);
    }

    public function get_submenu_items($menu_id) {
        $this->data['subMenuItems'] = MenuTable::getSubMenuItems($menu_id);

        $this->load->view('frontend/assessments/submenu_items', $this->data);
    }

    public function my_assessments() {
        $this->data['userAssessment'] = UserAssessmentsTable::getAllUserAssessments($this->user_info['user_id'], 1);

        $this->data['allCompleted'] = UserAssessmentsTable::isAllAssessmentCompleted($this->user_info['user_id']);

        $this->template->write_view('content', 'frontend/assessments/preview_chosen_assessments', $this->data);
        $this->template->render();
    }
    
    public function previous_assessments() {
        $this->data['userAssessment'] = UserAssessmentsTable::getAllUserAssessments($this->user_info['user_id'], 0);

        $this->data['allCompleted'] = UserAssessmentsTable::isAllAssessmentCompleted($this->user_info['user_id']);

        $this->template->write_view('content', 'frontend/assessments/preview_chosen_assessments', $this->data);
        $this->template->render();
    }

    public function detials() {
        if ($this->input->post('submit')) {
            $userassessment_id = $this->input->post('user_assessment_id');
            $question_number = $this->input->post('questions_number');
            $assessment_id = $this->input->post('assessment_id');

            $ua = new UserAssessments();
            $ua->setUserAssessmentQuestion($userassessment_id, $question_number);

            redirect(site_url('question/' . $assessment_id));
        }

        $this->data['submit_url'] = site_url('assessment/detials');
        $this->data['assessment'] = UserAssessmentsTable::getAssessment($this->user_info['user_id']);

        $this->template->write_view('content', 'frontend/assessments/assessment_detials', $this->data);
        $this->template->render();
    }

    public function auto_complete($key = '') {
        $data['response'] = 'false';

        $results = UserAssessmentsTable::getAssessmentByName($this->input->post('term'));
        if (count($results) > 0) {
            $data['response'] = 'true';
            $data['message'] = array();

            for ($i = 0; $i < count($results); $i++) {
                $data['message'][] = array('label' => $results[$i]['name'], 'value' => $results[$i]['name']);
            }
        }

        echo json_encode($data);
    }

}

?>
