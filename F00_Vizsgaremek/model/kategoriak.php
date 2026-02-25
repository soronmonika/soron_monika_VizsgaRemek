<?php

class Kategoriak
{
  private string $Kategoria_Id;
  private string $Nev;
  private string $Tipus;
  private string $Csoportositas;

  public function __construct(string $Kategoria_Id, string $Nev, string $Tipus, string $Csoportositas)
  {
    $this->setKategoria_Id($Kategoria_Id);
    $this->setNev($Nev);
    $this->setTipus($Tipus);
    $this->setCsoportositas($Csoportositas);
  }

  public function getKategoria_Id(): string
  {
    return $this->Kategoria_Id;
  }

  public function getNev(): string
  {
    return $this->Nev;
  }

  public function getTipus(): string
  {
    return $this->Tipus;
  }

  public function getCsoportositas(): string
  {
    return $this->Csoportositas;
  }


  public function setKategoria_Id(string $Kategoria_Id): void
  {
    $Kategoria_Id = trim($Kategoria_Id);
    if ($Kategoria_Id === "") {
      throw new InvalidArgumentException("A Kategória azonosító megadása kötelező!");
    }
    $this->Kategoria_Id = $Kategoria_Id;
  }

  public function setNev(string $Nev): void
  {
    $Nev = trim($Nev);
    if ($Nev === "") {
      throw new InvalidArgumentException("A név kitöltése kötelező!");
    }
    $this->Nev = $Nev;
  }

  public function setTipus(string $Tipus): void
  {
    $Tipus = trim($Tipus);
    if ($Tipus === "") {
      throw new InvalidArgumentException("A típus kitöltése kötelező!");
    }

    if (!in_array($Tipus, ["Bevetel", "Kiadas"], true)) {
      throw new InvalidArgumentException("A típus csak 'Bevetel' vagy 'Kiadas' lehet!");
    }

    $this->Tipus = $Tipus;
  }

  public function setCsoportositas(string $Csoportositas): void
  {
    $Csoportositas = trim($Csoportositas);
    if ($Csoportositas === "") {
      throw new InvalidArgumentException("A csoportosítás kitöltése kötelező!");
    }
    $this->Csoportositas = $Csoportositas;
  }
}
