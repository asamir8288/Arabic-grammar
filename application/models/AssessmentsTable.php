<?php

/**
 * AssessmentsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AssessmentsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AssessmentsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Assessments');
    }
    
    public static function getAllAssessments(){
        return Doctrine_Query::create()
                ->select('a.*,
                    (SELECT COUNT(q.id) FROM Questions q WHERE q.assessment_id=a.id AND q.deleted=0) AS assessment_questions')
                ->from('Assessments a')
                ->where('a.deleted=0')
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->execute();
    }
    
    public static function isAddedBefore($assessment_name){
        $q = Doctrine_Query::create()
                ->select('COUNT(a.id) AS exists')
                ->from('Assessments a')
                ->where('a.deleted=0')
                ->andWhere('a.name =?', trim($assessment_name))
                ->setHydrationMode(Doctrine_Core::HYDRATE_SCALAR)
                ->fetchOne();
        
        if($q['a_exists'] > 0)
            return true;
        return false;
    }
    
    public static function isAssessmentExists($assessment_id) {
        $sql = Doctrine_Query::create()
                ->select('count(a.id) as count')
                ->from('Assessments a')
                ->where('a.id=?', $assessment_id)
                ->setHydrationMode(Doctrine_Core::HYDRATE_SCALAR)
                ->fetchOne();
        
        if($sql['a_count'] > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}