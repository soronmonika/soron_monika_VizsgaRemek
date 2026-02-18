  document.addEventListener("DOMContentLoaded", function(){

  let reszletek=document.querySelectorAll(".RezsiReszlet");
  let OsszesMezo=document.getElementById("RezsiOssz");

  for(let i=0; i<reszletek.length; i++){
    reszletek[i].addEventListener("input", RezsiOsszes);
  }

  function RezsiOsszes(){
  let osszeg=0;

  for(let i=0; i<reszletek.length; i++){
    osszeg+=Number(reszletek[i].value) || 0;
  }
  OsszesMezo.value=osszeg;
}
  });


  document.addEventListener("DOMContentLoaded", function(){

  let reszletek=document.querySelectorAll(".KozlekedesReszlet");
  let OsszesMezo=document.getElementById("KozlekedesOssz");

  for(let i=0; i<reszletek.length; i++){
    reszletek[i].addEventListener("input", KozlekedesOsszes);
  }

  function KozlekedesOsszes(){
  let osszeg=0;

  for(let i=0; i<reszletek.length; i++){
    osszeg+=Number(reszletek[i].value) || 0;
  }
  OsszesMezo.value=osszeg;
}
  });


  document.addEventListener("DOMContentLoaded", function(){

  let reszletek=document.querySelectorAll(".ElofizetesekReszlet");
  let OsszesMezo=document.getElementById("ElofizetesekOssz");

  for(let i=0; i<reszletek.length; i++){
    reszletek[i].addEventListener("input", ElofizetesekOsszes);
  }

  function ElofizetesekOsszes(){
  let osszeg=0;

  for(let i=0; i<reszletek.length; i++){
    osszeg+=Number(reszletek[i].value) || 0;
  }
  OsszesMezo.value=osszeg;
}
  });



  document.addEventListener("DOMContentLoaded", function(){

  let reszletek=document.querySelectorAll(".VasarlasokReszlet");
  let OsszesMezo=document.getElementById("VasarlasokOssz");

  for(let i=0; i<reszletek.length; i++){
    reszletek[i].addEventListener("input", VasarlasokOsszes);
  }

  function VasarlasokOsszes(){
  let osszeg=0;

  for(let i=0; i<reszletek.length; i++){
    osszeg+=Number(reszletek[i].value) || 0;
  }
  OsszesMezo.value=osszeg;
}
  });


  document.addEventListener("DOMContentLoaded", function(){

  let reszletek=document.querySelectorAll(".VasarlasokReszlet");
  let OsszesMezo=document.getElementById("SzabadidoOssz");

  for(let i=0; i<reszletek.length; i++){
    reszletek[i].addEventListener("input", SzabadidoOsszes);
  }

  function SzabadidoOsszes(){
  let osszeg=0;

  for(let i=0; i<reszletek.length; i++){
    osszeg+=Number(reszletek[i].value) || 0;
  }
  OsszesMezo.value=osszeg;
}
  });


    document.addEventListener("DOMContentLoaded", function(){

  let reszletek=document.querySelectorAll(".RendkivuliReszlet");
  let OsszesMezo=document.getElementById("RendkivuliOssz");

  for(let i=0; i<reszletek.length; i++){
    reszletek[i].addEventListener("input", RendkivuliOsszes);
  }

  function RendkivuliOsszes(){
  let osszeg=0;

  for(let i=0; i<reszletek.length; i++){
    osszeg+=Number(reszletek[i].value) || 0;
  }
  OsszesMezo.value=osszeg;
}
  });


//Összesítő

document.addEventListener("DOMContentLoaded", function(){
  let BevetelReszletek=document.querySelectorAll(".BevetelReszlet");
  let BevetelOsszMezo=document.getElementById("OsszBevetel");

  for(let i=0; i<BevetelReszletek.length; i++){
    BevetelReszletek[i].addEventListener("input", OsszesBevetel)
  }

  function OsszesBevetel(){
    let osszes=0;

    for(let i=0; i<BevetelReszletek.length; i++){
      osszes+=Number(BevetelReszletek[i].value) || 0;
    }

    BevetelOsszMezo.value=osszes;
  }
});

document.addEventListener("DOMContentLoaded", function(){
  let KiadasReszletek=document.querySelectorAll(".OsszKiadasReszlet");
  let KiadasOsszMezo=document.getElementById("OsszKiadas");

  for(let i=0; i<KiadasReszletek.length; i++){
    KiadasReszletek[i].addEventListener("input", OsszesKiadas)
  }

  function OsszesKiadas(){
    let osszes=0;

    for(let i=0; i<KiadasReszletek.length; i++){
      osszes+=Number(KiadasReszletek[i].value) || 0;
    }

    KiadasOsszMezo.value=osszes;
  }
});


document.addEventListener("DOMContentLoaded", function(){
  let OsszesBevetelMezo=document.querySelector("#OsszBevetel");
  let OsszesKiadasMezo=document.querySelector("#OsszKiadas");
  let EgyenlegMezo=document.getElementById("egyenleg");

function EgyenlegSzamol(){
  let bevetel=Number(OsszesBevetelMezo.value) || 0;
  let kiadas=Number(OsszesKiadasMezo.value) || 0;

  EgyenlegMezo.value=bevetel-kiadas;
}
OsszesBevetelMezo.addEventListener("input", EgyenlegSzamol);
OsszesKiadasMezo.addEventListener("input", EgyenlegSzamol);
});
