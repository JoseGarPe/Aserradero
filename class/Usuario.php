<?php 
require_once "../config/conexion.php";

class Usuario extends conexion
{
	private $id_usuario;
	private $nombre;
	private $apellido;
	private $correo;
	private $telefono;
	private $contrasena;
	private $id_tipo_usuario;

	function __construct()
	{
		parent::__construct();

		$this->id_usuario ="";
		$this->nombre ="";
		$this->apellido ="";
		$this->correo ="";
		$this->telefono ="";
		$this->contrasena ="";
		$this->id_tipo_usuario ="";
	}

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($idUsuario){
		$this->id_usuario= $idUsuario;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre= $nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function setApellido($apellido){
		$this->apellido= $apellido;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($email){
		$this->correo= $email;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono= $telefono;
	}

	public function getContrasena(){
		return $this->contrasena;
	}

	public function setContrasena($contrasena){
		$this->contrasena= $contrasena;
	}
	public function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    public function setId_tipo_usuario($id_TipoUsuario) {
        $this->id_tipo_usuario = $id_TipoUsuario;
    }

    public function save(){
    	 $password = hash('sha256', $this->contrasena);
    	$query="INSERT INTO usuarios(id_usuarios, nombre, apellido, correo, telefono, contrasena, id_tipo_usuario) values(NULL,'".$this->nombre."','".$this->apellido."','".$this->correo."','".$this->telefono."','".$password."','".$this->id_tipo_usuario."')";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
    public function update(){

         $password = hash('sha256', $this->contrasena);
    	$query="UPDATE usuarios SET nombre='".$this->nombre."', apellido='".$this->apellido."', correo='".$this->correo."', telefono='".$this->telefono."', contrasena='".$password."', id_tipo_usuario='".$this->id_tipo_usuario."' WHERE id_usuarios='".$this->id_usuario."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  

    }
    public function delete(){
    	$query="DELETE FROM usuarios WHERE id_usuarios='".$this->id_usuario."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL(){
    	$query="SELECT u.id_usuarios, u.nombre, u.apellido, u.correo, u.telefono, u.contrasena, t.nombre as tipo FROM usuarios u INNER JOIN tipo_usuario t ON u.id_tipo_usuario = t.id_tipo_usuario";
    	$selectall=$this->db->query($query);
    	
    	$ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);

        return $ListUsuario;
    }
     public function passMD5(){

    }

     public function selectOne($codigo)
    {
        $query="SELECT * FROM usuarios WHERE id_usuarios='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListUsuario;
    }

    public function login(){

        $pass = hash("sha256", $this->contrasena);
        $query1="SELECT u.*, tu.nombre as tipo_usuario FROM usuarios u INNER JOIN tipo_usuario tu ON tu.id_tipo_usuario=u.id_tipo_usuario WHERE u.correo='".$this->correo."' AND u.contrasena='".$pass."'";
        $selectall1=$this->db->query($query1);
        $ListUsuario=$selectall1->fetch_all(MYSQLI_ASSOC);

        if ($selectall1->num_rows!=0) {

            foreach ($ListUsuario as $key) {
            if ($key["id_tipo_usuario"]==1) {
                session_start();
                
                $_SESSION['logged-in'] = true;
                $_SESSION['Administrador']= $this->correo;
                $_SESSION['id_usuario']=$key['id_usuarios'];
                $_SESSION['nombre_usuario']=$key['nombre'] ." ".$key['apellido'];
                $_SESSION['id_tipo_usuario']=$key['id_tipo_usuario'];
                $_SESSION['tipo_usuario']=$key['tipo_usuario'];
                $_SESSION['tiempo']=time();

        $query1="INSERT INTO bitacora(id_bitacora,id_usuario, fecha,hora_ingreso,descripcion) values(NULL,'".$key['id_usuarios']."',CURDATE(),TIME(NOW()),'Ingreso al sistema')";
        $save=$this->db->query($query1);

                return 1;
            }
            elseif($key["id_tipo_usuario"]!=1){
              session_start();
                $_SESSION['logged-in'] = true;
                $_SESSION['Usuario']= $this->correo;
                $_SESSION['nombre_usuario']=$key['nombre'] ." ".$key['apellido'];
                $_SESSION['id_tipo_usuario']=$key['id_tipo_usuario'];
                $_SESSION['id_usuario']=$key['id_usuarios'];
                $_SESSION['tipo_usuario']=$key['tipo_usuario'];
                $_SESSION['tiempo']=time();
                $query1="INSERT INTO bitacora(id_bitacora,id_usuario, fecha,hora_ingreso) values(NULL,'".$key['id_usuarios']."',CURDATE(),TIME(NOW()),'Ingreso al sistema')";
        $save=$this->db->query($query1);

                return 2;
            }
            else{
                $_SESSION['logged-in'] = false;
                return 3;
            }
        }
            
        }

    }

     public function LOGOUT($usua){
       $query1="INSERT INTO bitacora(id_bitacora,id_usuario,fecha,hora_ingreso,descripcion) values(NULL,'".$usua."',CURDATE(),TIME(NOW()),'Salio al sistema')";
        $save=$this->db->query($query1);
        if ($save==true) {
            return true;
        }else {
            return false;
        }   


    }
      public function selectALL_BITACORAS()
    {
        $query="SELECT b.*,u.nombre FROM bitacora b INNER JOIN usuarios u ON u.id_usuarios = b.id_usuario";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }





}



		

?>