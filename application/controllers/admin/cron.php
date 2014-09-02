<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cron
 *
 * @author Asamir
 */
class Cron extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function updateGeneralGrammer() {
        $questions = QuestionsTable::getAllGrammerQuestions();
//        pre_print(QuestionsTable::getAllGrammerQuestions());

        $q = new Questions();
        foreach ($questions as $question) {
            $data = array();
            $data['assessment_id'] = 41;
            $data['question'] = $question['question'];
            $data['type_id'] = $question['type_id'];
            $data['difficulty_level'] = $question['difficulty_level'];

            $data['answer_text'] = $question['QuestionAnswers'][0]['answer_text'];
            $data['correct_answer'] = $question['QuestionAnswers'][0]['correct_answer'];
            $data['feedback'] = $question['QuestionAnswers'][0]['feedback'];
            $data['interest_grammatical'] = $question['QuestionAnswers'][0]['interest_grammatical'];
            
            $q->addMultipleChoicesQuestion($data);            
        }
    }

    public function updateSarfGrammer() {
        $questions = QuestionsTable::getAllSarfQuestions();

        $q = new Questions();
        foreach ($questions as $question) {
            $data = array();
            $data['assessment_id'] = 59;
            $data['question'] = $question['question'];
            $data['type_id'] = $question['type_id'];
            $data['difficulty_level'] = $question['difficulty_level'];

            $data['answer_text'] = $question['QuestionAnswers'][0]['answer_text'];
            $data['correct_answer'] = $question['QuestionAnswers'][0]['correct_answer'];
            $data['feedback'] = $question['QuestionAnswers'][0]['feedback'];
            $data['interest_grammatical'] = $question['QuestionAnswers'][0]['interest_grammatical'];
            
            $q->addMultipleChoicesQuestion($data);            
        }
    }

}
