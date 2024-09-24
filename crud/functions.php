<?php

//========================= acount =========================
function creat_user($db, $username, $email, $passwd){
    $req = $db->prepare("INSERT INTO OD_USER (`USER_PSEUDO`, `USER_EMAIL`, `USER_PASSWORD`) VALUES(:username, :email, :passwd)");
    $req->execute(["username" => $username,
                    "email" => $email,
                    "passwd" => $passwd]);
}

function get_user_by_email($db, $email){
    $req = $db->prepare("SELECT * FROM OD_USER WHERE USER_EMAIL = :email");
    $req->execute(["email" => $email]);
    return $req->fetch(PDO::FETCH_ASSOC);
}

// check user input
function check_password($password){
    return true;
}
function check_email($email){
    return true;
}
function check_usermane($username){
    return true;
}