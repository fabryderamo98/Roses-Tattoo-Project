<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
require_once 'usuario.entidad.php';
require_once'usuario.model.php';
require_once'usuarios.php';

$usu = new Usuario();
$model= new UsuarioModel();


<form action="?accion=registrar" method="post" class="pure-form pure-form-stacked">

	<table>
	<tr>
		<th>Nombre</th>
	<td><input type="text" name="Nombre"/></td>
	</tr>
	<tr>
		<th>Apellido</th>
		<td><input type="text" name="Apellido" /></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><input type="text" name="Email" /></td>
	</tr>
	<tr>
		<th>Fecha Nacimiento</th>
		<td><input type="date" name="FechaNacimiento"/></td>
	</tr>
	<tr>
		<th>Numero</th>
		<td><input type="text" name="Numero" /></td>
	</tr>
	<th>Sexo</th>
		<td>
			<select name="Sexo">
				<option value="1">Masculino</option>
				<option value="2">Femenino</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>Provincia</th>
		<td><input type="text" name="Provincia"/></td>
	</tr>
	<tr>
		<th>Direccion</th>
		<td><input type="text" name="Direccion" /></td>
	</tr>
		<th>Usuario</th>
	<td><input type="text" name="Usuario" value="<?php echo $usu->get_usuario();?>"/></td>
	</tr>
	<tr>
		<th>Contraseña</th>
		<td><input type="text" name="Contraseña" value="<?php echo $usu->get_contraseña();?>"/></td>
	</tr>
	
	<tr>
		<td colspan="2">
			<button type="submit" class="pure-button pure-button-primary">Aceptar</button>
		</td>
	</tr>
</table>
</form>
</body>
</html>