<?php
require_once 'maquina.entidad.php';
require_once 'maquina.model.php';

$maq = new Maquina();
$model = new MaquinaModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $maq->set_id_maquina($_REQUEST['id_maquina']);
            $maq->set_tipo($_REQUEST['Tipo']);
            $maq->set_marca($_REQUEST['Marca']);

            $model -> Actualizar($maq);
            header ('Location: maquina.php');
            break;

        case 'registrar':
            $maq->set_id_maquina($_REQUEST['id_maquina']);
            $maq->set_tipo($_REQUEST['Tipo']);
            $maq->set_marca($_REQUEST['Marca']);
			
            $model-> Registrar ($dis);
            header('Location: maquina.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_maquina']);
            header('Location: maquina.php');
            break;

        case 'editar':
            $dis = $model->Obtener($_REQUEST['id_maquina']);
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
                
                    <input type="hidden" name="action" value="<?php echo $maq->get_id_maquina() > 0 ? 'actualizar' : 'registrar'; ?>" />
                    <input type="hidden" name="id_maquina" value="<?php echo $maq->get_id_maquina(); ?>" />
                    
                    <table >
                        <tr>
                            <th >Tipo</th>
                            <td><input type="text" name="Tipo" value="<?php echo $maq->get_tipo(); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Marca</th>
                            <td><input type="text" name="Marca" value="<?php echo $maq->get_marca(); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Precio</th>
                            <td><input type="text" name="Precio" value="<?php echo $maq->get_precio(); ?>"  /></td>
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
                            <th >Tipo</th>
                            <th >Marca</th>
                            <th >Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->get_tipo(); ?></td>
                            <td><?php echo $r->get_marca(); ?></td>
                            <td><?php echo $r->get_precio(); ?></td>
                           
                            <td>
                                <!--<a href="">Editar</a>-->
                                <form method="post" action="maquina.php">
                                <input type="hidden" name="action" value="editar">
                                <input type="hidden" name="id_maquina" value="<?php echo $r->get_id_maquina(); ?>">
                                <input type="submit" value="Editar">
                                </form>
                            </td>
                            <td>
                               <!-- <a href="">Eliminar</a>-->
                                <form method="post" action="maquina.php">
                                <input type="hidden" name="action" value="eliminar">
                                <input type="hidden" name="id_maquina" value="<?php echo $r->get_id_maquina(); ?>">
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
