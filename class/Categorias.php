<?php  
require_on

require_once "../config/conexion.php";
class TipoUsuario extends conexion
{
private $id_categoria;
private $nombre;
private $descripcion;


public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_categoria= "";
        $this->nombre = "";
        $this->descripcion = "";

}

 	public function getId_categoria() {
        return $this->id_categoria;
    }

    public function setId_categoria$id) {
        $this->id_categoria = $id;
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
    	$query="INSERT INTO categorias(id_categoria,nombre,descripcion)
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
        $query="UPDATE categorias SET nombre='".$this->nombre."', descripcion='".$this->descripcion."' WHERE id_categoria='".$this->id_categoria."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM categorias WHERE id_categoria='".$this->id_categoria."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM categorias";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM categorias WHERE id_categoria='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }

    


}

 ?>