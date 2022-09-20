<?php
require_once("conexion.php");
class ClienteModel
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
	
    public function Listar()
    {
        try{
            $result=array();
            
            $stm=$this->pdo->prepare("SELECT * FROM clientes");
            $stm->execute();
            
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $clien=new Cliente();
                $clien->set_id_clientes($r->Id_clientes);
                $clien->set_nombre($r->Nombre);
                $clien->set_apellido($r->Apellido);
				$clien->set_dni($r->Dni);
				
                
                $result [] = $clien;
            }
                return $result;
           }catch(Exception $e)
                {
                    die($e->getMessage());
                    
                }
                
                
                
                
      }
 
 
 public function Obtener($id_clientes)
 {
    try
    {
        $stm = $this->pdo->prepare("SELECT * FROM clientes WHERE id_clientes =?");
        $stm->execute(array($id_clientes));
        
        $r = $stm->fetch(PDO::FETCH_OBJ);
        
        $clien = new Cliente();
        
      			$clien->set_id_clientes($r->Id_clientes);
                $clien->set_nombre($r->Nombre);
                $clien->set_apellido($r->Apellido);
				$clien->set_dni($r->Dni);
				
        return $clien;
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }
 public function Eliminar ($id_clientes)
 {
    try
    {
        $stm = $this->pdo->prepare("DELETE FROM clientes WHERE id_clientes= ?");
        
        $stm->execute (array($id_clientes));
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }       
 public function Actualizar (Cliente $data)
 {
    try
    {
        $sql = "UPDATE clientes SET
                    Nombre       =?,
                    Apellido       =?,
					   Dni       =?
                 WHERE id_clientes = ?";
                 
             $this->pdo->prepare($sql)
              -> execute(
              array(
                $data->get_nombre(),
                $data->get_apellido(),
				$data->get_dni(),
                $data->get_id_clientes()
                )
              );
            } catch (Exception $e)
            
            {
                die($e->getMessage());
            }  
                
              
    }
 public function Registrar(Cliente $data)
 {
    try
    {
        $sql="INSERT INTO Clientes (Nombre,Apellido,Dni)
		VALUES (?,?,?)";
                   
              
        $this->pdo->prepare($sql)
             ->execute(
             array(
                 $data->get_nombre(),
                $data->get_apellido(),
                $data->get_dni()
                 )
            );
           }catch (Exception $e)
           {
            die($e->getMessage());
                   
        
    }
 }   
 }   
?>