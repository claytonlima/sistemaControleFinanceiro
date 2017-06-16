<?php

$dns = "mysql:dbname=loja;host=localhost";
$user = "root";
$passOne = "85070322";
$passTwo = "123brasil123";

try{
    echo "Start One connection\n";
    $dbh = new \PDO($dns,$user,$passOne);
    var_dump($dbh);
    echo "One Connection completed\n";
}catch (PDOException $exception){
    echo "One Connection Failed: ".$exception->getMessage()."\n\n";
    $databasetwo = true;
}

if($databasetwo){
    try{
        echo "Start Two connection\n";
        $dbh = new \PDO($dns,$user,$passTwo);
        var_dump($dbh);
        echo "Two Connection completed\n";
    }catch (PDOException $exception){
        echo "Connection Failed: ".$exception->getMessage();
    }

}