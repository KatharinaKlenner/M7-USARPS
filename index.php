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

?>
<head>
    <meta charset="UTF-8">
    <title>SRPS-Turniere</title>

    <style type="text/css" media="screen">
        .centered-wrapper {
            position: relative;
            text-align: center;
        }
        .centered-wrapper:before {
            content: "";
            position: relative;
            display: inline-block;
            width: 0; height: 100%;
            vertical-align: middle;
        }
        .centered-content {
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>
<body class="centered-wrapper">
<h1>SRPS Turnier</h1>
<br>
<form method="GET" action="../save.php">
    <div class="centered-content">
        <label for="zeit">
            Zeit:
        </label>
        <input id="zeit" name="zeit" type="datetime-local">
    </div>
    <br>
    <div class="centered-content">
        <label for="spielerA">
            Spieler A:
        </label>
        <input id="spielerA" name="spielerA" placeholder="Spieler A" type="text">
    </div>
    <br>
    <div class="centered-content">
        <select name="moveA" id="moveA">
            <option value="Scissor">Scissor</option>
            <option value="Paper">Paper</option>
            <option value="Rock">Rock</option>
        </select>
    </div>
    <br>
    <div class="centered-content">
        <label for="spielerB">
            Spieler B:
        </label>
        <input id="spielerB" name="spielerB" placeholder="Spieler B" type="text">
    </div>
    <br>
    <div class="centered-content">
        <select name="moveB" id="moveB">
            <option value="Scissor">Scissor</option>
            <option value="Paper">Paper</option>
            <option value="Rock">Rock</option>
        </select>
    </div>
    <br>
    <div class="centered-content">
        <label for="winner">
            Gewinner:
        </label>
        <input id="winner" name="winner" placeholder="winner" type="text">
    </div>
    <br>
    <br>
    <button type="submit" name="speichern">Speichern</button>
    <br>
    <br>
</form>
<table>
    <tr>
        <th>Spieler A</th>
        <th>Spieler B</th>
        <th>Move A</th>
        <th>Move B</th>
        <th>Zeitpunkt</th>
        <th>Gewinner</th>
    </tr>

<?php
$queryBuilder
    ->select('*')
    ->from('Runde');
$result = $queryBuilder->executeQuery();
while (($row = $result->fetchAssociative()) !== false) {
    $key=$row['PK_RUNDENR'];
    echo "<tr>";
    echo "<td>";
    echo $row['Spieler_A'];
    echo "</td><td>";
    echo $row['Spieler_B'];
    echo "</td><td>";
    echo $row['Move_A'];
    echo "</td><td>";
    echo $row['Move_B'];
    echo "</td><td>";
    echo $row['Zeitpunkt'];
    echo "</td><td>";
    echo $row['Winner'];
    echo "</td><td>";
    echo "<button onclick=\"window.location.href = './delete.php?&key=$key'\">Löschen</button>";
    echo "</td>";
    echo '</tr>';
}
?>
</table>
</body>
</html>
