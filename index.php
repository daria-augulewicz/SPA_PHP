<?php

require_once 'classes/SpaTherapie.php';

$host = '127.0.0.1';
$db   = 'spa_augulewicz';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$query = 'SELECT id FROM Produkte';
$stmt = $pdo->query($query);
$produkte = [];

while ($row = $stmt->fetch())
{
    $produkte[] = new SpaTherapie($pdo,$row['id']);
}
$produkte[0]->setName('Daria');
$produkte[0]->save();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SPA AND WELLNESS</title>
    </head>
    <body>

        <h1 style='font-size: 55px;'><a href="/">SPA AND WELLNESS</a></h1>
        <h2>Herzlich willkommen auf unserer Seite SPA AND WELLNESS. Unsere Dienstleistungen richten sich sowohl an Frauen als auch an Männer.<br> Unsere Produkte sind bio und von höchster Qualität. Wir bieten spezielle Angebote für Stammkunden. Komm zu uns, entspann dich und ruhe dich aus. <br>Du hast es verdient!</h2>

<!--            <a href="/?sort=Produkte.price&order=ASC">
                    Preis: aufsteigend <br>
            </a>

            <a href="/?sort=Produkte.price&order=DESC">
                    Preis: absteigend <br>
            </a>

            <a href="/?sonder=1">
                    SONDERANGEBOTE ZEIGEN <br>
            </a>-->

            <hr style="float: none; clear: both;">
            <?php    
                foreach ($produkte as $produkt) { ?>
                    <div style="width: 300px; float: left;">
                        <p><?php echo $produkt->getName(); ?></p>
                        <p><?php echo $produkt->getBeschreibung(); ?></p> 
                        <p>Preis: <?php echo $produkt->getPreis(); ?> EUR</p>
                        <p><?php echo $produkt->getKategorie(); ?> </p>
                        
                    </div>

            <?php } ?>
            <hr style="float: none; clear: both;">
            <div style="float: none; clear: both;">
                <p>© Copyright <?php 
                date_default_timezone_set('UTC');
                echo date("Y");
                ?>. Alle Rechte vorbehalten.</p>
            </div>
        
    </body>
</html>