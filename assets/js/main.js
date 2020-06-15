$(document).ready(function() {
  //brisanje kategorije
  $(document).on("click", ".katBrisanje", function() {
    let idKategorije = $(this).data("brisanje");
    // alert(idKategorije);
    $.ajax({
      url: "models/admin/kategorije/brisanjeKategorije.php",
      method: "POST",
      dataType: "json",
      data: {
        id: idKategorije
      },
      success: function(data) {
        if (data.status == 201) {
          console.log("UPISANO");
        }
        stampajKategorije(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
  //FILTRIRANJE
  $(document).on("click", ".filtriranje", function() {
    let idKategorije = $(this).data("idfilter");

    $.ajax({
      url: "models/vesti/filterVesti.php",
      method: "POST",
      dataType: "json",
      data: {
        id: idKategorije
      },
      success: function(data) {
        printVesti(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
  //update Kategorije
  $(document).on("click", ".katEditovanje", function() {
    let idKategorije = $(this).data("editovanje");
    // alert(idKategorije);
    $.ajax({
      url: "models/admin/kategorije/dohvatiKategoriju.php",
      method: "POST",
      dataType: "json",
      data: {
        id: idKategorije
      },
      success: function(data) {
        stampajModalKategorija(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
  //KATEGORIJE
  $("#btnDodajKategoriju").click(function() {
    let naziv = $("#kat").val();
    // console.log(naziv);

    $.ajax({
      url: "models/admin/kategorije/unosKategorija.php",
      method: "POST",
      dataType: "json",
      data: {
        naziv: naziv
      },
      success: function(data) {
        if (data.status == 201) {
          console.log("UPISANO");
        }
        stampajKategorije(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });

  //VESTI\
  $(document).on("click", ".vestBrisanje", function() {
    let idVest = $(this).data("brisanje");
    // alert(idKategorije);
    $.ajax({
      url: "models/admin/vesti/brisanjeVesti.php",
      method: "POST",
      dataType: "json",
      data: {
        id: idVest
      },
      success: function(data) {
        stampajVesti(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
  //
  //KORISNICI
  $("#btnDodajKorisnika").click(function() {
    let naziv = $("#kat").val();
    // console.log(naziv);

    $.ajax({
      url: "models/admin/unosKorisnika.php",
      method: "POST",
      dataType: "json",
      data: {
        ime: ime,
        prezime: prezime,
        email: email
      },
      success: function(data) {
        console.log(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
  //
  //
  //NAVIGACIONI MENI
  $("#btnDodajNavigaciju").click(function() {
    let naziv = $("#meni").val();
    // console.log(naziv);

    $.ajax({
      url: "models/admin/meni/unosMenija.php",
      method: "POST",
      dataType: "json",
      data: {
        naziv: naziv
      },
      success: function(data) {
        if (data.status == 201) {
          console.log("UPISANO");
        }
        stampajMeni(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
  //BRISANJE MENIJA
  $(document).on("click", ".meniBrisanje", function() {
    let idMeni = $(this).data("brisanje");
    // alert(idKategorije);
    $.ajax({
      url: "models/admin/meni/brisanjeMenija.php",
      method: "POST",
      dataType: "json",
      data: {
        id: idMeni
      },
      success: function(data) {
        if (data.status == 201) {
          console.log("UPISANO");
        }
        stampajMeni(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
  //UPDATE MENIJA
  $(document).on("click", ".meniEditovanje", function() {
    let idMeni = $(this).data("editovanje");
    // alert(idKategorije);
    $.ajax({
      url: "models/admin/meni/dohvatiMeni.php",
      method: "POST",
      dataType: "json",
      data: {
        id: idMeni
      },
      success: function(data) {
        stampajModalMeni(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
  //stranicenje
  $("body").on("click", ".news-pagination", function() {
    let limit = $(this).data("limit");

    $.ajax({
      url: "models/admin/vesti/get_with_pagination.php",
      method: "GET",
      data: {
        limit: limit
      },
      success: function(data) {
        printVesti(data.vesti);
        printPagination(data.num_of_news);
      },
      error: function(error) {
        console.log(error);
      }
    });
  });
});
//vesti
function printVesti(vesti) {
  let html = "";
  for (let v of vesti) {
    let datum = new Date(v.datum);
    let datumIspis =
      datum.getDate() +
      "." +
      datum.getMonth() +
      "." +
      datum.getFullYear() +
      ".";
    html += `<div class="col-md-4 pedingpet dogadjajicol">
              <div class="card">


              <div class="card-block">

                  <div class="imgbox">
                      <img src="${v.slikaVelika}" alt="Slika"/>
                  </div>

                  
                  
                  <div class="card-title text-center">
                      <h4><b>${v.naslov}</b></h4>
                  </div>

                  <div class="card-text text-right">
                      <span class="post-date">${v.datum}</span>
                  </div>

                  <div class="content">
                      <h4>SAZNAJ VISE</h4>
                      <p>Vise informacija o ovom postu mozete naci na nasoj stranici</p>
                      <a href="index.php?page=post&id=${v.idVesti}"><button class='btn'>POSETI STRANICU</button></a>
                  </div>
                  
              </div>
            </div>
          </div> `;
  }
  $("#listaVesti").html(html);
}
//paginacija
function printPagination(num_of_news) {
  // console.log(num_of_news);
  let html = `<ul class="pagination m-auto" id="pagination">`;
  for (let i = 0; i < num_of_news; i++) {
    html += `<li class="page-item">
              <a href="#" class="news-pagination" data-limit="${i}">
                  ${i + 1}
              </a> | 
          </li>`;
  }
  html += `</ul>`;
  console.log(html);
  $("#stranicenje").html(html);
}
//kategorije ispis
function stampajKategorije(data) {
  let ispis = "";
  let rb = 1;
  if (data.length == 0) {
    ispis += `<p>Trenutno nema kategorija.</p>`;
  } else {
    ispis += `<table class="table">
  <tr>
      <th>RB</th>
      <th>Naziv kategorije</th><th></th><th></th>
  </tr>`;
    for (let i of data) {
      ispis += `<tr>
    <td>${rb}</td>
    <td>${i.naziv}</td>
    <td><a href="#" class="katBrisanje" data-brisanje="${
      i.idKategorije
    }"><i class='fas fa-times'></i></a></td>
                <td><a href="#" class="katEditovanje" data-editovanje="${
                  i.idKategorije
                }"><i class='far fa-edit'></i></a></td>
</tr>`;
      rb++;
    }

    ispis += `</table>`;
  }
  $("#prikazKategorija").html(ispis);
}
function stampajMeni(data) {
  let ispis = "";
  let rb = 1;
  if (data.length == 0) {
    ispis += `<p>Trenutno nema menija.</p>`;
  } else {
    ispis += `<table class="table">
  <tr>
      <th>RB</th>
      <th>Naziv menija</th><th></th><th></th>
  </tr>`;
    for (let i of data) {
      ispis += `<tr>
    <td>${rb}</td>
    <td>${i.naziv}</td>
    <td><a href="#" class="meniBrisanje" data-brisanje="${
      i.idMeni
    }"><i class='fas fa-times'></i></a></td>
                <td><a href="#" class="meniEditovanje" data-editovanje="${
                  i.idMeni
                }"><i class='far fa-edit'></i></a></td>
</tr>`;
      rb++;
    }

    ispis += `</table>`;
  }
  $("#prikazMenija").html(ispis);
}
function stampajModalKategorija(data) {
  let ispis = `<div class="modal" tabindex="-1" role="dialog" id="modalKat">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Kategorija</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <input type="hidden" id="hId" value="${data.idKategorije}">
          <input id="kategorija" value="${
            data.naziv
          }" type="text" class="form-control">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="editKat" class="btn btn-primary">Edituj</button>
      </div>
    </div>
  </div>
</div>`;
  $("#modalKategorija").html(ispis);
  $("#modalKat").modal();
  $("#editKat").click(function() {
    let naziv = $("#kategorija").val();
    // alert(naziv);
    const id = $("#hId").val();
    $("#modalKat").modal("hide");
    $.ajax({
      url: "models/admin/kategorije/editKategorije.php",
      method: "POST",
      dataType: "json",
      data: {
        naziv: naziv,
        id: id
      },
      success: function(data) {
        stampajKategorije(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
}
//modal MENI
function stampajModalMeni(data) {
  let ispis = `<div class="modal" tabindex="-1" role="dialog" id="modalMeni">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Meni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <input type="hidden" id="mId" value="${data.idMeni}">
          <input id="meniNaziv" value="${
            data.naziv
          }" type="text" class="form-control">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="editMenija" class="btn btn-primary">Edituj</button>
      </div>
    </div>
  </div>
</div>`;
  $("#modalMenija").html(ispis);
  $("#modalMeni").modal();
  $("#editMenija").click(function() {
    let naziv = $("#meniNaziv").val();
    // alert(naziv);
    const id = $("#mId").val();
    $("#modalMeni").modal("hide");
    $.ajax({
      url: "models/admin/meni/editMenija.php",
      method: "POST",
      dataType: "json",
      data: {
        naziv: naziv,
        id: id
      },
      success: function(data) {
        stampajMeni(data);
      },
      error: function(xhr, status, error) {
        alert(status);

        // location.reload();
      }
    });
  });
}
function stampajVesti(data) {
  if (data.length == 0) {
    $("#vesti").html("Trenutno nema vesti");
  } else {
    var ispis = "";
    ispis += `<table class="table">
            <tr>
                <th>RB</th>
                <th>Slika</th>
                <th>Naziv kategorije</th>
                <th>Naslov</th>
                <th>Tekst</th>
                <th>Datum</th>
                <th></th><th></th>
            </tr>`;
    let rb = 1;
    for (let d of data) {
      let datum = new Date(d.datum);
      let datumIspis =
        datum.getDate() +
        "." +
        datum.getMonth() +
        "." +
        datum.getFullYear() +
        ".";
      let tekst = d.tekst;
      let tekstIspis = tekst.substr(0, 50);
      ispis += `<tr>
                <td>${rb}</td>
                <td ><img src="${d.slikaMala}" alt="vest"></td>
                <td>${d.naziv}</td>
                <td>${d.naslov}</td>
                <td>${tekstIspis}...</td>
                <td>${datumIspis}</td>
                <td><a href="#" class="vestBrisanje" data-brisanje="${
                  d.idVest
                }"><i class='fas fa-times'></i></a></td>
                 <td><a href="#" class="vestEditovanje" data-editovanje="${
                   d.idVest
                 }"><i class='far fa-edit'></i></a></td>
            </tr>`;
      rb++;
    }

    ispis += `</table>`;
    $("#vesti").html(ispis);
  }
}
