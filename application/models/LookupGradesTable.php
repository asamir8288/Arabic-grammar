<?php

/**
 * LookupGradesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class LookupGradesTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object LookupGradesTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('LookupGrades');
    }
    
    public static function getAllGrades(){
        return Doctrine_Query::create()
                ->select('g.*')
                ->from('LookupGrades g')
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->execute();
    }
}