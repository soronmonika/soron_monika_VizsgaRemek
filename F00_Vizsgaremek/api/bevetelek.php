<?php
include_once("../model/Repositories/BevetelekRepo.php");
header("Content-Type: application/json; charset=utf-8");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "GET") {
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
  exit;
}

if ($method == "DELETE") {
  $Bevetel_Id = trim($_GET["Bevetel_Id"] ?? "");

  if ($Bevetel_Id == "") {
    http_response_code(400);
    echo json_encode(["error" => "Hiányzó Azonosító"]);
    exit;
  }

  BevetelekRepo::deleteBevetel($Bevetel_Id);
  echo json_encode(["ok" => true]);
  exit;
}

http_response_code(405);
echo json_encode(["error" => "Nem támogatott metódus!"]);


if($method =="PUT"){
  parse_str(file_get_contents("php://input, $"))
}
