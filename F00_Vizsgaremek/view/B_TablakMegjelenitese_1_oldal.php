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
        <h1>Táblák megjelenítése</h1>
        <?php
        if ($error != "") {
          print("h2 style='color:red;'>" . $error . "</h2>");
        }
        ?>

        <table class="table table-striped my-4">
          <thead class="table-danger">
            <tr>
              <th>Kategória azonosító</th>
              <th>Név</th>
              <th>Típus</th>
              <th>Csoportosítás</th>
              <th>Módosítás</th>
              <th>Törlés</th>
            </tr>

          </thead>

          <tbody>
            <?php
for($i=0; $i<count($))
            ?>
          </tbody>
        </table>

      </div>
      <form action="../controller/controller.php" method="post" class="my-3">
        <input type="hidden" name="Mentes" value="ReszletekCSV">
        <button type="submit" name="Letöltés" value="ReszletekCSV" class="btn btn-danger">Részletek letöltése (CSV)</button>
      </form>
    </div>

  </div>

  <?php include_once("base/footer.html") ?>
</body>

</html>
