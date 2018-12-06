<?php 
require_once "../config/conexion.php";
class DetalleProcesado extends conexion
{
private $id_detalle_procesado;
private $id_materia_prima;
private $cantidad_materia_prima;
private $id_maquina;
private $id_material_saliente;
private $cantidad_saliente;
private $rendimiento_esperado;
private $id_bodega;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_detalle_procesado= "";
        $this->id_materia_prima = "";
        $this->cantidad_materia_prima = "";
        $this->id_maquina = "";
        $this->id_material_saliente = "";
        $this->cantidad_saliente = "";
        $this->rendimiento_esperado = "";
        $this->id_bodega = "";

}

 	public function getId_detalle_procesado() {
        return $this->id_detalle_procesado;
    }

    public function setId_detalle_procesado($id) {
        $this->id_detalle_procesado = $id;
    }
    
    public function getId_materia_prima() {
        return $this->id_materia_prima;
    }

    public function setId_materia_prima($idmateriaprima) {
        $this->id_materia_prima = $idmateriaprima;
    }

    public function getCantidad_materia_prima() {
        return $this->cantidad_materia_prima;
    }

    public function setCantidad_materia_prima($cantidadmateriaprima) {
        $this->cantidad_materia_prima = $cantidadmateriaprima;
    }
    public function getId_maquina() {
        return $this->id_maquina;
    }

    public function setId_maquina($idmaquina) {
        $this->id_maquina = $idmaquina;
    }
    public function getId_material_saliente() {
        return $this->id_material_saliente;
    }

    public function setId_material_saliente($idmaterialsaliente) {
        $this->id_material_saliente = $idmaterialsaliente;
    }
    public function getCantidad_saliente() {
        return $this->cantidad_saliente;
    }

    public function setCantidad_saliente($cantidadsaliente) {
        $this->cantidad_saliente = $cantidadsaliente;
    }

    public function getRendimiento_esperado() {
        return $this->rendimiento_esperado;
    }

    public function setRendimiento_esperado($rendimientoesperado) {
        $this->rendimiento_esperado = $rendimientoesperado;
    }

    public function getId_bodega() {
        return $this->id_bodega;
    }

    public function setId_bodega($idbodega) {
        $this->id_bodega = $idbodega;
    }


      
//---------------------------
function save()
    {
    	$query="INSERT INTO `detalle_procesado` (`id_detalle_procesado`, `id_materia_prima`, `cantidad_materia_prima`, `id_maquina`, `id_material_saliente`, `cantidad_saliente`, `rendimiento_esperado`, `id_bodega`) VALUES (NULL,
    			'".$this->id_materia_prima."',
    			'".$this->cantidad_materia_prima."',
                '".$this->id_maquina."',
                '".$this->id_material_saliente."',
                '".$this->cantidad_saliente."',
                '".$this->rendimiento_esperado."',
                '".$this->id_bodega."'
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
        $query="UPDATE bodegas SET id_materia_prima='".$this->id_materia_prima."', cantidad_materia_prima='".$this->cantidad_materia_prima."', id_maquina='".$this->id_maquina."', id_material_saliente='".$this->id_material_saliente."', cantidad_saliente='".$this->cantidad_saliente."',rendimiento_esperado='".$this->rendimiento_esperado."',id_bodega='".$this->id_bodega."', WHERE id_detalle_procesado='".$this->id_detalle_procesado."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM detalle_procesado WHERE id_detalle_procesado='".$this->id_detalle_procesado."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM detalle_procesado";
        $selectall=$this->db->query($query);
        $Listcantidad_materia_prima=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listcantidad_materia_prima;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM detalle_procesado WHERE id_detalle_procesado='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listcantidad_materia_prima=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listcantidad_materia_prima;
    }

    


}
?>