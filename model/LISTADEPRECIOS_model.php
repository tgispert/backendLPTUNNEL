<?php

require_once 'vendor/autoload.php';
const DEFAULT_URL = 'https://tunnel-listas.firebaseio.com/';
const DEFAULT_TOKEN = '';
const DEFAULT_PATH = '';
const MARCAS_PATH = '/marcas';


class ListaDePreciosModel {

  private $firebase;

  function __construct() {
    $this->firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);
  }

  function getMarcas(){
    $marcas = $this->firebase->get(MARCAS_PATH);
    $marcas = json_decode($marcas, true);
    return $marcas;
  }

  /* function getMarcaById($id){
  }

  function agregarMarca($marca){
  }

  function borrarMarca($id_marca){
  }

  function modificarMarca($id_marca,$marca,$propiedad){
  } */

}
?>
