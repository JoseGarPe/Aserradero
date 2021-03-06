<?php 
require_once "../config/conexion.php";

class Contenedores extends conexion
{
	private $id_contenedor;
    private $etiqueta;
	private $id_packing_list;
    private $estado;
    private $id_bodega;
    private $fecha_ingreso;
    private $tipo_ingreso;

	function __construct()
	{
		parent::__construct();

		$this->id_contenedor ="";
        $this->etiqueta ="";
		$this->id_packing_list ="";
        $this->estado ="";
        $this->id_bodega ="";
        $this->fecha_ingreso ="";
        $this ->tipo_ingreso="";
	}

	public function getId_contenedor(){
		return $this->id_contenedor;
	}

	public function setId_contenedor($idContenedores){
		$this->id_contenedor= $idContenedores;
	}
	public function getId_packing_list() {
        return $this->id_packing_list;
    }

    public function setId_packing_list($id_packing_list) {
        $this->id_packing_list = $id_packing_list;
    }
   
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEtiqueta(){
        return $this->etiqueta;
    }

    public function setEtiqueta($etiqueta){
        $this->etiqueta= $etiqueta;
    }
    public function getId_bodega(){
        return $this->id_bodega;
    }

    public function setId_bodega($id_bodega){
        $this->id_bodega= $id_bodega;
    }
    public function getFecha_ingreso(){
        return $this->fecha_ingreso;
    }

    public function setFecha_ingreso($fecha_ingreso){
        $this->fecha_ingreso= $fecha_ingreso;
    }
     public function getTipo_ingreso() {
        return $this->tipo_ingreso;
    }

    public function setTipo_ingreso($tipo_ingreso) {
        $this->tipo_ingreso = $tipo_ingreso;
    }


    public function save(){
             $query1="SELECT COUNT(id_contenedor) as inscritos FROM contenedores WHERE id_packing_list='".$this->id_packing_list."'";
        $selectall=$this->db->query($query1);
        $ListContenedor=$selectall->fetch_all(MYSQLI_ASSOC);
            foreach ($ListContenedor as $key) {
                $cont_inscritos = $key['inscritos'];
            }
         $query2="SELECT * FROM packing_list WHERE id_packing_list='".$this->id_packing_list."'";
        $selectall=$this->db->query($query2);
        $ListPL=$selectall->fetch_all(MYSQLI_ASSOC);
        foreach ($ListPL as $value) {
            $total_contenedores = $value['total_contenedores'];
        }

        $query_vli="SELECT COUNT(id_contenedor) as existen FROM contenedores WHERE id_packing_list='".$this->id_packing_list."' AND etiqueta ='".$this->etiqueta."'";
        $selectall3=$this->db->query($query_vli);
        $ListPL1=$selectall3->fetch_all(MYSQLI_ASSOC);
        foreach ($ListPL1 as $value2) {
            $existen = $value2['existen'];
        }
        if($cont_inscritos<$total_contenedores){
                if ($existen==0) {
                     $query="INSERT INTO contenedores(id_contenedor,id_packing_list,etiqueta,estado) values(NULL,'".$this->id_packing_list."','".$this->etiqueta."','".$this->estado."')";
            $save=$this->db->query($query);
            if ($save==true) {
                return true;
            }else {
                return false;
            }  
                }else{
                    return false;                
                }
            
        }else{
            return false;
        }


    }
    public function saveEnvio(){

        $query="INSERT INTO contenedores(id_contenedor,id_packing_list,etiqueta,estado,tipo_ingreso,fecha_ingreso,id_bodega) values(NULL,'".$this->id_packing_list."','".$this->etiqueta."','".$this->estado."','".$this->tipo_ingreso."','".$this->fecha_ingreso."','".$this->id_bodega."')";
        $save=$this->db->query($query);
        if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }


    public function save2(){

        $query1="SELECT * FROM contenedores WHERE id_packing_list='".$this->id_packing_list."' AND id_material='".$this->id_material."'";
        $selectall=$this->db->query($query1);
        $ListContenedor=$selectall->fetch_all(MYSQLI_ASSOC);
        if ($selectall->num_rows==0) {
            $query="INSERT INTO contenedores(id_contenedor, etiqueta, piezas,multiplo, m_cuadrados, tarimas, id_bodega,id_packing_list,n_paquetes,id_material,bodega_pendiente,estado) values(NULL,'".$this->etiqueta."','".$this->piezas."','".$this->multiplo."','".$this->m_cuadrados."','".$this->tarimas."',NULL,'".$this->id_packing_list."','".$this->n_paquetes."','".$this->id_material."','".$this->id_bodega."','".$this->estado."')";
            $save=$this->db->query($query);
            if ($save==true) {
                return true;
            }else {
                return false;
            }  
          } elseif ($selectall->num_rows==1) {
              foreach ($ListContenedor as $key) {
                $cantidad_anteriorPie= $key['piezas'];
                $cantidad_anteriorPaq= $key['n_paquetes'];
            }
            $cantidad=$this->piezas;
            $nueva_cantidadPie=$cantidad_anteriorPie+$cantidad;
            $cantidadPaq=$this->n_paquetes;
            $nueva_cantidadPaq=$cantidad_anteriorPaq+$cantidadPaq;
            $query2="UPDATE contenedores SET piezas='".$cantidad."', multiplo='".$this->multiplo."', m_cuadrados='".$this->m_cuadrados."', tarimas='".$this->tarimas."', n_paquetes='".$cantidadPaq."' WHERE id_packing_list='".$this->id_packing_list."' AND id_material = '".$this->id_material."'";
            $update=$this->db->query($query2);
            if ($update==true) {
                return true;
            }else {
                return false;
            }  

          }


    }
    public function update(){

    	$query="UPDATE contenedores SET etiqueta='".$this->etiqueta."', id_packing_list='".$this->id_packing_list."' WHERE id_contenedor='".$this->id_contenedor."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function updateCont(){

        $query="UPDATE contenedores SET fecha_ingreso='".$this->fecha_ingreso."', id_bodega='".$this->id_bodega."' WHERE id_contenedor='".$this->id_contenedor."'";
        $update=$this->db->query($query);
        if ($update==true) {
            // Verificar si la nueva fecha es menor a la que esta registrada en el ingreso 
           $query_packing="SELECT * FROM packing_list WHERE id_packing_list='".$this->id_packing_list."'";
            $selectall_packing=$this->db->query($query_packing);
           $ListPacking_packing=$selectall_packing->fetch_all(MYSQLI_ASSOC);
            foreach ($ListPacking_packing as $key) {
                $fecha_packing=$key['fecha_inicio'];

            // Verificar si la nueva fecha es menor a la que esta registrada en las bodegas 
           $query_cont="SELECT * FROM contenedores WHERE fecha_ingreso='". $fecha_packing."' AND id_packing_list='".$this->id_packing_list."'";
            $selectall_conte=$this->db->query($query_cont);
           $ListPacking_conte=$selectall_conte->fetch_all(MYSQLI_ASSOC);
            if($selectall_conte->num_rows >0){
                if ($this->fecha_ingreso < $fecha_packing) {
                 $query_pa="UPDATE packing_list SET fecha_inicio ='".$this->fecha_ingreso."' WHERE id_packing_list='".$this->id_packing_list."'";
                     $update_pa=$this->db->query($query_pa);
                }
            }else{
                  // Verificar si la nueva fecha es menor a la que esta registrada en las bodegas 
           $query_cont1="SELECT MIN(fecha_ingreso) as fecha_menor FROM contenedores WHERE id_packing_list='". $this->id_packing_list."'";
            $selectall_conte1=$this->db->query($query_cont1);
           $ListPacking_conte1=$selectall_conte1->fetch_all(MYSQLI_ASSOC);
                       /*  $fechas = array_column($ListPacking_conte1, 'fecha_ingreso');
                
                          $fecha_menor= min($fechas);*/

                        //  if ($fecha_menor!=NULL || $fecha_menor != '0000-00-00' || $fecha_menor !='') {
                          if ($selectall_conte1->num_rows !=0) {
                            foreach ($ListPacking_conte1 as $conte_menor) {
                                $fecha_menor= $conte_menor['fecha_menor'];
                            }
                         $query_pa="UPDATE packing_list SET fecha_inicio ='".$fecha_menor."' WHERE id_packing_list='".$this->id_packing_list."'";
                         $update_pa=$this->db->query($query_pa);
                          }else{
                         $query_pa="UPDATE packing_list SET fecha_inicio ='".$this->fecha_ingreso."' WHERE id_packing_list='".$this->id_packing_list."'";
                         $update_pa=$this->db->query($query_pa);

                          }
                }

                
            }


            //Actualizar la tabla de detalle de bodegas 
                  $query_piezas="SELECT * FROM paquetes WHERE id_contenedor='".$this->id_contenedor."'";
            $selectall_piezas=$this->db->query($query_piezas);
           $ListPacking_piezas=$selectall_piezas->fetch_all(MYSQLI_ASSOC);
           foreach ($ListPacking_piezas as $value1) {
                            $query_dp="SELECT * FROM detalle_bodega WHERE id_bodega='".$value1['id_bodega']."' AND id_material='".$value1['id_material']."'";
                            $selectall_dp=$this->db->query($query_dp);
                                  if ($selectall_dp->num_rows==0) {
                                      // consultamos si ya se encuentra guardaado el material 
                                  $query="INSERT INTO detalle_bodega(id_detalle_bodega,id_bodega,id_material,cantidad)
                                          values(NULL,
                                          '".$this->id_bodega."',
                                          '".$value1['id_material']."',
                                          '".$value1['piezas']."');";
                                  $save=$this->db->query($query);
                                }else{

                                       $ListPacking_dp=$selectall_dp->fetch_all(MYSQLI_ASSOC);
                                       foreach ($ListPacking_dp as $dp) {
                                    
                                      if ($dp['cantidad'] >=$value1['piezas']) {
                                            
                                           $nueva_piezas=$dp['cantidad']-$value1['piezas'];
                                             $query_dp1="UPDATE detalle_bodega SET cantidad='".$nueva_piezas."' WHERE id_bodega='".$value1['id_bodega']."' AND id_material='".$value1['id_material']."'";
                                                $updatedp=$this->db->query($query_dp1);
                                        }else{

                                           $nueva_piezas=$dp['cantidad'];
                                             $query_dp1="UPDATE detalle_bodega SET cantidad='".$nueva_piezas."' WHERE id_bodega='".$value1['id_bodega']."' AND id_material='".$value1['id_material']."'";
                                                $updatedp=$this->db->query($query_dp1);
                                        }
                                       }
                                }

            }

             $query_paquete="UPDATE paquetes SET fecha_ingreso='".$this->fecha_ingreso."', id_bodega='".$this->id_bodega."' WHERE id_contenedor='".$this->id_contenedor."'";
        $update_paquete=$this->db->query($query_paquete);


            return true;
        }else {
            return false;
        }  

    }
    public function delete(){


              $query_piezas="SELECT * FROM paquetes WHERE id_contenedor='".$this->id_contenedor."'";
        $selectall_piezas=$this->db->query($query_piezas);
       $ListPacking_piezas=$selectall_piezas->fetch_all(MYSQLI_ASSOC);
       foreach ($ListPacking_piezas as $value1) {
                        $query_dp="SELECT * FROM detalle_bodega WHERE id_bodega='".$value1['id_bodega']."' AND id_material='".$value1['id_material']."'";
                        $selectall_dp=$this->db->query($query_dp);
                       $ListPacking_dp=$selectall_dp->fetch_all(MYSQLI_ASSOC);
                       foreach ($ListPacking_dp as $dp) {
                           $nueva_piezas=$dp['cantidad']-$value1['piezas'];
                             $query_dp1="UPDATE detalle_bodega SET cantidad='".$nueva_piezas."' WHERE id_bodega='".$value1['id_bodega']."' AND id_material='".$value1['id_material']."'";
                                $updatedp=$this->db->query($query_dp1);
                       }

        }

        //-------------------------------
        $query_cantidad_paquetes="SELECT COUNT(id_paquete) as cantpaquete FROM paquetes WHERE id_contenedor='".$this->id_contenedor."'";
        $selectall_piezas1=$this->db->query($query_cantidad_paquetes);
       $ListPacking_piezas1=$selectall_piezas1->fetch_all(MYSQLI_ASSOC);
       foreach ($ListPacking_piezas1 as $ke) {
         $cantidad_eliminar = $ke['cantpaquete'];
       }
        //----------------------------------
        $query3="SELECT * FROM contenedores WHERE id_contenedor='".$this->id_contenedor."'";
        $selectall=$this->db->query($query3);
        $ListContenedor=$selectall->fetch_all(MYSQLI_ASSOC);
        foreach ($ListContenedor as $value) {
            $id_pl=$value['id_packing_list'];
        }
              $query4="SELECT * FROM packing_list WHERE id_packing_list='".$id_pl."'";
        $selectall1=$this->db->query($query4);
       $ListPacking=$selectall1->fetch_all(MYSQLI_ASSOC);
       foreach ($ListPacking as $value1) {
            $recibidos=$value1['contenedores_ingresados'];
            $paquetes_recibidos=$value1['paquetes_fisicos'];
        }
        $new_recibidos=(int)$recibidos-1;
        if ($new_recibidos<0) {
           $new_recibidos=0;
        }
        $new_pquetes = (int)$paquetes_recibidos-$cantidad_eliminar;
        if ($new_pquetes<=0) {
          $new_pquetes=0;
        }
             $query00="UPDATE packing_list SET contenedores_ingresados='".$new_recibidos."', paquetes_fisicos='".$new_pquetes."' WHERE id_packing_list='".$id_pl."'";
        $update=$this->db->query($query00);


    	$query="DELETE FROM contenedores WHERE id_contenedor='".$this->id_contenedor."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        $query1="DELETE FROM paquetes WHERE id_contenedor='".$this->id_contenedor."'"; 
       $delete2=$this->db->query($query1);
               if ($delete2 == true) {
                 return true;
               }else{
                return false;
               }
       
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
    public function selectOneL($codigo)
    {
        $query="SELECT * FROM contenedores WHERE id_packing_list='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListContenedores;
    }
     public function selectALLpack($codigo)
    {
        $query="SELECT * FROM contenedores  WHERE id_packing_list='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListContenedores;
    }
    public function confirm($codigo){

    /*    $query1="SELECT * FROM paquetes WHERE etiqueta='".$this->etiqueta."'";
        $selectall=$this->db->query($query1);
        $ListContenedor=$selectall->fetch_all(MYSQLI_ASSOC);
        if ($selectall->num_rows==0) {*/

        $query="UPDATE paquetes SET id_bodega ='".$this->id_bodega."', estado ='".$this->estado."',fecha_ingreso='".$this->fecha_ingreso."',id_bodega='".$this->id_bodega."' WHERE id_paquete='".$codigo."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
  /*  }else{
        return false;
    }*/

    }
    public function materialesPaquete($codigo){

        $query="SELECT p.id_material, COUNT(*), COUNT(p.id_paquete) as n_paquetes, SUM(p.piezas) as t_piezas,m.nombre,m.largo,m.grueso,m.ancho FROM paquetes p INNER JOIN materiales m ON m.id_material = p.id_material WHERE p.id_packing_list ='".$codigo."' GROUP BY id_material HAVING COUNT(*) > 0";
        $selectall=$this->db->query($query);
       $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListContenedores;

    }
     public function detalleConetenedor($codigo,$material){

        $query="SELECT multiplo,estado,id_bodega,tarimas,bodega_pendiente FROM contenedores WHERE id_packing_list='".$codigo."' and id_material='".$material."'";
        $selectall=$this->db->query($query);
        if ($selectall->num_rows!=0) {
            $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
        }else{
            $ListContenedores = "0";
        }
       
        return $ListContenedores;

    }

 public function confirm2(){

        $query="UPDATE contenedores SET estado ='".$this->estado."', fecha_ingreso='".$this->fecha_ingreso."', id_bodega='".$this->id_bodega."' WHERE id_contenedor='".$this->id_contenedor."'";
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

     public function selectALLpack3($codigo)
    {
        $query="SELECT COUNT(id_contenedor) as posee FROM contenedores  WHERE id_packing_list='".$codigo."' AND estado='Sin Confirmar'";
        $selectall=$this->db->query($query);
       $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListContenedores;
    }
    
    public function selectBodega($codigo){
        $query="SELECT * FROM bodegas WHERE id_bodega='".$codigo."' ";
        $selectall=$this->db->query($query);
        
        $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListContenedores;
    }
     
      public function selectPaquetesCon($codigo){
        $query="SELECT * FROM `paquetes` WHERE `id_contenedor` ='".$codigo."' ";
        $selectall=$this->db->query($query);
        
        $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListContenedores;
    }

             public function selectFirst_C($codigo)
    {
        $query="SELECT * FROM contenedores WHERE id_packing_list = '".$codigo."' ORDER BY id_contenedor ASC LIMIT 1";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }

}
?>