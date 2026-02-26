<?php
function db(): mysqli
{
  $con = new mysqli("127.0.0.1", "root", "KoltsegNyilvantartoRendszer_SoronMonika");
  if ($con->connect_error) {
    throw new Exception("DB kapcsolati hiba: $con->connect_error");
  }
  $con->set_charset("utf8mb4");
  return $con;
}
