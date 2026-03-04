<?php

function betoltes(string $class): void
{
  $path1 = __DIR__ . "/../model/" . $class . ".php";
  $path2 = __DIR__ . "/../model/Repositories/" . $class . ".php";

  if (file_exists($path1)) {
    include_once($path1);
    return;
  }
  if (file_exists($path2)) {
    include_once($path2);
    return;
  }
}
spl_autoload_register("betoltes");

function fooldalView(string $error = ""): void
{
  include_once(__DIR__ . "/../view/fooldal.php");
}

function kalkulatorView(string $error = "", string $success = ""): void
{
  $ErrorUzenet = $error;
  $SuccessUzenet = $success;

  include_once(__DIR__ . "/../view/A_JS_kalkulator_fooldal.php");
}


function tablaView(string $error = ""): void
{
  $bevetelek = BevetelekRepo::getBevetelek() ?? [];
  $kiadasok = KiadasokRepo::getKiadasok() ?? [];
  include_once(__DIR__ . "/../view/B_TablakMegjelenitese_1_oldal.php");
}

function post(string $kulcs, string $default = ""): string
{
  return array_key_exists($kulcs, $_POST) ? trim((string)$_POST[$kulcs]) : $default;
}

function tudatossagView(string $error = ""): void
{
  include_once(__DIR__ . "/../view/C_Megtakaritasok_koltesiSzokasok_3_oldal.php");
}

function nyomtatvanyokView(string $error = ""): void
{
  include_once(__DIR__ . "/../view/D_Nyomtatvanyok_4_oldal.php");
}


function bevetelMentes(): void
{
  $Datum = post("Datum");
  if ($Datum === "") {
    kalkulatorView("A bevétel dátuma kötelező!");
    return;
  }


  $mappa = [
    "jovedelem" => "B_JOVEDELEM",
    "cafateria" => "B_CAF",
    "CsaladiPotlek" => "B_CSPOT",
    "MellekAllas" => "B_M_ALLAS",
    "Anyasagi" => "B_ANYASAGI",
    "CsaladiTamogatas" => "B_CS_TAMO",
    "EgyebBevetelek" => "B_EGYEB",
  ];
  $mentettSorok = 0;

  foreach ($mappa as $mezoNev => $Kategoria_Id) {
    $Osszeg = (float) post($mezoNev, "0");
    if ($Osszeg > 0) {
      $Bevetelek_Id = uniqid("B_");
      $bevetel = new Bevetelek($Bevetelek_Id, $Osszeg, $Datum, $Kategoria_Id);
      BevetelekRepo::createBevetel($bevetel);
      $mentettSorok++;
    }
  }

  if ($mentettSorok == 0) {
    kalkulatorView("Nem mentettél semmit: adj meg legalább egy bevételt!");
    return;
  }

  kalkulatorView("", "Sikeresen mentetted a bevételeket ($mentettSorok sor)");
}



function kiadasMentes(): void
{
  $Datum = post("Datum");
  if ($Datum === "") {
    kalkulatorView("A kiadás dátuma kötelező!");
    return;
  }

  $mappa = [
    // REZSI
    "RezsiViz"      => "K_REZSI_VIZ",
    "RezsiVillany"  => "K_REZSI_VILLANY",
    "RezsiSzemet"   => "K_REZSI_SZEMET",
    "RezsiTv"       => "K_REZSI_TV",
    "RezsiInternet" => "K_REZSI_INTERNET",
    "RezsiBiztositasok" => "K_REZSI_BIZTOSITAS",
    "RezsiJavitasok" => "K_REZSI_JAVITAS",
    "RezsiEgyeb"     => "K_REZSI_EGYEB",

    // KÖZLEKEDÉS
    "KozlJavitas"      => "K_KOZL_JAVITAS",
    "KozlBiztositas" => "K_KOZL_BIZT",
    "KozlAdok" => "K_KOZL_ADO",
    "KozlTank" => "K_KOZL_TANK",
    "KozlBerlet" => "K_KOZL_BERL",
    "KozlEgyeb" => "K_KOZL_EGYEB",

    //TÖRLESZTÉSEK
    "TorlesztesekOssz" => "K_TORLESZTES",

    // ELŐFIZETÉS
    "ElofizStreaming" => "K_ELOFIZ_STREAM",
    "ElofizTelefon"   => "K_ELOFIZ_TEL",

    //OKTATÁS
    "Oktatas" => "K_OKTATAS",

    // VÁSÁRLÁS
    "VasarElelmiszer" => "K_VASAR_ELELM",
    "VasarRuhazkodas" => "K_VASAR_RUHA",
    "VasarEgeszseg" => "K_VASAR_EGESZ",
    "VasarMenza" => "K_VASAR_MENZA",
    "VasarEtterem" => "K_VASAR_ETTEREM",
    "VasarEgyeb" => "K_VASAR_EGYEB",
    "VasarOnline" => "K_VASAR_ONLINE",


    // SZABADIDŐ
    "SzabadidoSzorakoz" => "K_SZABAD_SZOR",
    "SzabadidoUdules" => "K_SZABAD_UDULES",
    "SzabadidoHobbi" => "K_SZABAD_HOBBI",
    "SzabadidoEgyeb" => "K_SZABAD_EGYEB",

    // AJÁNDÉK
    "Ajandekozas" => "K_AJAND",

    //RENDKÍVÜLI
    "RendkivuliButor" => "K_REND_BUTOR",
    "RendkivuliGepek" => "K_REND_GEPEK",
    "RendkivuliFelujitas" => "K_REND_FELU",
  ];

  $mentettSorok = 0;

  foreach ($mappa as $mezoNev => $Kategoria_Id) {
    $Osszeg = (float) post($mezoNev, "0");

    if ($Osszeg > 0) {
      $Kiadasok_Id = uniqid("Ki_");

      $kiadasok = new Kiadasok($Kiadasok_Id, $Osszeg, $Datum, $Kategoria_Id);
      KiadasokRepo::createKiadas($kiadasok);

      $mentettSorok++;
    }
  }

  if ($mentettSorok == 0) {
    kalkulatorView("Nem mentettél semmit : adj meg legalább egy kiadás összeget!");
    return;
  }

  kalkulatorView("", "Sikeresen mentetted a kiadásokat ($mentettSorok sor)");
}

function main(): void
{



  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
      $Mentes = post("Mentes");

      if ($Mentes == "BevetelMentes") {
        bevetelMentes();
        return;
      }
      if ($Mentes == "KiadasMentes") {
        kiadasMentes();
        return;
      }
      kalkulatorView("Ismeretlen mentés típus!");
      return;
    } catch (Exception $error) {
      kalkulatorView("Hiba történt: " . $error->getMessage());
      return;
    }
  }




  $oldal = array_key_exists("oldal", $_GET) ? $_GET["oldal"] : "kalkulator";

  switch ($oldal) {
    case "fooldal":
      fooldalView();
      return;

    case "kalkulator":
      kalkulatorView();
      return;

    case "tabla":
      tablaView();
      return;

    case "tudatossag":
      tudatossagView();
      return;

    case "nyomtatvanyok":
      nyomtatvanyokView();
      return;

    default:
      kalkulatorView();
      return;
  }
}

main();
