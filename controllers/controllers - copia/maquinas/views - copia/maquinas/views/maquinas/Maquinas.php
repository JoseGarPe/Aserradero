<?php 
require_once "../config/conexion.php";

class Maquina extends conexion
{
	private $id_maquina;
	private $nombre;
	private $descripcion;
	private $id_bodega;

	function __construct()
	{
		parent::__construct();

		$this->id_maquina ="";
		$this->nombre ="";
		$this->descripcion ="";
		$this->id_bodega ="";
	}

	public function getId_maquina(){
		return $this->id_maquina;
	}

	public function setId_maquina($idMaquina){
		$this->id_maquina= $idMaquina;
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

	public function setDescripcion($descrip){
		$this->descripcion= $descrip;
	}

	public function getId_bodega() {
        return $this->id_bodega;
    }

    public function setId_bodega($idBode) {
        $this->id_bodega = $idBode;
    }

    public function save(){

    	$query="INSERT INTO maquinas(id_maquina, nombre, descripcion,id_bodega) values(NULL,'".$this->nombre."','".$this->descripcion."','".$this->id_tipo_usuario."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE maquinas SET nombre='".$this->nombre."', descripcion='".$this->descripcion."', id_bodega='".$this->id_bodega."' WHERE id_maquina='".$this->id_maquina."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM maquinas WHERE id_maquina='".$this->id_maquina."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL(){
    	$query="SELECT u.id_maquina, u.nombre, u.descripcion,t.nombre as bode FROM maquinas u INNER JOIN bodegas t ON u.id_bodega = t.id_bodega";
    	$selectall=$this->db->query($query);
    	
    	$ListMaqui=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListMaqui;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM maquinas WHERE id_maquina='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListMaqui=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListMaqui;
    }



}



		

?>