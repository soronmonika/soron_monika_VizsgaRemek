<?php
include_once("../model/Repositories/BevetelekRepo.php");

header("Content-Type: application/json; charset=utf-8");

$lista = BevetelekRepo::getBevetelek();

$adatok = [];
foreach ($lista as $b) {
  $adatok[] = [
    "Bevetelek_Id" => $b->getBevetelek_Id(),
    "Kategoria_Id" => $b->getKategoria_Id(),
    "Datum" => $b->getDatum(),
    "Osszeg" => $b->getOsszeg(),
  ];
}

echo json_encode($adatok);
