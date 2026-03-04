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
    <div class="row">

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

      </div>
    </div>
    <form action="../controller/controller.php" method="post" class="my-3">
      <input type="hidden" name="Mentes" value="ReszletekCSV">
      <button type="submit" name="Letöltés" value="ReszletekCSV" class="btn btn-danger">Részletek letöltése (CSV)</button>
    </form>
  </div>
  </div>

  </div>




  <?php include_once("base/footer.html") ?>

  <script src="/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/view/JavaScript/reszletek.js"></script>

</body>

</html>
