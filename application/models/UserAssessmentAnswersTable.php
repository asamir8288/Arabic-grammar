<?php

/**
 * UserAssessmentAnswersTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserAssessmentAnswersTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object UserAssessmentAnswersTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('UserAssessmentAnswers');
    }

    public static function getResultAssessmentUserAnswers($user_assessment_id) {
        $answers = Doctrine_Query::create()
                ->select('uaa.*, q.id, dl.id')
                ->from('UserAssessmentAnswers uaa, uaa.Questions q, q.DifficultyLevels dl')
                ->where('uaa.user_assessment_id =?', $user_assessment_id)
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->execute();

        $results = array();
        $total = 0;
        $result = 0;
        $num_correct_answer = 0;
        foreach ($answers as $answer) {
            if ($answer['correct_answer']) {
                switch ($answer['Questions']['DifficultyLevels']['id']) {
                    case '1':
                        $result += 5;
                        break;
                    case '2':
                        $result += 15;
                        break;
                    case '3':
                        $result += 25;
                        break;
                }
                $num_correct_answer++;
            }

            switch ($answer['Questions']['DifficultyLevels']['id']) {
                case '1':
                    $total += 5;
                    break;
                case '2':
                    $total += 15;
                    break;
                case '3':
                    $total += 25;
                    break;
            }
        }

        $results['result'] = $result;
        $results['total'] = $total;
        $results['num_correct_answer'] = $num_correct_answer;
        return $results;
    }
    
    public static function getExamsAnswers($user_assessment_id) {
        return Doctrine_Query::create()
                ->select('uaa.*, q.question, q.type_id, qa.answer_text, qa.correct_answer')
                ->from('UserAssessmentAnswers uaa, uaa.Questions q, q.QuestionAnswers qa')
                ->where('uaa.user_assessment_id =?', $user_assessment_id)
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->execute();
    }

}