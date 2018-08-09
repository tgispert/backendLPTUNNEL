<?php

include_once 'libs/Smarty.class.php';

class LoginView {
  private $smarty;
  private $errores;

function __construct(){
  $this->smarty = new Smarty();
  $this->errores = array();
}

function mostrar(){
  $this->smarty->assign('errores', $this->errores);
  $this->smarty->display('login.tpl');
}

function mostrarError($error){
  array_push($this->errores, $error);
}

}


?>
