<?php

require_once 'vendor/autoload.php';
const DEFAULT_URL = 'https://tunnel-listas.firebaseio.com/';
const DEFAULT_TOKEN = '';
const DEFAULT_PATH = '/test';
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

  function getMarcaById($id){
    $marca = $this->firebase->get(MARCAS_PATH . '/' . $id);
    $marca = json_decode($marca, true);
    return $marca;
  }

  function agregarMarca($marca){
    $this->firebase->set(DEFAULT_PATH,$marca);
  }

  function borrarMarca($id_marca){
    $path = DEFAULT_PATH . '/' . $id_marca;
    $this->firebase->delete($path); 
  }

  function modificarMarca($id_marca,$marca){
    $path = DEFAULT_PATH . '/' . $id_marca;
    $firebase->update($path, $marca);
  }

}
?>
