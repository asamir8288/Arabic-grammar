<?php

/**
 * Pages
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Pages extends BasePages
{
    public function addPage(array $page_data){
        $p = new Pages();
        $p->page_id = $page_data['page_id'];
        $p->content = $page_data['content'];
        $p->page_title = $page_data['page_title'];
        $p->updated_at = date('ymdHis');
        $p->save();
    }
    
    public function updatePage(array $page_data){
        Doctrine_Query::create()
                ->update('Pages p')
                ->set('p.content', '?', $page_data['content'])
                ->set('p.page_title', '?', $page_data['page_title'])
                ->set('p.updated_at', '?',  date('ymdHis'))
                ->where('p.page_id =?', $page_data['page_id'])
                ->execute();
    }
    
    public function getPage($page_id){
        return Doctrine_Query::create()
                ->select('p.*')
                ->from('Pages p')
                ->where('p.page_id =?', $page_id)
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->fetchOne();
    }
}