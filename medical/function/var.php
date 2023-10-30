<?php function checkEmpty($value){
    if(empty($value)) return FALSE;
    else return TRUE;
}
function Email($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) return false;
    else return TRUE;
}

?>