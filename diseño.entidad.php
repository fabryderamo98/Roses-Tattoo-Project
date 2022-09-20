
<?php
class Diseño
{
    private $_id;
    private $_tipo;
    private $_tamaño;
    private $_dibujo;
	private $_precio;

    
    public function set_id($valor){$this->_id=$valor;}
    public function set_tipo($valor){$this->_tipo;}
	public function set_tamaño($valor){$this->_tamaño;}
	public function set_dibujo($valor){$this->_dibujo;}
	public function set_precio($valor){$this->_precio;}

  
    
    public function get_id(){return $this->_id;}
    public function get_tipo(){return $this->_tipo;}
    public function get_tamaño(){return $this->_tamaño;}
	public function get_dibujo(){return $this->_dibujo;}
	public function get_precio(){return $this->_precio;}
	
	
	
}
?>