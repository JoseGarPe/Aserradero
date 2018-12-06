<?php  
require_once "../../config/conexion.php";
class DetalleBodega extends conexion
{
private $id_detalle_bodega;
private $id_bodega;
private $id_material;
private $cantidad;


public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_detalle_bodega= "";
        $this->id_bodega = "";
        $this->id_material = "";
        $this->cantidad = "";

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
       public function selectALLMP($codigo)
    {
        $query="SELECT db.*, b.nombre as bodega,m.nombre as material,m.largo,m.ancho,m.grueso,m.id_categoria,c.nombre as categoria FROM detalle_bodega db INNER JOIN bodegas b ON b.id_bodega = db.id_bodega INNER JOIN materiales m ON m.id_material = db.id_material INNER JOIN categorias c ON c.id_categoria = m.id_categoria WHERE db.id_bodega='".$codigo."' AND c.nombre='Materia Prima'";
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
    public function selectC_MP($codigo)
    {
        $query="SELECT * FROM detalle_bodega WHERE id_material='".$codigo."'";
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



}

 ?>