<?php

include_once 'libs/Smarty.class.php';

class ListaDePreciosView {
  private $smarty;
  private $errores;

  function __construct(){
    $this->smarty = new Smarty();
    $this->errores = array();
  }

  function mostrarHome($marcas){
    $this->smarty->assign('marcas', $marcas);
    $this->smarty->display('index.tpl');
  }

  function mostrarAdminListaDePrecios($marcas){
    $this->smarty->assign('errores', $this->errores);
    $this->smarty->assign('marca', $marcas);
    $this->smarty->display('adminListaDePrecios.tpl');
  }

  function mostrarAdminListaDePreciosmarca($marca){
    $this->smarty->assign('marca', $marca);
    $this->smarty->display('admin/marca.tpl');
  }

  function mostrarError($error){
    array_push($this->errores, $error);
  }

}
?>
