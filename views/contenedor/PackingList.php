<?php 
require_once "../../config/conexion.php";
class Packing extends conexion
{

private $id_packing_list;
private $numero_factura;
private $codigo_embarque;
private $razon_social;
private $mes;
private $fecha;
private $total_contenedores;
private $contenedores_ingresados;
private $paquetes;
private $paquetes_fisicos;
private $obervaciones;
private $id_shipper;
private $id_nave;
private $id_especificacion;
private $estado;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_packing_list = "";
        $this->numero_factura = "";
        $this->codigo_embarque = "";
        $this->razon_social = "";
        $this->mes = "";
        $this->fecha = "";
        $this->total_contenedores = "";
        $this->contenedores_ingresados = "";
        $this->paquetes = "";
        $this->paquetes_fisicos = "";
        $this->obervaciones = "";
        $this->id_shipper = "";
        $this->id_nave = "";
        $this->id_especificacion = "";
        $this ->estado="";
        

}

 	public function getId_packing_list() {
        return $this->id_packing_list;
    }

    public function setId_packing_list($idpacking) {
        $this->id_packing_list = $idpacking;
    }

    public function getNumero_factura() {
        return $this->numero_factura;
    }

    public function setNumero_factura($numerofactura) {
        $this->numero_factura = $numerofactura;
    }

    public function getCodigo_embarque() {
        return $this->codigo_embarque;
    }

    public function setCodigo_embarque($codigoembarque) {
        $this->codigo_embarque = $codigoembarque;
    }

    public function getRazon_social() {
        return $this->razon_social;
    }

    public function setRazon_social($razonsocial) {
        $this->razon_social = $razonsocial;
    }

    public function getMes() {
        return $this->mes;
    }

    public function setMes($mesillo) {
        $this->mes = $mesillo;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fechilla) {
        $this->fecha = $fechilla;
    }

    public function getTotal_contenedores() {
        return $this->total_contenedores;
    }

    public function setTotal_contenedores($totalcontenedores) {
        $this->total_contenedores = $totalcontenedores;
    }

    public function getContenedores_ingresados() {
        return $this->contenedores_ingresados;
    }

    public function setContenedores_ingresados($contenedoresingresados) {
        $this->contenedores_ingresados = $contenedoresingresados;
    }

    public function getPaquetes() {
        return $this->paquetes;
    }

    public function setPaquetes($paquetillos) {
        $this->paquetes = $paquetillos;
    }

    public function getPaquetes_fisicos() {
        return $this->paquetes_fisicos;
    }

    public function setPaquetes_fisicos($paquetesfisicos) {
        $this->paquetes_fisicos = $paquetesfisicos;
    }

    public function getObervaciones() {
        return $this->obervaciones;
    }

    public function setObervaciones($obs) {
        $this->obervaciones = $obs;
    }

    public function getId_shipper() {
        return $this->id_shipper;
    }

    public function setId_shipper($idshipper) {
        $this->id_shipper = $idshipper;
    }

    public function getId_nave() {
        return $this->id_nave;
    }

    public function setId_nave($idnave) {
        $this->id_nave = $idnave;
    }

    public function getId_especificacion() {
        return $this->id_especificacion;
    }

    public function setId_especificacion($idespecificacion) {
        $this->id_especificacion = $idespecificacion;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estat) {
        $this->estado = $estat;
    }




    
   
//---------------------------
function save()
    {
    	$query="INSERT INTO `packing_list` (`id_packing_list`, `numero_factura`, `codigo_embarque`, `razon_social`, `mes`, `fecha`, `total_contenedores`, `contenedores_ingresados`, `paquetes`, `paquetes_fisicos`, `obervaciones`, `id_shipper`, `id_nave`, `id_especificacion`, `estado`)
    			values(NULL,
    			'".$this->numero_factura."',
                '".$this->codigo_embarque."',
                '".$this->razon_social."',
                '".$this->mes."',
                '".$this->fecha."',
                '".$this->total_contenedores."',
                '".$this->contenedores_ingresados."',
                '".$this->paquetes."',
                '".$this->paquetes_fisicos."',
                '".$this->obervaciones."',
                '".$this->id_shipper."',
                '".$this->id_nave."',
    			'".$this->id_especificacion."',
                '".$this->estado."');
                ";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE packing_list SET numero_factura='".$this->numero_factura."',
        codigo_embarque='".$this->codigo_embarque."',
        razon_social='".$this->razon_social."',
        mes='".$this->mes."',
        fecha='".$this->fecha."',
        total_contenedores='".$this->total_contenedores."',
        contenedores_ingresados='".$this->contenedores_ingresados."',
        paquetes='".$this->paquetes."',
        paquetes_fisicos='".$this->paquetes_fisicos."',
        obervaciones='".$this->obervaciones."',
        id_shipper='".$this->id_shipper."',
        id_nave='".$this->id_nave."',
        id_especificacion='".$this->id_especificacion."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM packing_list WHERE id_packing_list='".$this->id_packing_list."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL(){
        $query="SELECT packing_list.id_packing_list,packing_list.numero_factura,packing_list.codigo_embarque,packing_list.razon_social,packing_list.mes,packing_list.fecha,packing_list.total_contenedores,packing_list.contenedores_ingresados,packing_list.paquetes,packing_list.paquetes_fisicos,packing_list.obervaciones,packing_list.shipper,nave.nombre as nav,especificacion.nombre as esp,packing_list.estado from packing_list INNER JOIN nave on packing_list.id_nave = nave.id_nave INNER JOIN especificacion on packing_list.id_especificacion = especificacion.id_especificacion";
        $selectall=$this->db->query($query);
        
        $ListPacking=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListPacking;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM packing_list WHERE id_packing_list='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPacking=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPacking;
    } 
     public function updateIngresos()
    {
        $query="UPDATE packing_list SET 
        contenedores_ingresados='".$this->contenedores_ingresados."'
         WHERE id_packing_list='".$this->id_packing_list."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
     public function FstContenedor($codigo){

     
        $query="SELECT * FROM contenedores  WHERE id_packing_list='".$codigo."'";
        $selectall=$this->db->query($query);
   //    $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
     //   return $ListContenedores;
          if ($selectall->num_rows==0) {
            return "Primer Contenedor";
          }
          else{
            return "Existentes";
          }

    }

    


}
?>