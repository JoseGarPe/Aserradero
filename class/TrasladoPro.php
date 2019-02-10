<?php 
require_once "../config/conexion.php";

class TrasladoPro extends conexion
{
    private $id_traslado_pro;
    private $bodega_origen;
    private $id_preset;
    private $cantidad;
    private $bodega_destino;
    private $estado;

    function __construct()
    {
        parent::__construct();
        $this->id_traslado_pro ="";
        $this->bodega_origen ="";
        $this->id_preset ="";
        $this->cantidad ="";
        $this->bodega_destino ="";
        $this->estado ="";
    }

    public function getId_traslado_pro(){
        return $this->id_traslado_pro;
    }

    public function setId_traslado_pro($idtraslado_pro){
        $this->id_traslado_pro= $idtraslado_pro;
    }

    public function getBodega_origen(){
        return $this->bodega_origen;
    }

    public function setBodega_origen($bodega_origen){
        $this->bodega_origen= $bodega_origen;
    }

    public function getId_preset(){
        return $this->id_preset;
    }

    public function setId_preset($id_preset){
        $this->id_preset= $id_preset;
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

        $query="INSERT INTO traslado_pro(id_traslado_pro, bodega_origen, id_preset, cantidad, bodega_destino, estado) values(NULL,'".$this->bodega_origen."','".$this->id_preset."','".$this->cantidad."','".$this->bodega_destino."','No Confirmado')";
        $save=$this->db->query($query);
        if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

        $query="UPDATE traslado_pro SET estado='".$this->estado."' WHERE id_traslado_pro ='".$this->id_traslado_pro."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
        $query="DELETE FROM traslado_pro WHERE id_traslado_pro='".$this->id_traslado_pro."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM traslado_pro";
        $selectall=$this->db->query($query);
        $Listtraslado_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listtraslado_pro;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT t.*, m.nombre FROM traslado_pro t INNER JOIN presetes m ON m.id_preset=t.id_preset WHERE id_traslado_pro='".$codigo."'";
        $selectall=$this->db->query($query);
       $Listtraslado_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listtraslado_pro;
    }
    public function selectTraslado_proDestino($codigo)
    {
        $query="SELECT t.*, m.nombre FROM traslado_pro t INNER JOIN presets m ON m.id_preset=t.id_preset WHERE bodega_destino='".$codigo."' AND estado = 'No Confirmado'";
        $selectall=$this->db->query($query);
       $Listtraslado_pro=$selectall->fetch_all(MYSQLI_ASSOC);
        return $Listtraslado_pro;
    }



}



        

?>