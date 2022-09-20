<?php
require_once 'tatuador.entidad.php';
require_once 'tatuador.model.php';

$tatu = new Tatuador();
$model = new TatuadorModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $tatu->set_id_tatuador($_REQUEST['id_tatuador']);
            $tatu->set_nombre($_REQUEST['Nombre']);
            $tatu->set_apellido($_REQUEST['Apellido']);
            $tatu->set_dni($_REQUEST['Dni']);

            $model -> Actualizar($tatu);
            header ('Location: tatuador.php');
            break;

        case 'registrar':
            $tatu->set_id_clientes($_REQUEST['id_tatuador']);
            $tatu->set_nombre($_REQUEST['Nombre']);
            $tatu->set_apellido($_REQUEST['Apellido']);
            $tatu->set_dni($_REQUEST['Dni']);
			
            $model-> Registrar ($tatu);
            header('Location: tatuador.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_tatuador']);
            header('Location: tatuador.php');
            break;

        case 'editar':
            $tatu = $model->Obtener($_REQUEST['id_tatuador']);
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
                
                <form action="tatuador.php" method="post" class="pure-form pure-form-stacked" >
                
                    <input type="hidden" name="action" value="<?php echo $tatu->get_id_tatuador() > 0 ? 'actualizar' : 'registrar'; ?>" />
                    <input type="hidden" name="id_tatuador" value="<?php echo $tatu->get_id_tatuador(); ?>" />
                    
                    <table >
                        <tr>
                            <th >Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $tatu->get_nombre(); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Apellido</th>
                            <td><input type="text" name="Apellido" value="<?php echo $tatu->get_apellido(); ?>"  /></td>
                        </tr>
                            <tr>
                            <th >Dni</th>
                            <td><input type="text" name="Dni" value="<?php echo $tatu->get_dni(); ?>"  /></td>
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
                            <td><?php echo $r->get_nombre(); ?></td>
                            <td><?php echo $r->get_apellido(); ?></td>
                            <td><?php echo $r->get_dni();?></td>
                           
                            <td>
                                <!--<a href="">Editar</a>-->
                                <form method="post" action="tatuador.php">
                                <input type="hidden" name="action" value="editar">
                                <input type="hidden" name="id_tatuador" value="<?php echo $r->get_id_tatuador(); ?>">
                                <input type="submit" value="Editar">
                                </form>
                            </td>
                            <td>
                               <!-- <a href="">Eliminar</a>-->
                                <form method="post" action="tatuador.php">
                                <input type="hidden" name="action" value="eliminar">
                                <input type="hidden" name="id_tatuador" value="<?php echo $r->get_id_tatuador(); ?>">
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
