<?php 
require_once "../../config/conexion.php";
class Tipo_movimiento extends conexion
{
private $id_tipo_movimiento;
private $nombre_movimiento;
private $descripcion_movimiento;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_tipo_movimiento= "";
        $this->nombre_movimiento = "";
        $this->descripcion_movimiento = "";

}

 	public function getId_tipo_movimiento() {
        return $this->id_tipo_movimiento;
    }

    public function setId_tipo_movimiento($id) {
        $this->id_tipo_movimiento = $id;
    }
    
    public function getNombre_movimiento() {
        return $this->nombre_movimiento;
    }

    public function setNombre_movimiento($nombre_movimiento) {
        $this->nombre_movimiento = $nombre_movimiento;
    }

    public function getDescripcion_movimiento() {
        return $this->descripcion_movimiento;
    }

    public function setDescripcion_movimiento($descripcion_movimiento) {
        $this->descripcion_movimiento = $descripcion_movimiento;
    }

public function save()
    {
    	$query="INSERT INTO `tipo_movimiento`(`id_tipo_movimiento`, `nombre_movimiento`, `descripcion_movimiento`) VALUES(NULL,'".$this->nombre_movimiento."','".$this->descripcion_movimiento."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE tipo_movimiento SET nombre_movimiento='".$this->nombre_movimiento."', descripcion_movimiento='".$this->descripcion_movimiento."' WHERE id_tipo_movimiento='".$this->id_tipo_movimiento."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM tipo_movimiento WHERE id_tipo_movimiento='".$this->id_tipo_movimiento."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM tipo_movimiento";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM tipo_movimiento WHERE id_tipo_movimiento='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

    


}
?>