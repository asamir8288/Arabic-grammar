<?php

/**
 * QuestionAnswersTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class QuestionAnswersTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object QuestionAnswersTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('QuestionAnswers');
    }
    
    public static function getQuestionAnswers($id){
        return Doctrine_Query::create()
                ->select('q.id, q.question, qa.*')
                ->from('Questions q, q.QuestionAnswers qa')
                ->where('q.id=?', $id)
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->fetchOne();
    }
}