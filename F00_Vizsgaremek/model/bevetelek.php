<?php

class Bevetelek
{
  private string $Bevetelek_Id;
  private float $Osszeg;
  private string $Datum;
  private string $Kategoria_Id;

  public function __construct(string $Bevetelek_Id, float $Osszeg, string $Datum, string $Kategoria_Id)
  {
    $this->setBevetelek_Id($Bevetelek_Id);
    $this->setOsszeg($Osszeg);
    $this->setDatum($Datum);
    $this->setKategoria_Id($Kategoria_Id);
  }


  public function getBevetelek_Id(): string
  {
    return $this->Bevetelek_Id;
  }

  public function getOsszeg(): float
  {
    return $this->Osszeg;
  }

  public function getDatum(): string
  {
    return $this->Datum;
  }

  public function getKategoria_Id(): string
  {
    return $this->Kategoria_Id;
  }


  public function setBevetelek_Id(string $Bevetelek_id): void
  {
    $Bevetelek_id = trim($Bevetelek_id);
    if ($Bevetelek_id === "") {
      throw new InvalidArgumentException("A Bevételek azonosító megadása kötelező!");
    }
    $this->Bevetelek_Id = $Bevetelek_id;
  }

  public function setOsszeg(float $Osszeg): void
  {
    if ($Osszeg < 0) {
      throw new InvalidArgumentException("Az összeg nem lehet negatív!");
    }
    $this->Osszeg = $Osszeg;
  }

  public function setDatum(string $Datum): void
  {
    $Datum = trim($Datum);
    if ($Datum === "") {
      throw new InvalidArgumentException("A dátum megadása kötelező!");
    }


    $d = DateTime::createFromFormat("Y-m-d", $Datum);
    if (!$d || $d->format("Y-m-d") !== $Datum) {
      throw new InvalidArgumentException("A dátum formátuma hibás! (YYYY-MM-DD)");
    }

    $this->Datum = $Datum;
  }

  public function setKategoria_Id(string $Kategoria_Id): void
  {
    $Kategoria_Id = trim($Kategoria_Id);
    if ($Kategoria_Id === "") {
      throw new InvalidArgumentException("A Kategória azonosító megadása kötelező!");
    }
    $this->Kategoria_Id = $Kategoria_Id;
  }
}
