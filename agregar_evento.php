<?php 
require('../php/conexion.php');
    $title="";
	$descripcion="";
	$color="";
	$textColor="";
    $start="";
    $end="";


if ($_POST) {
	$title=$_POST['title'];
	$descripcion=$_POST['descripcion'];
	$color=$_POST['color'];
	$textColor=$_POST['textColor'];
    $start=$_POST['start'];
    $end=$_POST['end'];
}

echo $title."-".$descripcion."-".$descripcion."-".$color."-".$textColor."-".$start."-".$end; 
 ?>