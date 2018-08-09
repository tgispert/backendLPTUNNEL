<?php
require_once 'api_base.php';
require_once '../model/LISTADEPRECIOS_model.php';

class ListaDePreciosApi extends ApiBase {
  private $model;

  function __construct($request){
    parent::__construct($request);
    $this->model = new ListaDePreciosModel();
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

  function marca(){
    switch ($this->method) {
      case 'GET':
        if(count($this->args) > 0){
          return $this->model->getMarcaById($this->args[0]);
        }
        else {
          return $this->model->getMarcas();
        }
        break;
      case 'DELETE':
        if(count($this->args) > 0) return $this->model->borrarMarca($this->args[0]);
        break;
      case 'POST':
        if(isset($_POST['marca'])) return $this->model->agregarMarca($_POST);
        break;
      case 'PUT':
        if(count($this->args) > 0) return $this->model->modificarMarca($this->args[0],$this->args[1],$this->args[2]);
        break;
      default:
            return 'Verbo no soportado';
        break;
    }
  }

}

?>
