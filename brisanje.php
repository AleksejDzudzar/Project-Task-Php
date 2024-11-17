<?php

try {
    $dbh = NEW PDO("mysql:host=localhost;dbname=polovna_vozila;","root","");
} catch(PDOException $e) {
    echo $e->getMessage();
}

$id = $_POST['id'];

try {
    $dbh->beginTransaction();
    if($id){
        $sql = "DELETE FROM oglasi WHERE id=" . $id;
        $exec = $dbh->exec($sql);
    }
    $dbh->commit();
} catch (PDOException $e) {
    $dbh->rollBack();
    echo $e->getMessage();
}

header('location: oglasi.php');