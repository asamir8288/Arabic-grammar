<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of question
 *
 * @author Asamir
 */
class Question extends CI_Controller {

    var $data = array();
    var $user_info = array();

    function __construct() {
        parent::__construct();

        $this->user_info = $this->session->userdata('user_info');
    }

    public function index($assessment_id, $question_id = '') {
        $this->data['assessmentQuestions'] = QuestionsTable::getAssessmentQuestion($assessment_id, $question_id);

        $ua = new UserAssessments();

        $this->data['questionsNumber'] = $ua->getAssessmentQesutionNumber($assessment_id);

        if ($this->data['assessmentQuestions'] == false || $this->data['questionsNumber'] == 0) {
            $ua->setAssessmentAsChosin($assessment_id);
            redirect(site_url('assessment/my_assessments'));
        }

        switch ($this->data['assessmentQuestions']['type_id']) {
            case '1':
                $this->template->add_css('layout/css/question_types/ocq.css');
                $this->template->add_js('layout/js/ocq.js');
                break;
            case '2':
                $this->template->add_css('layout/css/question_types/choose_each_answer.css');
                $this->template->add_js('layout/js/choose-each-answer.js');
                break;
            case '3':
                $this->template->add_css('layout/css/question_types/drag_drop.css');
                $this->template->add_js('layout/js/jquery.dragsort-0.5.1.min.js');
                $this->template->add_js('layout/js/dragndrop.js');
                break;
            case '4':
                break;
        }


        $this->template->write_view('content', 'frontend/assessments/question_view', $this->data);
        $this->template->render();
    }

}

?>
