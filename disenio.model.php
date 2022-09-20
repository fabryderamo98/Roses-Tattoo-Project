<?php
require_once("conexion.php");
class DisenioModel
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
            
            $stm=$this->pdo->prepare("SELECT * FROM disenio");
            $stm->execute();
            
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $dis=new Disenio();
                $dis->set_id_disenio($r->id_disenio);
                $dis->set_tamanio($r->tamanio);
				$dis->set_dibujo($r->dibujo);
				
                
                $result [] = $dis;
            }
                return $result;
           }catch(Exception $e)
                {
                    die($e->getMessage());
                    
                }
                
                
                
                
      }
 
 
 public function Obtener($id_disenio)
 {
    try
    {
        $stm = $this->pdo->prepare("SELECT * FROM disenio WHERE id_disenio =?");
        $stm->execute(array($id_disenio));
        
        $r = $stm->fetch(PDO::FETCH_OBJ);
        
        $dis = new Disenio();
        
      			$dis->set_id_disenio($r->id_disenio);
                $dis->set_tamanio($r->tamanio);
				$dis->set_dibujo($r->dibujo);
			
				
        return $dis;
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }
 public function Eliminar ($id_disenio)
 {
    try
    {
        $stm = $this->pdo->prepare("DELETE FROM disenio WHERE id_disenio= ?");
        
        $stm->execute (array($id_disenio));
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }       
 public function Actualizar (Disenio $data)
 {
    try
    {
        $sql = "UPDATE disenio SET
                    Tamanio       =?,
					Dibujo      =?
                 WHERE id_disenio = ?";
                 
             $this->pdo->prepare($sql)
              -> execute(
              array(
                $data->get_tamanio(),
				$data->get_dibujo(),
                $data->get_id_disenio()
                )
              );
            } catch (Exception $e)
            
            {
                die($e->getMessage());
            }  
                
              
    }
 public function Registrar(Disenio $data)
 {
    try
    {
        $sql="INSERT INTO disenio (tamanio,dibujo)
		VALUES (?,?,?)";
                   
              
        $this->pdo->prepare($sql)
             ->execute(
             array(
                 $data->get_tamanio(),
				$data->get_dibujo()
                 )
            );
           }catch (Exception $e)
           {
            die($e->getMessage());
                   
        
    }
 }   
 }   
?>