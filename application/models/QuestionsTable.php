<?php

/**
 * QuestionsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class QuestionsTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object QuestionsTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Questions');
    }

    public static function getAllQuestions() {
        return Doctrine_Query::create()
                        ->select('q.*, qt.name, qdl.name, qa.*')
                        ->from('Questions q, q.QuestionTypes qt, q.DifficultyLevels qdl, q.QuestionAnswers qa')
                        ->where('q.deleted=0')
                        ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                        ->execute();
    }

    public static function getCountQuestions($id) {
        $q = Doctrine_Query::create()
                ->select('COUNT(q.id) as q_count')
                ->from('Questions q')
                ->where('q.assessment_id =?', $id)
                ->andWhere('q.deleted=0')
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->fetchOne();

        return $q['q_count'];
    }

    public static function getAssessmentQuestions($assessment_id, $limit = null) {
        $q = Doctrine_Query::create()
                        ->select('q.*, qt.name, qdl.name, qa.*')
                        ->from('Questions q, q.QuestionTypes qt, q.DifficultyLevels qdl, q.QuestionAnswers qa')
                        ->where('q.assessment_id=?', $assessment_id)
                        ->andWhere('q.deleted=0');
        if($limit != null){
            $q = $q->limit($limit);
        }
                        $q = $q->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                        ->execute();
                        
                        return $q;
    }

    public static function getAssessmentQuestion($assessment_id, $question_id = '', $assessment_type = 2) {
        $q = Doctrine_Query::create()
                ->select('q.*, qt.name, qdl.name, qa.*')
                ->from('Questions q, q.QuestionTypes qt, q.DifficultyLevels qdl, q.QuestionAnswers qa, q.Assessments a, a.UserAssessments ua')
                ->where('q.assessment_id=?', $assessment_id)
                ->andWhere('q.deleted=0')
                ->andWhere('ua.completed=0')
                ->andWhere('ua.assessment_type=?', $assessment_type);
        if ($question_id) {
            $q = $q->andWhere('q.id > ?', $question_id);
        }
        $q = $q->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->limit(1)
                ->orderBy('q.id ASC')
                ->fetchOne();

        if ($question_id) {
            $ua = new UserAssessments();
            $ua->decreaseAssessmentQuestionsNumber($assessment_id);
        }

        if (count($q) == 0) {
            return false;
        } else {
            return $q;
        }
    }

    public static function getRandAssessmentQuestion($assessment_id, $assessment_type = 1) {
        $q = Doctrine_Query::create()
                ->select('q.*, qt.name, qdl.name, qa.*, a.id, ua.id')
                ->from('Questions q, q.QuestionTypes qt, q.QuestionAnswers qa, q.Assessments a, a.UserAssessments ua')
                ->where('ua.assessment_id=?', $assessment_id)
                ->andWhere('ua.deleted=0')
                ->andWhere('ua.completed=0')
                ->andWhere('ua.assessment_type=?', $assessment_type)
                ->andWhere('q.id NOT IN (SELECT uaa.questions_id FROM UserAssessmentAnswers uaa WHERE uaa.user_assessment_id =ua.id)')
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->limit(1)
                ->orderBy('RAND()')
                ->fetchOne();


        $ua = new UserAssessments();
        $ua->decreaseAssessmentQuestionsNumber($assessment_id, '1'); // 1 means this is exam not training

        if (count($q) == 0) {
            return false;
        } else {
            return $q;
        }
    }
    
    public static function getQuestion($id){
        return Doctrine_Query::create()
                ->select('q.*, qt.*, qa.feedback, qa.interest_grammatical, qdl.*')
                ->from('Questions q, q.QuestionTypes qt, q.QuestionAnswers qa, q.DifficultyLevels qdl')
                ->where('q.id=?', $id)
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->fetchOne();
    }
    
    public static function getAllGrammerQuestions() {
        return Doctrine_Query::create()
                ->select('q.*, qa.*')
                ->from('Questions q, q.QuestionAnswers qa')
                ->where('q.assessment_id = 41')
                ->orWhere('q.assessment_id = 59')
                ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
                ->execute();
    }
    
    public static function getAllSarfQuestions() {
        return Doctrine_Query::create()
                ->select('q.*, qa.*')
                ->from('Questions q, q.QuestionAnswers qa, q.Assessments a')
                ->where('a.menu_id BETWEEN 56 AND 76')
                ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
                ->execute();
    }
   

}