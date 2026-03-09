<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Táblák megjelenítése</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../view/style.css">
</head>

<body>
  <?php include_once("base/navbar.html") ?>

  <div class="container my-4">
    <div class="row my-4 align-items-stretch">

      <div class="col-md-4">

        <div class="card bg-success text-white mb-3">
          <div class="card-body">
            <h5 class="card-title">Összes bevétel</h5>
            <p class="fs-4 fw-bold mb-0" id="OsszesBevetel">0 Ft</p>
          </div>
        </div>

        <div class="card bg-danger text-white mb-3">
          <div class="card-body">
            <h5 class="card-title">Összes kiadás</h5>
            <p class="fs-4 fw-bold mb-0" id="OsszesKiadas">0 Ft</p>
          </div>
        </div>


        <div class="card bg-primary text-white mb-3">
          <div class="card-body">
            <h5 class="card-title">Egyenleg</h5>
            <p class="fs-4 fw-bold mb-0" id="Egyenleg">0 Ft</p>
          </div>
        </div>

      </div>


      <div class="col-md-8">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-body d-flex flex-column align-items-center justify-content-center">
            <h4>Költségdiagram</h4>
            <div style="max-width: 320px; max-height: 320px">
              <canvas id="KoltsegDiagram"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <h1 class="text-center">Táblák megjelenítése</h1>

      <h2>Kiadás táblák</h2>
      <table class="table table-striped my-4">
        <thead class="table-danger">
          <tr>
            <th>Név</th>
            <th>Dátum</th>
            <th>Összeg</th>
            <th>Módosítás</th>
            <th>Törlés</th>
          </tr>
        </thead>
        <tbody id="kiadasTorzs"></tbody>
      </table>
    </div>

    <div class="col-12">

      <h2>Bevétel táblák</h2>
      <table class="table table-striped my-4">
        <thead class="table-danger">
          <tr>
            <th>Név</th>
            <th>Dátum</th>
            <th>Összeg</th>
            <th>Módosítás</th>
            <th>Törlés</th>
          </tr>
        </thead>
        <tbody id="bevetelTorzs"></tbody>
      </table>


      <a href="/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/letoltesCsv.php" class="btn btn-dark my-3 ">Letöltés CSV/Excel
      </a>

    </div>
  </div>

  </div>



  <?php include_once("base/footer.html") ?>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/view/JavaScript/script.js"></script>

</body>

</html>
