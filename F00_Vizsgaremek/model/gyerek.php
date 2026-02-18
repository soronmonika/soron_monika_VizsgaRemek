<?php
class Gyerek{
  private int $Gyerek_Id;
  private string $Nev;
  private int $Szuletesnap;

  public function __construct(int $Gyerek_Id, string $Nev, int $Szuletesnap){
    $this->setGyerekId($Gyerek_Id);
    $this->setNev($Nev);
    $this->setSzuletesnap($Szuletesnap);
  }


  public function getGyerek_Id():int{
    return $this->Gyerek_Id;
  }

  public function getNev():string{
    return $this->Nev;
  }

  public function getSzuletesnap():int{
    return $this->Szuletesnap;
  }



  public function setGyerekId(int $Gyerek_Id):void{
    if($Gyerek_Id>=0){
      $this->Gyerek_Id=$Gyerek_Id;
    }
    else{
      throw new InvalidArgumentException("A gyerek azonosító nem lehet negatív!");
    }
  }

  public function setNev(string $Nev):void{
    if(strlen(trim($Nev))>0){
      $this->Nev=$Nev;
    }
    else{
      throw new InvalidArgumentException("Név megadása kötelező!");
    }
  }

  public function setSzuletesnap(int $Szuletesnap):void{
    if($Szuletesnap>=0){
      $this->Szuletesnap=$Szuletesnap;
    }
    else{
      throw new InvalidArgumentException("A születésnap megadása kötelező!");
    }
  }
};
