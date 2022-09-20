<?php
require_once("conexion.php");
class DiseñoModel
{
	//atributos
	//private $con ;
	private $pdo;
	
	//metodos
	
	public function _construct()
	{
	$con = new conexion();// instancia de clase conexion
	$this->$pdo = $con->getConexion(); //guardo en pdo la conexion
	}
    public function Listar()
    {
        try{
            $result=array();
            
            $stm=$this->pdo->prepare("SELECT * FROM diseño");
            $stm->execute();
            
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $dise=new Diseño();
                
                $dise->set_id($r->id);
                $dise->set_tipo($r->Tipo);
                $dise->set_tamaño($r->Tamaño);
				$dise->set_dibujo($r->Dibujo);
				$dise->set_precio($r->Precio);
				
                
                $result [] = $dise;
            }
                return $result;
           }
                catch(Exception $e)
                {
                    die($e->getMessage());
                    
                }
                
                
                
                
      }
 
 
 public function Obtener($id)
 {
    try
    {
        $stm = $this->pdo->prepare("SELECT * FROM diseño WHERE id =?");
        $stm->execute(array($id));
        
        $r = $stm->fetch(PDO::FETCH_OBJ);
        
        $dise = new Diseño();
        
       $dise->set_id($r->id);
                $dise->set_tipo($r->Tipo);
                $dise->set_tamaño($r->Tamaño);
				$dise->set_dibujo($r->Dibujo);
				$dise->set_precio($r->Precio);
				
        return $dise;
        
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
        $stm = $this->pdo->prepare("DELETE FROM diseño WHERE id= ?");
        
        $stm->execute (array($id));
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }       
 public function Actualizar (Diseño $data)
 {
    try
    {
        $sql = "UPDATE diseño SET
                    Tipo       =?,
                    Tamaño       =?,
					Dibujo      =?,
					Precio		=?,
                 WHERE id = ?";
                 
             $this->pdo->prepare($sql)
              -> execute(
              array(
                $data->get_tipo(),
                $data->get_tamaño(),
				$data->get_dibujo(),
                $data->get_precio()
                )
              );
            } catch (Exception $e)
            
            {
                die($e->getMessage());
            }  
                
              
    }
 public function Registrar(Diseño $data)
 {
    try
    {
        $sql="INSERT INTO diseño (Tipo,Tamaño,Dibujo,Precio)
		VALUES (?,?,?,?)";
                   
              
        $this->pdo->prepare($sql)
             ->execute(
             array(
                $data->get_tipo(),
                $data->get_tamaño(),
				$data->get_dibujo(),
				$data->get-precio(),
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