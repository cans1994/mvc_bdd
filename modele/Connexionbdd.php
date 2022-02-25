<?php

include('env.php');

$bdd_username = $bdd_username ?? 'student';
$bdd_password = $bdd_password ?? 'student';
$bdd_host = $bdd_host ?? 'localhost';
$bdd_port = $bdd_port ?? 3306;
$bdd_dbname = $bdd_dbname ?? 'student';
//DSN : Data Source Name
$dsn = "mysql:host=$bdd_host;dbname=$bdd_dbname; charset=UTF8";

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
[
    PDO::ATTR_ERRMODE =>
    PDO::ERRMODE_EXCEPTION,

    PDO::ATTR_DEFAULT_FETCH_MODE =>
    PDO::FETCH_ASSOC
]; //fetch assoc -> pas de doublon

//PDO : PHP Data Objects

try {
    $pdo = new PDO($dsn, $bdd_username, $bdd_password, $options); //partie la plus importante
} catch (PDOException $e) {  //partie la plus importante
    echo "ERREUR connexion à la base de données <br>";
    echo $e->getCode() . '' . $e->getMessage() . '<br>';
    http_response_code(500);
    //$pdo = null;
}
//catch c'est nous même qui allons définir ce qui doit être fait et pas de error fatal
//$e correspond à l'exception qui sera généré en cas d'erreur

function getPdo()
{
    global $pdo;
    return $pdo;
}

function resetDb() //permet de ré-initialiser la bdd si elle est supp
{
    global $pdo;
    $sql = file_get_contents('modele/student.sql');
    $pdo->exec($sql);
}
