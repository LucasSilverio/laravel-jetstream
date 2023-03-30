<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Agenda') }}
    </h2>
</x-slot>
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css">
@endpush
<div>
    {{$nome}}
</div>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg"> 
        <div id='calendar'></div>
        </div>
    </div>
</div>

@include('livewire.partials.shedules.modal-create')

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js"></script>

<script>    
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: new Date(),
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, timeGridDay'
        },
        dateClick: function (info) {
            console.log(info);
            //@this.showModal();
            //this.Livewire.emit("showModal");
            //@this.showModal()
            //window.livewire.emit('showModal');
            
            @this.call('showModal');
        }
    });
    
    calendar.render();
    });
</script>