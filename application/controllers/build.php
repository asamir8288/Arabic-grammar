<?php

class Build extends CI_Controller {

    function Build() {
        parent::__construct();
    }

    /**
     * Generating Models from the database
     */
    function index() {
        try {
            Doctrine::generateModelsFromDb(APPPATH . 'models', array('default'), array('generateTableClasses' => true));
            echo 'Models has been generated successfully';
        } catch (Exception $exc) {
            echo Exceptionhandler::handle($exc);
        }
    }   

}

?>
