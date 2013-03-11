<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of exam
 *
 * @author Asamir
 */
class Exam extends CI_Controller {

    var $data = array();
    var $user_info = array();

    function __construct() {
        parent::__construct();

        $this->user_info = $this->session->userdata('user_info');
    }

    public function listall() {
        $this->data['mainMenu'] = MenuTable::getMainMenuCategories();
        $this->data['userAssessment'] = UserAssessmentsTable::getAllUserAssessments($this->user_info['user_id'], true, 1);
        $this->data['type'] = '1'; // Type 1 means it is an exam not training

        $this->template->add_js('layout/js/site_url_global.js');
        $this->template->add_js('layout/js/pages/frontend/exam-basket.js');
        $this->template->write_view('content', 'frontend/assessments/listall-assessments', $this->data);
        $this->template->render();
    }

    public function my_exams() {
        $this->data['userAssessment'] = UserAssessmentsTable::getAllUserAssessments($this->user_info['user_id'], false, 1); // 1 means it is an exam not training        
        $this->data['allCompleted'] = UserAssessmentsTable::isAllAssessmentCompleted($this->user_info['user_id'], 1); // 1 means it is an exam not training
        $this->data['type'] = '1'; // Type 1 means it is an exam not training                

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

            redirect(site_url('exam/question/' . $assessment_id));
        }

        $this->data['submit_url'] = site_url('exam/detials');
        $this->data['assessment'] = UserAssessmentsTable::getAssessment($this->user_info['user_id'], 1);
        $this->data['type'] = '1';

        $this->template->write_view('content', 'frontend/assessments/assessment_detials', $this->data);
        $this->template->render();
    }

    public function question($assessment_id) {
        if($this->input->post('submit')){
            $question_id = $this->input->post('qId');
            $user_answer = $this->input->post('q1');
            $user_assessment_id = $this->input->post('ua_id');
            
            $qa = new QuestionAnswers();
            $answer = $qa->isCorrectAnswer($question_id, $user_answer);
            
            $userAnswer = array();
            $userAnswer['user_assessment_id'] = $user_assessment_id;
            $userAnswer['questions_id'] = $question_id;
            $userAnswer['user_answer'] = $user_answer;
            $userAnswer['correct_answer'] = $answer;
            
            $aa = new UserAssessmentAnswers();
            $aa->addUserAnswer($userAnswer);
            
        }
        
        $this->data['submit_url'] = site_url('exam/question/' . $assessment_id);

        $ua = new UserAssessments();
        $this->data['questionsNumber'] = $ua->getAssessmentQesutionNumber($assessment_id, 1); // the number 1 means the type of assessment which mean exam (1=exam && 2=training)        

        $this->data['assessmentQuestions'] = QuestionsTable::getRandAssessmentQuestion($assessment_id);

        if ($this->data['assessmentQuestions'] == false || $this->data['questionsNumber'] == 0) {
            $ua->setAssessmentAsChosin($assessment_id, 1);
            redirect(site_url('exam/my_exams'));
        }

        $this->template->add_css('layout/css/question_types/ocq.css');
        $this->template->add_css('layout/css/question_types/drag_drop.css');
        $this->template->add_js('layout/js/ocq-exam.js');
        $this->template->add_js('layout/js/jquery.dragsort-0.5.1.min.js');
        $this->template->add_js('layout/js/exam_dragndrop.js');
        $this->template->write_view('content', 'frontend/assessments/question_exam_view', $this->data);
        $this->template->render();
    }

}

?>