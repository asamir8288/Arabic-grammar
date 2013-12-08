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
                if ($login) {
                    $data['status'] = 'success';
                } else {
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
                if ($login) {
                    $data['status'] = 'success';
                } else {
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

    public function get_user_exercises() {
        $user_id = $_GET['user_id'];

        if ($user_id && isset($_GET['api_key']) && $_GET['api_key'] == SECRET_KEY) {
            $data['exercises'] = UserAssessmentsTable::getAllUserExcericesOrTests($user_id, true);

            echo json_encode($data);
        } else {
            echo json_encode('Error in sending data');
        }
    }

    public function get_user_tests() {
        $user_id = $_GET['user_id'];

        if ($user_id && isset($_GET['api_key']) && $_GET['api_key'] == SECRET_KEY) {
            $data['exercises'] = UserAssessmentsTable::getAllUserExcericesOrTests($user_id, true, 1);

            echo json_encode($data);
        } else {
            echo json_encode('Error in sending data');
        }
    }

    public function delete_assessment() {
        $assessment_id = $_GET['assessment_id'];
        if ($assessment_id && isset($_GET['api_key']) && $_GET['api_key'] == SECRET_KEY) {
            UserAssessmentsTable::deleteUserAssessment($assessment_id);

            $data['status'] = 'success';
            echo json_encode($data);
        } else {
            echo json_encode('Error in sending data');
        }
    }

    public function get_questions($assessment_id, $limit = null) {
        if (isset($_GET['api_key']) && $_GET['api_key'] == SECRET_KEY) {
            $questions = QuestionsTable::getAssessmentQuestions($assessment_id, $limit);

            echo json_encode($questions);
        } else {
            echo json_encode('Error in sending data');
        }
    }

    public function question_answer() {
        if (isset($_GET['api_key']) && $_GET['api_key'] == SECRET_KEY) {
            $userAnswer = array();
            $userAnswer['user_assessment_id'] = $_GET['u_a_id'];
            $userAnswer['questions_id'] = $_GET['questions_id'];
            $userAnswer['user_answer'] = $_GET['user_answer'];
            $userAnswer['correct_answer'] = $_GET['is_correct'];

            $aa = new UserAssessmentAnswers();
            $aa->addUserAnswer($userAnswer);

            echo json_encode('added');
        } else {
            echo json_encode('Error in sending data');
        }
    }

}

?>
