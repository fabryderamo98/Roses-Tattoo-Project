<?php
class Disenio
{
    private $_id_disenio;
    private $_tamanio;
	private $_dibujo;

    
    public function set_id_disenio($valor){$this->_id_disenio=$valor;}
    public function set_tamanio($valor){$this->_tamanio=$valor;}
	public function set_dibujo($valor){$this->_dibujo=$valor;}
    
    public function get_id_disenio(){return $this->_id_disenio;}
    public function get_tamanio(){return $this->_tamanio;}
	public function get_dibujo(){return $this->_dibujo;}
	
	

}
?>