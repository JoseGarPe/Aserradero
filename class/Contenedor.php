<?php 
require_once "../config/conexion.php";

class Contenedores extends conexion
{
	private $id_contenedor;
	private $etiqueta;
	private $piezas;
	private $multiplo;
	private $m_cuadrados;
	private $tarimas;
	private $id_bodega;
	private $id_packing_list;

	function __construct()
	{
		parent::__construct();

		$this->id_contenedor ="";
		$this->etiqueta ="";
		$this->piezas ="";
		$this->multiplo ="";
		$this->m_cuadrados ="";
		$this->tarimas ="";
		$this->id_bodega ="";
		$this->id_packing_list ="";
	}

	public function getId_contenedor(){
		return $this->id_contenedor;
	}

	public function setId_contenedor($idContenedores){
		$this->id_contenedor= $idContenedores;
	}

	public function getEtiqueta(){
		return $this->etiqueta;
	}

	public function setEtiqueta($etiqueta){
		$this->etiqueta= $etiqueta;
	}

	public function getPiezas(){
		return $this->piezas;
	}

	public function setPiezas($piezas){
		$this->piezas= $piezas;
	}

	public function getMultiplo(){
		return $this->multiplo;
	}

	public function setMultiplo($email){
		$this->multiplo= $email;
	}

	public function getM_cuadrados(){
		return $this->m_cuadrados;
	}

	public function setM_cuadrados($m_cuadrados){
		$this->m_cuadrados= $m_cuadrados;
	}

	public function getTarimas(){
		return $this->tarimas;
	}

	public function setTarimas($tarimas){
		$this->tarimas= $tarimas;
	}
	public function getId_bodega() {
        return $this->id_bodega;
    }

    public function setId_bodega($id_bodega) {
        $this->id_bodega = $id_bodega;
    }
	public function getId_packing_list() {
        return $this->id_packing_list;
    }

    public function setId_packing_lista($id_packing_list) {
        $this->id_packing_list = $id_packing_list
    }

    public function save(){

    	$query="INSERT INTO contenedoress(id_contenedors, etiqueta, piezas, multiplo, m_cuadrados, tarimas, id_bodega,id_packing_list) values(NULL,'".$this->etiqueta."','".$this->piezas."','".$this->multiplo."','".$this->m_cuadrados."','".$this->tarimas."','".$this->id_bodega."','".$this->id_packing_list."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE contenedoress SET etiqueta='".$this->etiqueta."', piezas='".$this->piezas."', multiplo='".$this->multiplo."', m_cuadrados='".$this->m_cuadrados."', tarimas='".$this->tarimas."', id_bodega='".$this->id_bodega."', id_packing_list='".$this->id_packing_list."' WHERE id_contenedor='".$this->id_contenedor."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM Contenedoress WHERE id_contenedors='".$this->id_contenedor."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL(){
    	$query="SELECT * FROM contenedores ";
    	$selectall=$this->db->query($query);
    	
    	$ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListContenedores;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM contenedores WHERE id_contenedor='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListContenedores;
    }
     public function selectALLpack($codigo)
    {
        $query="SELECT * FROM contenedores WHERE id_packing_list='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListContenedores;
    }



}



		

?>