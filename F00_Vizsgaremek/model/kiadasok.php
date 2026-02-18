<?php

class Kiadasok{
  private int $Kiadasok_Id;
  private int $Osszeg;
  private int $Datum;
  private int $Kategoria_Id;
  private int $Gyerek_Id;
  private string $Megjegyzes;

  public function __construct(int $Kiadasok_Id, int $Osszeg, int $Datum, int $Kategoria_Id, int $Gyerek_Id, int $Megjegyzes){
    $this->setKiadasok_Id($Kiadasok_Id);
    $this->setOsszeg($Osszeg);
    $this->setDatum($Datum);
    $this->setKategoria_Id($Kategoria_Id);
    $this->setMegjegyzes($Megjegyzes);
  }


  public function getKiadasok_Id():int{
    return $this->Kiadasok_Id;
  }

  public function getOsszeg():int{
    return $this->Osszeg;
  }

  public function getDatum():int{
    return $this->Datum;
  }

  public function getKategoria_Id():int{
    return $this->Kategoria_Id;
  }

  public function getGyerek_Id():int{
    return $this->Gyerek_Id;
  }

  public function getMegjegyzes():string{
    return $this->Megjegyzes;
  }



private function setKiadasok_Id(int $Kiadasok_Id):void{
  if($Kiadasok_Id>=0){
    $this->Kiadasok_Id=$Kiadasok_Id;
  }
  else{
    throw new InvalidArgumentException("A Kiadások azonosító nem lehet negatív!");
  }
}

private function setOsszeg(int $Osszeg):void{
  if($Osszeg>=0){
    $this->Osszeg=$Osszeg;
  }
  else{
    throw new InvalidArgumentException("Az Összeg nem lehet negatív!");
  }
}

private function setDatum(int $Datum):void{
  if($Datum>=0){
    $this->Datum=$Datum;
  }
  else{
    throw new InvalidArgumentException("A dátum nem lehet negatív!");
  }
}

  public function setKategoria_Id(int $Kategoria_Id):void{
    if($Kategoria_Id>=0){
      $this->Kategoria_Id=$Kategoria_Id;
    }
    else{
      throw new InvalidArgumentException("A Kategoria azonosító nem lehet negatív!");
    }
  }

  public function setGyerek_Id(int $Gyerek_Id):void{
    if($Gyerek_Id>=0){
      $this->Gyerek_Id=$Gyerek_Id;
    }
    else{
      throw new InvalidArgumentException("A gyerek azonosító nem lehet negatív!");
    }
  }

  public function setMegjegyzes(string $Megjegyzes):void{
    if(strlen(trim($Megjegyzes))>0){
      $this->Megjegyzes=$Megjegyzes;
    }
    else{
      throw new InvalidArgumentException("A megjegyzés kitöltése kötelező");
    }
  }
};
