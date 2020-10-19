<?php 
require_once "../config/conexion.php";
class Insumo extends conexion
{
private $id_insumo;
private $id_tipo_insumo;
private $nombre_insumo;
private $stock;
private $estado;

public function __construct()
{
    parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_tipo_insumo= "";
        $this->nombre_insumo = "";
        $this->stock = "";
        $this->estado = "";
        $this->id_insumo= "";

}
    public function getId_insumo() {
        return $this->id_insumo;
    }

    public function setId_insumo($id) {
        $this->id_insumo = $id;
    }

    public function getId_tipo_insumo() {
        return $this->id_tipo_insumo;
    }

    public function setId_tipo_insumo($id) {
        $this->id_tipo_insumo = $id;
    }
    
    public function getNombre_insumo() {
        return $this->nombre_insumo;
    }

    public function setNombre_insumo($nombre_insumo) {
        $this->nombre_insumo = $nombre_insumo;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

public function save()
    {
        $query="INSERT INTO `insumo`(`id_insumo`, `nombre_insumo`, `stock`, `id_tipo_insumo`) VALUES(NULL,'".$this->nombre_insumo."','".$this->stock."','".$this->id_tipo_insumo."');";
        $save=$this->db->query($query);
        if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE insumo SET nombre_insumo='".$this->nombre_insumo."', stock='".$this->stock."', estado='".$this->estado."', id_tipo_insumo='".$this->id_tipo_insumo."' WHERE id_insumo='".$this->id__insumo."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM insumo WHERE id_insumo='".$this->id_insumo."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL_Pintura()
    {
        $query="SELECT i.* FROM insumo i, tipo_insumo ti WHERE i.id_tipo_insumo = ti.id_tipo_insumo AND ti.nombre_insumo='Pintura'";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectALL_clavo()
    {
        $query="SELECT i.* FROM insumo i, tipo_insumo ti WHERE i.id_tipo_insumo = ti.id_tipo_insumo AND ti.nombre_insumo='Clavo'";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectALL_subproductos()
    {
        $query="SELECT i.* FROM insumo i, tipo_insumo ti WHERE i.id_tipo_insumo = ti.id_tipo_insumo AND ti.nombre_insumo='Sub_Productos'";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectOne_Type($codigo)
    {
        $query="SELECT * FROM insumo WHERE id_tipo_insumo='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
    public function selectOne($codigo)
    {
        $query="SELECT i.*, ti.nombre_insumo as tipo_insumos FROM insumo i, tipo_insumo ti WHERE  i.id_tipo_insumo = ti.id_tipo_insumo AND i.id_insumo='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

   public function updateCInsumo($id_preset,$tipo,$factor)
    {
        $queryConsulta="SELECT dpi.* FROM detalle_preset_insumo dpi , insumo i WHERE dpi.id_insumo=i.id_insumo AND dpi.id_preset='".$id_preset."' and i.id_tipo_insumo='".$tipo."'";
        $selectall=$this->db->query($queryConsulta);
       $ListDetalle=$selectall->fetch_all(MYSQLI_ASSOC);
       if($selectall->num_rows>0){
       foreach ($ListDetalle as $key) {
           $cantidadDescuento = $key['cantidad'];
             $queryConsulta="SELECT * FROM insumo WHERE id_insumo='".$key['id_insumo']."'";
        $selectall1=$this->db->query($queryConsulta);
       $ListInsumo=$selectall1->fetch_all(MYSQLI_ASSOC);
                foreach ($ListInsumo as $value) {
                    $stock=$value['stock'];
                }
                $cantidad= $stock-($cantidadDescuento*$factor);
           $query="UPDATE insumo SET stock='".$cantidad."' WHERE id_insumo ='".$key['id_insumo']."'";
        $update=$this->db->query($query);
        }
       if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }else{
        return false;
    }
    }

    


}
?>