<?php

/**
 * Questions
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Questions extends BaseQuestions {

    public function addMultipleChoicesQuestion(array $data) {
        $question_id = $this->addQuestion($data);

        $answer = array();
        $answer['question_id'] = $question_id;
        $answer['answer_text'] = $data['answer_text'];
        $answer['correct_answer'] = $data['correct_answer'];
        $answer['feedback'] = $data['feedback'];
        $answer['interest_grammatical'] = $data['interest_grammatical'];

        $qa = new QuestionAnswers();
        $qa->addQuestionAnswer($answer);
    }

    public function addDragAndDropQuestion(array $data) {
        $question_id = $this->addQuestion($data);
        $answer = array();
        $answer['question_id'] = $question_id;
        $answer['answer_text'] = $data['answer_text'];
        $answer['correct_answer'] = $data['answer_text'];
        $answer['feedback'] = $data['feedback'];
        $answer['interest_grammatical'] = $data['interest_grammatical'];

        $qa = new QuestionAnswers();
        $qa->addQuestionAnswer($answer);
    }
    
    public function addPressOnCorrectAnswerQuestion(array $data) {
        $question_id = $this->addQuestion($data);
        $answer = array();
        $answer['question_id'] = $question_id;
        $answer['answer_text'] = $data['answer_text'];
        $answer['correct_answer'] = $data['answer_text'];
        $answer['feedback'] = $data['feedback'];
        $answer['interest_grammatical'] = $data['interest_grammatical'];

        $qa = new QuestionAnswers();
        $qa->addQuestionAnswer($answer);
    }
    
    public function addDropdownsQuestion(array $data) {
        $question_id = $this->addQuestion($data);

        $answer = array();
        $answer['question_id'] = $question_id;
        $answer['answer_text'] = $data['answer_text'];
        $answer['correct_answer'] = $data['answer_text'];
        $answer['feedback'] = $data['feedback'];
        $answer['interest_grammatical'] = $data['interest_grammatical'];

        $qa = new QuestionAnswers();
        $qa->addQuestionAnswer($answer);
    }

    private function addQuestion(array $data) {
        $q = new Questions();
        $q->assessment_id = $data['assessment_id'];
        $q->question = $data['question'];
        $q->is_active = true;
        $q->type_id = $data['type_id'];
        $q->difficulty_level = $data['difficulty_level'];
        $q->created_at = date('ymdHis');
        $q->save();

        return $q->id;
    }

    public function updateQuestion(array $data, $type = '1') {
        $answer = array();
        $answer['answer_id'] = $data['answer_id'];
        $answer['answer_text'] = $data['answer_text'];        
        $answer['feedback'] = $data['feedback'];
        $answer['interest_grammatical'] = $data['interest_grammatical'];

        switch ($type) {
            case '1':
                $answer['correct_answer'] = $data['correct_answer'];
                break;
            case '2':
                $answer['correct_answer'] = $data['answer_text'];
                break;
            case '3':
                $answer['correct_answer'] = $data['answer_text'];
                break;
            case '4':
                $answer['correct_answer'] = $data['answer_text'];
                break;
        }
        Doctrine_Query::create()
                ->update('Questions q')
                ->set('q.question', '?', $data['question'])
                ->set('q.type_id', '?', $data['type_id'])
                ->set('q.difficulty_level', '?', $data['difficulty_level'])
                ->set('q.updated_at', '?', date('ymdHis'))
                ->where('q.id =?', $data['question_id'])
                ->execute();

        $qa = new QuestionAnswers();
        $qa->updateQuestionAnswer($answer);
    }

    public function deleteQuestion($question_id) {
        Doctrine_Query::create()
                ->update('Questions q')
                ->set('q.deleted', '?', true)
                ->where('q.id =?', $question_id)
                ->execute();
    }

}