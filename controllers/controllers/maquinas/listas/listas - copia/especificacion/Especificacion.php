<?php 
require_once "../../config/conexion.php";

class Especificacion extends conexion
{
	private $id_especificacion;
	private $nombre;
	private $descripcion;

	function __construct()
	{
		parent::__construct();
		$this->id_especificacion ="";
		$this->nombre ="";
		$this->descripcion ="";
	}

	public function getId_especificacion(){
		return $this->id_especificacion;
	}

	public function setId_especificacion($idEspecificacion){
		$this->id_especificacion= $idEspecificacion;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre= $nombre;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion= $descripcion;
	}



    public function save(){

    	$query="INSERT INTO especificacion(id_especificacion, nombre, descripcion) values(NULL,'".$this->nombre."','".$this->descripcion."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE especificacion SET nombre='".$this->nombre."', descripcion='".$this->descripcion."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM especificacion WHERE id_especificacion='".$this->id_especificacion."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM especificacion";
        $selectall=$this->db->query($query);
        $ListEspecificacion=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListEspecificacion;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM especificacion WHERE id_especificacion='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListEspecificacion=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListEspecificacion;
    }



}



		

?>