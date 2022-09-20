<?php
require_once 'usuario.entidad.php';
require_once'usuario.model.php';


$usu = new Usuario();
$model= new UsuarioModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case'actualizar':
				$usu->set_id($_REQUEST['id']);
				$usu->set_nombre($_REQUEST['Nombre']);
				$usu->set_apellido($_REQUEST['Apellido']);
				$usu->set_email($_REQUEST['Email']);
				$usu->set_fecha($_REQUEST['FechaNacimiento']);
				$usu->set_numero($_REQUEST['Numero']);
				$usu->set_sexo($_REQUEST['Sexo']);
				$usu->set_provincia($_REQUEST['Provincia']);
				$usu->set_direccion($_REQUEST['Direccion']);
				$usu->set_usuario($_REQUEST['Usuario']);
				$usu->set_contraseña($_REQUEST['Contraseña']);
			
				
				$model->Actualizar($usu);
				header('Location: index.php');
				break;
				
		case'eliminar':
		$model->Eliminar($usu);
				header('Location: index.php');
				break;
				
		case 'editar':
			$alm->$model->Obtener($_REQUEST['id']);
			break;
			
					
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Anexsoft</title>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
		</head>
		<body>
		
		<div class="pure-g">
		<div class="pure-u-1-12">

		<table class="pure-table pure-table-horizontal">
			<thead>
				<tr>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			
				<?php foreach ($model->Listar() as $r):?>
					<tr>
						<td><?php echo $r->get_usuario();?></td>
						<td><?php echo $r->get_nombre();?></td>
						<td><?php echo $r->get_apellido();?></td>
						
						<td>
							<a href="">Editar</a>
						</td>
						<td>
							<a href="">Eliminar</a>
						</td>
					</tr>
				<?php endforeach;?>
				</table>
			</div>
		</div>
	</body>

</html>
