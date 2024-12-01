document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  // Inicializa o calendário com configuração de localização e arrastabilidade
  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'pt-br',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    editable: true,  // Permite editar eventos
    droppable: true, // Permite arrastar eventos para o calendário
    events: [
      {
        title: 'Evento Fixo',
        start: '2024-09-10',
        color: '#ff0000'
      }
      // Aqui você pode adicionar outros eventos que já existiam no seu calendário
    ],
    drop: function(info) {
      // Lógica para remoção do evento ao soltar, se habilitado
      if (document.getElementById('drop-remove').checked) {
        info.draggedEl.parentNode.removeChild(info.draggedEl);
      }
    }
  });

  // Função para inicializar eventos arrastáveis antigos e novos
  var initializeDraggableEvents = function() {
    // Aqui estão os eventos antigos arrastáveis (caso existam)
    var oldEventEls = document.querySelectorAll('.external-event');
    oldEventEls.forEach(function(eventEl) {
      new FullCalendar.Draggable(eventEl, {
        eventData: {
          title: eventEl.innerText.trim(),
          backgroundColor: window.getComputedStyle(eventEl).backgroundColor,
          borderColor: window.getComputedStyle(eventEl).borderColor,
          textColor: '#ffffff'
        }
      });
    });

    // Criação de novos eventos arrastáveis
    var newEvents = [
      { title: 'Almoço', color: '#00a65a' },
      { title: 'Reunião', color: '#0073b7' },
      { title: 'Trabalho', color: '#f39c12' }
    ];

    newEvents.forEach(function(event) {
      var eventEl = document.createElement('div');
      eventEl.classList.add('external-event');
      eventEl.innerText = event.title;
      eventEl.style.backgroundColor = event.color;
      eventEl.style.borderColor = event.color;
      eventEl.style.color = '#fff';
      document.getElementById('external-events').appendChild(eventEl);

      // Torna cada novo evento arrastável
      new FullCalendar.Draggable(eventEl, {
        eventData: {
          title: event.title,
          backgroundColor: event.color,
          borderColor: event.color,
          textColor: '#ffffff'
        }
      });
    });
  };

  // Inicializa o calendário
  initializeDraggableEvents();
  calendar.render();
});
