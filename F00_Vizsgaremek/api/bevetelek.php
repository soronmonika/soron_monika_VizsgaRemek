<?php
include_once("../model/Repositories/BevetelekRepo.php");

header("Content-Type: application/json");

$adatok = BevetelekRepo::getBevetelek();
echo json_encode($adatok);
