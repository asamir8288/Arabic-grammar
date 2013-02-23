<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('LookupGrades', 'default');

/**
 * BaseLookupGrades
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $LookupAcademicYears
 * @property Doctrine_Collection $Users
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLookupGrades extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('lookup_grades');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('LookupAcademicYears', array(
             'local' => 'id',
             'foreign' => 'grade_id'));

        $this->hasMany('Users', array(
             'local' => 'id',
             'foreign' => 'grade_id'));
    }
}