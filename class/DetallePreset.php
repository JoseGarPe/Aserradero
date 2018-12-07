<?php  
require_once "../config/conexion.php";
class DetallePreset extends conexion
{
private $id_detalle_preset;
private $id_preset;
private $id_material;
private $cantidad;


public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_detalle_preset= "";
        $this->id_preset = "";
        $this->id_material = "";
        $this->cantidad = "";

}

 	public function getId_detalle_preset() {
        return $this->id_detalle_preset;
    }

    public function setId_detalle_preset($id) {
        $this->id_detalle_preset = $id;
    }
    
    public function getId_preset() {
        return $this->id_preset;
    }

    public function setId_preset($id_preset) {
        $this->id_preset = $id_preset;
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

    //-------------------------------------------------------------------------------------------------------//
public function save()
    {
        $query1="SELECT * FROM detalle_preset WHERE id_preset='".$this->id_preset."' AND id_material='".$this->id_material."'";
        $selectall=$this->db->query($query1);
        $Listdetalle_preset=$selectall->fetch_all(MYSQLI_ASSOC);

        if ($selectall->num_rows==0) {
            // consultamos si ya se encuentra guardaado el material 
        $query="INSERT INTO detalle_preset(id_detalle_preset,id_preset,id_material,cantidad)
                values(NULL,
                '".$this->id_preset."',
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
            foreach ($Listdetalle_preset as $key) {
                $cantidad_anterior= $key['cantidad'];
            }
            $cantidad=$this->cantidad;
            $nueva_cantidad=$cantidad_anterior+$cantidad;
          $query="UPDATE detalle_preset SET cantidad='".$nueva_cantidad."' WHERE id_material='".$this->id_material."' AND id_preset='".$this->id_preset."'";
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
        $query="UPDATE detalle_preset SET id_preset='".$this->id_preset."', id_material='".$this->id_material."' WHERE id_detalle_preset='".$this->id_detalle_preset."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM detalle_preset WHERE id_detalle_preset='".$this->id_detalle_preset."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM detalle_preset";
        $selectall=$this->db->query($query);
        $Listdetalle_preset=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_preset;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM detalle_preset WHERE id_detalle_preset='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listdetalle_preset=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_preset;
    }

         public function selectALLP($codigo)
    {
        $query="SELECT db.*, b.nombre as preset,m.nombre as material,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_preset db INNER JOIN presets b ON b.id_preset = db.id_preset INNER JOIN materiales m ON m.id_material = db.id_material INNER JOIN categorias c ON c.id_categoria = m.id_categoria WHERE db.id_preset='".$codigo."'";
        $selectall=$this->db->query($query);
        $Listdetalle_preset=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_preset;
    }

       public function selectALLPRO($codigo)
    {
        $query="SELECT db.*, b.nombre as preset,m.nombre as material,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_preset db INNER JOIN presets b ON b.id_preset = db.id_preset INNER JOIN materiales m ON m.id_material = db.id_material INNER JOIN categorias c ON c.id_categoria = m.id_categoria WHERE db.id_preset='".$codigo."' AND c.nombre='Procesado'";
        $selectall=$this->db->query($query);
        $Listdetalle_preset=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_preset;
    }

     public function updateC()
    {
        $query="UPDATE detalle_preset SET cantidad='".$this->cantidad."' WHERE id_preset='".$this->id_preset."' AND id_material='".$this->id_material."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
         public function selectALL_BO($codigo)
    {
        $query="SELECT * FROM detalle_preset WHERE id_preset='".$codigo."'";
        $selectall=$this->db->query($query);
        $Listdetalle_preset=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listdetalle_preset;
    }


}

 ?>