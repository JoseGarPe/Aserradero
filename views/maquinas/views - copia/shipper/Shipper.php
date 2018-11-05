<?php 
require "../../config/conexion.php";

class Shipper extends conexion
{
	private $id_shipper;
	private $nombre;
	private $descripcion;

	function __construct()
	{
		parent::__construct();
		$this->id_shipper ="";
		$this->nombre ="";
		$this->descripcion ="";
	}

	public function getId_shipper(){
		return $this->id_shipper;
	}

	public function setId_shipper($idshipper){
		$this->id_shipper= $id_shipper;
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

    	$query="INSERT INTO shipper(id_shipper, nombre, descripcion) values(NULL,'".$this->nombre."','".$this->descripcion."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE shipper SET nombre='".$this->nombre."', descripcion='".$this->descripcion."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM shipper WHERE id_shipper='".$this->id_shipper."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM shipper";
        $selectall=$this->db->query($query);
        $ListShipper=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListShipper;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM shipper WHERE id_shipper='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListShipper=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListShipper;
    }



}



		

?>