<?php

function required($field){
    if($field != '' && $field != null){
        return true;
    }
    return false;
}

function valid_email($field){
    if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $field)){
        return true;
    }
    return false;
}
/* End of file validator_helper.php */
/* Location: ./system/application/helpers/validator_helper.php */