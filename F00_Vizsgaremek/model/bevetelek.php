<?php

class Bevetelek{
  private int $Bevetelek_id;
  private int $Osszeg;
  private int $Datum;
  private int $Kategoria_Id;
  private string $Megjegyzes;

  public function __construct(int $Bevetelek_id, int $Osszeg, int $Datum, int $Kategoria_Id, string $Megjegyzes){
      $this->setBevetelek_id($Bevetelek_id);
      $this->setOsszeg($Osszeg);
      $this->setDatum($Datum);
      $this->setKategoria_Id($Kategoria_Id);
      $this->setMegjegyzes($Megjegyzes);
  }


  public function getBevetelek_Id():int{
    return $this->Bevetelek_id;
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

  public function getMegjegyzes():string{
    return $this->Megjegyzes;
  }


  public function setBevetelek_Id(int $Bevetelek_id):void{
    if($Bevetelek_id>=0){
      $this->Bevetelek_id=$Bevetelek_id;
    }
    else{
      throw new InvalidArgumentException("A Bevételek azonosító nem lehet negatív!");
    }
  }

  public function setOsszeg(int $Osszeg):void{
    if($Osszeg>=0){
      $this->Osszeg=$Osszeg;
    }
    else{
      throw new InvalidArgumentException("Az összeg megadása kötelező!");
    }
  }

  public function setDatum(int $Datum):void{
    if($Datum>(0)){
      $this->Datum=$Datum;
    }
    else{
      throw new InvalidArgumentException("A dátum megadása kötelező!");
    }
  }

  public function setKategoria_Id(int $Kategoria_Id):void{
    if($Kategoria_Id>=0){
      $this->Kategoria_Id=$Kategoria_Id;
    }
    else{
      throw new InvalidArgumentException("A Kategória azonosító megadása kötelező!");
    }
  }

  public function setMegjegyzes(string $Megjegyzes):void{
    if(strlen(trim($Megjegyzes))>0){
      $this->Megjegyzes=$Megjegyzes;
    }
    else{
      throw new InvalidArgumentException("A megjegyzés kitöltése kötelező!");
    }
  }
};
