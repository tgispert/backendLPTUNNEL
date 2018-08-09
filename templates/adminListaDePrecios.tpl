<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de marcas</title>
    <link href="css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/loadingPopup.css">
  </head>

  <body>
    <a href="index.php?action=logout"><i class="fa fa-power-off"></i> Cerrar Sesión </a>



      <div id="page-wrapper">

        <div class="row">
        <div class="col-md-6 well">

          <h3>Agregar Marca
            <button id="js-refresh-marcas" type="button" class="btn btn-default btn-xs pull-right " aria-label="Refresh">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
            </button>
          </h3>

          <form id="submitMarca" action="index.php?action=agregar_marca" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="marca">Nombre</label>
              <input type="text" class="form-control" id="marca" name="marca" placeholder="Nombre" required>
            </div>

            <button id="js-button-marca" type="submit" class="btn btn-default">Agregar Marca</button>
          </form>

        </div>

        <div class="col-md-6">
          <ul id="listaMarca" class="list-group">
          </ul>
        </div>
      </div>
    </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <img id="loading-image" src="images/loading.gif" class="popup-loading hidden" alt="Loading..."></img>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.1.3/mustache.js"></script>
    <script src="js/LISTADEPRECIOSABM.js"></script>

  </body>
</html>
