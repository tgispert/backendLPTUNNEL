var archivos;

function crearMarcaHTML(marca) {
  $.ajax({ url: 'js/templates/marca.mst',
     success: function(template) {
       var rendered = Mustache.render(template,marca);
       $('#listaMarca').append(rendered);
      }
    });
}

function crearMarca(){
  $.ajax({
    method: 'GET',
    url:'api/marca',
    datatype: 'JSON',
    success: function(marca){
      $('#listaMarca').html('');
      marca.forEach(function(marca){
         var html = crearMarcaHTML(marca);
        $('#listaMarca').append(html);
      });
    },
    error: function () {
      alert('Error al crear la Marca');
    }
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

function agregarMarca(marca){
  loadingOn();
  $.ajax({
    method: 'POST',
    url:'api/marca',
    datatype: 'JSON',
    data: marca,
    success: function(){
      getLastId();
      loadingOff();
    },
    error: function () {
      alert('Error al agregar la Marca');
    }
  });
}

function borrarMarca(idMarca){
  loadingOn();
  $.ajax({
    method: 'DELETE',
    url:'api/marca/' + idMarca,
    datatype: 'JSON',
    success: function(){
      loadingOff();
    },
    error: function () {
      alert('Error al borrar la Marca');
    }
  });
}

function modificarMarca(idMarca,marca,propiedad){
  loadingOn();
  $.ajax({
    method: 'PUT',
    url:'api/marca/' + idMarca + '/' + marca + '/' + propiedad,
    datatype: 'JSON',
    success: function(){
      loadingOff();
    },
    error: function () {
      alert('Error al modificar la Marca');
    }
  });
}

function getLastId(){
  var lastId;
  $.ajax({
  method: 'GET',
  url:'api/marca',
  datatype: 'JSON',
  success: function(marca){
    lastId = marca[marca.length-1]['id'];
    crearImagen(lastId);
  },
  error: function () {
    alert('Error al crear la imagen');
  }
  });
}

function crearImagen(lastId){
  var img = new FormData();
  $.each(archivos, function(key, value)
  {
    img.append(key, value);
  });
  $.ajax({
    type: "POST",
    url: "index.php?action=agregar_imagenes&idMarca=" + lastId,
    data: img,
    cache: false,
    processData: false,
    contentType: false,
  });
}


$(document).ready(function(){

  crearMarca();

  $('#js-refresh-marca').on('click', function(event){
    event.preventDefault();
    crearMarca();
  });

  $('#js-button-marca').on('click', function(event){
    event.preventDefault();
    var data = $("#submitMarca").serialize();
    agregarMarca(data);
  });

  $('body').on('click','a.js-borrar-marca', function(event){
    event.preventDefault();
    borrarMarca(this.getAttribute('idMarca'));
  });

});
