<?php

class Kategoriak{
  private int $Kategoria_Id;
  private string $Nev;
  private string $Tipus;
  private string $Csoportositas;

  public function __construct(int $Kategoria_Id, string $Nev, string $Tipus, string $Csoportositas)
  {
    $this->setKategoria_Id($Kategoria_Id);
    $this->setNev($Nev);
    $this->setTipus($Tipus);
    $this->setCsoportositas($Csoportositas);
  }

  public function getKategoria_Id():int{
    return $this->Kategoria_Id;
  }

  public function getNev():string{
    return $this->Nev;
  }

  public function getTipus():string{
    return $this->Tipus;
  }

  public function getCsoportositas():string{
    return $this->Csoportositas;
  }


  public function setKategoria_Id(int $Kategoria_Id):void{
    if($Kategoria_Id>=0){
      $this->Kategoria_Id=$Kategoria_Id;
    }
    else{
      throw new InvalidArgumentException("A Kategória azonosító nem lehet negatív!");
    }
  }

  public function setNev(string $Nev):void{
    if(strlen(trim($Nev))>0){
      $this->Nev=$Nev;
    }
    else{
      throw new InvalidArgumentException("A név kitöltése kötelező!");
    }
  }

  public function setTipus(string $Tipus):void{
    if(strlen(trim($Tipus))>0){
      $this->Tipus=$Tipus;
    }
    else{
      throw new InvalidArgumentException("A Típus kitöltése kötelező!");
    }
  }

  public function setCsoportositas(string $Csoportositas):void{
    if(strlen(trim($Csoportositas))>0){
      $this->Csoportositas=$Csoportositas;
    }
    else{
      throw new InvalidArgumentException("A Csopotrosítás kitöltése kötelező!");
    }
  }
};

