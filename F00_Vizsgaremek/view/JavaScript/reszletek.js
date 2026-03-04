//Bevételek lekérdezése

let xhrBevetel = new XMLHttpRequest();

xhrBevetel.open("GET", "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/bevetelek.php");

xhrBevetel.onreadystatechange = function () {
  if (xhrBevetel.readyState == 4) {
    if (xhrBevetel.status !== 200) {
      console.log("Bevételek hiba:", xhrBevetel.status, xhrBevetel.responseText);
      return;
    }

    let adatok = JSON.parse(xhrBevetel.responseText);

    let tbody = document.getElementById("bevetelTorzs");
    tbody.innerHTML = "";

    for (var i = 0; i < adatok.length; i++) {
      let tr = document.createElement("tr");

      let td1 = document.createElement("td");
      td1.appendChild(document.createTextNode(adatok[i].Kategoria_Id));

      let td2 = document.createElement("td");
      td2.appendChild(document.createTextNode(adatok[i].Datum));

      let td3 = document.createElement("td");
      td3.appendChild(document.createTextNode(adatok[i].Osszeg + "Ft"));


      let tdModositas = document.createElement("td");
      let modositasGomb = document.createElement("button");
      modositasGomb.className = "btn btn-warning btn-sm";
      modositasGomb.innerText = "Módosítás";
      modositasGomb.onclick = function () {
        alert("Módosítás még nincs kész!");
      };
      tdModositas.appendChild(modositasGomb);

      let tdTorles = document.createElement("td");
      let torlesGomb = document.createElement("button");
      torlesGomb.className = "btn btn-danger btn-sm";
      torlesGomb.innerText = "Törlés";

      let Bevetel_Id = adatok[i].Bevetelek_Id;
      torlesGomb.onclick = function () {
        if (!confirm("Biztos törlös ezt a bevételt?"))
          return;

        let xhrDel = new XMLHttpRequest();
        xhrDel.open("DELETE", "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/bevetelek.php?Bevetel_Id=" + encodeURIComponent(Bevetel_Id));

        xhrDel.onreadystatechange = function () {
          if (xhrDel.readyState == 4) {
            if (xhrDel.status == 200) {
              location.reload();
            }
            else {
              alert("Törlés hiba:  " + xhrDel.status);
              console.log(xhrDel.responseText);
            }
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
  }
};

xhrBevetel.send(null);





//Kiadások lekérdezése

let xhrKiadas = new XMLHttpRequest();

xhrKiadas.open("GET", "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/kiadasok.php");

xhrKiadas.onreadystatechange = function () {
  if (xhrKiadas.readyState == 4 && xhrKiadas.status == 200) {

    let adatok = JSON.parse(xhrKiadas.responseText);

    let tbody = document.getElementById("kiadasTorzs");
    tbody.innerHTML = "";

    for (var i = 0; i < adatok.length; i++) {
      let tr = document.createElement("tr");

      let td1 = document.createElement("td");
      td1.appendChild(document.createTextNode(adatok[i].Kategoria_Id));

      let td2 = document.createElement("td");
      td2.appendChild(document.createTextNode(adatok[i].Datum));

      let td3 = document.createElement("td");
      td3.appendChild(document.createTextNode(adatok[i].Osszeg + "Ft"));


      let tdModositas = document.createElement("td");
      let modositasGomb = document.createElement("button");
      modositasGomb.className = "btn btn-warning btn-sm";
      modositasGomb.innerText = "Módosítás";
      modositasGomb.onclick = function () {
        alert("Módosítás még nincs kész!");
      };
      tdModositas.appendChild(modositasGomb);

      let tdTorles = document.createElement("td");
      let torlesGomb = document.createElement("button");
      torlesGomb.className = "btn btn-danger btn-sm";
      torlesGomb.innerText = "Törlés";
      let Kiadasok_Id = adatok[i].Kiadasok_Id;

      torlesGomb.onclick = function () {
        if (!confirm("Biztos törlöd ezt a kiadást?"))
          return;

        let xhrDel = new XMLHttpRequest();
        xhrDel.open("DELETE", "/KCS_202507/01_Vizsgaremek/F00_Vizsgaremek/api/kiadasok.php?Kiadasok_Id=" + encodeURIComponent(Kiadasok_Id));

        xhrDel.onreadystatechange = function () {
          if (xhrDel.readyState == 4) {
            if (xhrDel.status == 200) {
              location.reload();
            }
            else {
              alert("Törlés hiba:  " + xhrDel.status);
              console.log(xhrDel.responseText);
            }
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
  }
};

xhrKiadas.send(null);
