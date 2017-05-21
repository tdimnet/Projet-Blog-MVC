<?php

// return [
//   'db_user' => 'root',
//   'db_pass' => '',
//   'db_host' => 'localhost',
//   'db_name' => 'projet-blog-mvc'
// ];


try {
    $chaineConnexion = 'mysql:host=localhost;dbname=projet-blog-mvc';
    $usename = 'root';
    $password = '';

    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );

    $bdd = new PDO($chaineConnexion, $usename, $password, $options);
} catch (Exception $e) {
    die ("Connexion à MYSQL échoué : ".$e->getMessage());
}
