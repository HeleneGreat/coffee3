<?php

require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo ('hello world !!');


function bdd(){
    // $servname = "mysql-69236-0.cloudclusters.net:18435"; 
    // $bddname = "coffeeshop";

    $path = "mysql:host=" . $_ENV["DB_HOST"] . ":" . $_ENV["DB_PORT"] . ";dbname=" . $_ENV["DB_NAME"];

    // PDO = PHP Data Object
    $pdo = new PDO($path, $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);
    
    $sqlQuery = "SELECT * FROM waiter";
    $waiters = $pdo->query($sqlQuery)->fetchAll();
    

    foreach($waiters as $waiter){
        print "<br>". $waiter['id'] . ") " . $waiter['name'] ;
    }

    var_dump($pdo);
}

echo "<br>Nos serveurs sont :";
bdd();
 


