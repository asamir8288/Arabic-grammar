<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of klamona_api
 *
 * @author Ahmed
 */
class klamona_api extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    /*
     * string to upper for md5(klamona4All)
     */

    public function login() {
        if (isset($_GET)) {
            if (isset($_GET['api_key']) && $_GET['api_key'] == SECRET_KEY) {
                $login = Current_User::api_login($_GET['email'], $_GET['password']);
                if($login){
                    $data['status'] = 'success';
                }else {
                    $data['status'] = 'faild';
                }
                $data['user_id'] = $login;                
                echo json_encode($data);
            } else {
                echo json_encode('Error in sending data');
            }
        } else {
            echo json_encode('There is no data was sent!');
        }
    }

    public function signup() {
        if (isset($_GET)) {
            if (isset($_GET['api_key']) && $_GET['api_key'] == SECRET_KEY) {
                $posted_data = $_GET;
                $posted_data['confirmation_code'] = md5(uniqid(rand()));

                $u = new Users();
                $u->addUser($posted_data);

                $login = Current_User::api_login($_GET['email'], $_GET['password']);
                if($login){
                    $data['status'] = 'success';
                }else {
                    $data['status'] = 'faild';
                }
                $data['user_id'] = $login;
                
                echo json_encode($data);
            } else {
                echo json_encode('Error in sending data');
            }
        } else {
            echo json_encode('There is no data was sent!');
        }
    }

}

?>
