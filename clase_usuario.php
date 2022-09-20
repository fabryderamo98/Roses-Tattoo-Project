<?php
class usuario extends conexion
{
    private $_id;
    private $_nombre;
	private $_apellido;
    private $_email;
    private $_username;
    private $_clave;
    
    public function setId($valor){$this->_id = $valor;}
    public function set_nombre($valor){$this->_nombre = $valor;}
	public function set_apellido($_valor){$this->_apellido= $_valor;}
    public function set_email($valor){$this->_email = $valor;}
    public function set_usuario($valor){$this->_usuario = $valor;}
    public function set_clave($valor){$this->_clave= $valor;}
    
    public function get_id(){return $this->_id;}
    public function get_nombre(){return $this->_nombre;}
	public function set_Apellido(){return $this->_apellido;}
    public function get_email(){return $this->_email;}
    public function get_usuario(){return $this->_usuario;}
    public function get_clave(){return $this->_clave;}
    
    public function verificar_user($username)
    {
        try
        {
            $sql="SELECT * FROM usuarios WHERE usuario=?";
            $stm=$this->pdo->prepare($sql);
            $stm->execute(array($usuario));
            
            $r=$stm->fetch(PDO::FETCH_OBJ);
            
            if($r!=NULL) return 1;
            else return 0;
        }
        catch(Exception $e){
        {
            die ($e->getMessage());
        }
    }
}
    public function obtener_user($usuario,$clave){
        try{
            $sql="SELECT * FROM usuarios WHERE usuario=? AND clave=?";
            $stm=$this->pdo->prepare($sql);
            $stm->execute(array($usuario,$clave));
            
            $r = $stm->fetch(PDO::FETCH_OBJ);
            
            $user = new usuario ();
            
            $user->set_id($r->id);
            $user->set_nombre($r->nombre);
			$user->set_apellido($r->apellido);
            $user->set_email($r->email);
            $user->set_usuario($r->usuario);
            $user->set_clave($r->clave);
            
            return $user;
            }
            catch(exception $e)
            {
                die ($e->getMessage());
                }
        }
        
    
   public function registrar_user(usuario $data)
   {
    try
    {
        $sql= "INSERT INTO usuarios (nombre,apellido,email,usuario,clave) VALUES (?,?,?,?,?)";
        
        $this->pdo->prepare($sql)
        ->execute(
            array (
            $data->get_nombre(),
			$data->get_apellido(),
            $data->get_email(),
            $data->get_usuario(),
            $data->get_clave())
            );
        }catch (exception $e)
        {
            die($e->getMessage());
        }
        
        }
}        
?>            
            
    
            
        
    
  
 