<?php 
require_once "../config/conexion.php";

class Paquetes extends conexion
{
	private $id_paquete;
    private $id_material;
	private $etiqueta;
	private $piezas;
	private $id_packing_list;
    private $id_bodega;
    private $largo;
    private $grueso;
    private $ancho;
    private $metros_cubicos;
    private $estado;
    private $fecha_ingreso;
    private $multiplo;
    private $id_contenedor;
    private $stock;


	function __construct()
	{
		parent::__construct();

		$this->id_paquete ="";
		$this->etiqueta ="";
		$this->piezas ="";
		$this->id_packing_list ="";
        $this->id_material ="";
        $this->largo ="";
        $this->grueso ="";
        $this->ancho ="";
        $this->fecha_ingreso ="";
        $this->multiplo ="";
        $this->estado ="";
        $this->metros_cubicos ="";
        $this->id_bodega ="";
        $this->id_contenedor ="";
        $this->stock ="";

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
 

	public function getMultiplo(){
		return $this->multiplo;
	}

	public function setMultiplo($email){
		$this->multiplo= $email;
	}

	public function getMetros_cubicos(){
		return $this->metros_cubicos;
	}

	public function setMetros_cubicos($metros_cubicos){
		$this->metros_cubicos= $metros_cubicos;
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
  
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
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
    public function getFecha_ingreso(){
        return $this->fecha_ingreso;
    }

    public function setFecha_ingreso($fecha_ingreso){
        $this->fecha_ingreso= $fecha_ingreso;
    }
    public function getId_contenedor() {
        return $this->id_contenedor;
    }

    public function setId_contenedor($id_contenedor) {
        $this->id_contenedor = $id_contenedor;
    }
    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this-$stock = $stock;
    }



    public function save(){

    	$query="INSERT INTO paquetes(id_paquete, etiqueta, piezas,id_packing_list,id_material,largo, ancho, grueso, metros_cubicos,multiplo,fecha_ingreso,estado,id_bodega,id_contenedor,stock) values(NULL,'".$this->etiqueta."','".$this->piezas."','".$this->id_packing_list."','".$this->id_material."','".$this->largo."','".$this->ancho."','".$this->grueso."','".$this->metros_cubicos."','".$this->multiplo."','".$this->fecha_ingreso."','".$this->estado."','".$this->id_bodega."','".$this->id_contenedor."','".$this->piezas."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

    	$query="UPDATE paquetes SET etiqueta='".$this->etiqueta."', piezas='".$this->piezas."', multiplo='".$this->multiplo."', metros_cubicos='".$this->metros_cubicos."', tarimas='".$this->tarimas."', id_packing_list='".$this->id_packing_list."', n_paquetes='".$this->n_paquetes."', id_material='".$this->id_material."', bodega_pendiente='".$this->id_bodega."' WHERE id_paquete='".$this->id_paquete."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM paquetes WHERE id_paquete='".$this->id_paquete."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL(){
    	$query="SELECT * FROM paquetes";
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
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor WHERE con.id_packing_list='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
     public function selectALLpack11($codigo,$packing)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor WHERE con.id_packing_list='".$codigo."' AND c.id_contenedor='".$packing."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
    public function selectALLpack2($codigo)
    {
        $query="SELECT con.*, m.nombre as material FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material WHERE con.id_paquete='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
    public function selectALLpack3()
    {
        $query="SELECT con.*, m.nombre as material FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
      public function selectALLpack4($codigo,$contenedor)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor WHERE con.id_packing_list='".$codigo."' AND con.id_contenedor='".$contenedor."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
       public function selectPack_Bodega()
    {
        $query="SELECT p.id_paquete, p.piezas,p.id_material , p.etiqueta, pl.id_packing_list, pl.numero_factura,pl.shipper, m.nombre, b.nombre as bodega FROM paquetes p INNER JOIN packing_list pl ON pl.id_packing_list = p.id_packing_list  INNER JOIN materiales m on m.id_material = p.id_material INNER JOIN bodegas b on b.id_bodega=p.id_bodega WHERE p.stock > 0 AND p.estado='Confirmado'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }

 public function selectOneM($codigo)
    {
        $query="SELECT * FROM paquetes WHERE etiqueta='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
 public function updateC()
    {
        $query="UPDATE paquetes SET stock=0 WHERE etiqueta='".$this->etiqueta."' AND id_material='".$this->id_material."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }

    public function selectExistente($codigo)
    {
        $query="SELECT * FROM paquetes WHERE etiqueta='".$codigo."'";
        $selectall=$this->db->query($query);
        if ($selectall->num_rows==0) {
            return "Disponible";
        }else{
            return "No Disponible";
        }
    }
 public function updateEtiqueta()
    {
        if ($this->etiqueta == 'POSEE') {
             $query="UPDATE paquetes SET estado='Confirmado' WHERE id_paquete='".$this->id_paquete."'";
            $update=$this->db->query($query);
            if ($update==true) {
                return 'Disponible';
            }else {
                return 'Error';
            } 
        }else{
             $query1="SELECT * FROM paquetes WHERE etiqueta='".$this->etiqueta."'";
        $selectall=$this->db->query($query1);
        if ($selectall->num_rows==0) {
             $query="UPDATE paquetes SET etiqueta='".$this->etiqueta."' WHERE id_paquete='".$this->id_paquete."'";
            $update=$this->db->query($query);
            if ($update==true) {
                return 'Disponible';
            }else {
                return 'Error';
            } 
        }
        else{
            return 'No Disponible';
        }
        
        }

       

    }
    //------------------PROYECCIONES---------------------------//
     public function selectALL_estado($codigo,$material)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor WHERE con.id_material = '".$material."' AND con.estado='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
      public function selectALL_estado_metros($codigo,$material)
    {
        $query="SELECT SUM(con.metros_cubicos) AS metros_cub, m.nombre as material  FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material WHERE con.id_material = '".$material."' AND con.estado='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
     public function selectALLpack_fechas($fecha1,$fecha2,$material)
    {
        $query="SELECT con.*, m.nombre as material, b.nombre as bodega, c.etiqueta as contenedor FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material INNER JOIN bodegas b ON b.id_bodega = con.id_bodega INNER JOIN contenedores c ON c.id_contenedor = con.id_contenedor WHERE con.id_material = '".$material."' AND con.fecha_ingreso BETWEEN '".$fecha1."' AND '".$fecha2."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
    }
     public function selectALLpack_fechas_metros($fecha1,$fecha2,$material)
    {
        $query="SELECT SUM(con.metros_cubicos) AS metros_cub, m.nombre as material FROM paquetes con INNER JOIN materiales m ON m.id_material = con.id_material WHERE con.id_material = '".$material."' AND con.fecha_ingreso BETWEEN '".$fecha1."' AND '".$fecha2."'";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
   }
   // PROYECCIONES SEGUN PROVEEDOR
   //general
   public function selectALLShippers()
    {
        $query="SELECT shipper ,COUNT(shipper) as proveedores, SUM(contenedores_ingresados) AS TOTAL FROM packing_list GROUP BY shipper HAVING COUNT(*)";
        $selectall=$this->db->query($query);
       $ListPaquetes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquetes;
   }

   public function selectShipperNP($codigo)
    {
        $query="SELECT COUNT(p.id_paquete) as N_Paquetes, pl.shipper FROM paquetes p INNER JOIN packing_list pl on pl.id_packing_list = p.id_packing_list WHERE pl.shipper = '".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPaquete=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquete;
   }

  public function selectShipperMCT($codigo,$materia)
    {
        $query="SELECT SUM(p.metros_cubicos) as metroCubicot, p.multiplo, (SUM(p.metros_cubicos) / p.multiplo) as tarima FROM paquetes p INNER JOIN packing_list pl ON pl.id_packing_list = p.id_packing_list WHERE pl.shipper='".$codigo."' AND p.id_material ='".$materia."'";
        $selectall=$this->db->query($query);
       $ListPaquete=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquete;
   }
   // por estado
 
   public function selectShipperNP_status($codigo,$estado)
    {
        $query="SELECT COUNT(p.id_paquete) as N_Paquetes, pl.shipper FROM paquetes p INNER JOIN packing_list pl on pl.id_packing_list = p.id_packing_list WHERE pl.shipper = '".$codigo."' AND p.estado='".$estado."'";
        $selectall=$this->db->query($query);
       $ListPaquete=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquete;
   }

  public function selectShipperMCT_status($codigo,$materia,$estado)
    {
        $query="SELECT SUM(p.metros_cubicos) as metroCubicot, p.multiplo, (SUM(p.metros_cubicos) / p.multiplo) as tarima FROM paquetes p INNER JOIN packing_list pl ON pl.id_packing_list = p.id_packing_list WHERE pl.shipper='".$codigo."' AND p.id_material ='".$materia."'  AND p.estado='".$estado."'";
        $selectall=$this->db->query($query);
       $ListPaquete=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquete;
   }
 public function selectTotalMCT_status($materia,$estado)
    {
        $query="SELECT p.metros_cubicos, p.multiplo FROM paquetes p INNER JOIN packing_list pl ON pl.id_packing_list = p.id_packing_list WHERE p.id_material ='".$materia."'  AND p.estado='".$estado."'";
        $selectall=$this->db->query($query);
       $ListPaquete=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquete;
   }

   // por fecha y estado

   public function selectShipperNP_date($codigo,$estado,$fecha1,$fecha2)
    {
        $query="SELECT COUNT(p.id_paquete) as N_Paquetes, pl.shipper FROM paquetes p INNER JOIN packing_list pl on pl.id_packing_list = p.id_packing_list WHERE pl.shipper = '".$codigo."' AND p.estado='".$estado."' AND p.fecha_ingreso BETWEEN '".$fecha1."' AND '".$fecha2."'";
        $selectall=$this->db->query($query);
       $ListPaquete=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquete;
   }

  public function selectShipperMCT_date($codigo,$materia,$estado,$fecha1,$fecha2)
    {
        $query="SELECT SUM(p.metros_cubicos) as metroCubicot, p.multiplo, (SUM(p.metros_cubicos) / p.multiplo) as tarima FROM paquetes p INNER JOIN packing_list pl ON pl.id_packing_list = p.id_packing_list WHERE pl.shipper='".$codigo."' AND p.id_material ='".$materia."'  AND p.estado='".$estado."' AND p.fecha_ingreso BETWEEN '".$fecha1."' AND '".$fecha2."'";
        $selectall=$this->db->query($query);
       $ListPaquete=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquete;
   }

  public function selectTotalMCT_date($materia,$estado,$fecha1,$fecha2)
    {
        $query="SELECT p.metros_cubicos, p.multiplo FROM paquetes p INNER JOIN packing_list pl ON pl.id_packing_list = p.id_packing_list WHERE p.id_material ='".$materia."'  AND p.estado='".$estado."' AND p.fecha_ingreso BETWEEN '".$fecha1."' AND '".$fecha2."'";
        $selectall=$this->db->query($query);
       $ListPaquete=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPaquete;
   }


}

/*
Consultar todos los Shipper :
-- SELECT shipper ,COUNT(shipper) as proveedores FROM packing_list GROUP BY shipper HAVING COUNT(*) > 1

CONSULTA TODOS LOS SHIPER Y CANTIDAD DE CONTENEDORES QUE TRAJERON

-- SELECT shipper ,COUNT(shipper) as proveedores, SUM(contenedores_ingresados) AS TOTAL FROM packing_list GROUP BY shipper HAVING COUNT(*) > 1

CONSULTAR EL NUMERO DE PAQUETES SEGUN SL SHIPPER

-- SELECT COUNT(p.id_paquete) as N_Paquetes, pl.shipper FROM paquetes p INNER JOIN packing_list pl on pl.id_packing_list = p.id_packing_list WHERE pl.shipper = 'Prueba'

CONSULTA METROS CUBICOS Y MULTIPLO SEGUN MATERIAL Y SHIPPER

SELECT SUM(p.metros_cubicos) as metroCubicot, p.multiplo, (SUM(p.metros_cubicos) / p.multiplo) as tarima FROM paquetes p INNER JOIN packing_list pl ON pl.id_packing_list = p.id_packing_list WHERE pl.shipper='Prueba' AND p.id_material = 1


*/
		

?>