<?php

function static_url() {
    $CI = & get_instance();
    return $CI->config->item('static_url');
}

function pre_print($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit;
}

function string_to_random_array($string) {
    $array = explode(',', $string);
    $new_array = '';
    for ($i = 0; $i < count($array); $i++) {
        $new_array[] = $array[$i];
    }
    return $new_array;
}

function shuffle_assoc($list) { 
  if (!is_array($list)) return $list; 

  $keys = array_keys($list); 
  shuffle($keys); 
  $random = array(); 
  foreach ($keys as $key) { 
    $random[] = $list[$key]; 
  }
  return $random; 
} 

?>
