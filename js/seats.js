var htmlEndpointToRenderTo = document.getElementsByClassName("seats")[0];
//console.log(htmlEndpointToRenderTo);

var seatRows = 5;
var seatColummns = 5;

var selectedSeats = [];
var user = {};

var randomBoolean = function() {
  return Math.random() >= 0.5;
};

var onSeatClick = function(id, e) {
  var element = e.target;

  if (element.classList.contains("open")) {
    element.className = element.className.replace("open", "selected");
    selectedSeats.push(id);
    //console.log(selectedSeats);
    return;
  }

  if (element.classList.contains("selected")) {
    element.className = element.className.replace("selected", "open");
    selectedSeats = selectedSeats.filter(function(seat) {
      return seat !== id;
    });
    //console.log(selectedSeats);
    return;
  }
};

var renderSeat = function(config) {
  config = config || {};

  var id = config.id;
  if (id === undefined) {
    console.log(id);
    console.warn("Id not provided on renderSeat");
    return;
  }

  var status = config.status || "open";

  var element = document.createElement("i");

  element.addEventListener("click", function(e) {
    if (status === "open") {
      onSeatClick(id, e);
    }
  });

  element.className = "zmdi zmdi-seat seat " + status;
  element.setAttribute("title", "Seat " + id.x + id.y);

  return element;
};

var renderSeatsGroup = function(id, numRows, numColumns, seats) {
  numRows = numRows || 0;
  numColumns = numColumns || 0;

  var groupSeats = document.createElement("div");
  groupSeats.className = "seatsGroup";
  var i = 1;
  //console.log(seats);
  //console.log(seats.length);

  for (var x = 0; x < numRows; x++) {
    var row = document.createElement("div");
    row.className = "row";

    for (var y = 0; y < numColumns; y++) {
      var con = false;
      var column = document.createElement("div");
      column.className = "column";

      for (s = 0; s < seats.length; s++) {
        if (seats[s].fila == x && seats[s].columna == y) {
          con = true;
          column.appendChild(
            renderSeat({
              status: "occupied",
              id: {
                x: x,
                y: y
              }
            })
          );
        }
      }
      if (!con) {
        column.appendChild(
          renderSeat({
            status: "open",
            id: {
              x: x,
              y: y
            }
          })
        );
      }
      row.appendChild(column);
      i++;
    }
    groupSeats.appendChild(row);
  }

  return groupSeats;
};

function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var buildTheater = function(element) {
   
  var urlHref = window.location.href;
  var urlReferrer = document.referrer;

  var idSesion = getParameterByName("sesion");

  var lastSlash = urlReferrer.lastIndexOf("/");
  var ruta = urlReferrer.substring(0, lastSlash);
  var type = 3;
 
  var datos = {
    sesion: idSesion,
    tipo: type
  };

  $.ajax({
    type: "post",
    url: ruta + "/includes/scriptSesion.php",
    data: datos,
    success: function(response) {
     
      var json = JSON.parse(response);
    

      element.appendChild(
        renderSeatsGroup(0, json.infoSala.f, json.infoSala.c, json.seats || [])
      );
      user = json.user || {};
    }
  });

  // element.appendChild(renderSeatsGroup(1, 4, 6));
  // element.appendChild(renderSeatsGroup(2, 6, 2));
};

buildTheater(htmlEndpointToRenderTo);

$(".shopMenu").click(function() {
  var urlReferrer = document.referrer;

  var lastSlash = urlReferrer.lastIndexOf("/");
  var ruta = urlReferrer.substring(0, lastSlash);
  var idSesion = getParameterByName("sesion");
  var cod=document.getElementById('codigo').value;
  //console.log(cod);
  type=4;
  
  //console.log(selectedSeats);
  $.ajax({
    type: "post",
    url: ruta + "/includes/scriptSesion.php",
    data: {
      seat: selectedSeats,
      tipo: type,
      sesion:idSesion,
      codigo:cod
    },
    success: function(response) {
      console.log(response);
      alert("Gracias por tu compra , tus entradas están en tu perfil");
      window.location.replace(ruta + "/index.php");
    }
  });
});