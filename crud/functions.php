<?php

//ACOUNT
function get_user_by_email($db, $email){
    $req = $db->prepare("SELECT * FROM OD_USER WHERE USER_EMAIL = :email");
    $req->execute(["email" => $email]);
    return $req->fetch(PDO::FETCH_ASSOC);
}

function creat_user($db, $username, $email, $password){
    $req = $db->prepare("insert into od_user (`USER_PSEUDO`, `USER_MAIL`, `USER_PASSWORD` values  (:username, :email, :password)");
    $req->execute(["username" => $username,
                    "email" => $email,
                    "password" => $password]);

}