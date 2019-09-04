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

$produkt1 = new SpaTherapie($pdo);
$produkt1->setName('Massage');
$produkt1->setBeschreibung('Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
$produkt1->setPreis('999');
$produkt1->setKategorie(1);

$produkt2 = new SpaTherapie($pdo);
$produkt2->setName('Manicure');
$produkt2->setBeschreibung('Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
$produkt2->setPreis('888');
$produkt2->setKategorie(2);

$produkt3 = new SpaTherapie($pdo);
$produkt3->setName('Pedicure');
$produkt3->setBeschreibung('Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
$produkt3->setPreis('777');
$produkt3->setKategorie(0);

$produkte = [];
$produkte[] = $produkt1;
$produkte[] = $produkt2;
$produkte[] = $produkt3;

foreach ($produkte as $produkt) {
    echo $produkt->getName() . "<br>";
    $produkt->save();
}

// Pure PHP
// <p><?php echo $artikel1->getName();
//
// Twig
// <p>{{ name }}</p>
