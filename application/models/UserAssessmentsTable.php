<?php

/**
 * UserAssessmentsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserAssessmentsTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object UserAssessmentsTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('UserAssessments');
    }

    public static function getAllUserAssessments($user_id, $completed = false, $type = 2) {
        $q = Doctrine_Query::create()
                ->select('ua.assessment_id, ua.completed, a.name')
                ->from('UserAssessments ua, ua.Assessments a')
                ->where('ua.deleted=0')
                ->andWhere('a.deleted=0');
        if ($completed) {
            $q = $q->andWhere('ua.completed=0');
        }
        $q = $q->andWhere('a.published=1')
                ->andWhere('ua.userid=?', $user_id)
                ->andWhere('ua.assessment_type=?', $type)
                ->orderBy('ua.created_at ASC')
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->execute();
        return $q;
    }

    public static function getAssessment($user_id, $type = 2) {
        return Doctrine_Query::create()
                        ->select('ua.id, ua.assessment_id, a.name, a.description,
                    (SELECT COUNT(q.id) FROM Questions q WHERE q.assessment_id=a.id AND q.deleted=0) AS assessment_question')
                        ->from('UserAssessments ua, ua.Assessments a')
                        ->where('ua.deleted=0')
                        ->andWhere('ua.completed=0')
                        ->andWhere('a.deleted=0')
                        ->andWhere('a.published=1')
                        ->andWhere('ua.userid=?', $user_id)
                        ->andWhere('ua.assessment_type=?', $type)
                        ->orderBy('ua.created_at ASC')
                        ->limit(1)
                        ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                        ->fetchOne();
    }

    public static function isAllAssessmentCompleted($user_id, $type = 2) {
        $q = Doctrine_Query::create()
                ->select('COUNT(ua.completed) as taken')
                ->from('UserAssessments ua, ua.Assessments a')
                ->where('ua.completed =0')
                ->andWhere('ua.userid =?', $user_id)
                ->andWhere('ua.assessment_type =?', $type)
                ->andWhere('ua.deleted =0')
                ->andWhere('a.deleted =0')
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->fetchOne();

        if ($q['taken'] == 0)
            return true;
        return false;
    }

}