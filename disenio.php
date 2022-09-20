<?php
require_once 'disenio.entidad.php';
require_once 'disenio.model.php';

$dis = new Disenio();
$model = new DisenioModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $dis->set_id_disenio($_REQUEST['id_disenio']);
            $dis->set_tamanio($_REQUEST['Tamanio']);
			$dis->set_dibujo($_REQUEST['Dibujo']);

            $model -> Actualizar($dis);
            header ('Location: disenio.php');
            break;

        case 'registrar':
            $dis->set_id_disenio($_REQUEST['id_disenio']);
            $dis->set_tamanio($_REQUEST['Tamanio']);
			$dis->set_dibujo($_REQUEST['Dibujo']);
			
            $model-> Registrar ($dis);
            header('Location: disenio.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_disenio']);
            header('Location: disenio.php');
            break;

        case 'editar':
            $dis= $model->Obtener($_REQUEST['id_disenio']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="disenio.php" method="post" class="pure-form pure-form-stacked" >
                
                    <input type="hidden" name="action" value="<?php echo $dis->get_id_disenio() > 0 ? 'actualizar' : 'registrar'; ?>" />
                    <input type="hidden" name="id_disenio" value="<?php echo $dis->get_id_disenio(); ?>" />
                    
                    <table >
                        <tr>
                            <th >Tamanio</th>
                            <td><input type="text" name="Tamanio" value="<?php echo $dis->get_tamanio(); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Dibujo</th>
                            <td><input type="text" name="Dibujo" value="<?php echo $dis->get_dibujo(); ?>"  /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr> 
                            <th>Tamaño</th>
                            <th>Dibujo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->get_tamanio(); ?></td>
                            <td><?php echo $r->get_dibujo(); ?></td>
                           
                            <td>
                                <!--<a href="">Editar</a>-->
                                <form method="post" action="disenio.php">
                                <input type="hidden" name="action" value="editar">
                                <input type="hidden" name="id_disenio" value="<?php echo $r->get_id_disenio(); ?>">
                                <input type="submit" value="Editar">
                                </form>
                            </td>
                            <td>
                               <!-- <a href="">Eliminar</a>-->
                                <form method="post" action="disenio.php">
                                <input type="hidden" name="action" value="eliminar">
                                <input type="hidden" name="id_disenio" value="<?php echo $r->get_id_disenio(); ?>">
                                <input type="submit" value="Borrar">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>
