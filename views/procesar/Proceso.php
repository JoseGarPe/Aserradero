<?php 
require_once "../config/conexion.php";
class Proceso extends conexion
{
private $id_proceso;
private $material_entrada;
private $cantidad_entrada;
private $material_salida;
private $cantidad_salida;
private $productos_creados;
private $rendimiento_esperado;
private $id_contenedor;
private $id_maquina;
private $id_estado;
private $id_tipo_solicitud;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_proceso= "";
        $this->material_entrada = "";
        $this->cantidad_entrada = "";
        $this->material_salida= "";
        $this->cantidad_salida = "";
        $this->productos_creados = "";
        $this->rendimiento_esperado= "";
        $this->id_contenedor = "";
        $this->id_maquina = "";
        $this->id_estado= "";
        $this->id_tipo_solicitud = "";

}

 	public function getId_proceso() {
        return $this->id_proceso;
    }

    public function setId_proceso($id) {
        $this->id_proceso = $id;
    }
    
    public function getMaterial_entrada() {
        return $this->material_entrada;
    }

    public function setMaterial_entrada($me) {
        $this->material_entrada = $me;
    }

    public function getCantidad_entrada() {
        return $this->descripcion;
    }

    public function setCantidad_entrada($cantidad_entrada) {
        $this->cantidad_entrada = $cantidad_entrada;
    }
    public function getMaterial_salida() {
        return $this->material_salida;
    }

    public function setMaterial_salida($material_salida) {
        $this->material_salida = $material_salida;
    }
    public function getCantidad_salida() {
        return $this->cantidad_salida;
    }

    public function setCantidad_salida($cantidad_salida) {
        $this->cantidad_salida = $cantidad_salida;
    }
    public function getProductos_creados() {
        return $this->productos_creados;
    }

    public function setProductos_creados($productos_creados) {
        $this->productos_creados = $productos_creados;
    }
    public function getRendimiento_esperado() {
        return $this->rendimiento_esperado;
    }

    public function setRendimiento_esperado($rendimiento_esperado) {
        $this->rendimiento_esperado = $rendimiento_esperado;
    }
    public function getId_contenedor() {
        return $this->id_contenedor;
    }

    public function setId_contenedor($id_contenedor) {
        $this->id_contenedor = $id_contenedor;
    }
    public function getId_maquina() {
        return $this->id_maquina;
    }

    public function setId_maquina($id_maquina) {
        $this->id_maquina = $id_maquina;
    }
    public function getId_estado() {
        return $this->id_estado;
    }

    public function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }
    public function getId_tipo_solicitud() {
        return $this->id_tipo_solicitud;
    }

    public function setId_tipo_solicitud($id_tipo_solicitud) {
        $this->id_tipo_solicitud = $id_tipo_solicitud;
    }
public 
//---------------------------
function save()
    {
    	$query="INSERT INTO tipo_usuario(id_proceso,material_entrada,cantidad_entrada,material_salida,cantidad_salida,productos_creados,rendimiento_esperado,id_contenedor,id_maquina,id_estado,id_tipo_solicitud)
    			values(NULL,
    			'".$this->material_entrada."',
    			'".$this->cantidad_entrada."',
                '".$this->material_salida."',
                '".$this->cantidad_salida."',
                '".$this->productos_creados."',
                '".$this->rendimiento_esperado."',
                '".$this->id_contenedor."',
                '".$this->id_maquina."',
                '".$this->id_estado."',
                '".$this->id_tipo_solicitud."',
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
        $query="UPDATE tipo_usuario SET nombre='".$this->nombre."', descripcion='".$this->descripcion."' WHERE id_tipo_usuario='".$this->id_tipo_usuario."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM tipo_usuario WHERE id_tipo_usuario='".$this->id_tipo_usuario."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM tipo_usuario";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM tipo_usuario WHERE id_tipo_usuario='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

    


}
?>