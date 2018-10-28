<?php 
require_once "../config/conexion.php";

class Materiales extends conexion
{
	private $id_materiales;
	private $nombre;
	private $largo;
	private $grueso;
	private $ancho;
	private $m_cuadrados;
	private $id_categoria;

	function __construct()
	{
		parent::__construct();

		$this->id_materiales ="";
		$this->nombre ="";
		$this->largo ="";
		$this->grueso ="";
		$this->ancho ="";
		$this->m_cuadrados ="";
		$this->id_categoria ="";
	}







	public function getId_materiales(){
		return $this->id_materiales;
	}

	public function setId_materiales($idMateriales){
		$this->id_materiales= $idMateriales;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre= $nombre;
	}

	public function getLargo(){
		return $this->largo;
	}

	public function setLargo($largo){
		$this->largo= $largo;
	}

	public function getAncho(){
		return $this->ancho;
	}

	public function setAncho($ancho){
		$this->ancho= $ancho;
	}

	public function getGrueso(){
		return $this->grueso;
	}

	public function setGrueso($grueso){
		$this->grueso= $grueso;
	}

	public function getM_cuadrados(){
		return $this->m_cuadrados;
	}

	public function setM_cuadrados($m_cuadrados){
		$this->m_cuadrados= $m_cuadrados;
	}
	public function getId_tipo_materiales() {
        return $this->id_tipo_materiales;
    }

    public function setId_tipo_materiales($id_Tipomateriales) {
        $this->id_tipo_materiales = $id_Tipomateriales;
    }

    public function save(){

    	$query="INSERT INTO materiales(id_material, nombre, largo, ancho, grosor, m_cuadrados, id_categoria) values(NULL,'".$this->nombre."','".$this->largo."','".$this->ancho."','".$this->m_cuadrados."','".$this->grosor."','".$this->id_categoria."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE materialess SET nombre='".$this->nombre."', apellido='".$this->apellido."', correo='".$this->correo."', telefono='".$this->telefono."', contrasena='".$this->contrasena."', id_tipo_materiales='".$this->id_tipo_materiales."' WHERE id_materialess='".$this->id_materiales."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM materialess WHERE id_materialess='".$this->id_materiales."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL(){
    	$query="SELECT u.id_material, u.nombre, u.largo, u.ancho, u.grueso, u.m_cuadrados, t.nombre as categoria FROM materiales u INNER JOIN categorias t ON u.id_categoria = t.id_categoria";
    	$selectall=$this->db->query($query);
    	
    	$Listmateriales=$selectall->fetch_all(MYSQLI_ASSOC);

        return $Listmateriales;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM materialess WHERE id_materialess='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listmateriales=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listmateriales;
    }



}



		

?>