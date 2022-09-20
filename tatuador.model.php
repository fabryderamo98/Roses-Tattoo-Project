<?php
require_once("conexion.php");
class TatuadorModel
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
            
            $stm=$this->pdo->prepare("SELECT * FROM tatuador");
            $stm->execute();
            
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $tatu=new Tatuador();
                $tatu->set_id_tatuador($r->Id_tatuador);
                $tatu->set_nombre($r->nombre);
                $tatu->set_apellido($r->apellido);
				$tatu->set_dni($r->dni);
				
                
                $result [] = $tatu;
            }
                return $result;
           }catch(Exception $e)
                {
                    die($e->getMessage());
                    
                }
                
                
                
                
      }
 
 
 public function Obtener($id_tatuador)
 {
    try
    {
        $stm = $this->pdo->prepare("SELECT * FROM tatuador WHERE id_tatuador =?");
        $stm->execute(array($id_tatuador));
        
        $r = $stm->fetch(PDO::FETCH_OBJ);
        
        $tatu = new Tatuador();
        
      			$tatu->set_id_tatuador($r->Id_tatuador);
                $tatu->set_nombre($r->nombre);
                $tatu->set_apellido($r->apellido);
				$tatu->set_dni($r->dni);
				
        return $tatu;
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }
 public function Eliminar ($id_tatuador)
 {
    try
    {
        $stm = $this->pdo->prepare("DELETE FROM tatuador WHERE id_tatuador= ?");
        
        $stm->execute (array($id_tatuador));
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }       
 public function Actualizar (Tatuador $data)
 {
    try
    {
        $sql = "UPDATE tatuador SET
                    Nombre       =?,
                    Apellido       =?,
					   Dni       =?
                 WHERE id_tatuador = ?";
                 
             $this->pdo->prepare($sql)
              -> execute(
              array(
                $data->get_nombre(),
                $data->get_apellido(),
				$data->get_dni(),
                $data->get_id_tatuador()
                )
              );
            } catch (Exception $e)
            
            {
                die($e->getMessage());
            }  
                
              
    }
 public function Registrar(Tatuador $data)
 {
    try
    {
        $sql="INSERT INTO Tatuador (Nombre,Apellido,Dni)
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