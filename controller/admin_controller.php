<?php
include_once 'view/LISTADEPRECIOS_view.php';
include_once 'model/LISTADEPRECIOS_model.php';

class AdminController {

  private $model;
  private $view;

  function __construct() {
    $this->model = new ListaDePreciosModel();
    $this->view = new ListaDePreciosView();
    $this->checkSession();
  }

  function checkSession(){
    $time = 60000;
    session_start();
    if(isset($_SESSION["email"])){
      if(isset($_SESSION["timeout"]) && time() > $_SESSION["timeout"] + $time){
        session_destroy();
      }
      else{
        $_SESSION["timeout"] = time();
      }
    }
    else{
      header("Location: index.php?action=login");
      die();
    }
  }

  function mostrarAdminListaDePrecios(){
    $this->view->mostrarAdminListaDePrecios($this->model->getMarcas());
  }

  function mostrarAdminListaDePreciosMarca(){
    $this->view->mostrarAdminListaDePreciosMarca($this->model->getMarcaById($_REQUEST));
  }

  function agregarMarca(){
    if(isset($_REQUEST['marca'])){
        $this->model->agregarMarca($_REQUEST);
      }
    else{
      $this->view->mostrarError('Debe completar todos los campos');
    }
    $this->mostrarAdminListaDePrecios();
  }

  function borrarMarca(){
    if(isset($_REQUEST['id_marca'])){
      $this->model->borrarMarca($_REQUEST['id_marca']);
    }
    else{
      $this->view->mostrarError('El Marca que intenta borrar no existe');
    }
    $this->mostrarAdminListaDePrecios();
  }

  function modificarMarca(){
      if(isset($_REQUEST['id_marca'])){
        $this->model->modificarMarca($_REQUEST['id_marca'],$_REQUEST['marca'],$_REQUEST['propiedad']);
      }
      else{
        $this->view->mostrarError('Error al modificar Marca');
      }
      $this->mostrarAdminListaDePrecios();
  }

  function agregarImagenes(){
    if(isset($_REQUEST['id_marca']) && isset($_FILES)){
      $this->model->agregarImagenes($_REQUEST['id_marca'], $_FILES);
    }
    else{
      $this->view->mostrarError('Faltaron ingresar datos');
    }
    $this->mostrarAdminListaDePrecios();
  }

  function borrarImagen(){
    if(isset($_REQUEST['id_marca'])){
      $this->model->borrarImagen($_REQUEST['id_marca']);
    }
    else{
      $this->view->mostrarError('La imagen que intenta borrar no existe');
    }
    $this->mostrarAdminListaDePrecios();
  }

}
?>
