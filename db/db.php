<?php
    require 'rb-mysql.php';
    
//    R::setup( 'mysql:host=localhost;dbname=smartbb','root', '' );
    R::setup( 'mysql:host=localhost;dbname=p-313963_epolice','p-313963_epolice', 'Mahsudbey101419741' );
//    R::dispense("users");

//    $result = R::getAll("select * from users");
//    var_dump($result);
//    echo count($result);
//    foreach ($result as $value) {
//        echo $value['users_name'].'<br>';
//    } 
  
    if ( !R::testConnection() )
    {
        exit ('Нет соединения с базой данных');
    }