<?php  
require_once "../config/conexion.php";
class DetalleOrden extends conexion
{
private $id_detalle_orden;
private $id_orden_producto;
private $id_detalle_preset;
private $id_bodega;
private $cantidad_utilizada;


public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_detalle_orden= "";
        $this->id_orden_producto = "";
        $this->id_detalle_preset = "";
        $this->id_bodega = "";
        $this->cantidad_utilizada = "";

}

 	public function getId_detalle_orden() {
        return $this->id_detalle_orden;
    }

    public function setId_detalle_orden($id) {
        $this->id_detalle_orden = $id;
    }
    
    public function getId_orden_producto() {
        return $this->id_orden_producto;
    }

    public function setId_orden_producto($id_orden_producto) {
        $this->id_orden_producto = $id_orden_producto;
    }

    public function getId_detalle_preset() {
        return $this->id_detalle_preset;
    }

    public function setId_detalle_preset($id_detalle_preset) {
        $this->id_detalle_preset = $id_detalle_preset;
    }
    public function getId_bodega() {
        return $this->id_bodega;
    }

    public function setId_bodega($id_bodega) {
        $this->id_bodega = $id_bodega;
    }
    public function getCantidad_utilizada() {
        return $this->cantidad_utilizada;
    }

    public function setCantidad_utilizada($cantidad_utilizada) {
        $this->cantidad_utilizada = $cantidad_utilizada;
    }
public 
//---------------------------
function save()
    {
    	$query="INSERT INTO detalle_orden(id_detalle_orden,id_orden_producto,id_detalle_preset,id_bodega,cantidad_utilizado)
    			values(NULL,
    			'".$this->id_orden_producto."',
                '".$this->id_detalle_preset."',
                '".$this->id_bodega."',
                '".$this->cantidad_utilizada."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE detalle_orden SET id_orden_producto='".$this->id_orden_producto."', id_detalle_preset='".$this->id_detalle_preset."' WHERE id_detalle_orden='".$this->id_detalle_orden."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM detalle_orden WHERE id_detalle_orden='".$this->id_detalle_orden."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM detalle_orden";
        $selectall=$this->db->query($query);
        $Listdetalle_orden=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_orden;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM detalle_orden WHERE id_detalle_orden='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listdetalle_orden=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_orden;
    }

     public function selectDetalle_Orden($codigo)
    {
        $query="SELECT op.*,deo.id_orden_producto,deo.id_detalle_preset,deo.cantidad_utilizado,m.nombre, m.largo,m.ancho,m.grueso FROM detalle_orden deo INNER JOIN orden_producto op ON op.id_orden_producto=deo.id_orden_producto INNER JOIN detalle_preset dp ON dp.id_detalle_preset = deo.id_detalle_preset INNER JOIN materiales m ON m.id_material = dp.id_material WHERE op.id_orden_producto ='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listdetalle_orden=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_orden;
    }

     public function updateUtilizado()
    {
        $query="UPDATE detalle_orden SET cantidad_utilizado='".$this->cantidad_utilizada."' WHERE id_detalle_orden='".$this->id_detalle_orden."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }

    


}

 ?>