<?php
function checkPass ($id,$oldPass) {
    $passNow = pdo_query_one('SELECT pass FROM users WHERE id= '.$id)['pass'];
    if(password_verify($oldPass,$passNow)) return true;
    else return false;
}

function checkEmail($email) {
    $id = pdo_query_one('SELECT id FROM users WHERE email ="'.$email.'"')['id'];
    if($id) return $id;
    else return false;
}