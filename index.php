<?php 
require('../php/conexion.php');
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
      <!-- Ícono pestaña -->
   <link rel="shortcut icon" href="../images/icono-pestaña/logopestaña.ico" />
    <!-- Estilos -->
   <link rel="stylesheet" type="text/css" href="../css/estilosnivel2.css">
    <!--Íconos Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   
    <title>Calendario</title>
<!--Calendario -->
<link href='fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='lib/jquery-ui.min.js'></script>
<script src='fullcalendar.min.js'></script>
<script src='es.js'></script>
<script>

  $(document).ready(function() {


    /* initialize the external events
    -----------------------------------------------------------------*/

    $('#external-events .fc-event').each(function() {

      // store data so the calendar knows to render an event upon drop
      $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true // maintain when user navigates (see docs on the renderEvent method)
      });

      // make the event draggable using jQuery UI
      $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
      });
       
    });


    /* initialize the calendar
    -----------------------------------------------------------------*/

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function() {
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }
      },
        dayClick: function(date, jsEvent, view) {

    /*alert('Event: ' + calEvent.title);
    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
    alert('View: ' + view.name);

    // change the border color just for fun
    $(this).css('border-color', 'red');*/
    $('#txtStart').val(date.format());
    $('#txtEnd').val(date.format());
    $("#registro").modal();

  },
  events:'eventoscalendario.php',

  eventClick: function(calEvent, jsEvent, view) {
    $("#idtxtUpdate").html("<input type='hidden' name='id' value='"+calEvent.id+"' />");
    $("#idtxtDelete").html("<input type='hidden' name='id' value='"+calEvent.id+"' />");
    $("#inicio").html(calEvent.start);
    $("#fin").html(calEvent.end);
    $("#tituloetiqueta").html(calEvent.title);
    $("#descripcion").html(calEvent.descripcion);
    $("#emergente").modal();
  }

    });


  });

</script>
<style>

  body {
    margin-top: 40px;
    text-align: center;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  }

  #wrap {
    width: 1100px;
    margin: 0 auto;
  }

  #external-events {
    float: left;
    width: 150px;
    padding: 0 10px;
    border: 1px solid #ccc;
    background: #eee;
    text-align: left;
  }

  #external-events h4 {
    font-size: 16px;
    margin-top: 0;
    padding-top: 1em;
  }

  #external-events .fc-event {
    margin: 10px 0;
    cursor: pointer;
  }

  #external-events p {
    margin: 1.5em 0;
    font-size: 11px;
    color: #666;
  }

  #external-events p input {
    margin: 0;
    vertical-align: middle;
  }

  #calendar {
    float: right;
    width: 900px;
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
  		
  		<div class="row">
  			<div class="col">
  			<div id='wrap'>

    <div id='external-events'>
      <h4>Asistencia</h4>
      <div class='fc-event'><?php echo $nombre.' '.$p_apellido.' '.$s_apellido; ?></div>
      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>Eliminar despues de colocar</label>
      </p>
    </div>

    <div id='calendar'></div>

    <div style='clear:both'></div>

  </div>
  			</div>
  		</div>
  	</div>


<!-- Modal agregar-->
<div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registro de Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
            <input type="hidden" class="form-control" aria-describedby="basic-addon1"  id="id">
       
      	<div class="input-group mb-3">
            <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1">Fecha de inicio</span>
            </div>
            <input type="date" class="form-control" aria-describedby="basic-addon1" name="txtStart" id="txtStart">
       </div>
       <div class="input-group mb-3">
            <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1">Fecha final</span>
            </div>
            <input type="date" class="form-control" aria-describedby="basic-addon1" name="txtEnd" id="txtEnd">
       </div>
       <div class="input-group mb-3">
            <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1">Título</span>
            </div>
            <input type="text" class="form-control" placeholder="Inserta un Título" aria-label="Titulo" aria-describedby="basic-addon1" name="txtTitulo" id="txtTitulo">
       </div>
       <div class="input-group mb-3">
            <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1">Hora</span>
            </div>
            <input type="time" class="form-control" placeholder="Hora" value="10:30" aria-label="Hora" aria-describedby="basic-addon1" name="txtHora" id="txtHora">
       </div>
       <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Descripción</span>
            </div>
            <textarea class="form-control" placeholder="Descripción..." aria-label="Descripción" name="txtDescripcion" id="txtDescripcion"></textarea>
        </div>
       <div style="margin-top: 1em;" class="input-group mb-3">
            <div class="input-group-prepend">
                 <span style="" class="input-group-text" id="basic-addon1">Color de cinta</span>
            </div>
            <input style=" width: 40%; height: 40px;" type="color" value="#7FB3D5" aria-describedby="basic-addon1" name="txtColor" id="txtColor">
       </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnAgregar">Agregar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal actualizar -->
<div class="modal fade" id="emergente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloetiqueta"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <div id="idtxt"></div> -->
        <div id="inicio"></div>
        <div id="fin"></div>
        <div id="descripcion"></div>
      </div>
      <div class="modal-footer">
        <form action="editarEvento.php" method="get">
          <div id="idtxtUpdate"></div>
          <button class="btn btn-primary">Modificar</button>
        </form>
        <form action="eventoscalendario.php" method="get">
          <div id="idtxtDelete"></div>
          <input type="hidden" name="accion" value="eliminar">
          <button  id="btnEliminar" class="btn btn-danger">Borrar</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
    <div id="copyright">
    	Asociación Agrícola de Productores de Plátano del Soconusco <br>
			 contacto@platanerosoconusco.com <br>
			 +(52) 9626264013
    </div>

 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
    	var nuevoEvento;
    	$('#btnAgregar').click(function(){
          recolectarDatos();
         enviar('agregar',nuevoEvento);
    	});
    	function recolectarDatos(){
          nuevoEvento={
            id:$('#idtxt').val(),
          	title:$('#txtTitulo').val(),
          	start:$('#txtStart').val()+' '+$('#txtHora').val(),
          	color:$('#txtColor').val(),
          	descripcion:$('#txtDescripcion').val(),
          	txtColor:"#FFFFFF",
          	end:$('#txtEnd').val()+' '+$('#txtHora').val(),
            usuario:<?php echo $id_usuario; ?>,
          };
    	}

    	function enviar(accion,objEvento){
    $.ajax({
    url : 'eventoscalendario.php?accion='+accion,
    type : 'POST',
    data : objEvento,
    success:function(msg){
     if (msg)
     {
      $('#calendar').fullCalendar('refetchEvents');
      if (accion=="agregar") 
      {
        $("#registro").modal('toggle');
      }
      else
      {
        $("#emergente").modal('toggle');
      }
      
     } 
    },
    error:function()
    {
      alert('Hay un error');
    }
    });
    	}


    </script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>