<?php
include_once 'view/LISTADEPRECIOS_view.php';
include_once 'model/LISTADEPRECIOS_model.php';

class DisplayController {

  private $model;
  private $view;

  function __construct() {
    $this->model = new ListaDePreciosModel();
    $this->view = new ListaDePreciosView();
  }

  function mostrarHome(){
    $this->view->mostrarHome($this->model->getMarcas());
  }

}
?>
