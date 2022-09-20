<?php
class Cliente
{
    private $_id_clientes;
    private $_nombre;
    private $_apellido;
	private $_dni;

    
    public function set_id_clientes($valor){$this->_id_clientes=$valor;}
    public function set_nombre($valor){$this->_nombre=$valor;}
	public function set_apellido($valor){$this->_apellido=$valor;}
	public function set_dni($valor){$this->_dni=$valor;}

  
    
    public function get_id_clientes(){return $this->_id_clientes;}
    public function get_nombre(){return $this->_nombre;}
    public function get_apellido(){return $this->_apellido;}
	public function get_dni(){return $this->_dni;}
	

}
?>