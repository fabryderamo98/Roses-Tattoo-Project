<?php
require_once 'diseño.entidad.php';
require_once 'diseño.model.php';

$dise = new Diseño();
$model = new DiseñoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $dise->set_id($_REQUEST['id']);
            $dise->set_tipo($_REQUEST['Tipo']);
            $dise->set_tamaño($_REQUEST['Tamaño']);
            $dise->set_dibujo($_REQUEST['Dibujo']);
			$dise->set_precio($_REQUEST['Precio']);

            $model->Actualizar($dise);
            header('Location: diseños.php');
            break;

        case 'registrar':
            $dise->set_tipo($_REQUEST['Tipo']);
            $dise->set_tamaño($_REQUEST['Tamaño']);
            $dise->set_dibujo($_REQUEST['Dibujo']);
			$dise->set_precio($_REQUEST['Precio']);

            $model->Registrar($dise);
            header('Location: diseños.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
            header('Location: diseños.php');
            break;

        case 'editar':
            $dise = $model->Obtener($_REQUEST['id']);
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
                
                <form action="?action=<?php echo $tatu->get_id() > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="id" value="<?php echo $tatu->get_id(); ?>" />
                    
                    <table >
                        <tr>
                            <th >Tipo</th>
                            <td><input type="text" name="Tipo" value="<?php echo $dise->get_tipo(); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Tamaño</th>
                            <td><input type="text" name="Tamaño" value="<?php echo $dise->get_tamaño(); ?>"  /></td>
                        </tr>
                            <tr>
                            <th >Dibujo</th>
                            <td><input type="text" name="Dibujo" value="<?php echo $dise->get_dibujo(); ?>"  /></td>
                        </tr>
						 <th >Precio</th>
                            <td><input type="text" name="Precio" value="<?php echo $dise->get_precio(); ?>"  /></td>
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
                            <th >Nombre</th>
                            <th >Apellido</th>
                            <th >Dni</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->get_tipo(); ?></td>
                            <td><?php echo $r->get_tamaño(); ?></td>
                            <td><?php echo $r->get_dibujo();?></td>
							<td><?php echo $r->get_precio();?></td>
                           
                            <td>
                                <a href="">Editar</a>
                            </td>
                            <td>
                                <a href="">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>

