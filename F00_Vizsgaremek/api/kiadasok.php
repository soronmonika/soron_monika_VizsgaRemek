<?php
include_once("../model/Repositories/KiadasokRepo.php");

header("Content-Type: application/json; charset=utf-8");

$lista = KiadasokRepo::getKiadasok();

$adatok = [];
foreach ($lista as $b) {
  $adatok[] = [
    "Kiadasok_Id" => $b->getKiadasok_Id(),
    "Kategoria_Id" => $b->getKategoria_Id(),
    "Datum" => $b->getDatum(),
    "Osszeg" => $b->getOsszeg(),
  ];
}

echo json_encode($adatok);
