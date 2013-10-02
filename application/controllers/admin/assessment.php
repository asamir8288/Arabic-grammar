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

    function __construct() {
        parent::__construct();

        $this->template->set_template('admin');
    }

    public function index() {
        $this->data['assessments'] = AssessmentsTable::getAllAssessments();
        $this->template->add_css('layout/css/advancedtable.css');
        $this->template->add_js('layout/js/advancedtable.js');
        $this->template->add_js('layout/js/jquery.liveFilter.js');
        $this->template->add_js('layout/js/pages/list_assessments.js');
        $this->template->write_view('content', 'backend/assessments/list_all_assessments', $this->data);
        $this->template->render();
    }

    public function create() {
        if ($this->input->post('submit')) {
            $poested_data = $_POST;

            if (!AssessmentsTable::isAddedBefore($poested_data['name'])) {
                $a = new Assessments();
                $a->addAssessment($poested_data);
                redirect(site_url('admin/assessment'));
            }else {
               $this->session->set_flashdata('message', array('type' => '_error', 'body' => 'هذا الاختبار تم انشائه من قبل'));
               redirect(site_url('admin/assessment/create'));
            }            
        }
        $this->data['mainMenu'] = MenuTable::getMainMenuCategories();

        $this->template->add_js('layout/js/pages/create_assessment.js');
        $this->template->write_view('content', 'backend/assessments/create_assessment', $this->data);
        $this->template->render();
    }

    public function get_submenu_items($menu_id = '') {

        $this->data['subMenuItems'] = MenuTable::getSubMenuItems($menu_id);

        $this->load->view('backend/assessments/submenu_items', $this->data);
    }

    public function visibility($assessment_id) {
        $a = new Assessments();
        $visibility = $a->updateVisibility($assessment_id);

        echo json_encode($visibility);
    }

    public function delete($assessment_id) {
        $a = new Assessments();
        $a->deleteAssessment($assessment_id);

        redirect(site_url('admin/assessment'));
    }

    /*
     * Create Questions
     */

    public function manage_questions($assessment_id) {
        $this->data['assessment_id'] = $assessment_id;

        $this->data['questions'] = QuestionsTable::getAssessmentQuestions($assessment_id);
        $this->template->add_css('layout/css/advancedtable.css');
        $this->template->add_js('layout/js/advancedtable.js');
        $this->template->add_js('layout/js/jquery.liveFilter.js');
        $this->template->add_js('layout/js/pages/list_assessments.js');
        $this->template->write_view('content', 'backend/assessments/manage_questions', $this->data);
        $this->template->render();
    }

    public function create_question($assessment_id) {
        if ($this->input->post('submit')) {
            $posted_data = $_POST;

            $q = new Questions();

            switch ($this->input->post('type_id')) {
                case '1':
                    $answers = explode(',', $posted_data['answer_text']);
                    $posted_data['correct_answer'] = $answers[0];
                    $posted_data['assessment_id'] = $assessment_id;

                    $q->addMultipleChoicesQuestion($posted_data);
                    redirect(site_url('admin/assessment/manage_questions/' . $assessment_id));

                    break;
                case '2':
                    $posted_data['assessment_id'] = $assessment_id;

                    $q->addPressOnCorrectAnswerQuestion($posted_data);
                    redirect(site_url('admin/assessment/manage_questions/' . $assessment_id));
                    break;
                case '3':
                    $posted_data['assessment_id'] = $assessment_id;

                    $q->addDragAndDropQuestion($posted_data);
                    redirect(site_url('admin/assessment/manage_questions/' . $assessment_id));

                    break;
                case '4':
                    $posted_data['assessment_id'] = $assessment_id;

                    $q->addDropdownsQuestion($posted_data);
                    redirect(site_url('admin/assessment/manage_questions/' . $assessment_id));
                    break;
            }
        }
        $this->data['submit_url'] = site_url('admin/assessment/create_question/' . $assessment_id);
        $this->data['questionTypes'] = QuestionTypesTable::getAllQuestionTypes();
        $this->data['questionDiffeculty'] = DifficultyLevelsTable::getAllDifficultyLevels();

        $this->template->add_css('layout/css/bootstrap-tagmanager.css');
        $this->template->add_js('layout/js/jquery-ui.min.js');
        $this->template->add_js('layout/js/bootstrap-tagmanager.js');
        $this->template->add_js('layout/js/pages/create_question.js');

        $this->template->write_view('content', 'backend/assessments/create_question', $this->data);
        $this->template->render();
    }

    public function edit_question($question_id) {
        if ($this->input->post('submit')) {
            $posted_data = $_POST;

            $q = new Questions();

            switch ($this->input->post('type_id')) {
                case '1':
                    $answers = explode(',', $posted_data['answer_text']);
                    $posted_data['correct_answer'] = $answers[0];

                    $q->updateQuestion($posted_data);
                    redirect(site_url('admin/assessment/manage_questions/' . $posted_data['ass_id']));

                    break;
                case '2':
                    $q->updateQuestion($posted_data, 2);
                    redirect(site_url('admin/assessment/manage_questions/' . $posted_data['ass_id']));
                    break;
                case '3':
                    $q->updateQuestion($posted_data, 3);
                    redirect(site_url('admin/assessment/manage_questions/' . $posted_data['ass_id']));

                    break;
                case '4':
                    $q->updateQuestion($posted_data, 4);
                    redirect(site_url('admin/assessment/manage_questions/' . $posted_data['ass_id']));
                    break;
            }
        }
        if ($question_id) {
            $this->data['question'] = QuestionsTable::getQuestion($question_id);
        }
        $this->data['submit_url'] = site_url('admin/assessment/edit_question/' . $question_id);
        $this->data['questionTypes'] = QuestionTypesTable::getAllQuestionTypes();
        $this->data['questionDiffeculty'] = DifficultyLevelsTable::getAllDifficultyLevels();
        $this->data['edit_mode'] = true;

        $this->template->add_css('layout/css/bootstrap-tagmanager.css');
        $this->template->add_js('layout/js/jquery-ui.min.js');
        $this->template->add_js('layout/js/bootstrap-tagmanager.js');
        $this->template->add_js('layout/js/pages/create_question.js');

        $this->template->write_view('content', 'backend/assessments/create_question', $this->data);
        $this->template->render();
    }

    /*
     * Question Types
     */

    public function multiChoices($question_id = '') {
        if ($question_id) {
            $this->data['answers'] = QuestionAnswersTable::getQuestionAnswers($question_id);
        }
        $this->load->view('backend/assessments/question_types/multi_choices', $this->data);
    }

    public function pressOnCorrectAnswer($question_id = '') {
        if ($question_id) {
            $this->data['answers'] = QuestionAnswersTable::getQuestionAnswers($question_id);
        }
        $this->load->view('backend/assessments/question_types/press_on__correct_answer', $this->data);
    }

    public function dragAndDrop($question_id = '') {
        if ($question_id) {
            $this->data['answers'] = QuestionAnswersTable::getQuestionAnswers($question_id);
        }
        $this->load->view('backend/assessments/question_types/drag_and_drop', $this->data);
    }

    public function dropdownsQuestion($question_id = '') {
        if ($question_id) {
            $this->data['answers'] = QuestionAnswersTable::getQuestionAnswers($question_id);
        }
        $this->load->view('backend/assessments/question_types/dropdowns_questions', $this->data);
    }

    public function delete_question($question_id, $assessment_id) {
        $q = new Questions();
        $q->deleteQuestion($question_id);

        redirect(site_url('admin/assessment/manage_questions/' . $assessment_id));
    }

}

?>
