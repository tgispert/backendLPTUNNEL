<?php
include_once 'view/login_view.php';
include_once 'model/usuarios_model.php';

class LoginController {

  private $model;
  private $view;

  function __construct() {
    $this->model = new UsuariosModel();
    $this->view = new LoginView();
  }

  function logout(){
    session_start();
    session_destroy();
    header("Location: index.php?action=login");
    die();
  }

  function login(){
    if(isset($_REQUEST["txtUser"]) && isset($_REQUEST["txtPassword"]))
    {
      $email = $_REQUEST["txtUser"];
      $pass = $_REQUEST["txtPassword"];

      $usuario = $this->model->getUsuario($email);

      if(password_verify($pass, $usuario["password"]))
      {
        session_start();
        $_SESSION["email"] = $email;
        header("Location: index.php?action=admin_LISTADEPRECIOS");
        die();
      }
      else {
        $this->view->mostrarError("Usuario y password invalidos");
      }
    }
    $this->view->mostrar();
  }

}

?>
