<?php 
require_once "../config/conexion.php";
class Tipo_insumo extends conexion
{
private $id_tipo_insumo;
private $nombre_insumo;
private $descripcion_insumo;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_tipo_insumo= "";
        $this->nombre_insumo = "";
        $this->descripcion_insumo = "";

}

 	public function getId_tipo_insumo() {
        return $this->id_tipo_insumo;
    }

    public function setId_tipo_insumo($id) {
        $this->id_tipo_insumo = $id;
    }
    
    public function getNombre_insumo() {
        return $this->nombre_insumo;
    }

    public function setNombre_insumo($nombre_insumo) {
        $this->nombre_insumo = $nombre_insumo;
    }

    public function getDescripcion_insumo() {
        return $this->descripcion_insumo;
    }

    public function setDescripcion_insumo($descripcion_insumo) {
        $this->descripcion_insumo = $descripcion_insumo;
    }

public function save()
    {
    	$query="INSERT INTO `tipo_insumo`(`id_tipo_insumo`, `nombre_insumo`, `descripcion_insumo`) VALUES(NULL,'".$this->nombre_insumo."','".$this->descripcion_insumo."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE tipo_insumo SET nombre_insumo='".$this->nombre_insumo."', descripcion_insumo='".$this->descripcion_insumo."' WHERE id_tipo_insumo='".$this->id_tipo_insumo."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM tipo_insumo WHERE id_tipo_insumo='".$this->id_tipo_insumo."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM tipo_insumo";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM tipo_insumo WHERE id_tipo_insumo='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

    


}
?>