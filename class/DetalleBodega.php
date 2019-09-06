<?php  
require_once "../config/conexion.php";
class DetalleBodega extends conexion
{
private $id_detalle_bodega;
private $id_bodega;
private $id_material;
private $cantidad;
// para temporal
private $id_preset;


public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_detalle_bodega= "";
        $this->id_bodega = "";
        $this->id_material = "";
        $this->cantidad = "";
        $this->id_preset = "";

}

 	public function getId_detalle_bodega() {
        return $this->id_detalle_bodega;
    }

    public function setId_detalle_bodega($id) {
        $this->id_detalle_bodega = $id;
    }
    
    public function getId_bodega() {
        return $this->id_bodega;
    }

    public function setId_bodega($id_bodega) {
        $this->id_bodega = $id_bodega;
    }

    public function getId_material() {
        return $this->id_material;
    }

    public function setId_material($id_material) {
        $this->id_material = $id_material;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    //para temporal
   public function getId_preset() {
        return $this->id_preset;
    }

    public function setId_preset($id_preset) {
        $this->id_preset = $id_preset;
    }

    //-------------------------------------------------------------------------------------------------------//
public function save()
    {
        $query1="SELECT * FROM detalle_bodega WHERE id_bodega='".$this->id_bodega."' AND id_material='".$this->id_material."'";
        $selectall=$this->db->query($query1);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);

        if ($selectall->num_rows==0) {
            // consultamos si ya se encuentra guardaado el material 
        $query="INSERT INTO detalle_bodega(id_detalle_bodega,id_bodega,id_material,cantidad)
                values(NULL,
                '".$this->id_bodega."',
                '".$this->id_material."',
                '".$this->cantidad."');";
        $save=$this->db->query($query);
        if ($save==true) {
            return true;
        }else {
            return false;
        }   

        }
        elseif($selectall->num_rows==1)
        {
            foreach ($Listdetalle_bodega as $key) {
                $cantidad_anterior= $key['cantidad'];
            }
            $cantidad=$this->cantidad;
            $nueva_cantidad=$cantidad_anterior+$cantidad;
          $query="UPDATE detalle_bodega SET cantidad='".$nueva_cantidad."' WHERE id_material='".$this->id_material."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }    
        }

    	
    }

     public function update()
    {
        $query="UPDATE detalle_bodega SET id_bodega='".$this->id_bodega."', id_material='".$this->id_material."' WHERE id_detalle_bodega='".$this->id_detalle_bodega."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM detalle_bodega WHERE id_detalle_bodega='".$this->id_detalle_bodega."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM detalle_bodega";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM detalle_bodega WHERE id_detalle_bodega='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;
    }

         public function selectALLP($codigo)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as material,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_bodega db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN materiales m ON m.id_material = db.id_material INNER JOIN categorias c ON c.id_categoria = m.id_categoria WHERE db.id_bodega='".$codigo."'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;
    }

       public function selectALLPRO($codigo)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as material,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_bodega db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN materiales m ON m.id_material = db.id_material INNER JOIN categorias c ON c.id_categoria = m.id_categoria WHERE db.id_bodega='".$codigo."' AND c.nombre='Procesado'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;
    }

     public function updateC()
    {
        $query="UPDATE detalle_bodega SET cantidad='".$this->cantidad."' WHERE id_bodega='".$this->id_bodega."' AND id_material='".$this->id_material."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
         public function selectALL_BO($codigo)
    {
        $query="SELECT * FROM detalle_bodega WHERE id_bodega='".$codigo."'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;
    }
             public function selectALLP_M($codigo)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as material,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_bodega db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN materiales m ON m.id_material = db.id_material INNER JOIN categorias c ON c.id_categoria = m.id_categoria WHERE db.id_material='".$codigo."'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;
    }
             public function selectMaterial_bodega($cantidad,$material)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as material,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_bodega db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN materiales m ON m.id_material = db.id_material INNER JOIN categorias c ON c.id_categoria = m.id_categoriaWHERE db.cantidad>='".$cantidad."' AND db.id_material='".$material."' ORDER BY db.id_bodega DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;
    }
             public function selectCantidad_material_bodega($bodega,$material)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as material,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_bodega db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN materiales m ON m.id_material = db.id_material INNER JOIN categorias c ON c.id_categoria = m.id_categoria WHERE db.id_bodega='".$bodega."' AND db.id_material='".$material."'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;
    }
     public function selectProductos($codigo)
    {
        $query="SELECT op.id_orden_producto, p.nombre as preset,b.nombre as bodega, SUM(op.cantidad) AS TOTAL,op.estado FROM orden_producto op INNER JOIN presets p ON p.id_preset = op.id_preset INNER JOIN bodegas b ON b.id_bodega = op.id_bodega WHERE op.id_bodega = '".$codigo."' AND op.fase='Finalizado'";
        $selectall=$this->db->query($query);
        $ListOrdenes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListOrdenes;
    }
    //--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------- TEMPORAL --------------------------------------------------------------------------//
    //--------------------------------------------------------------------------------------------------------------------------------------------------------------//

    public function saveTemp(){

        $query="INSERT INTO temporal(id_temporal,id_material, id_bodega, cantidad,id_preset) values(NULL,'".$this->id_material."','".$this->id_bodega."','".$this->cantidad."','".$this->id_preset."')";
        $save=$this->db->query($query);
        if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
       public function selectTemp($codigo,$cantidad)
    {
        $query="SELECT t.id_temporal,m.nombre as material, m.largo,m.grueso,m.ancho, b.nombre as bodega, t.cantidad, p.nombre as preset FROM temporal t INNER JOIN materiales m ON m.id_material = t.id_material INNER JOIN bodegas b on b.id_bodega = t.id_bodega INNER JOIN presets p ON p.id_preset = t.id_preset  WHERE t.id_preset='".$codigo."' ORDER BY id_temporal DESC LIMIT ".$cantidad." ";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;

    }  public function selectLastTemp()
    {
        $query="SELECT * FROM temporal ORDER BY id_temporal DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }

       //------------------- TRASLADOS--------------------------------------------------------------------------------------------------------------------

public function updatePaquete($paquete){

        $query="UPDATE paquetes SET id_bodega='".$this->id_bodega."' WHERE id_paquete='".$paquete."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }public function updatePaquete_tras($paquete){

        $query="UPDATE paquetes SET id_bodega=0 WHERE id_paquete='".$paquete."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    // CONSULTAS METROS CUBICOS//
     public function selectM_CUBICOS($codigo,$material)
    {
        $query="SELECT SUM(metros_cubicos) as m_cubicos FROM paquetes WHERE id_bodega = '".$codigo."' AND id_material = '".$material."' AND stock !=0";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega;

    }




}

 ?>