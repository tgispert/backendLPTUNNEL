var archivosMod;

$("#imagesToUpload").on("change",
  function(ev)
  {
    archivosMod = ev.target.files;
  }
);

function modificarMarca(idMarca,marca){
  loadingOn();
  $.ajax({
    method: 'PUT',
    url:'api/marca/' + idMarca + '/' + marca,
    datatype: 'JSON',
    success: function(){
      loadingOff();
      borrarImagen(idMarca);
      crearImagen(idMarca);
      setTimeout(function(){window.location.href = 'http://localhost/proyectos/Backend template/index.php?action=admin_LISTADEPRECIOS';},2000);
    },
    error: function () {
      alert('Error al modificar Marca');
    }
  });
}

function borrarImagen(id){
  var img = new FormData();
  $.each(archivosMod, function(key, value)
  {
    img.append(key, value);
  });
  $.ajax({
    type: "POST",
    url: "index.php?action=borrar_imagen&id_Marca=" + id,
    data: img,
    cache: false,
    processData: false,
    contentType: false,
  });
}

function crearImagen(lastId){
  var imgMod = new FormData();
  $.each(archivosMod, function(key, value)
  {
    imgMod.append(key, value);
  });
  $.ajax({
    type: "POST",
    url: "index.php?action=agregar_imagenes&id_Marca=" + lastId,
    data: imgMod,
    cache: false,
    processData: false,
    contentType: false,
  });
}

function loadingOn(){
  $("#loading-image")
      .removeClass("hidden");
}

function loadingOff(){
  $("#loading-image")
      .addClass("hidden");
}


$(document).ready(function(){

  var title = $('#tituloHidden');
  $('#marca').html(title);

  $('#js-btn-modificar-marca').on('click', function(event){
    event.preventDefault();
    var mod = $("#modMarca").serializeArray();
    modificarMarca(mod[2].value,mod[0].value);
  });


});
