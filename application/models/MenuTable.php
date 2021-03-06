<?php

/**
 * MenuTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MenuTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MenuTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Menu');
    }
    
    public static function getMainMenuCategories(){
        return Doctrine_Query::create()
                ->select('m.*')
                ->from('Menu m')
                ->where('m.level=0')
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->execute();
    }
    
    public static function getSubMenuItems($menu_id){
        return Doctrine_Query::create()
                ->select('m.*, a.id, 
                    (SELECT COUNT(q.id) FROM Questions q WHERE q.assessment_id=a.id AND q.deleted=0) AS question_count')
                ->from('Menu m, m.Assessments a')
                ->where('m.related_to=?', $menu_id)
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->execute();
    }
}