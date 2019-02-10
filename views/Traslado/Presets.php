<?php  
require_once "../../config/conexion.php";
class Presets extends conexion
{
private $id_preset;
private $nombre;
private $descripcion;


public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_preset= "";
        $this->nombre = "";
        $this->descripcion = "";

}

 	public function getId_preset() {
        return $this->id_preset;
    }

    public function setId_preset($id) {
        $this->id_preset = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
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
    	$query="INSERT INTO presets(id_preset,nombre,descripcion)
    			values(NULL,
    			'".$this->nombre."',
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
        $query="UPDATE presets SET nombre='".$this->nombre."', descripcion='".$this->descripcion."' WHERE id_preset='".$this->id_preset."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM presets WHERE id_preset='".$this->id_preset."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM presets";
        $selectall=$this->db->query($query);
        $Listpreset=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listpreset;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM presets WHERE id_preset='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listpreset=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listpreset;
    }

    


}

 ?>