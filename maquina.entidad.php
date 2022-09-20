<?php
class Maquina
{
    private $_id_maquina;
    private $_tipo;
    private $_marca;
	private $_precio;

    
    public function set_id_maquina($valor){$this->_id_maquina=$valor;}
    public function set_tipo($valor){$this->_tipo=$valor;}
	public function set_marca($valor){$this->_marca=$valor;}
	public function set_precio($valor){$this->_precio=$valor;}
    
    public function get_id_maquina(){return $this->_id_maquina;}
    public function get_tipo(){return $this->_tipo;}
    public function get_marca(){return $this->_marca;}
	public function get_precio(){return $this->_precio;}
	
	

}
?>