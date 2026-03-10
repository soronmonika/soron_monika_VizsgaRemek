<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulátor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../view/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../view/CSS/design.css">
</head>

<body>
  <?php include_once("base/navbar.html") ?>


  <div class="container top-hero text-center my-4">
    <p class="motto"><b>Egy kis tudatosság ma - nagyobb biztonság holnap!
        <img src="/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/view/base/Vizsgamunka_LogoPng.png" alt="Logó" title="Logó" width="250">
      </b></p>
  </div>


  <?php if (!empty($ErrorUzenet)): ?>
    <div class="alert alert-danger container mt-3"><?= htmlspecialchars($ErrorUzenet) ?></div>
  <?php endif; ?>

  <?php if (!empty($SuccessUzenet)): ?>
    <div class="alert alert-success container mt-3"><?= htmlspecialchars($SuccessUzenet) ?></div>
  <?php endif; ?>

  <div class=" container my-4 kalkulator-blokk">
    <div class="row g-4">

      <h1>Havi kalkulátor</h1>

      <!-- ÖSSZESÍTŐ-->

      <div class="container my-4">
        <div class="row mt-4">

          <?php if ($error !== ""): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
          <?php endif; ?>


          <div class="col-lg-12">
            <div id="osszesito">
              <h1 class="text-center">Összesítő</h1>
              <form action="../controller/controller.php" method="post">
                <input type="hidden" name="Osszesito" id="Osszesito">

                <div class="row g-3">

                  <div class="col-md-4">
                    <label class="form-label" for="OsszBevetel">Összes bevétel</label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="OsszBevetel" id="OsszBevetel" value="0" readonly>
                      <span class="input-group-text">Ft</span>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="OsszKiadas">Összes kiadás</label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="OsszKiadas" id="OsszKiadas" value="0" readonly>
                      <span class="input-group-text">Ft</span>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="egyenleg">Egyenleg</label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="egyenleg" id="egyenleg" value="0" readonly>
                      <span class="input-group-text">Ft</span>
                    </div>
                    <div class="form-text">Egyenleg=bevétel-kiadás</div>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>

      </div>

      <!-- KIADÁS -->
      <div class="col-lg-6">
        <div id="kiadas">
          <h1>Kiadás</h1>

          <form action="../controller/controller.php" method="post">
            <input type="hidden" name="Mentes" value="KiadasMentes">

            <div class="row align-items-center">
              <div class="col-8">
                <b>Rezsi költség</b>
              </div>

              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto" type="number" min="0" name="RezsiOssz" id="RezsiOssz" placeholder="0" readonly>
                <span class="align-self-center">Ft</span>
              </div>
            </div>

            <div class="mt-2">

              <div class="row align-items-center mb-2">
                <div class="col-8">Víz</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RezsiReszlet OsszKiadasReszlet" type="number" min="0" name="RezsiViz" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Villany</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RezsiReszlet OsszKiadasReszlet" type="number" min="0" name="RezsiVillany" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Szemét szállítás</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RezsiReszlet OsszKiadasReszlet" type="number" min="0" name="RezsiSzemet" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Tv</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RezsiReszlet OsszKiadasReszlet" type="number" min="0" name="RezsiTv" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Internet</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RezsiReszlet OsszKiadasReszlet" type="number" min="0" name="RezsiInternet" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Biztosítások</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RezsiReszlet OsszKiadasReszlet" type="number" min="0" name="RezsiBiztositasok" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Javítások</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RezsiReszlet OsszKiadasReszlet" type="number" min="0" name="RezsiJavitasok" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Egyéb</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RezsiReszlet OsszKiadasReszlet" type="number" min="0" name="RezsiEgyeb" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

            </div>


            <div class="row align-items-center">
              <div class="col-8">
                <b>Közlekedés</b>
              </div>

              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto" type="number" min="0" name="KozlekedesOssz" id="KozlekedesOssz" placeholder="0" readonly>
                <span class="align-self-center">Ft</span>
              </div>
            </div>


            <div class="mt-2">

              <div class="row align-items-center mb-2">
                <div class="col-8">Autók javítása</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto KozlekedesReszlet OsszKiadasReszlet" type="number" min="0"
                    name="KozlJavitas" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Biztosítása</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto KozlekedesReszlet OsszKiadasReszlet" type="number" min="0"
                    name="KozlBiztositas" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Adók</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto KozlekedesReszlet OsszKiadasReszlet" type="number" min="0"
                    name="KozlAdok" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Tankolás</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto KozlekedesReszlet OsszKiadasReszlet" type="number" min="0"
                    name="KozlTank" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Bérlet</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto KozlekedesReszlet OsszKiadasReszlet" type="number" min="0"
                    name="KozlBerlet" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Egyéb</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto KozlekedesReszlet OsszKiadasReszlet" type="number" min="0"
                    name="KozlEgyeb" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

            </div>

            <div class="row align-items-center  mb-3">
              <div class="col-8">
                <b>Törlesztések</b>

              </div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto OsszKiadasReszlet" type="number" min="0" name="TorlesztesekOssz" id="TorlesztesekOssz" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>
            </div>


            <div class="row align-items-center">
              <div class="col-8">
                <b>Előfizetések</b>
              </div>

              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto" type="number" min="0" name="ElofizetesekOssz" id="ElofizetesekOssz" placeholder="0" readonly>
                <span class="align-self-center">Ft</span>
              </div>
            </div>

            <div class="mt-2">

              <div class="row align-items-center mb-2">
                <div class="col-8">
                  <div>Streaming előfizetések</div>
                  <div class="form-text">pl. Netflix, Disney+, HBO Max, Spotify</div>
                </div>

                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto ElofizetesekReszlet OsszKiadasReszlet" type="number" min="0"
                    name="ElofizStreaming" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Telefon</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto ElofizetesekReszlet OsszKiadasReszlet" type="number" min="0"
                    name="ElofizTelefon" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

            </div>


            <div class="row align-items-center mb-3">
              <div class="col-8">
                <b>Oktatással kapcsolatos költségek</b>
              </div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto OsszKiadasReszlet" type="number" min="0" name="Oktatas" id="Oktatas" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>
            </div>


            <div class="row align-items-center">
              <div class="col-8">
                <b>Vásárlások</b>
              </div>

              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto" type="number" min="0" name="VasarlasokOssz" id="VasarlasokOssz" placeholder="0" readonly>
                <span class="align-self-center">Ft</span>
              </div>
            </div>

            <div class="mt-2">

              <div class="row align-items-center mb-2">
                <div class="col-8">Élelmiszer</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto VasarlasokReszlet OsszKiadasReszlet" type="number" min="0"
                    name="VasarElelmiszer" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Ruházkodás</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto VasarlasokReszlet OsszKiadasReszlet" type="number" min="0"
                    name="VasarRuhazkodas" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Egészségügyi kiadások</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto VasarlasokReszlet OsszKiadasReszlet" type="number" min="0"
                    name="VasarEgeszseg" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Menza</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto VasarlasokReszlet OsszKiadasReszlet" type="number" min="0"
                    name="VasarMenza" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Étterem/rendelések</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto VasarlasokReszlet OsszKiadasReszlet" type="number" min="0"
                    name="VasarEtterem" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">
                  <div>Egyéb</div>
                  <div class="form-text">pl. KIK, Pepco, Tedi stb.</div>
                </div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto VasarlasokReszlet OsszKiadasReszlet" type="number" min="0"
                    name="VasarEgyeb" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">
                  <div>Online rendelések :D</div>
                  <div class="form-text">Beleértve az éjszakai rendeléseket is</div>
                </div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto VasarlasokReszlet OsszKiadasReszlet" type="number" min="0"
                    name="VasarOnline" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

            </div>



            <div class="row align-items-center">
              <div class="col-8">
                <b>Szabadidő</b>
              </div>

              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto" type="number" min="0" name="SzabadidoOssz" id="SzabadidoOssz" placeholder="0" readonly>
                <span class="align-self-center">Ft</span>
              </div>
            </div>


            <div class="mt-2">

              <div class="row align-items-center mb-2">
                <div class="col-8">Szórakozás</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto SzabadidoReszlet OsszKiadasReszlet" type="number" min="0"
                    name="SzabadidoSzorakoz" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Üdülés</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto SzabadidoReszlet OsszKiadasReszlet" type="number" min="0"
                    name="SzabadidoUdules" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Hobbi</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto SzabadidoReszlet OsszKiadasReszlet" type="number" min="0"
                    name="SzabadidoHobbi" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Egyéb</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto SzabadidoReszlet OsszKiadasReszlet" type="number" min="0"
                    name="SzabadidoEgyeb" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

            </div>


            <div class="row align-items-center mb-3">
              <div class="col-8">
                <b>Ajándékozás</b>
              </div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto OsszKiadasReszlet" type="number" min="0" name="Ajandekozas" id="Ajandekozas" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>
            </div>



            <div class="row align-items-center">
              <div class="col-8">
                <b>Rendkívüli egyéb kiadások</b>
              </div>

              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto " type="number" min="0" name="RendkivuliOssz" id="RendkivuliOssz" placeholder="0" readonly>
                <span class="align-self-center">Ft</span>
              </div>
            </div>


            <div class="mt-2">

              <div class="row align-items-center mb-2">
                <div class="col-8">Bútor</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RendkivuliReszlet OsszKiadasReszlet" type="number" min="0"
                    name="RendkivuliButor" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Nagygépek/Kisgépek</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RendkivuliReszlet OsszKiadasReszlet" type="number" min="0"
                    name="RendkivuliGepek" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

              <div class="row align-items-center mb-2">
                <div class="col-8">Felújítás</div>
                <div class="col-4 d-flex justify-content-end gap-2">
                  <input class="form-control w-auto RendkivuliReszlet OsszKiadasReszlet" type="number" min="0"
                    name="RendkivuliFelujitas" placeholder="0">
                  <span class="align-self-center">Ft</span>
                </div>
              </div>

            </div>

            <div class="row align-items-center mb-2">
              <div class="col-8">Dátum</div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto" type="date" name="Datum" id="DatumKiadas" required>
              </div>
            </div>

            <div class="d-grid mt-3">
              <button type="submit" class="btn btn-primary">Kiadások mentés</button>
            </div>
          </form>


        </div>
      </div>



      <!-- BEVÉTEL -->

      <div class="col-lg-6">
        <div id="bevetel">
          <h1>Bevétel</h1>

          <form action="../controller/controller.php" method="post">
            <input type="hidden" name="Mentes" value="BevetelMentes">

            <div class="row align-items-center mb-2">
              <div class="col-8">Jövedelem</div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto BevetelReszlet" type="number" min="0" name="jovedelem" id="jovedelem" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-8">Cafatéria</div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto BevetelReszlet" type="number" min="0" name="cafateria" id="cafateria" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-8">Családi pótlék</div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto BevetelReszlet" type="number" min="0" name="CsaladiPotlek" id="CsaladiPotlek" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-8">Mellék állásból származó bevétel</div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto BevetelReszlet" type="number" min="0" name="MellekAllas" id="MellekAllas" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-8">Anyasági támogatás(CSED, GYED, GYES, GYOD...)</div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto BevetelReszlet" type="number" min="0" name="Anyasagi" id="Anyasagi" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-8">Családtámogatás</div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto BevetelReszlet" type="number" min="0" name="CsaladiTamogatas" id="CsaladiTamogatas" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>
            </div>

            <div class="row align-items-center mb-2">
              <div class="col-8">Egyéb bevételek</div>
              <div class="col-4 d-flex justify-content-end gap-2">
                <input class="form-control w-auto BevetelReszlet" type="number" min="0" name="EgyebBevetelek" id="EgyebBevetelek" placeholder="0">
                <span class="align-self-center">Ft</span>
              </div>

              <div class="mt-2">
                <div class="row align-items-center mb-2">
                  <div class="col-8">Dátum</div>
                  <div class="col-4 d-flex justify-content-end gap-2">
                    <input class="form-control w-auto" type="date" name="Datum" id="DatumBevetel" required>
                  </div>
                </div>

            <div class="d-grid mt-3">
              <button type="submit" class="btn btn-primary">Bevétel mentés</button>
            </div>
          </form>


        </div>
      </div>

    </div>
  </div>


  <?php include_once("base/footer.html") ?>
  <script src="../view/JavaScript/kalkulator.js"></script>

</body>

</html>
