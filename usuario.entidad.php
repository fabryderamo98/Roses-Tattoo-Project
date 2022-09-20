<?php
class Usuario
{
    private $_id_usuario;
    private $_usuario;
    private $_nombre;
    private $_apellido;
	private $_email;
	private $_clave;

    
    public function set_id_usuario($valor){$this->_id_usuario=$valor;}
	public function set_usuario($valor) {$this->_usuario=$valor;}
    public function set_nombre($valor){$this->_nombre=$valor;}
	public function set_apellido($valor){$this->_apellido=$valor;}
	public function set_email($valor){$this->_email=$valor;}
	public function set_clave($valor){$this->_clave=$valor;}
  
  
    
    public function get_id_usuario(){return $this->_id_usuario;}
	public function get_usuario(){return $this->_usuario;} 
    public function get_nombre(){return $this->_nombre;}
    public function get_apellido(){return $this->_apellido;}
	public function get_email(){return $this->_email;}
	public function get_clave(){return $this->_clave;}
	
	
}
?>