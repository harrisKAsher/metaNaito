<?php
    $dsn = 'mysql:host=localhost;dbname=metanai_metanaito;charset=utf8';
    $username = 'fake_user';
    $password = 'fake_password';
    //$link = mysql_connect('localhost:3306', $username, $password);
    //mysql_set_charset('utf8',$link);
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
