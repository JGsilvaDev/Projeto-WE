<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href='../assets/fullcalendar-5.11.3/lib/main.css' rel='stylesheet'/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<script src='../assets/fullcalendar-5.11.3/lib/main.js'></script>
<script src='../assets/fullcalendar-5.11.3/lib/locales-all.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>


<style>

    body {
      margin-top: 40px;
      font-size: 14px;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }

    #external-events {
      position: fixed;
      left: 20px;
      top: 20px;
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
      margin: 3px 0;
      cursor: move;
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

    #calendar-wrap {
      margin-left: 200px;
    }

    #calendar {
      max-width: 1100px;
      margin: 0 auto;
    }

  </style><style>

  body {
    margin-top: 40px;
    font-size: 14px;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  }

  #external-events {
    position: fixed;
    left: 20px;
    top: 20px;
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
    margin: 3px 0;
    cursor: move;
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

  #calendar-wrap {
    margin-left: 20px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>

</head>

@if($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Obrigado!</strong> {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif

  @if($message = Session::get('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>OOOOOOOPPPSSS!</strong> {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif

<body>
   <div id='wrap'>
      <div id='calendar-wrap'>
        <div id='calendar'></div>
      </div>
  </div>

{{-- Modal para criar novo evento --}}
  <div class="modal fade" data-backdrop="static" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crie seu evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" onclick="limparCampos()">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST">
            @csrf

            <label>Titulo: </label><br>
            <input id="title" name="title" type="text" placeholder="Apresentação PI" required><br>

            <label>Inicio: </label><br>
            <input id="start" name="start" type="text" required><br>

            <label>Fim: </label><br>
            <input id="end" name="end" type="text" required><br>

            <label>Color: </label><br>
            <select id="color" name="color">
              <option value="white" style="color: white">Branco</option>
              <option value="black" style="color: black">Preto</option> 
              <option value="blue" style="color: blue">Azul</option> 
              <option value="red" style="color: red">Vermelho</option> 
              <option value="pink" style="color: pink">Rosa</option> 
              <option value="green" style="color: green">Verde</option> 
              <option value="yellow" style="color: yellow">Amarelo</option> 
              <option value="purple" style="color: purple">Roxo</option>
              <option value="orange" style="color: orange">Laranja</option>   
            <select><br>

            <button type="submit" style="margin-top: 30px">Salvar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal para editar o evento --}}
  <div class="modal fade" data-backdrop="static" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="exampleModalLabel">Editar Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {{-- Form para dar update nas informações --}}
          <form method="POST">
            @csrf
            @method('PUT')

            <label>Titulo: </label><br>
            <input id="titulo" type="text"><br>

            <label>Inicio: </label><br>
            <input id="inicio" type="text"><br>

            <label>Fim: </label><br>
            <input id="fim" type="text"><br>

            <button type="submit" style="margin-top: 30px">Editar</button>

          </form>

          <button onclick="deletarEvento()">Deletar</button>

          {{-- Form de delete --}}
          <form style="display: none" method="POST">
            @csrf
            @method('DELETE');

            <input id="deletar" name="deletar" type="number"><br>

            <button id="btnDeletar" type="submit" style="margin-top: 30px">DELETAR</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>

</body>
</html>

<script>
  
    //Inicio do calendario
    document.addEventListener('DOMContentLoaded', function() {

      /* initialize the external events
      -----------------------------------------------------------------*/

      var containerEl = document.getElementById('external-events-list');

      /* initialize the calendar
      -----------------------------------------------------------------*/

      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        navLinks: true,
        selectable: true,
        editable: false,
        droppable: true, // this allows things to be dropped onto the calendar
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        drop: function(arg) {
          // is the "remove after drop" checkbox checked?
          // var span = document.getElementById('apagar');
          // console.log(span)
          // span.remove();
          if (document.getElementById('drop-remove').checked) {
            // if so, remove the element from the "Draggable Events" list
            arg.draggedEl.parentNode.removeChild(arg.draggedEl);
          }
        },
        eventDrop: function(event){
          // alert('event drop');
        },
        eventClick: function(event){
          event.jsEvent.preventDefault();

          var titulo = event.event.title;
          var inicio = event.event.start.toLocaleString();
          var fim = event.event.end;
          var id = event.event.id;

          if(fim != null ){
            var fim = event.event.end.toLocaleString();
          }else{
            var fim = event.event.start.toLocaleString();
          }
          
          //Para trazer as informações do editaveis
          $('#titulo').val(titulo);
          $('#inicio').val(inicio);
          $('#fim').val(fim);
          $('#deletar').val(id);
          
          $('#visualizar').modal('show');

        },
        eventResize: function(event){
          //alert('event resize');
        },
        select: function(event){
          var inicio = event.start.toLocaleString();
          var fim = event.end.toLocaleString();

          const start = document.getElementById('start');
          start.value = inicio;

          const end = document.getElementById('end');
          end.value = inicio;

          $('#addEvent').modal('show');

        },
        events: [
          @foreach ($events as $event)
          {
            'id'    : '{{ $event->id }}',
            'title' : '{{ $event->title }}', 
            'start' : '{{ $event->start }}',
            'end'   : '{{ $event->end }}',
            'color' : '{{ $event->color }}'
          },
          @endforeach
        ]
      });
      calendar.render();

    });

    function limparCampos(){

      $('#title').val('');
      $('#start').val('');
      $('#end').val('');
      $('#color').val('');
    }

    function deletarEvento(){
      Swal.fire({
        title: 'Tem certeza que deseja deletar?',
        text: "Não tem como retornar o evento!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Deletar'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('btnDeletar').click();
        }
      })
    }


  </script>