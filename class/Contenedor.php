<?php 
require_once "../config/conexion.php";

class Contenedores extends conexion
{
	private $id_contenedor;
    private $etiqueta;
	private $id_packing_list;
    private $estado;
    private $id_bodega;

	function __construct()
	{
		parent::__construct();

		$this->id_contenedor ="";
        $this->etiqueta ="";
		$this->id_packing_list ="";
        $this->estado ="";
        $this->id_bodega ="";
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

    public function save(){

    	$query="INSERT INTO contenedores(id_contenedor,id_packing_list,etiqueta,estado,fecha_ingreso) values(NULL,'".$this->id_packing_list."','".$this->etiqueta."','".$this->estado."',CURDATE())";
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
        $query="SELECT * FROM contenedores  WHERE id_packing_list='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListContenedores=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListContenedores;
    }
    public function confirm($codigo){

        $query="UPDATE paquetes SET id_bodega ='".$this->id_bodega."', estado ='".$this->estado."' WHERE id_paquete='".$codigo."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

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

        $query="UPDATE contenedores SET estado ='".$this->estado."' WHERE id_contenedor='".$this->id_contenedor."'";
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

}



		

?>