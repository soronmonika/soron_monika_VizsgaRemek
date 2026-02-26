<?php
include_once("../model/Repositories/KiadasokRepo.php");

header("Content-Type: application/json");

$adatok = KiadasokRepo::getKiadasok();

echo json_encode($adatok);
