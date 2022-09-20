<?php
require_once("conexion.php");
class MaquinaModel
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
            
            $stm=$this->pdo->prepare("SELECT * FROM maquina");
            $stm->execute();
            
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $maq=new Maquina();
                $maq->set_id_maquina($r->Id_maquina);
                $maq->set_tipo($r->tipo);
                $maq->set_marca($r->marca);
				
                
                $result [] = $maq;
            }
                return $result;
           }catch(Exception $e)
                {
                    die($e->getMessage());
                    
                }
                
                
                
                
      }
 
 
 public function Obtener($id_maquina)
 {
    try
    {
        $stm = $this->pdo->prepare("SELECT * FROM maquina WHERE id_maquina =?");
        $stm->execute(array($id_maquina));
        
        $r = $stm->fetch(PDO::FETCH_OBJ);
        
        $maq = new Maquina();
        
      			$maq->set_id_maquina($r->Id_maquina);
                $maq->set_tipo($r->tipo);
                $maq->set_marca($r->marca);
			
				
        return $maq;
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }
 public function Eliminar ($id_maquina)
 {
    try
    {
        $stm = $this->pdo->prepare("DELETE FROM maquina WHERE id_maquina= ?");
        
        $stm->execute (array($id_maquina));
        
    }
    catch(Exception $e)
    {
        die($e->getMessage());
        
    }
 }       
 public function Actualizar (Maquina $data)
 {
    try
    {
        $sql = "UPDATE maquina SET
                    Tipo       =?,
                    Marca       =?
                 WHERE id_maquina = ?";
                 
             $this->pdo->prepare($sql)
              -> execute(
              array(
                $data->get_tipo(),
                $data->get_marca(),
                $data->get_id_maquina()
                )
              );
            } catch (Exception $e)
            
            {
                die($e->getMessage());
            }  
                
              
    }
 public function Registrar(Maquina $data)
 {
    try
    {
        $sql="INSERT INTO maquina (tipo,marca)
		VALUES (?,?)";
                   
              
        $this->pdo->prepare($sql)
             ->execute(
             array(
                 $data->get_tipo(),
                $data->get_marca()
                 )
            );
           }catch (Exception $e)
           {
            die($e->getMessage());
                   
        
    }
 }   
 }   
?>