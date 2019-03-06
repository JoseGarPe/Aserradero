<?php 
require_once "../../config/conexion.php";

class Naves extends conexion
{
	private $id_nave;
	private $nombre;
	private $descripcion;

	function __construct()
	{
		parent::__construct();
		$this->id_nave ="";
		$this->nombre ="";
		$this->descripcion ="";
	}

	public function getId_nave(){
		return $this->id_nave;
	}

	public function setId_nave($idNave){
		$this->id_nave= $idNave;
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

    	$query="INSERT INTO nave(id_nave, nombre, descripcion) values(NULL,'".$this->nombre."','".$this->descripcion."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE nave SET nombre='".$this->nombre."', descripcion='".$this->descripcion."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM nave WHERE id_nave='".$this->id_nave."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM nave";
        $selectall=$this->db->query($query);
        $ListNave=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListNave;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM nave WHERE id_nave='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListNave=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListNave;
    }



}



		

?>