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
$spielerA = $_GET['spielerA'];
$spielerB = $_GET['spielerB'];
$moveA = $_GET['moveA'];
$moveB = $_GET['moveB'];
$zeitpunkt = $_GET['zeit'];
$zeitpunkt2 = new DateTime($zeitpunkt);
$zeitpunkt = $zeitpunkt2->format('Y-m-d\ H:i:s');
$winner = $_GET['winner'];

$queryBuilder
    ->insert('Runde')
    ->setValue('Spieler_A', '?')
    ->setValue('Spieler_B', '?')
    ->setValue('Move_A', '?')
    ->setValue('Move_B', '?')
    ->setValue('Zeitpunkt', '?')
    ->setValue('Winner', '?')
    ->setParameter(0,$spielerA)
    ->setParameter(1,$spielerB)
    ->setParameter(2,$moveA)
    ->setParameter(3,$moveB)
    ->setParameter(4,$zeitpunkt)
    ->setParameter(5,$winner)
;
/*$queryBuilder
    ->update('Runde')
;*/
try{
    $rounds = $queryBuilder->executeStatement();
} catch(\Doctrine\DBAL\Exception $e){
    echo $e->getMessage();
}
?>
<head>
    <meta charset="UTF-8">
    <title>Eintrag hinzugefügt</title>
</head>
<body>
<h1>Glückwunsch! Ihr Eintrag wurde erfolgreich hinzugefügt!</h1>
<button onclick="window.location.href = 'index.php'">Hol mich hier raus!</button>
</body>
</html>
