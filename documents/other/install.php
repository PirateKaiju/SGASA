<?php

$sql_commands = file_get_contents("comandos_ddl.sql");

echo $sql_commands;

try{
    $pdo = new PDO("sqlite:database.sqlite3");

    $stmt = $pdo->prepare($sql_commands);
    
    if(!$stmt->execute()){
        echo "Error creating db";
    }

}catch(PDOException $e){
    echo $e->getMessage();
}

?>
