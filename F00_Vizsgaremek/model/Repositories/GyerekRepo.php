<?php


include_once("gyerek.php");

class GyerekRepo{
  public static function getGyerek():array{
    $con=new mysqli("127.0.0.1", "root", "", "KoltsegNyilvantartoRendszer_SoronMonika");
    $stmt=$con->prepare("SELECT*FROM Gyerek");
    $stmt->execute();
    $stmt->bind_result($Gyerek_Id, $Nev, $Szuletesnap);

    $gyerekek=[];

    while($stmt->fetch()){
      $gyerek=new Gyerek(intval(Gyerek_Id), $Nev, $Szuletesnap);
      $gyerekek=$gyerek;
    }

    $stmt->close();
    $con->close();

    return $gyerekek;
  }
}
