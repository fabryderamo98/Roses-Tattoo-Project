<?php
class Accesorio
{
    private $_id_accesorio;
    private $_material;
    private $_tamanio;
	private $_precio;

    
    public function set_id_accesorio($valor){$this->_id_accesorio=$valor;}
    public function set_material($valor){$this->_material=$valor;}
	public function set_tamanio($valor){$this->_tamanio=$valor;}
	public function set_precio($valor){$this->_precio=$valor;}

  
    
    public function get_id_accesorio(){return $this->_id_accesorio;}
    public function get_material(){return $this->_material;}
    public function get_tamanio(){return $this->_tamanio;}
	public function get_precio(){return $this->_precio;}
	

}
?>