<?php
require_once('Oglas.php');

if(!ctype_alpha($_POST['marka'])) {
    echo "Marka se ne sastoji samo od slova! <br>";
    die();
}

if(!ctype_alnum($_POST['model'])) {
    echo "Model se ne sastoji samo od slova i broja! <br>";
    die();
}
if(!ctype_digit($_POST['cena'])) {
    echo "Marka se ne sastoji samo od slova! <br>";
    die();
}

try {
    $dbh=NEW PDO("mysql:host=localhost;dbname=polovna_vozila;","root","");
} catch(PDOException $e) {
    echo $e->getMessage();
}

$oglas = new Oglas();
$oglas->setId($_POST['id']);
$oglas->setMarka($_POST['marka']);
$oglas->setModel($_POST['model']);
$oglas->setCena($_POST['cena']);
$oglas->setTip($_POST['tip']);

try {
    $dbh->beginTransaction();// Otvaramo transakciju 
    if($oglas->getId()) {
        $sql = "UPDATE oglasi SET marka='".$oglas->getMarka()."', model='".$oglas->getModel()."', cena='".$oglas->getCena()."', tip='".$oglas->getTip()."'
                WHERE id=".$oglas->getId();//Updatuje ked ukucame dobri id
        $exec = $dbh->exec($sql);
    } else {
        $sql = "INSERT INTO oglasi (marka, model, cena, tip) VALUES ('".$oglas->getMarka()."', '".$oglas->getModel()."', '".$oglas->getCena()."', '".$oglas->getTip()."')";
        $exec = $dbh->exec($sql);
    }
    $dbh->commit();// Zatvaramo transakciju
} catch (PDOException $e) {
    $dbh->rollBack();// Ponistava transakciju,vraca na pocetno stanje 
    echo $e->getMessage();
}

header('location: oglasi.php');