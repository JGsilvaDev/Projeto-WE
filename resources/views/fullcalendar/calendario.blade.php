<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href='../assets/fullcalendar-5.11.3/lib/main.css' rel='stylesheet' />
<script src='../assets/fullcalendar-5.11.3/lib/main.js'></script>
<script src='../assets/fullcalendar-5.11.3/lib/locales-all.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
<body>
   <div id='wrap'>

    {{-- <div id='external-events'>
        <h4>Eventos</h4> 
           <div id='external-events-list'>
             <div id="superPai">
          </div> 
           <button id="btnCadastrar" onclick="criaDiv();">+</button> 
    </div>

      <p>
        <input type='checkbox' id='drop-remove' checked/>
        <label for='drop-remove'>remover depois de inserir</label>
      </p>  
    </div> --}}

      <div id='calendar-wrap'>
        <div id='calendar'></div>
      </div>
  </div>

</body>
</html>

{{-- <script>

function routeEvent(route){

  return document.getElementById('calendar').dateset[route];
  data-route-load-events="{{ route('routeLoadEvents') }}"
}

</script> --}}

{{-- <script>

  function deleteDiv(event){
    var alvo = event.target.parentNode;
    var pai = alvo.parentNode;
    pai.remove();
  }

  async function criaDiv(){

    const { value: text } = await Swal.fire({
      input: 'text',
      inputLabel: 'Message',
      inputPlaceholder: 'Type your message here...',
      inputAttributes: {
        'aria-label': 'Type your message here'
      },
      showCancelButton: false
    })

    if(text){

      index = document.getElementById('superPai').children.lenght;

      var deleteBtn = document.createElement('span');
      deleteBtn.innerHTML = '[X]';
      deleteBtn.setAttribute('id','apagar');
      deleteBtn.setAttribute('onclick','deleteDiv(event)');

      var divPai = document.createElement('div');
      divPai.setAttribute('id','divPai');
      divPai.setAttribute('class', 'fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event');

      var divFilho =  document.createElement('div');
      divFilho.innerHTML = text;
      divFilho.setAttribute('id', 'divFilho'+index);
      divFilho.setAttribute('class', 'fc-event-main');

      document.getElementById('superPai').append(divPai);
      divPai.append(divFilho);
      divFilho.append(deleteBtn);

    }


  }

</script> --}}

<script>

    document.addEventListener('DOMContentLoaded', function() {

      /* initialize the external events
      -----------------------------------------------------------------*/

      var containerEl = document.getElementById('external-events-list');
      // new FullCalendar.Draggable(containerEl, {
      //   itemSelector: '.fc-event',
      //    eventData: function(eventEl) {
      //      return {
      //        title: eventEl.innerText.trim()
      //      }
      //   }
      // });

      /* initialize the calendar
      -----------------------------------------------------------------*/

      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        navLinks: true,
        selectable: true,
        editable: true,
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
          //alert('event click');
          
        },
        eventResize: function(event){
          alert('event resize');
        },
        select: function(event){
          
        },
        events: '../assets/fullcalendar-5.11.3/events.php'
      });
      calendar.render();

    });


  </script>