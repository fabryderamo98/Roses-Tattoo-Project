<?php
	require_once("conexion.php");

	class UsuarioModel{

		public function __construct(){

			$con= New conexion(); //instancia de la clase conexion
			$this->pdo=$con->getConexion(); //guardo en pdo la conexion de la misma
		}

			public function listar(){  //trae a los usuarios de la tabla 

				try{

					$result=array();

					$stm=$this->pdo->prepare("SELECT u.idUsuario, u.idCargo, u.nombre, u.apellido, u.usuario, u.clave, c.cargo FROM usuarios as u inner join cargos as c on u.idCargo=c.idCargo"); //trae toda la tabla usuario
					$stm->execute();//ajecuta la consulta

					foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) { //recorre una lista de objetos usuario que lo guarda en la variable r

						$Tur= new Turnos(); //se crea un usuario

						$Tur->set_id_turnos($r->id_turnos); //guarda en usuario el id del objeto recuperado de la lista de objetos
						$Tur->set_id_cliente($r->id_cliente);
						$Tur->set_id_tatuador($r->id_turnos);
						$Tur->set_id_disenio($r->id_disenio);
						$Tur->set_fecha($r->fecha);
						$Tur->set_hora($r->hora);
						$Tur->set_precio($r->precio);

						$result[]=$Tur;

					}
					return $result;

				}
				catch(Exception $e){
					die($e->getMessage());
				}

			}

			public function obtener($_id_turnos) { //busca un objeto usuario segun id

				try{

					$stm=$this->pdo->prepare("SELECT * FROM turnos where id_turnos=?"); //prepara la consulta
					$stm->execute(array($id)); //ejecuta la consulta y pasa por parametro el id a buscar

					$r=$stm->fetch(PDO::FETCH_OBJ); //guarda en r el objeto de la clase Usuario

					$Tur= new Turnos();

					$Tur->set_id_turnos($r->_id_turnos); //guarda en Usuario el id del objeto de la clase y lo mismo para el resto de datos
					$Tur->set_id_cliente($r->id_cliente);
					$Tur->set_id_tatuador($r->id_tatuador);
					$Tur->set_id_disenio($r->id_disenio);
					$Tur->set_fecha($r->fecha);
					$Tur->set_hora($r->hora);
					$Tur->set_precio($r->precio);

					return $Tur; //segun el id especificado, devuelve un objeto a la clase Usuario
				}
				catch (Exception $e){
					die($e->getMessage());
				}

			}

			public function eliminar ($id){ //elimina un objeto de la clase Usuario segun un id,, elimina un registro de la tabla

				try{

					$stm=$this->pdo->prepare("DELETE FROM turnos WHERE id_turnos=?");
					$stm->execute(array($id));
				}
				catch(Exception $e){
					die ($e->getMessage());
				}

			}

			public function actualizar (Turno $data) { //actualiza un registro de la tabla con un dato de tipo clase Usuario

				try{

					$sql="UPDATE turnos SET 
						id_cliente=?,
						id_tatuador=?,
						id_disenio=?,
						fecha=?,
						hora=?,
						precio=?
						WHERE id_turnos=?"; //crea la consulta

					$this->pdo->prepare($sql)
						->execute(
							array(
								$data->get_id_cliente(),
								$data->get_id_tatuador(),
								$data->get_id_disenio(),
								$data->get_fecha(),
								$data->get_hora(),
								$data->get_precio()
								
								)
							); //ejecuta la consulta

				}
				catch (Exception $e){

					die ($e->getMessage());
				}

			}

			public function registrar (Turno $data){

				try{
					$sql="INSERT INTO `turnos`(`id_cliente`, `nombre`, `apellido`, `usuario`, `clave`) VALUES (?, ?, ?, ?, ?) ";

					$this->pdo->prepare($sql)
						->execute(
							array (
							$data->get_id_cliente(),
							$data->get_id_tatuador(),
							$data->get_id_disenio(),
							$data->get_fecha(),
							$data->get_hora(),
							$data->get_precio(),
								)
							);

				}
				catch (Exception $e){
					die ($e->getMessage());
				}


			}

			public function acceder(Usuario $data) { 

					$stm=$this->pdo->prepare("SELECT idUsuario, nombre, apellido, idCargo, usuario FROM usuarios where usuario=? and clave=?");
					
					$stm->execute(array(
						$data->getUsuario(),
						$data->getClave())); 

					$r=$stm->fetch(PDO::FETCH_OBJ);
									
				if(!empty($r)){
						
						session_start();
						$_SESSION['idUsuario'] = $r->idUsuario; 
						$_SESSION['nombre'] = $r->nombre;
						$_SESSION['apellido'] = $r->apellido;
						$_SESSION['idCargo'] = $r->idCargo;
						$_SESSION['usuario'] = $r->usuario;
						//$_SESSION['time'] = $r->time();

						header('location: acceso.session.php');

						$result=1;
						//session_destroy();
				}else{

					header('location: login.usuario.php?error=datos_incorrectos');

				}

				return $result;

			}


		}

?>