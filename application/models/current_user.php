<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of current_user
 *
 * @author Asamir
 */
class Current_User extends CI_Model {

    public static function login($email, $password) {
        $q = Doctrine_Query::create()
                ->select('u.*, count(u.id) as user_exist')
                ->from('Users u')
                ->where('u.email=?', trim($email))
                ->andWhere('u.password=?', md5(trim($password)))
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                ->fetchOne();

        if ($q['user_exist'] > 0) {
            $CI = & get_instance();

            $user_info = array();
            $user_info['user_id'] = $q['id'];
            $user_info['name'] = $q['name'];
            $user_info['grade_id'] = $q['grade_id'];

            $CI->session->set_userdata('user_info', $user_info);

            return true;
        } else {
            return false;
        }
    }
    
    public function logout(){
        $CI = & get_instance();
        $CI->session->sess_destroy();
    }

}

?>
