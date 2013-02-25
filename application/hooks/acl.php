<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of acl
 *
 * @author Asamir
 */
class ACL {
    //put your code here
    
    function is_allowed(){
        $CI = & get_instance();
        $user_info = $CI->session->userdata('user_info');
        if($user_info){
            if($CI->uri->segment(1) == ''){
                redirect('dashboard');
            }
        }else{
            if(!$_POST && $CI->uri->segment(1) != '' && $CI->uri->segment(1) != 'signup'){
                redirect('/');
            }
        }
    }
}

?>
