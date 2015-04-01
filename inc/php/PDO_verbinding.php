<?php
$db = new PDO ('mysql:host=127.0.0.1;dbname=logindb;charset=utf8', 'default', 'password');
try{
    $db->setAttribute (PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOExeption $error){
    echo $error->getfile(). $error->getline();
}