<?php
class ListaDePreciosModel {

  private $db;
  private $user = 'root';
  private $pass = '';

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;dbname=listadepreciosdb',$this->user,$this->pass);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  function getMarcas(){
    $marcas = array();
    $consulta = $this->db->prepare("SELECT * FROM marca");
    $consulta->execute();
    $marcas = $consulta->fetchAll();
    return $marcas;
  }

  function getMarcaById($id){
    $consulta = $this->db->prepare("SELECT * FROM marca WHERE id=?");
    $consulta->execute(array($id['idMarca']));
    $marca = $consulta->fetch();
    $consulta1 = $this->db->prepare("SELECT * FROM imagen where fk_id_marca=?");
    $consulta1->execute(array($marca['id']));
    $imagen = $consulta1->fetch();
    $marca['imagen'] = $imagen['ruta'];
    return $marca;
  }

  function agregarMarca($marca){
    $consulta = $this->db->prepare('INSERT INTO marca(marca,propiedad) VALUES(?,?)');
    $string = "<p>".ereg_replace("(\r\n\r\n|\n\n|\r\r)", "</p><p>", $marca['propiedad'])."</p>";
    $consulta->execute(array($marca['marca'],$string));
  }

  function borrarMarca($id_marca){
    $consultaImg = $this->db->prepare('SELECT * FROM imagen WHERE fk_id_marca=?');
    $consultaImg->execute(array($id_marca));
    $imagenes = $consultaImg->fetchAll();
    foreach ($imagenes as $imagen) {
      unlink('../'.$imagen['ruta']);
    }
    $consulta = $this->db->prepare('DELETE FROM marca WHERE id=?');
    $consulta->execute(array($id_marca));
  }

  function modificarMarca($id_marca,$marca,$propiedad){
    $consulta = $this->db->prepare('UPDATE marca SET marca=?, propiedad=? WHERE id=?');
    $consulta->execute(array($marca,$propiedad,$id_marca));
  }

}
?>
