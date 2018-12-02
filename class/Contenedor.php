<?php 
require_once "../config/conexion.php";

class Contenedores extends conexion
{
	private $id_contenedor;
	private $etiqueta;
	private $piezas;
    private $n_paquetes;
	private $multiplo;
	private $m_cuadrados;
	private $tarimas;
	private $id_bodega;
	private $id_packing_list;
    private $id_material;
    private $bodega_pendiente;
    private $estado;

	function __construct()
	{
		parent::__construct();

		$this->id_contenedor ="";
		$this->etiqueta ="";
		$this->piezas ="";
        $this->n_paquetes ="";
		$this->multiplo ="";
		$this->m_cuadrados ="";
		$this->tarimas ="";
		$this->id_bodega ="";
		$this->id_packing_list ="";
        $this->n_paquetes ="";
        $this->id_material ="";
        $this->bodega_pendiente ="";
        $this->estado ="";
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
    public function getN_paquetes(){
        return $this->n_paquetes;
    }

    public function setN_paquetes($npack){
        $this->n_paquetes= $npack;
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

    public function setId_packing_list($id_packing_list) {
        $this->id_packing_list = $id_packing_list;
    }
    public function getId_material() {
        return $this->id_material;
    }

    public function setId_material($id_material) {
        $this->id_material = $id_material;
    }
    public function getBodega_pendiente() {
        return $this->bodega_pendiente;
    }

    public function setBodega_pendiente($bodega_pendiente) {
        $this->bodega_pendiente = $bodega_pendiente;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function save(){

    	$query="INSERT INTO contenedores(id_contenedor, etiqueta, piezas,multiplo, m_cuadrados, tarimas, id_bodega,id_packing_list,n_paquetes,id_material,bodega_pendiente,estado) values(NULL,'".$this->etiqueta."','".$this->piezas."','".$this->multiplo."','".$this->m_cuadrados."','".$this->tarimas."','NULL','".$this->id_packing_list."','".$this->n_paquetes."','".$this->id_material."','".$this->id_bodega."','".$this->estado."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE contenedores SET etiqueta='".$this->etiqueta."', piezas='".$this->piezas."', multiplo='".$this->multiplo."', m_cuadrados='".$this->m_cuadrados."', tarimas='".$this->tarimas."', id_packing_list='".$this->id_packing_list."', n_paquetes='".$this->n_paquetes."', id_material='".$this->id_material."', bodega_pendiente='".$this->id_bodega."' WHERE id_contenedor='".$this->id_contenedor."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM contenedores WHERE id_contenedors='".$this->id_contenedor."'"; 
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