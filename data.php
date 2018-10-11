<?php

function addUser($username, $password, $email) {
    return 0;
}

function activateUser($username) {
    return 0;
}

function desactivateUser($username) {
    return 0;
}


function getUser($username) {
    $user = array("username" => 'Sergio', 
              "password" => '123456',
              "email" => 'sergiocabral.1990@gmail.com');
    
    return $user; 
}