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
      setTimeout(function(){window.location.href = 'http://localhost/proyectos/BackendLPTUNNEL/index.php?action=admin_LISTADEPRECIOS';},2000);
    },
    error: function () {
      alert('Error al modificar Marca');
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


$(document).ready(function(){

  var title = $('#tituloHidden');
  $('#marca').html(title);

  $('#js-btn-modificar-marca').on('click', function(event){
    event.preventDefault();
    var mod = $("#modMarca").serializeArray();
    modificarMarca(mod[2].value,mod[0].value);
  });


});
