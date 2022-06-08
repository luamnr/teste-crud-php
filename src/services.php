<?php


function validateField($field_request){
    $field_request = array_map("trim", $field_request);
    if(in_array("", $field_request)){
        return FALSE;
    }
    return TRUE;
}

function userIsValid($login, $pass){

}