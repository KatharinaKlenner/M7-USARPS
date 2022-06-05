<!DOCTYPE html>
<html lang="en">
<?php
require_once 'vendor/autoload.php';

$connectionParams = [
    'dbname' => 'srps',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

$queryBuilder = $conn->createQueryBuilder();


$queryBuilder->delete('Runde')
    ->where('PK_RUNDENR = :id')
    ->setParameter('id',$_GET['key']);
try{
    $rounds = $queryBuilder->executeStatement();
} catch(\Doctrine\DBAL\Exception $e){
    echo $e->getMessage();
}
?>
<head>
    <meta charset="UTF-8">
    <title>Eintrag gelöscht</title>
</head>
<body>
<h1>Glückwunsch! Ihr Eintrag wurde erfolgreich gelöscht!</h1>
<button onclick="window.location.href = 'index.php'">Hol mich hier raus!</button>
</body>
</html>
