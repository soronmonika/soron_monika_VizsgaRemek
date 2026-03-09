<?php

include_once("../model/Repositories/BevetelekRepo.php");
include_once("../model/Repositories/KiadasokRepo.php");

header("Content-Type: text/csv; cahrset=utf-8");
header("Content-Disposition: attachment; filename=koltsegadatok.csv");

$output = fopen("php://output", "w");

fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

fputcsv($output, ["Tipus", "Kategoria", "Datum", "Összeg"], ";");

$bevetelek = BevetelekRepo::getBevetelek();
foreach ($bevetelek as $b) {
  fputcsv($output, [
    "Bevétel",
    $b->getKategoria_Id(),
    $b->getDatum(),
    $b->getOsszeg()
  ], ";");
}


$kiadasok = KiadasokRepo::getKiadasok();
foreach ($kiadasok as $b) {
  fputcsv($output, [
    "Kiadás",
    $b->getKategoria_Id(),
    $b->getDatum(),
    $b->getOsszeg()
  ], ";");
}

fclose($output);
exit;
