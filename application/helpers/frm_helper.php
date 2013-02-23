<?php

function generate_inputtext($name, $id='', $data = array(), $errors= array(),$is_password = false , $style= '', $class = 'txtbox') {
    $default = '';
    if (isset($data[$name])) {
        $default = $data[$name];
    }
    $type = 'text';
    if ($is_password) {
        $type = 'password';
    }
    $html = '<input type="' . $type . '" name="' . $name . '" id="'. $id .'" class="' . $class . '" value="' . $default . '" '.$style.'/>';
    if (isset($errors[$name])){
        $html .= generate_error_message($errors[$name]);
    }
    return $html;
}

function generate_hiddenfield($name, $data = array(), $errors= array(), $style= '', $class = '') {
    $default = '';
    if (isset($data[$name])) {
        $default = $data[$name];
    }
    $type = 'hidden';
    $html = '<input type="' . $type . '" name="' . $name . '" class="' . $class . '" value="' . $default . '" '.$style.'/>';
    if (isset($errors[$name])){
        $html .= generate_error_message($errors[$name]);
    }
    return $html;
}

function generate_textarea($name, $id ='', $data = array(), $errors = array(), $style= '', $class = 'txtarea') {
    $default = '';
    if (isset($data[$name])) {
        $default = $data[$name];
    }
    $html = '<textarea name="' . $name . '" class="' . $class . '" '.$style.' id="'. $id .'">' . $default . '</textarea>';
    if (isset($errors[$name]))
        $html .= generate_error_message($errors[$name]);
    return $html;
}

function generate_checkbox($name, $data = array(), $errors = array(),$label = '',$style= '') {
    $default = '';
    if (isset($data[$name]) && $data[$name] == 1) {
        $default = 'checked';
    }
    $html = '<label class="chkbx"><input type="checkbox" name="' . $name . '" ' . $default . ' '.$style.' value="1"/>'.$label.'</label>';
    if (isset($errors[$name]))
        $html .= generate_error_message($errors[$name]);
    return $html;
}

function generate_error_message($message){
    if(isset($message) && !empty($message)){
        return '<span class="error_message">'.$message.'</span>';
    }
}

function generate_years_compo($name, $from, $to, $title, $id = '', $selected = '', $style = ''){
    $html = '<select name="'. $name .'" class="compolist" id="'. $id .'" style="'.$style.'">';
    $html .= '<option value="0">'. $title .'</option>';
    if($from > $to){
        for($i=$from;$i>=$to;$i--){
            if($i == $selected){
                $html .= '<option value="'. $i .'" selected="selected">' . $i . '</option>';
            }else{
                $html .= '<option value="'. $i .'">' . $i . '</option>';
            }
        }
    }else{
        for($i=$from;$i<=$to;$i++){
            if($i == $selected){
                $html .= '<option value="'. $i .'" selected="selected">' . $i . '</option>';
            }else{
                $html .= '<option value="'. $i .'">' . $i . '</option>';
            }
        }
    }
    $html .= '</select>';
    return $html;
}

/* End of file frm_helper.php */
/* Location: ./app_shared/helpers/frm_helper.php */