<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Táblák megjelenítése</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../view/CSS/style.css">
      <link rel="stylesheet" type="text/css" href="../view/CSS/design.css">
</head>

<body>
  <?php include_once("base/navbar.html") ?>

  <div class="container my-4">
    <div class="row my-4 align-items-stretch">

      <div class="col-md-4">

        <div class="card dashboard-card stat-card stat-income mb-3 text-center">
          <div class="card-body">
            <h5>Összes bevétel</h5>
            <p class="stat-value" id="OsszesBevetel">0 Ft</p>
          </div>
        </div>

        <div class="card dashboard-card stat-card stat-expense mb-3 text-center">
          <div class="card-body">
            <h5 >Összes kiadás</h5>
            <p class="stat-value" id="OsszesKiadas">0 Ft</p>
          </div>
        </div>


        <div class="card dashboard-card stat-card stat-balance text-center">
          <div class="card-body">
            <h5 class="card-title">Egyenleg</h5>
            <p class="stat-value" id="Egyenleg">0 Ft</p>
          </div>
        </div>

      </div>


      <div class="col-md-8">
        <div class="card diagram-card h-100">
          <div class="card-body">
            <h4 class="table-title">Költségdiagram</h4>
            <div class="diagram-wrap">
              <canvas id="KoltsegDiagram"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">

      <h2>Kiadás tábla</h2>
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

      <h2>Bevétel tábla</h2>
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


<div class="export-wrap">

<a href="/api/export_csv.php" class="btn btn-primary w-50">
CSV / Excel letöltés
</a>

</div>
    </div>
  </div>

  </div>



  <?php include_once("base/footer.html") ?>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/view/JavaScript/script.js"></script>

</body>

</html>
