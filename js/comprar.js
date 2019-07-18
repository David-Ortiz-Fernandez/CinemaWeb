 $('#comprar').click(function(){
     
    var idSala = document.getElementById("child1").value;
	var idCine = document.getElementById("father").value;
    var idFecha = $('#child2 option:selected').attr('id');
    
    var urlHref = window.location.href;
    var urlReferrer = document.referrer;
   

    var getId = urlHref.lastIndexOf("id=");
    var idPelicula = urlHref.split("=")[1];

    var lastSlash = urlReferrer.lastIndexOf('/');
    var ruta = urlReferrer.substring(0, lastSlash);


    window.location.href = ruta+"/checkout.php?id=" + idPelicula + "&sesion=" + idFecha;
    });