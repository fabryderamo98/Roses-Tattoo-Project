<?php
class Turnos
{
    private $_id_turnos;
    private $_id_cliente;
    private $_id_tatuador;
	private $_id_disenio;
	private $_fecha;
	private $_hora;
	private $_precio;

    
    public function set_id_turnos($valor){$this->_id_turnos=$valor;}
    public function set_id_cliente($valor){$this->_id_cliente=$valor;}
	public function set_id_tatuador($valor){$this->_id_tatuador=$valor;}
	public function set_id_disenio($valor){$this->_id_disenio=$valor;}
	public function set_fecha($valor){$this->_fecha=$valor;}
	public function set_hora($valor){$this->_hora=$valor;}
	public function set_precio($valor){$this->_precio=$valor;}
    
    public function get_id_turnos(){return $this->_id_turnos;}
    public function get_id_cliente(){return $this->_id_cliente;}
    public function get_id_tatuador(){return $this->_id_tatuador;}
	public function get_id_disenio(){return $this->_id_disenio;}
	public function get_fecha(){return $this->_fecha;}
	public function get_hora(){return $this->_hora;}
	public function get_precio(){return $this->_precio;}
	
	

}
?>