<?php

class Kiadasok
{
  private string $Kiadasok_Id;
  private float $Osszeg;
  private string $Datum;
  private string $Kategoria_Id;

  public function __construct(string $Kiadasok_Id, float $Osszeg, string $Datum, string $Kategoria_Id)
  {
    $this->setKiadasok_Id($Kiadasok_Id);
    $this->setOsszeg($Osszeg);
    $this->setDatum($Datum);
    $this->setKategoria_Id($Kategoria_Id);
  }


  public function getKiadasok_Id(): string
  {
    return $this->Kiadasok_Id;
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

  private function setKiadasok_Id(string $Kiadasok_Id): void
  {
    $Kiadasok_Id = trim($Kiadasok_Id);
    if ($Kiadasok_Id === "") {
      throw new InvalidArgumentException("A Kiadások azonosító megadása kötelező!");
    }
    $this->Kiadasok_Id = $Kiadasok_Id;
  }

  private function setOsszeg(float $Osszeg): void
  {
    if ($Osszeg < 0) {
      throw new InvalidArgumentException("Az összeg nem lehet negatív!");
    }
    $this->Osszeg = $Osszeg;
  }

  private function setDatum(string $Datum): void
  {
    $Datum = trim($Datum);
    if ($Datum === "") {
      throw new InvalidArgumentException("A dátum megadása kötelező!");
    }

    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $Datum)) {
      throw new InvalidArgumentException("A dátum formátuma hibás (YYYY-MM-DD).");
    }
    $this->Datum = $Datum;
  }

  public function setKategoria_Id(string $Kategoria_Id): void
  {
    $Kategoria_Id = trim($Kategoria_Id);
    if ($Kategoria_Id === "") {
      throw new InvalidArgumentException("A kategória azonosító megadása kötelező!");
    }
    $this->Kategoria_Id = $Kategoria_Id;
  }
}
