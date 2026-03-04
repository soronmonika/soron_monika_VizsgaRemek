<?php
include_once("../model/Repositories/KiadasokRepo.php");

header("Content-Type: application/json; charset=utf-8");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "GET") {
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
  exit;
}

if ($method == "DELETE") {
  $Kiadasok_Id = trim($_GET["Kiadasok_Id"] ?? "");

  if ($Kiadasok_Id == "") {
    http_response_code(400);
    echo json_encode(["error" => "Hiányzó Azonosító"]);
    exit;
  }

  KiadasokRepo::deleteKiadas($Kiadasok_Id);
  echo json_encode(["ok" => true]);
  exit;
}

http_response_code(405);
echo json_encode(["error" => "Nem támogatott metódus!"]);
