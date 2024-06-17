<?php
function checkPass ($id,$oldPass) {
    $passNow = pdo_query_one('SELECT pass FROM users WHERE id= '.$id)['pass'];
    if(password_verify($oldPass,$passNow)) return true;
    else return false;
}