let OsszesBevetel = 0;
let OsszesKiadas = 0;

function frissitEgyenleg() {
  let Egyenleg = OsszesBevetel - OsszesKiadas;

  let elem = document.getElementById("Egyenleg")

  elem.innerText = Egyenleg + "Ft";

  if (Egyenleg < 0) {
    elem.style.color = "red";
    elem.innerText = "!" + Egyenleg + "Ft";
  }
  else {
    elem.style.color = "limegreen";
  }

  Diagram();
}

let diagram = null;

function Diagram() {
  let ctx = document.getElementById("KoltsegDiagram");

  if (!ctx)
    return;

  if (diagram !== null) {
    diagram.destroy();
  }

  diagram = new Chart(ctx, {
    type: "pie",
    data: {
      labels: ["Bevétel", "Kiadás"],
      datasets: [{
        label: "Összeg (Ft)",
        data: [OsszesBevetel, OsszesKiadas]
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: "top",
          labels: {
            boxWidth: 20,
            padding: 15
          }
        }
      }
    }
  });
}

let xhrBevetel = new XMLHttpRequest();
xhrBevetel.open("GET", "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/bevetelek.php");

xhrBevetel.onreadystatechange = function () {
  if (xhrBevetel.readyState != 4) return;

  if (xhrBevetel.status !== 200) {
    console.log("Bevételek hiba:", xhrBevetel.status, xhrBevetel.responseText);
    return;
  }
  let adatok = JSON.parse(xhrBevetel.responseText);


  OsszesBevetel = 0;
  for (let i = 0; i < adatok.length; i++) {
    OsszesBevetel += Number(adatok[i].Osszeg);
  }
  document.getElementById("OsszesBevetel").innerText = OsszesBevetel + "Ft";
  frissitEgyenleg();



  let tbody = document.getElementById("bevetelTorzs");
  tbody.innerHTML = "";

  for (let i = 0; i < adatok.length; i++) {

    let tr = document.createElement("tr");

    let td1 = document.createElement("td");
    td1.appendChild(document.createTextNode(adatok[i].Kategoria_Id));

    let td2 = document.createElement("td");
    td2.appendChild(document.createTextNode(adatok[i].Datum));

    let td3 = document.createElement("td");
    td3.appendChild(document.createTextNode(adatok[i].Osszeg + " Ft"));


    let tdModositas = document.createElement("td");
    let modositasGomb = document.createElement("button");
    modositasGomb.className = "btn btn-warning btn-sm";
    modositasGomb.innerText = "Módosítás";

    modositasGomb.onclick = function () {

      let bevetelId = adatok[i].Bevetelek_Id;

      let ujOsszeg = prompt("Új összeg:", adatok[i].Osszeg);
      if (ujOsszeg === null) return;

      let ujDatum = prompt("Új dátum (YYYY-MM-DD):", adatok[i].Datum);
      if (ujDatum === null) return;

      let ujKategoria = prompt("Új kategória:", adatok[i].Kategoria_Id);
      if (ujKategoria === null) return;

      let xhrModositas = new XMLHttpRequest();
      xhrModositas.open("PUT", "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/bevetelek.php");
      xhrModositas.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8");

      xhrModositas.onreadystatechange = function () {
        if (xhrModositas.readyState != 4) return;

        if (xhrModositas.status == 200) {
          location.reload();
        }
        else {
          alert("Módosítás hiba: " + xhrModositas.status);
          console.log(xhrModositas.responseText);
        }
      };

      let body =
        "Bevetelek_Id=" + encodeURIComponent(bevetelId) +
        "&Osszeg=" + encodeURIComponent(ujOsszeg) +
        "&Datum=" + encodeURIComponent(ujDatum) +
        "&Kategoria_Id=" + encodeURIComponent(ujKategoria);

      xhrModositas.send(body);
    };
    tdModositas.appendChild(modositasGomb);


    let tdTorles = document.createElement("td");
    let torlesGomb = document.createElement("button");
    torlesGomb.className = "btn btn-danger btn-sm";
    torlesGomb.innerText = "Törlés";

    let bevetelId = adatok[i].Bevetelek_Id;

    torlesGomb.onclick = function () {
      if (!confirm("Biztos törlöd ezt a bevételt?"))
        return;

      let xhrDel = new XMLHttpRequest();
      xhrDel.open(
        "DELETE",
        "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/bevetelek.php?Bevetelek_Id=" + encodeURIComponent(bevetelId)
      );

      xhrDel.onreadystatechange = function () {
        if (xhrDel.readyState != 4)
          return;

        if (xhrDel.status == 200) {
          location.reload();
        } else {
          alert("Törlés hiba: " + xhrDel.status);
          console.log(xhrDel.responseText);
        }
      };

      xhrDel.send(null);
    };
    tdTorles.appendChild(torlesGomb);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(tdModositas);
    tr.appendChild(tdTorles);

    tbody.appendChild(tr);
  }
};

xhrBevetel.send(null);




let xhrKiadas = new XMLHttpRequest();
xhrKiadas.open("GET", "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/kiadasok.php");

xhrKiadas.onreadystatechange = function () {
  if (xhrKiadas.readyState != 4) return;

  if (xhrKiadas.status !== 200) {
    console.log("Kiadások hiba:", xhrKiadas.status, xhrKiadas.responseText);
    return;
  }

  let adatok = JSON.parse(xhrKiadas.responseText);


  OsszesKiadas = 0;
  for (let i = 0; i < adatok.length; i++) {
    OsszesKiadas += Number(adatok[i].Osszeg);
  }
  document.getElementById("OsszesKiadas").innerText = OsszesKiadas + "Ft";
  frissitEgyenleg();



  let tbody = document.getElementById("kiadasTorzs");
  tbody.innerHTML = "";

  for (let i = 0; i < adatok.length; i++) {

    let tr = document.createElement("tr");

    let td1 = document.createElement("td");
    td1.appendChild(document.createTextNode(adatok[i].Kategoria_Id));

    let td2 = document.createElement("td");
    td2.appendChild(document.createTextNode(adatok[i].Datum));

    let td3 = document.createElement("td");
    td3.appendChild(document.createTextNode(adatok[i].Osszeg + " Ft"));



    let tdModositas = document.createElement("td");
    let modositasGomb = document.createElement("button");
    modositasGomb.className = "btn btn-warning btn-sm";
    modositasGomb.innerText = "Módosítás";

    modositasGomb.onclick = function () {
      let kiadasId = adatok[i].Kiadasok_Id;

      let ujOsszeg = prompt("Új összeg:", adatok[i].Osszeg);
      if (ujOsszeg === null) return;

      let ujDatum = prompt("Új dátum (YYYY-MM-DD):", adatok[i].Datum);
      if (ujDatum === null) return;

      let ujKategoria = prompt("Új kategória:", adatok[i].Kategoria_Id);
      if (ujKategoria === null) return;

      let xhrModositas = new XMLHttpRequest();
      xhrModositas.open("PUT", "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/kiadasok.php");
      xhrModositas.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8");

      xhrModositas.onreadystatechange = function () {
        if (xhrModositas.readyState != 4)
          return;

        console.log("PUT kiadas státusz: ", xhrModositas.status, xhrModositas.responseText);

        if (xhrModositas.status == 200) {
          location.reload();
        }
        else {
          alert("Módosítás hiba: " + xhrModositas.status);
          console.log(xhrModositas.responseText);
        }
      };

      let body =
        "Kiadasok_Id=" + encodeURIComponent(kiadasId) +
        "&Osszeg=" + encodeURIComponent(ujOsszeg) +
        "&Datum=" + encodeURIComponent(ujDatum) +
        "&Kategoria_Id=" + encodeURIComponent(ujKategoria);

      xhrModositas.send(body);
    };

    tdModositas.appendChild(modositasGomb);

    let tdTorles = document.createElement("td");
    let torlesGomb = document.createElement("button");
    torlesGomb.className = "btn btn-danger btn-sm";
    torlesGomb.innerText = "Törlés";

    let kiadasId = adatok[i].Kiadasok_Id;

    torlesGomb.onclick = function () {
      if (!confirm("Biztos törlöd ezt a kiadást?")) return;

      let xhrTorles = new XMLHttpRequest();
      xhrTorles.open(
        "DELETE",
        "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/kiadasok.php?Kiadasok_Id=" + encodeURIComponent(kiadasId)
      );

      xhrTorles.onreadystatechange = function () {
        if (xhrTorles.readyState != 4) return;

        if (xhrTorles.status == 200) {
          location.reload();
        } else {
          alert("Törlés hiba: " + xhrTorles.status);
          console.log(xhrTorles.responseText);
        }
      };

      xhrTorles.send(null);
    };
    tdTorles.appendChild(torlesGomb);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(tdModositas);
    tr.appendChild(tdTorles);

    tbody.appendChild(tr);
  }
};

xhrKiadas.send(null);


