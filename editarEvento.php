<?php 
require('../php/conexion.php');

if ($_GET){
    $id=$_GET['id'];
    $statement=$conexion2->prepare("SELECT * FROM eventos WHERE id='$id' LIMIT 1");
    $statement->execute();
    $evento=$statement->fetchAll();
    foreach ($evento as $fila) 
    {
      $titulo=$fila['title'];
      $descripcion=$fila['descripcion'];
      $fondo=$fila['color'];
      $txtcolor=$fila['textColor'];
      $inicio=$fila['start'];
      $fin=$fila['end'];
    } 
}
else
{
  header('Location: index.php');
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <!--Ícono Pestaña-->
   <link rel="shortcut icon" href="../images/icono-pestaña/logopestaña.ico" />
    <!-- Estilos -->
   <link rel="stylesheet" type="text/css" href="../css/estilosnivel2.css">
   <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <!--Íconos Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <title>Editar Evento</title>
    <style>
      label{
        font-family: 'Lobster', cursive;
        font-size: 2em;
        color: #154360;
      }
      .formulario{
        margin-top: 1em;
        margin-bottom: 1em;
        padding: 1em;
        background: #EAFAF1;

        border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        border: 0px solid #000000;

        -webkit-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);
        box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);        
      }
      .btn{
        font-size: 2em;
        color: #EBEDEF;
      }
    </style>
  </head>
  <body>

<div id="barra_navegacion">
           
              </div>

              <script type="text/javascript">
   
    	             $("#barra_navegacion").load('../php/menu_nav.php div#nivel2');
   
              </script>

  	<!--banner -->
  	<div id="banner">
  	 </div>
  	 <!--/banner -->
           
  	<div class="container">
      <form class="formulario" method="get" action="eventoscalendario.php">
  		<div class="row">
          <div class="col-12 col-md-4 offset-md-2">
            <div class="form-group">
              <label for="titulo">Título del Evento</label>
               <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Inserta el Nuevo Titulo" value="<?php echo $titulo ?>">
              </div>
              <div class="form-group">
              <label for="descripcion">Descripción del Evento</label>
              <textarea name="descripcion" class="form-control" id="descripcion" rows="4"><?php echo $descripcion ?></textarea>
              </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="fondo">Color de fondo</label>
               <input style=" width: 100%; height: 40px;" name="fondo" type="color" class="form-control" id="fondo" value="<?php echo $fondo ?>">
            </div>
            <div class="form-group">
              <label for="texto">Color de Letras</label>
               <input style=" width: 100%; height: 40px;" name="texto" type="color" class="form-control" id="texto" value="<?php echo $txtcolor ?>">
            </div>
            <input type="hidden" name="accion" value="modificar">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-success btn-lg btn-block">Actualizar <i class="fas fa-pen-square"></i></button>
          </div>      
  		</div>
      </form>
  	</div>


    
    <div id="copyright">
    	Asociación Agrícola de Productores de Plátano del Soconusco <br>
			 contacto@platanerosoconusco.com <br>
			 +(52) 9626264013
    </div>

 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>