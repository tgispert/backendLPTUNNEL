<?php
class UsuariosModel {

  private $db;

  function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=listadepreciosdb','root','');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  function getUsuario($email){
    $consulta = $this->db->prepare("SELECT * FROM usuario WHERE email = ?");
    $consulta->execute(array($email));
    return $consulta->fetch();
  }

}
?>
