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

    public function index(){
        $this->data['assessments'] = AssessmentsTable::getAllAssessments();
        $this->template->add_css('layout/css/advancedtable.css');
        $this->template->add_js('layout/js/advancedtable.js');
        $this->template->add_js('layout/js/jquery.liveFilter.js');
        $this->template->add_js('layout/js/pages/list_assessments.js');
        $this->template->write_view('content', 'backend/assessments/list_all_assessments', $this->data);
        $this->template->render();
    }
    
    public function create() {
        if($this->input->post('submit')){
            $poested_data = $_POST;
            $a = new Assessments();
            $a->addAssessment($poested_data);
            
            redirect(site_url('admin/assessment'));
        }
        $this->data['mainMenu'] = MenuTable::getMainMenuCategories();
        
        $this->template->add_js('layout/js/pages/create_assessment.js');
        $this->template->write_view('content', 'backend/assessments/create_assessment', $this->data);
        $this->template->render();
    }
    
    public function get_submenu_items($menu_id){        
        $this->data['subMenuItems'] = MenuTable::getSubMenuItems($menu_id);
        
        $this->load->view('backend/assessments/submenu_items', $this->data);
    }
    
    public function visibility($assessment_id){
        $a = new Assessments();
        $visibility = $a->updateVisibility($assessment_id);
        
        echo json_encode($visibility);
    }
    
    public function delete($assessment_id){
        $a = new Assessments();
        $a->deleteAssessment($assessment_id);
        
        redirect(site_url('admin/assessment'));
    }
    
    /*
     * Create Questions
     */
    public function manage_questions($assessment_id){
        $this->data['assessment_id'] = $assessment_id;
        
        $this->data['questions'] = QuestionsTable::getAssessmentQuestions($assessment_id);
        $this->template->add_css('layout/css/advancedtable.css');
        $this->template->add_js('layout/js/advancedtable.js');
        $this->template->add_js('layout/js/jquery.liveFilter.js');
        $this->template->add_js('layout/js/pages/list_assessments.js');
        $this->template->write_view('content', 'backend/assessments/manage_questions', $this->data);
        $this->template->render();
    }
    
    public function create_question($assessment_id){
        if($this->input->post('submit')){
            $posted_data = $_POST;
            
            $q = new Questions();
            
            switch($this->input->post('type_id')){
                case '1':
                    $answers = explode(',', $posted_data['answer_text']);
                    $posted_data['correct_answer'] = $answers[0];
                    $posted_data['assessment_id'] = $assessment_id;
                                        
                    $q->addMultipleChoicesQuestion($posted_data);                    
                    redirect(site_url('admin/assessment/manage_questions/' . $assessment_id));
                    
                    break;
                case '2':
                    break;
                case '3':
                    $posted_data['assessment_id'] = $assessment_id;
                    
                    $q->addDragAndDropQuestion($posted_data);                    
                    redirect(site_url('admin/assessment/manage_questions/' . $assessment_id));
                    
                    break;
                case '4':
                    break;
            }
        }
        $this->data['submit_url'] = site_url('admin/assessment/create_question/' . $assessment_id);
        $this->data['questionTypes'] = QuestionTypesTable::getAllQuestionTypes();
        $this->data['questionDiffeculty'] = DifficultyLevelsTable::getAllDifficultyLevels();
        
        $this->template->add_css('layout/css/bootstrap-tagmanager.css');
        $this->template->add_js('layout/js/jquery-ui.min.js');
        $this->template->add_js('layout/js/bootstrap-tagmanager.js');
        
        $this->template->write_view('content', 'backend/assessments/create_question', $this->data);
        $this->template->render();
    }
    
    /*
     * Question Types
     */
    public function multiChoices(){
        $this->load->view('backend/assessments/question_types/multi_choices');
    }
    
    public function dragAndDrop(){
        $this->load->view('backend/assessments/question_types/drag_and_drop');
    }
    

}

?>
