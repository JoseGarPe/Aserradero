<?php 
require_once "../../config/conexion.php";

class Paquetes extends conexion
{
	private $id_paquete;
    private $id_material;
	private $etiqueta;
	private $piezas;
	private $id_packing_list;

	function __construct()
	{
		parent::__construct();

		$this->id_paquete ="";
		$this->etiqueta ="";
		$this->piezas ="";
		$this->id_packing_list ="";
        $this->id_material ="";
	}

	public function getId_paquete(){
		return $this->id_paquete;
	}

	public function setId_paquete($idPaquetes){
		$this->id_paquete= $idPaquetes;
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

    	$query="INSERT INTO paquetes(id_paquete, etiqueta, piezas,id_packing_list,id_material) values(NULL,'".$this->etiqueta."','".$this->piezas."','".$this->id_packing_list."','".$this->id_material."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE paquetes SET etiqueta='".$this->etiqueta."', piezas='".$this->piezas."', multiplo='".$this->multiplo."', m_cuadrados='".$this->m_cuadrados."', tarimas='".$this->tarimas."', id_packing_list='".$this->id_packing_list."', n_paquetes='".$this->n_paquetes."', id_material='".$this->id_material."', bodega_pendiente='".$this->id_bodega."' WHERE id_paquete='".$this->id_paquete."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM Paquetes WHERE id_paquetes='".$this->id_paquete."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL(){
    	$query="SELECT * FROM Paquetes ";
    	$selectall=$this->db->query($query);
    	
    	$ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListPaquetes;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM Paquetes WHERE id_paquete='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
     public function selectALLpack($codigo)
    {
        $query="SELECT con.*, m.nombre as material FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material WHERE con.id_packing_list='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }

 public function selectALLpackOne($codigo)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor WHERE con.id_paquete='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
//------------------PROYECCIONES---------------------------//
     public function selectALL_estado($codigo)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor WHERE con.estado='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
     public function selectALLpack_fechas($fecha1,$fecha2)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor WHERE con.fecha_ingreso BETWEEN '".$fecha1."' AND '".$fecha2."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
         public function selectALLpack_contenedor($contenedor,$bodega)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor WHERE c.etiqueta = '".$contenedor."' AND con.id_bodega='".$bodega."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
 //pAQUETES POR BODEGA
    public function selectALLpack_Bodega()
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor, pl.tipo_ingreso FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor INNER JOIN packing_list pl ON pl.id_packing_list = con.id_packing_list WHERE pl.tipo_ingreso='Importacion' ORDER BY con.id_bodega";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
     public function selectALLpack_BodegaEs($estado)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor, pl.tipo_ingreso FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor INNER JOIN packing_list pl ON pl.id_packing_list = con.id_packing_list WHERE pl.tipo_ingreso='Importacion' AND con.estado ='".$estado."' ORDER BY con.id_bodega";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
    public function selectALLpack_BodegaEs_local($estado)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor, pl.tipo_ingreso FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor INNER JOIN packing_list pl ON pl.id_packing_list = con.id_packing_list WHERE pl.tipo_ingreso='Local' AND con.estado ='".$estado."' ORDER BY con.id_bodega";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
     public function selectALLpack_Bodega_local()
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor, pl.tipo_ingreso FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor INNER JOIN packing_list pl ON pl.id_packing_list = con.id_packing_list WHERE pl.tipo_ingreso='Local' ORDER BY con.id_bodega";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
    public function countPaquetesBodegaImport($codigo,$estado)
    {
        $query="SELECT COUNT(p.id_paquete) as total, SUM(p.metros_cubicos) as metroCubic,pl.tipo_ingreso FROM paquetes p INNER JOIN packing_list pl ON pl.id_packing_list = p.id_packing_list WHERE p.id_bodega='".$codigo."' AND p.estado='".$estado."' AND pl.tipo_ingreso='Importacion' ";
        $selectall=$this->db->query($query);
       $ListPacking=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPacking;
    }

    public function countPaquetesBodegaLocal($codigo,$estado)
    {
        $query="SELECT COUNT(p.id_paquete) as total, SUM(p.metros_cubicos) as metroCubic,pl.tipo_ingreso FROM paquetes p INNER JOIN packing_list pl ON pl.id_packing_list = p.id_packing_list WHERE p.id_bodega='".$codigo."' AND p.estado='".$estado."' AND pl.tipo_ingreso='Local'";
        $selectall=$this->db->query($query);
       $ListPacking=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPacking;
    }

}



		

?>