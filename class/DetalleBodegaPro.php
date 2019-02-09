<?php  
require_once "../config/conexion.php";
class DetalleBodegaPro extends conexion
{
private $id_detalle_bodega_pro;
private $id_bodega;
private $id_preset;
private $cantidad;
// para temporal


public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_detalle_bodega_pro= "";
        $this->id_bodega = "";
        $this->id_preset = "";
        $this->cantidad = "";

}

 	public function getId_detalle_bodega_pro() {
        return $this->id_detalle_bodega_pro;
    }

    public function setId_detalle_bodega_pro($id) {
        $this->id_detalle_bodega_pro = $id;
    }
    
    public function getId_bodega() {
        return $this->id_bodega;
    }

    public function setId_bodega($id_bodega) {
        $this->id_bodega = $id_bodega;
    }

    public function getId_preset() {
        return $this->id_preset;
    }

    public function setId_preset($id_preset) {
        $this->id_preset = $id_preset;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    //para temporal
  

    //-------------------------------------------------------------------------------------------------------//
public function save()
    {
        $query1="SELECT * FROM detalle_bodega_pro WHERE id_bodega='".$this->id_bodega."' AND id_preset='".$this->id_preset."'";
        $selectall=$this->db->query($query1);
        $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);

        if ($selectall->num_rows==0) {
            // consultamos si ya se encuentra guardaado el preset 
        $query="INSERT INTO detalle_bodega_pro(id_detalle_bodega_pro,id_bodega,id_preset,cantidad)
                values(NULL,
                '".$this->id_bodega."',
                '".$this->id_preset."',
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
            foreach ($Listdetalle_bodega_pro as $key) {
                $cantidad_anterior= $key['cantidad'];
            }
            $cantidad=$this->cantidad;
            $nueva_cantidad=$cantidad_anterior+$cantidad;
          $query="UPDATE detalle_bodega_pro SET cantidad='".$nueva_cantidad."' WHERE id_preset='".$this->id_preset."' AND id_bodega='".$this->id_bodega."'";
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
        $query="UPDATE detalle_bodega_pro SET id_bodega='".$this->id_bodega."', id_preset='".$this->id_preset."' WHERE id_detalle_bodega_pro='".$this->id_detalle_bodega_pro."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM detalle_bodega_pro WHERE id_detalle_bodega_pro='".$this->id_detalle_bodega_pro."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM detalle_bodega_pro";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega_pro;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM detalle_bodega_pro WHERE id_detalle_bodega_pro='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega_pro;
    }

         public function selectALLP($codigo)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as preset FROM detalle_bodega_pro db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN presets m ON m.id_preset = db.id_preset  WHERE db.id_bodega='".$codigo."'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega_pro;
    }

       public function selectALLPRO($codigo)
    {
        $query="SELECT db.*, b.nombre as bodega,p.nombre as preset FROM detalle_bodega_pro db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN preset m ON m.id_preset = db.id_preset  WHERE db.id_bodega='".$codigo."' AND c.nombre='Procesado'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega_pro;
    }

     public function updateC()
    {
        $query="UPDATE detalle_bodega_pro SET cantidad='".$this->cantidad."' WHERE id_bodega='".$this->id_bodega."' AND id_preset='".$this->id_preset."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
         public function selectALL_BO($codigo)
    {
        $query="SELECT * FROM detalle_bodega_pro WHERE id_bodega='".$codigo."'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega_pro;
    }
             public function selectALLP_M($codigo)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as preset,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_bodega_pro db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN presetes m ON m.id_preset = db.id_preset INNER JOIN categorias c ON c.id_categoria = m.id_categoria WHERE db.id_preset='".$codigo."'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega_pro;
    }
             public function selectpreset_bodega($cantidad,$preset)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as preset,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_bodega_pro db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN presetes m ON m.id_preset = db.id_preset INNER JOIN categorias c ON c.id_categoria = m.id_categoriaWHERE db.cantidad>='".$cantidad."' AND db.id_preset='".$preset."' ORDER BY db.id_bodega DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega_pro;
    }
             public function selectCantidad_preset_bodega($bodega,$preset)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as preset,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_bodega_pro db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN presetes m ON m.id_preset = db.id_preset INNER JOIN categorias c ON c.id_categoria = m.id_categoria WHERE db.id_bodega='".$bodega."' AND db.id_preset='".$preset."'";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega_pro;
    }
     public function selectProductos($codigo)
    {
        $query="SELECT op.id_preset, p.nombre as preset,b.nombre as bodega, SUM(op.cantidad) AS TOTAL,op.estado FROM preset op INNER JOIN presets p ON p.id_preset = op.id_preset INNER JOIN bodegas b ON b.id_bodega = op.id_bodega WHERE op.id_bodega = '".$codigo."' AND op.fase='Finalizado'";
        $selectall=$this->db->query($query);
        $ListOrdenes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListOrdenes;
    }
    //--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------- TEMPORAL --------------------------------------------------------------------------//
    //--------------------------------------------------------------------------------------------------------------------------------------------------------------//

    public function saveTemp(){

        $query="INSERT INTO temporal(id_temporal,id_preset, id_bodega, cantidad,id_preset) values(NULL,'".$this->id_preset."','".$this->id_bodega."','".$this->cantidad."','".$this->id_preset."')";
        $save=$this->db->query($query);
        if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
       public function selectTemp($codigo,$cantidad)
    {
        $query="SELECT t.id_temporal,m.nombre as preset, m.largo,m.grueso,m.ancho, b.nombre as bodega, t.cantidad, p.nombre as preset FROM temporal t INNER JOIN presetes m ON m.id_preset = t.id_preset INNER JOIN bodegas b on b.id_bodega = t.id_bodega INNER JOIN presets p ON p.id_preset = t.id_preset  WHERE t.id_preset='".$codigo."' ORDER BY id_temporal DESC LIMIT ".$cantidad." ";
        $selectall=$this->db->query($query);
        $Listdetalle_bodega_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_bodega_pro;

    }  public function selectLastTemp()
    {
        $query="SELECT * FROM temporal ORDER BY id_temporal DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }


}

 ?>