<?php 
include("conexion.php");
include ("usuario.entidad.php");
include ("usuario.model.php");

session_start();
$message="";


if(isset($_SESSION["session_username"]))
{
	//header("Location:intropage.php");
}


if(isset($_POST["username"]))
{
	
	if(!empty($_POST['username']) && !empty ($_POST['password']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$user= new Usuario();
			$model= new UsuarioModel();
			$user->set_usuario($username);
			$user->set_clave(md5($password));
			//echo "c:".$user->get_clave()."<br>";
			$userok= new Usuario();
			$userok=$model->Login($user);
		
			echo $userok->get_nombre();
		}}
			
			/*if($userok->get_nombre()!="")
			{
				echo "usuario encontrado";
				$_SESSION['session_username']=time();
				header("Location:paneldecontrol.php");
			}else{
				$message = "Nombre  de usuario o contraseña invalida!";
				header("Location:login.php");
			}
	}else{
		$message="Todos los campos son requeridos!";
	}
}

if ($message!="")
{//$_SESSION['mensaje']=$message;
	header("Location:login.php?msg=".$message);
}
	*/
?>	
