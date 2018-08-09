<?php
include_once 'config/config_app.php';
include_once 'controller/admin_controller.php';
include_once 'controller/display_controller.php';
include_once 'controller/login_controller.php';


if(!array_key_exists(ConfigApp::$ACTION, $_REQUEST) ||
$_REQUEST[ConfigApp::$ACTION] == ConfigApp::$ACTION_DEFAULT)
{
  $displayController = new DisplayController();
  $displayController->mostrarHome();
}
else {

  switch ($_REQUEST[ConfigApp::$ACTION]) {
    case ConfigApp::$ACTION_ADMIN_LISTADEPRECIOS:
      $adminController = new AdminController();
      $adminController->mostrarAdminListaDePrecios();
      break;
    case ConfigApp::$ACTION_AGREGAR_IMAGENES:
      $adminController = new AdminController();
      $adminController->agregarImagenes();
      break;
    case ConfigApp::$ACTION_ADMIN_MARCA:
      $adminController = new AdminController();
      $adminController->mostrarAdminListaDePreciosMarca();
      break;
    case ConfigApp::$ACTION_BORRAR_IMAGEN:
      $adminController = new AdminController();
      $adminController->borrarImagen();
      break;
    case ConfigApp::$ACTION_MODIFICAR_MARCA:
      $adminController = new AdminController();
      $adminController->modificarMarca();
      break;
    case ConfigApp::$ACTION_LOGIN:
      $loginController = new LoginController();
      $loginController->login();
      break;
    case ConfigApp::$ACTION_LOGOUT:
      $loginController = new LoginController();
      $loginController->logout();
      break;
    default:
      echo 'Pagina no encontrada';
      break;
  }

}

?>
