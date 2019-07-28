<?php 
require_once "../config/conexion.php";

class Traslado extends conexion
{
    private $id_traslado;
    private $bodega_origen;
    private $id_material;
    private $cantidad;
    private $bodega_destino;
    private $estado;

    function __construct()
    {
        parent::__construct();
        $this->id_traslado ="";
        $this->bodega_origen ="";
        $this->id_material ="";
        $this->cantidad ="";
        $this->bodega_destino ="";
        $this->estado ="";
    }

    public function getId_traslado(){
        return $this->id_traslado;
    }

    public function setId_traslado($idtraslado){
        $this->id_traslado= $idtraslado;
    }

    public function getBodega_origen(){
        return $this->bodega_origen;
    }

    public function setBodega_origen($bodega_origen){
        $this->bodega_origen= $bodega_origen;
    }

    public function getId_material(){
        return $this->id_material;
    }

    public function setId_material($id_material){
        $this->id_material= $id_material;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function setCantidad($cantidad){
        $this->cantidad= $cantidad;
    }

    public function getBodega_Destino(){
        return $this->bodega_destino;
    }

    public function setBodega_Destino($bodega_destino){
        $this->bodega_destino= $bodega_destino;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado= $estado;
    }



    public function save(){

        $query="INSERT INTO traslado(id_traslado, bodega_origen, id_material, cantidad, bodega_destino, estado) values(NULL,'".$this->bodega_origen."','".$this->id_material."','".$this->cantidad."','".$this->bodega_destino."','No Confirmado')";
        $save=$this->db->query($query);
        if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

        $query="UPDATE traslado SET estado='".$this->estado."' WHERE id_traslado ='".$this->id_traslado."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
        $query="DELETE FROM traslado WHERE id_traslado='".$this->id_traslado."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM traslado";
        $selectall=$this->db->query($query);
        $Listtraslado=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listtraslado;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT t.*, m.nombre FROM traslado t INNER JOIN materiales m ON m.id_material=t.id_material WHERE id_traslado='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listtraslado=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listtraslado;
    }
    public function selectTrasladoDestino($codigo)
    {
        $query="SELECT t.*, m.nombre FROM traslado t INNER JOIN materiales m ON m.id_material=t.id_material WHERE bodega_destino='".$codigo."' AND estado = 'No Confirmado'";
        $selectall=$this->db->query($query);
       $Listtraslado=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listtraslado;
    }



}



        

?>