<?php require_once ("conexion.php");

require_once("clase_usuario.php");

session_start();

$message="";

if(isset($_POST["register"]))
{
    if(!empty($_POST['nombre']) && !empty($_POST['email'])&& !empty($_POST['usuario'])&& !empty($_POST['clave']))
    {
        $full_name=$_POST['nombre'];
        $email=$_POST['email'];
        $username=$_POST['usuario'];
        $password=$_POST['clave'];
        
        $usuario= new usuario();
        $result=$usuario->verificar_user($usuario);
        
        
        if(!$result)
        
        {
            $usuario=new usuario();
            
            $usuario->set_full_name($nombre);
            $usuario->set_email($email);
            $usuario->set_username($usuario);
            $username->set_password($contraseña);
            
            try{
                $result=$usuario->registrar_user($usuario);
                $message = "Cuenta Correctamente Creada";
                
                }
                catch(Exception $e)
                {
                    $message="Error al ingresar datos de usuario!";
                }
            }
          else{
            $message = "El nombre de usuario ya existe! Por favor,intenta con otro";
            
          }  
            
        }
        else{
            $message="Todos los campos deben ser completados!";
        }
    }
  if ($message!="")
  {$_SESSION['mensaje']=$message;
            echo $message;  
}

header ("Location:register.php")

?>