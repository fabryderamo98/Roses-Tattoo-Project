<?php

require_once 'usuario.entidad.php';
require_once 'usuario.model.php';

require_once 'cargo.entidad.php';
require_once 'cargo.model.php';

//logica

$usu= new Usuario ();
$usuarioModel= new UsuarioModel();

$cargo=new Cargo();
$cargoModel= new CargoModel();

if(isset($_POST['action'])){

	switch ($_POST['action']) {

		case 'actualizar':

			$usu->setIdUsuario($_POST['idUsuario']);
			$usu->setIdCargo($_POST['idCargo']);
			$usu->setNombre($_POST['nombre']);
			$usu->setApellido($_POST['apellido']);
			$usu->setUsuario($_POST['usuario']);
			$usu->setClave($_POST['clave']);

			
			$usuarioModel->actualizar($usu);
			header('Location: usuario.abm.php');
			break;

		case 'registrar':

				$usu->setIdCargo($_POST['idCargo']);
				$usu->setNombre($_POST['nombre']);
				$usu->setApellido($_POST['apellido']);
				$usu->setUsuario($_POST['usuario']);
				$usu->setClave($_POST['clave']);

				$usuarioModel->registrar($usu);
				header('Location: usuario.abm.php');
				break;

		case 'eliminar':
				$usuarioModel->eliminar($_POST['idUsuario']);
				header('Location: usuario.abm.php');
				break;

		case 'editar':
				$usu=$usuarioModel->obtener($_POST['idUsuario']);
				break;

	}
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>ABM USUARIOS</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
</head>

<body>

		<h1>ABM USUARIOS</h1>

	<div class="pure-g">

		<div class="pure-u-1-12">

				<form action="usuario.abm.php"

					method="post" class="pure-form pure-form-stacked" 
				>

					<input type="hidden" name="idUsuario" value="<?php echo $usu->getIdUsuario(); ?>"/>
					<input type="hidden" name="action" value="<?php 
						echo $usu->getIdUsuario() >0 ? 'actualizar' : 'registrar'; 
					?>" />
					<table>

						<tr>

							<th>Nombre</th>
							<td><input type="text" name="nombre" value="<?php echo $usu->getNombre(); 
								?>"></td>

						</tr>

						<tr>

							<th>Apellido</th>
							<td><input type="text" name="apellido" value="<?php echo $usu->getApellido(); 
								?>"></td>

						</tr>

						<tr>

							<th>Cargo</th>

							<td>

								<select name="idCargo" required>
								<option value="">Seleccione</option>
									<?php foreach($cargoModel->listar() as $c): ?>

										
										<option value="<?php echo $c->getIdCargo(); ?>"  <?php echo $c->getidCargo()==$usu->getidCargo()?'selected':''; ?> ><?php echo $c->getCargo(); ?></option>
										<!--<option value="<?php //echo $r->getidCargo(); ?>" selected = <?php //echo $r->getidCargo()==$usu->getidCargo()?'selected':''; ?> ><?php //echo $r->getCargo(); ?></option> -->

									<?php endforeach ?>

								</select>

							</td>

						</tr>

						<tr>

							<th>Usuario</th>
							<td><input type="text" name="usuario" value="<?php echo $usu->getUsuario(); 
								?>"></td>

						</tr>

						<tr>

							<th>Clave</th>
							<td><input type="password" name="clave" value="<?php echo $usu->getClave(); 
								?>"></td>

						</tr>

						<tr>

							<td colspan="2">

								<button type="submit" class="pure-button pure-primary">Guardar</button>

							</td>

						</tr>

					</table>
					
				</form>

				<table class="pure-table pure-table-horizontal" border="1">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Cargo</th>
							<th>Usuario</th>
							<th></th>
							<th></th>
						</tr>

					</thead>

				<?php foreach($usuarioModel->listar() as $r): ?>
				<?php $cargo= $cargoModel->obtener($r->getIdCargo()); ?>

					<tr>

						<td><?php echo $r->getNombre(); ?></td>
						<td><?php echo $r->getApellido(); ?></td>
						<td><?php echo $cargo->getCargo(); ?></td>
						<td><?php echo $r->getUsuario(); ?></td>
						<td>

							<!--<a href="?action=editar&id=<?php //echo $r->getIdUsuario(); ?>">Editar</a>-->
							<form action="usuario.abm.php" method="post">

								<input type="hidden" name="action" value="editar">
								<input type="hidden" name="idUsuario" value="<?php echo $r->getIdUsuario(); ?>">
								<input type="submit" value="editar">

							</form>

						</td>
						<td>

							<!--<a href="?action=eliminar&id=<?php //echo $r->getIdUsuario(); ?>">Eliminar</a> -->
							<form action="usuario.abm.php" method="post">

								<input type="hidden" name="action" value="eliminar">
								<input type="hidden" name="idUsuario" value="<?php echo $r->getIdUsuario(); ?>">
								<input type="submit" value="eliminar">

							</form>

						</td>

					</tr>

				<?php endforeach; ?>
					
				</table>
		</div>
	</div>

</body>
</html>
