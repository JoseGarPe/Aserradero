<?php 
require_once "../config/conexion.php";

class OrdenProducto extends conexion
{
	private $id_orden_producto;
	private $id_bodega;
	private $cantidad;
	private $estado;
	private $fase;
    private $id_preset;
    private $id_maquina;

	function __construct()
	{
		parent::__construct();

		$this->id_orden_producto ="";
		$this->id_bodega ="";
		$this->cantidad ="";
		$this->estado ="";
		$this->fase ="";
		$this->id_preset ="";
        $this->id_maquina ="";
	}

	public function getId_orden_producto(){
		return $this->id_orden_producto;
	}

	public function setId_orden_producto($idorden_producto){
		$this->id_orden_producto= $idorden_producto;
	}

	public function getId_bodega(){
		return $this->id_bodega;
	}

	public function setId_bodega($id_bodega){
		$this->id_bodega= $id_bodega;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad= $cantidad;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($email){
		$this->estado= $email;
	}

	public function getFase(){
		return $this->fase;
	}

	public function setFase($fase){
		$this->fase= $fase;
	}

	public function getId_preset(){
		return $this->id_preset;
	}

	public function setId_preset($id_preset){
		$this->id_preset= $id_preset;
	}


    public function getId_maquina(){
        return $this->id_maquina;
    }

    public function setId_maquina($id_maquina){
        $this->id_maquina= $id_maquina;
    }
    public function save(){

    	$query="INSERT INTO orden_producto(id_orden_producto, id_bodega, cantidad, estado, fase, id_preset,fecha_orden,id_maquina) values(NULL,'".$this->id_bodega."','".$this->cantidad."','".$this->estado."','".$this->fase."','".$this->id_preset."',CURDATE(),'".$this->id_maquina."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE orden_producto SET id_bodega='".$this->id_bodega."', cantidad='".$this->cantidad."', estado='".$this->estado."', fase='".$this->fase."', id_preset='".$this->id_preset."' WHERE id_orden_producto='".$this->id_orden_producto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM orden_producto WHERE id_orden_producto='".$this->id_orden_producto."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM orden_producto WHERE id_orden_producto='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listorden_producto=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listorden_producto;
    }

      public function selectLast()
    {
        $query="SELECT * FROM orden_producto ORDER BY id_orden_producto DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }

      public function selectOrdenes($codigo)
    {
        $query="SELECT op.id_orden_producto, p.nombre as preset,b.nombre as bodega, op.cantidad,op.estado,op.fase,op.fecha_orden,ma.nombre as maquina,op.id_maquina FROM orden_producto op INNER JOIN presets p ON p.id_preset = op.id_preset INNER JOIN bodegas b ON b.id_bodega = op.id_bodega INNER JOIN maquinas ma ON ma.id_maquina = op.id_maquina WHERE op.id_preset ='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListOrdenes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListOrdenes;
    }

    public function changeStatus(){

    	$query="UPDATE orden_producto SET estado='".$this->estado."', fase='".$this->fase."' WHERE id_orden_producto='".$this->id_orden_producto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }

    public function changePhase(){

    	$query="UPDATE orden_producto SET  fase='".$this->fase."' WHERE id_orden_producto='".$this->id_orden_producto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }

    //--------------------------------------- CONSULTAS REPORTE------------------------------------------------------------//
    public function selectOrdenesDia($codigo)
    {
        $query="SELECT op.id_orden_producto, p.nombre as preset,b.nombre as bodega, op.cantidad,op.estado,op.fecha_orden,ma.nombre as maquina,op.id_maquina FROM orden_producto op INNER JOIN presets p ON p.id_preset = op.id_preset INNER JOIN bodegas b ON b.id_bodega = op.id_bodega INNER JOIN maquinas ma ON ma.id_maquina = op.id_maquina WHERE op.fecha_orden ='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListOrdenes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListOrdenes;
    }
    public function selectOrdenesMes($codigo)
    {
        $query="SELECT op.id_orden_producto, p.nombre as preset,b.nombre as bodega, op.cantidad,op.estado,op.fecha_orden,ma.nombre as maquina,op.id_maquina FROM orden_producto op INNER JOIN presets p ON p.id_preset = op.id_preset INNER JOIN bodegas b ON b.id_bodega = op.id_bodega INNER JOIN maquinas ma ON ma.id_maquina = op.id_maquina WHERE MONTH(op.fecha_orden) ='".$codigo."' AND YEAR(op.fecha_orden)=YEAR(NOW())";
        $selectall=$this->db->query($query);
        $ListOrdenes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListOrdenes;
    }
    public function selectOrdenesSemana($fecha1,$fecha2)
    {
        $query="SELECT op.id_orden_producto, p.nombre as preset,b.nombre as bodega, op.cantidad,op.estado,op.fecha_orden,ma.nombre as maquina,op.id_maquina FROM orden_producto op INNER JOIN presets p ON p.id_preset = op.id_preset INNER JOIN bodegas b ON b.id_bodega = op.id_bodega INNER JOIN maquinas ma ON ma.id_maquina = op.id_maquina WHERE op.fecha_orden BETWEEN '".$fecha1."' AND '".$fecha2."' ";
        $selectall=$this->db->query($query);
        $ListOrdenes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListOrdenes;
    }

}



		

?>