<?php 
require_once "../config/conexion.php";
class Movimiento extends conexion
{
private $id_movimiento;
private $id_tipo_movimiento;
private $fecha;
private $cantidad;
private $id_insumo;
private $factura;

public function __construct()
{
    parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_tipo_movimiento= "";
        $this->fecha = "";
        $this->cantidad = "";
        $this->id_movimiento = "";
        $this->id_insumo = "";
        $this->factura = "";

}
    public function getId_movimiento() {
        return $this->id_movimiento;
    }

    public function setId_movimiento($id) {
        $this->id_movimiento = $id;
    }

    public function getId_tipo_movimiento() {
        return $this->id_tipo_movimiento;
    }

    public function setId_tipo_movimiento($id) {
        $this->id_tipo_movimiento = $id;
    }
    
    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function getId_insumo() {
        return $this->id_insumo;
    }

    public function setId_insumo($id_insumo) {
        $this->id_insumo = $id_insumo;
    }
    public function getfactura() {
        return $this->factura;
    }

    public function setfactura($factura) {
        $this->factura = $factura;
    }

public function save()
    {
        $query="INSERT INTO `movimiento`(`id_movimiento`, `fecha`, `cantidad`, `id_insumo`, `id_tipo_movimiento`) VALUES(NULL,'".$this->fecha."','".$this->cantidad."','".$this->id_insumo."','".$this->id_tipo_movimiento."');";
        $save=$this->db->query($query);
        if ($save==true) {
             $query="SELECT * FROM insumo WHERE id_insumo=$this->id_insumo";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        foreach ($ListTipoUsuario as $key) {
            $cantidad_anterior=$key['stock'];
        }
        $nueva_cantidad = $cantidad_anterior+$this->cantidad;
             $query="UPDATE insumo SET stock='".$nueva_cantidad."' WHERE id_insumo='".$this->id_insumo."'";
        $update=$this->db->query($query);
        if ($update==true) {
              return true;
        }else {
            return false;
        }   
          
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE movimiento SET fecha='".$this->fecha."', cantidad='".$this->cantidad."', id_insumo='".$this->id_insumo."', id_tipo_movimiento='".$this->id_tipo_movimiento."' WHERE id_tipo_movimiento='".$this->id_tipo_movimiento."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM movimiento WHERE id_tipo_movimiento='".$this->id_tipo_movimiento."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM movimiento";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectAll_movimientos($codigo)
    {
        $query="SELECT m.*, tm.nombre_movimiento as tipo_movimiento FROM movimiento m , tipo_movimiento tm WHERE m.id_tipo_movimiento = tm.id_tipo_movimiento AND m.id_insumo='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM movimiento WHERE id_movimiento='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

    


}
?>