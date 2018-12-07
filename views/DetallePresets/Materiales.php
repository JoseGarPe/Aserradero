<?php 
require_once "../../config/conexion.php";

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
	public function getId_categoria() {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria= $id_categoria;
    }

    public function save(){

    	$query="INSERT INTO materiales(id_material, nombre, largo, ancho, grueso, m_cuadrados, id_categoria) values(NULL,'".$this->nombre."','".$this->largo."','".$this->ancho."','".$this->grueso."','".$this->m_cuadrados."','".$this->id_categoria."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
 public function update(){

    	$query="UPDATE materiales SET nombre='".$this->nombre."', largo='".$this->largo."', ancho='".$this->ancho."', grueso='".$this->grueso."', m_cuadrados='".$this->m_cuadrados."', id_categoria='".$this->id_categoria."' WHERE id_material='".$this->id_materiales."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM materiales WHERE id_material='".$this->id_materiales."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }    public function selectALL(){
    	$query="SELECT u.id_material, u.nombre, u.largo, u.ancho, u.grueso, u.m_cuadrados, t.nombre as categoria FROM materiales u INNER JOIN categorias t ON u.id_categoria = t.id_categoria";
    	$selectall=$this->db->query($query);
    	
    	$Listmateriales=$selectall->fetch_all(MYSQLI_ASSOC);

        return $Listmateriales;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM materiales WHERE id_material='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listmateriales=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listmateriales;
    }
     public function selectALL1($codigo)
    {
        $query="SELECT * FROM materiales";
        $selectall=$this->db->query($query);
       $Listmateriales=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listmateriales;
    }
        public function selectOneDet($codigo)
    {
        $query="SELECT u.id_material, u.nombre, u.largo, u.ancho, u.grueso, u.m_cuadrados, t.nombre as categoria FROM materiales u INNER JOIN categorias t ON u.id_categoria = t.id_categoria WHERE id_material='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listmateriales=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listmateriales;
    }
    public function selectALL_CA($codigo)
    {
        $query="SELECT * FROM materiales WHERE id_categoria='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listmateriales=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listmateriales;
    }
    public function selectCAT()
    {
        $query="SELECT * FROM categorias WHERE nombre != 'Finalizados'";
        $selectall=$this->db->query($query);
       $Listmateriales=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listmateriales;
    }


}



		

?>