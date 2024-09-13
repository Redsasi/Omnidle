<?php
function get_conn()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=OMNIDLE;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

}
