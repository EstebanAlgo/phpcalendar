<?php 
require('../php/conexion.php');
header('Content-Type: application/json');

$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';


switch ($accion) {
	case 'agregar':
        $statement=$conexion2->prepare("INSERT INTO eventos (id,title,descripcion,color,textColor,start,end,usuario) VALUES(null,:title,:descripcion,:color,:textColor,:start,:end,:usuario)");
		$respuesta=$statement->execute(array(
			"title"=>$_POST['title'],
			"descripcion"=>$_POST['descripcion'],
			"color"=>$_POST['color'],
			"textColor"=>"#000000",
			"start"=>$_POST['start'],
			"end"=>$_POST['end'],
			"usuario"=>$_POST['usuario']
		));
         echo json_encode($respuesta);

		break;
	case 'modificar':
    $titulo=$_GET['titulo'];
    $descripcion=$_GET['descripcion'];
    $fondo=$_GET['fondo'];
    $texto=$_GET['texto'];
    $id=$_GET['id'];
    $actualizar_evento=$conexion2->prepare("UPDATE eventos SET title='$titulo', descripcion='$descripcion',color='$fondo',textColor='$texto' WHERE id='$id'");
    $actualizar_evento->execute();
    header('Location: index.php');
		break;
	case 'eliminar':
	    $respuesta=false;
	    if (isset($_GET['id'])) {
	    $statement=$conexion2->prepare("DELETE FROM eventos WHERE id=:id");
		$respuesta=$statement->execute(array("id"=>$_GET['id']));
		header('Location: index.php');
	    }
         //echo json_encode($respuesta);
		break;
	
	default:
	  $statement=$conexion2->prepare("SELECT *FROM eventos");
	  $statement->execute();
	  $eventos=$statement->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($eventos);
		break;
}

 ?>