<?php
class Tatuador
{
    private $_id_tatuador;
    private $_nombre;
    private $_apellido;
	private $_dni;

    
    public function set_id_tatuador($valor){$this->_id_tatuador=$valor;}
    public function set_nombre($valor){$this->_nombre=$valor;}
	public function set_apellido($valor){$this->_apellido=$valor;}
	public function set_dni($valor){$this->_dni=$valor;}

  
    
    public function get_id_tatuador(){return $this->_id_tatuador;}
    public function get_nombre(){return $this->_nombre;}
    public function get_apellido(){return $this->_apellido;}
	public function get_dni(){return $this->_dni;}
	

}
?>