<?php 
require_once "../config/conexion.php";
class DetalleProducto extends conexion
{
private $id_detalle_producto;
private $cantidad;
private $bodega_salida;
private $id_bodega;
private $id_preset;
private $estado;
private $fase;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_detalle_producto= "";
        $this->cantidad = "";
        $this->bodega_salida = "";
        $this->id_bodega = "";
        $this->id_preset = "";
        $this->estado = "";
        $this->fase = "";

}

 	public function getId_detalle_producto() {
        return $this->id_detalle_producto;
    }

    public function setId_detalle_producto($id) {
        $this->id_detalle_producto = $id;
    }
    
    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($idmateriaprima) {
        $this->cantidad = $idmateriaprima;
    }

    public function getBodega_salida() {
        return $this->bodega_salida;
    }

    public function setBodega_salida($cantidadmateriaprima) {
        $this->bodega_salida = $cantidadmateriaprima;
    }
    public function getId_bodega() {
        return $this->id_bodega;
    }

    public function setId_bodega($idmaquina) {
        $this->id_bodega = $idmaquina;
    }
    public function getId_preset() {
        return $this->id_preset;
    }

    public function setId_preset($idmaterialsaliente) {
        $this->id_preset = $idmaterialsaliente;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getFase() {
        return $this->fase;
    }

    public function setFase($fase) {
        $this->fase = $fase;
    }


      
//---------------------------
function save()
    {
    	$query="INSERT INTO `detalle_producto` (`id_detalle_producto`, `cantidad`, `bodega_salida`, `id_bodega`,estado,fase) VALUES (NULL,
    			'".$this->cantidad."',
    			'".$this->bodega_salida."',
                '".$this->id_bodega."',
                '".$this->id_preset."',
                '".$this->estado."',NULL
            );";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE bodegas SET cantidad='".$this->cantidad."', bodega_salida='".$this->bodega_salida."', id_bodega='".$this->id_bodega."' WHERE id_detalle_producto='".$this->id_detalle_producto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM detalle_producto WHERE id_detalle_producto='".$this->id_detalle_producto."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM detalle_producto";
        $selectall=$this->db->query($query);
        $Listbodega_salida=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listbodega_salida;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM detalle_producto WHERE id_detalle_producto='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listbodega_salida=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listbodega_salida;
    }

     public function confirm()
    {
        $query="UPDATE detalle_producto SET estado='".$this->estado."' WHERE id_detalle_producto='".$this->id_detalle_producto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
         public function selectALL_BO($codigo)
    {
        $query="SELECT * FROM detalle_producto WHERE id_bodega='".$codigo."'";
        $selectall=$this->db->query($query);
        $Listbodega_salida=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listbodega_salida;
    }

    


}
?>