<?php 
require_once "../../config/conexion.php";
class Bodega extends conexion
{
private $id_bodega;
private $nombre;
private $ubicacion;
private $descripcion;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_bodega= "";
        $this->nombre = "";
        $this->ubicacion = "";
        $this->descripcion = "";

}

 	public function getId_bodega() {
        return $this->id_bodega;
    }

    public function setId_bodega($id) {
        $this->id_bodega = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
      public function getUbicacion() {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
public 
//---------------------------
function save()
    {
    	$query="INSERT INTO bodegas(id_bodega,nombre,ubicacion,descripcion)
    			values(NULL,
    			'".$this->nombre."',
    			'".$this->ubicacion."',
                '".$this->descripcion."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE bodegas SET nombre='".$this->nombre."', ubicacion='".$this->ubicacion."', descripcion='".$this->descripcion."' WHERE id_bodega='".$this->id_bodega."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM bodegas WHERE id_bodega='".$this->id_bodega."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM bodegas";
        $selectall=$this->db->query($query);
        $Listubicacion=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listubicacion;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM bodegas WHERE id_bodega='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listubicacion=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listubicacion;
    }

    


}
?>