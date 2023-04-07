<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Agenda') }}
    </h2>
</x-slot>
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css">
@endpush

@include('livewire.partials.shedules.modal-create')

<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div id='calendar'></div>

        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js"></script>

<script>
    document.addEventListener('livewire:load', function() {
    var calendarEl = document.getElementById('calendar');
    var data = @this.events;
    var calendar = null;

    calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: new Date(),
        locale: 'pt-BR',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, timeGridDay'
        },
        //events: JSON.parse(data),
        dateClick: function (info) {
            @this.title = "";
            @this.event_id = "";
            @this.start = "";
            @this.end = "";
            @this.description = "";
            @this.call('showModalEvent');
        },
        eventClick: function({event}) {
            console.log(event);
            @this.title = event.title;
            @this.event_id = event.id;
            @this.start = dayjs(event.start).format('YYYY-MM-DD HH:mm:ss');
            @this.end = dayjs(event.end).format('YYYY-MM-DD HH:mm:ss');
            @this.description = event.description;
            @this.call('showModalEvent');
        }

    });
    calendar.addEventSource({
        url: 'api/events'
    });

    calendar.render();

    document.addEventListener('refreshEventsCalendar', ({detail}) => {
        if (detail.refresh) {
            calendar.refetchEvents();
        }
    });

    });
</script>
