<?php
require_once("conexion.php");
class UsuarioModel
{
	//atributos
	//private $con ;
	private $pdo;
	
	//metodos
	
	public function __construct()
	{
	$con = new conexion();// instancia de clase conexion
	$this->pdo = $con->getConexion(); //guardo en pdo la conexion
	}
	//---------------------------------------------------------------------- LISTAR USUARIOS -----------------------------------------------
    public function Listar()
    {
        try{
            $result=array();
            
            $stm=$this->pdo->prepare("SELECT * FROM usuarios");
			
            $stm->execute();
            
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $user=new Usuario();
                
                $user->set_id_usuario($r->id_usuario);
				$user->set_usuario($r->Usuario);
                $user->set_nombre($r->Nombre);
                $user->set_apellido($r->Apellido);
				$user->set_email($r->Email);
				$user->set_clave($r->Clave);
				
                
                $result [] = $user;
            }
                return $result;
           }
                catch(Exception $e)
                {
                    die($e->getMessage());
                    
                }
                
                
                
                
      }
 //---------------------------------------------------------------------- LOGIN -----------------------------------------------
	 public function Login(Usuario $data)
	 {
		try
		{
			$sql="SELECT nombre, apellido FROM usuarios WHERE usuario=? and clave=?";
			$stm = $this->pdo->prepare($sql);
			$stm->execute(array($data->get_usuario(),$data->get_clave()));
			echo $data->get_usuario();
			echo $data->get_clave();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$user= new Usuario;
			$user->set_nombre($r->nombre);
            $user->set_apellido($r->apellido);
			//$cantreg=mysql_num_rows();

				return $user;

		}
		catch(Exception $e)
		{
			die($e->getMessage());
			
		}
	 }
	 
 	//---------------------------------------------------------------------- OBTENER USUARIO -----------------------------------------------
 public function Obtener($id)
 {
    try
    {
        $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE id =?");
		
        $stm->execute(array($id));
        
        $r = $stm->fetch(PDO::FETCH_OBJ);
        
        $user = new Usuario();
        
       $user->set_id($r->id);
                $user->set_nombre($r->Nombre);
                $user->set_apellido($r->Apellido);
				$user->set_email($r->Email);
				$user->set_usuario($r->Usuario);
				$user->set_clave($r->Clave);
				
        return $user;
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }
 public function Eliminar ($id)
 {
    try
    {
        $stm = $this->pdo->prepare("DELETE FROM usuarios WHERE id= ?");
        
        $stm->execute (array($id));
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }       
 public function Actualizar (Usuario $data)
 {
    try
    {
        $sql = "UPDATE usuarios SET
                    Nombre       =?,
                    Apellido       =?,
					 Email       =?,
						   Usuario       =?,
						    Clave       =?,
                 WHERE id = ?";
                 
             $this->pdo->prepare($sql)
              -> execute(
              array(
                $data->get_nombre(),
                $data->get_apellido(),
				$data->get_email(),
				$data->get_usuario(),
				$data->get_clave(),
                $data->get_id()
                )
              );
            } catch (Exception $e)
            
            {
                die($e->getMessage());
            }  
                
              
    }
	 public function Registrar(Usuario $data)
	 {
		try
		{
			$sql="INSERT INTO usuarios (Usuario,Nombre,Apellido,Email,Clave)
			VALUES (?,?,?,?,?)";
					   
				  
			$this->pdo->prepare($sql)
			
				 ->execute(
				 array(
					 $data->get_usuario(),
					$data->get_nombre(),
					$data->get_apellido(),
					$data->get_email(),
					$data->get_clave(),
					$data->get_id()
					 )
				);
			   }catch (Exception $e)
			   {
				die($e->getMessage());
					   
			
		}
	 }   
	

 }   
?>