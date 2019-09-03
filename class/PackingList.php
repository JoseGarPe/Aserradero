<?php 
require_once "../config/conexion.php";
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
private $shipper;
private $poliza;
private $tipo_ingreso;
private $correlativo;

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
        $this ->shipper="";
        $this ->poliza="";
        $this ->tipo_ingreso="";
        $this ->correlativo="";
        

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
    public function getShipper() {
        return $this->_shipper;
    }

    public function setShipper($shipper) {
        $this->shipper = $shipper;
    }
public function getPoliza() {
        return $this->poliza;
    }

    public function setPoliza($poliza) {
        $this->poliza = $poliza;
    }
    public function getTipo_ingreso() {
        return $this->tipo_ingreso;
    }

    public function setTipo_ingreso($tipo_ingreso) {
        $this->tipo_ingreso = $tipo_ingreso;
    }

    public function getCorrelativo() {
        return $this->correlativo;
    }

    public function setCorrelativo($correlativo) {
        $this->correlativo = $correlativo;
    }




    
   
//---------------------------
function save()
    {
        $query1="SELECT * FROM packing_list WHERE id_especificacion='".$this->id_especificacion."' AND numero_factura='".$this->numerofactura."'";
        $selectall=$this->db->query($query1);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);

        if ($selectall->num_rows==0) {

    	$query="INSERT INTO `packing_list` (`id_packing_list`, `numero_factura`, `codigo_embarque`, `razon_social`, `mes`, `fecha`, `total_contenedores`, `contenedores_ingresados`, `paquetes`, `paquetes_fisicos`, `obervaciones`, `shipper`, `id_nave`, `id_especificacion`, `estado`,`tipo_ingreso`)
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
                '".$this->shipper."',
                '".$this->id_nave."',
    			'".$this->id_especificacion."',
                '".$this->estado."',
                'Importacion');
                ";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   }else{
            return false;
        }
    }
public function saveLocal()
    {
        $query="INSERT INTO `packing_list` (`id_packing_list`, `numero_factura`, `codigo_embarque`, `razon_social`, `mes`, `fecha`, `total_contenedores`, `contenedores_ingresados`, `paquetes`, `paquetes_fisicos`, `obervaciones`, `shipper`, `id_nave`, `id_especificacion`, `estado`, `poliza`,`tipo_ingreso`)
                values(NULL,
                '".$this->numero_factura."',
                NULL,
                NULL,
                '".$this->mes."',
                '0000-00-00',
                NULL,
                NULL,
                 '".$this->paquetes."',
                NULL,
                '".$this->obervaciones."',
                '".$this->shipper."',
                NULL,
                NULL,
                '".$this->estado."',
                '".$this->poliza."',
                'Local');
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
        shipper='".$this->shipper."',
        id_nave='".$this->id_nave."',
        id_especificacion='".$this->id_especificacion."',
        poliza='".$this->poliza."',
        tipo_ingreso='".$tipo_ingreso."'";
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
        $query="SELECT packing_list.id_packing_list,packing_list.numero_factura,packing_list.codigo_embarque,packing_list.razon_social,packing_list.mes,packing_list.fecha,packing_list.total_contenedores,packing_list.contenedores_ingresados,packing_list.paquetes,packing_list.paquetes_fisicos,packing_list.obervaciones,packing_list.shipper,nave.nombre as nav,especificacion.nombre as esp,packing_list.estado, packing_list.fecha_inicio,packing_list.fecha_cierre,packing_list.poliza,packing_list.correlativo,packing_list.tipo_ingreso from packing_list INNER JOIN nave on packing_list.id_nave = nave.id_nave INNER JOIN especificacion on packing_list.id_especificacion = especificacion.id_especificacion  WHERE packing_list.tipo_ingreso='Importacion'";
        $selectall=$this->db->query($query);
        
        $ListPacking=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListPacking;
    }
     /*public function selectALL_Local(){
        $query="SELECT packing_list.id_packing_list,packing_list.numero_factura,packing_list.codigo_embarque,packing_list.razon_social,packing_list.mes,packing_list.fecha,packing_list.total_contenedores,packing_list.contenedores_ingresados,packing_list.paquetes,packing_list.paquetes_fisicos,packing_list.obervaciones,packing_list.shipper,nave.nombre as nav,especificacion.nombre as esp,packing_list.estado, packing_list.fecha_inicio,packing_list.fecha_cierre,packing_list.poliza,packing_list.tipo_ingreso from packing_list INNER JOIN nave on packing_list.id_nave = nave.id_nave INNER JOIN especificacion on packing_list.id_especificacion = especificacion.id_especificacion WHERE packing_list.tipo_ingreso='Local'";
        $selectall=$this->db->query($query);
        
        $ListPacking=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListPacking;
    }*/
     public function selectALL_Local(){
        $query="SELECT packing_list.id_packing_list,packing_list.numero_factura,packing_list.codigo_embarque,packing_list.razon_social,packing_list.mes,packing_list.fecha,packing_list.total_contenedores,packing_list.contenedores_ingresados,packing_list.paquetes,packing_list.paquetes_fisicos,packing_list.obervaciones,packing_list.shipper,packing_list.estado, packing_list.fecha_inicio,packing_list.fecha_cierre,packing_list.poliza,packing_list.tipo_ingreso from packing_list WHERE tipo_ingreso='Local'";
        $selectall=$this->db->query($query);
        
        $ListPacking=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListPacking;
    }
    public function countPaquetes($codigo)
    {
        $query="SELECT COUNT(id_paquete) as total, SUM(metros_cubicos) as metroCubic FROM paquetes WHERE id_packing_list='".$codigo."'";
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
public function updateIngresosL()
    {
        $query="UPDATE packing_list SET 
        paquetes_fisicos='".$this->paquetes_fisicos."'
         WHERE id_packing_list='".$this->id_packing_list."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
     public function updateObservacion()
    {
        $query="UPDATE packing_list SET 
       obervaciones='".$this->obervaciones."'
         WHERE id_packing_list='".$this->id_packing_list."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function selectTotalMetrosCubicos($codigo)
    {
        $query="SELECT SUM(metros_cubicos) as metro_cubico FROM paquetes WHERE id_packing_list ='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListPacking=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListPacking;
    } 
    

    public function updateStatu($vari,$fecha)
    {
    if ($vari == 'Primero') {
         $query="UPDATE packing_list SET 
       estado='".$this->estado."', fecha_inicio ='".$fecha."' WHERE id_packing_list='".$this->id_packing_list."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    else{
          $query="UPDATE packing_list SET 
       estado='".$this->estado."', fecha_cierre = CURDATE() WHERE id_packing_list='".$this->id_packing_list."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        } 
    }

       
    }
    
public function updateCorrelativo($packing_list,$dia,$mes,$c,$poliza)
    {
        $correlativo_pl= $dia."/".$mes."/".$c;

        $query="SELECT * FROM packing_list  WHERE correlativo='".$correlativo_pl."'";
        $selectall1=$this->db->query($query);
   //    $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
     //   return $ListContenedores;
       
          if ($selectall1->num_rows==0) {
              $query2="SELECT YEAR(fecha) as dia FROM packing_list WHERE id_packing_list ='".$packing_list."'";
                        $selectall=$this->db->query($query2);
                       $ListPacking=$selectall->fetch_all(MYSQLI_ASSOC);
                       foreach ($ListPacking as $key) {
                        $year=$key['dia'];
                       }
                       $fecha_nueva=$year."-".$mes."-".$dia;
                       $date1=date_create($fecha_nueva);

                           $query3="SELECT * FROM packing_list  WHERE poliza='".$poliza."'";
                    $selectall3=$this->db->query($query3);
                    if ($selectall3->num_rows==0) {
                       

                        $query1="UPDATE packing_list SET  correlativo='".$correlativo_pl."', fecha ='".$fecha_nueva."',poliza='".$poliza."' WHERE id_packing_list='".$packing_list."';";
                        $update=$this->db->query($query1);
                        if ($update==true) {
                            return true;
                        }else {
                            return false;
                        } 
                    }
                    else{
                        
                             $query1="UPDATE packing_list SET  correlativo='".$correlativo_pl."', fecha ='".$fecha_nueva."' WHERE id_packing_list='".$packing_list."';";
                        $update=$this->db->query($query1);
                        return false;
                    }

                    

          }
          else{
            return false;
          }

    }


    public function selectExistenteCorrelativo($codigo)
    {
        $query="SELECT * FROM packing_list WHERE correlativo='".$codigo."'";
        $selectall=$this->db->query($query);
        if ($selectall->num_rows==0) {
            return "Disponible";
        }elseif($selectall>num_rows==1){
            return "Existe Uno";
        }else{
            return "No Disponible";
        }
    }
    public function selectExistentePoliza($codigo)
    {
        $query="SELECT * FROM packing_list WHERE poliza='".$codigo."'";
        $selectall=$this->db->query($query);
        if ($selectall->num_rows==0) {
            return "Disponible";
        }elseif($selectall->num_rows==1){
            return "Existe Uno";
        }else{
            return "No Disponible";
        }
    }

     public function updatePC()
    {  
        //--------------------------------------------------------------------//
         $query1="SELECT * FROM packing_list WHERE correlativo='".$this->correlativo."'";
        $selectall1=$this->db->query($query1);
        if ($selectall1->num_rows==0) {
            $correla="Disponible";
        }elseif($selectall1->num_rows==1){
            $correla="Existe Uno";
        }else{
            $correla="No Disponible";
        }

        //----------------------------------------------------------------//
           $query2="SELECT * FROM packing_list WHERE poliza='".$this->poliza."'";
        $selectall2=$this->db->query($query2);
        if ($selectall2->num_rows==0) {
            $poliz="Disponible";
        }elseif($selectall2->num_rows==1){
            $poliz="Existe Uno";
        }else{
            $poliz="No Disponible";
        }
        //----------------------------------------------------------------//

        if($poliz=='Disponible' && $correla =='Disponible') {
                $query3="UPDATE packing_list SET correlativo='".$this->correlativo."', poliza='".$this->poliza."'
                 WHERE id_packing_list='".$this->id_packing_list."'";
                $update=$this->db->query($query3);
                if ($update==true) {
                    return 'Datos guardado';
                }else {
                    return 'error';
                } 
                    
        }elseif($poliz=='Existe Uno' && $correla =='Disponible') {
                $query4="UPDATE packing_list SET correlativo='".$this->correlativo."' WHERE id_packing_list='".$this->id_packing_list."'";
                $update=$this->db->query($query4);
                if ($update==true) {
                    return 'Poliza';
                }else {
                    return 'error';
                } 
                    
        }elseif($poliz=='Disponible' && $correla =='No Disponible') {
                $query6="UPDATE packing_list SET poliza='".$this->poliza."' WHERE id_packing_list='".$this->id_packing_list."'";
                $update=$this->db->query($query6);
                if ($update==true) {
                    return 'Correlativo';
                }else {
                    return 'error';
                } 
                    
        }else
        {
            return 'No Disponible';
        }
 
    }

            public function selectLast()
    {
        $query="SELECT * FROM packing_list ORDER BY id_packing_list DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }

}
?>