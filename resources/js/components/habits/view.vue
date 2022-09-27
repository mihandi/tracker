<script setup>

const closeModal = () => {
    $('#modalTitle').html('');
    $('#eventId').val('');
    $('#eventHabitId').val('');
    $('#eventTitle').val('');
    $('#eventStart').val('');
    $('#eventEnd').val('');
    $('#eventModal').hide();
}

const saveModalEvent = () => {
    var form = {};
    form.name = $('#eventTitle').val();
    form.user_id = $('#eventTitle').val();
    // form.habit_id = $('#eventHabitId').val();
    form.habit_id = 1;
    form.start = $('#eventStart').val();
    form.end = $('#eventEnd').val();


    var id = $('#eventId').val();


    if( id !== undefined) {
        axios.post('/api/addEvent/', form)
            .then((response) => {
               alert('ok');
                closeModal()
            }).catch((error) => {

        })
    } else {
        axios.post('/api/editEvent/', form)
            .then((response) => {
                alert('ok');
                closeModal()
            }).catch((error) => {
        })
    }
}
</script>
<script>

function openModal(event) {

    if (event.new == undefined) {
        $('#modalTitle').html(event.title);
        $('#eventId').val(event.id);
        $('#eventHabitId').val(event.habit_id);
        $('#eventTitle').val(event.title);
        $('#eventStart').val(event.start);
        $('#eventEnd').val(event.end);

    }
    $('#eventModal').show();
}


function getSearchParameters() {
    var prmstr = window.location.search.substr(1);
    return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray(prmstr) {
    var params = {};
    var prmarr = prmstr.split("&");
    for (var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    return params;
}

function getTodayDate() {
    let d = new Date();
    let ye = new Intl.DateTimeFormat('en', {year: 'numeric'}).format(d);
    let mo = new Intl.DateTimeFormat('en', {month: '2-digit'}).format(d);
    let da = new Intl.DateTimeFormat('en', {day: '2-digit'}).format(d);
    return ye + '-' + mo + '-' + da;

}

var params = getSearchParameters();

export default {

    mounted() {
        this.$nextTick(function () {
            // Код, который будет запущен только после
            // отрисовки всех представлений

            let todayFormatted = getTodayDate();


            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                displayEventTime: false,
                initialDate: todayFormatted,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth, dayGridWeek, listDay'
                },
                editable: true,
                selectable: true,
                weekends: true,
                events: "/api/getHabitEvents/" + this.$route.params.id,
                loading: function (bool) {
                    document.getElementById('loading').style.display =
                        bool ? 'block' : 'none';
                },
                eventClick: function (arg) {
                    openModal(arg.event)
                },
                addEvent: function () {
                    alert('s')
                },
                select : function(event) {
                    event.new = true;
                    openModal(event)
                }
            });

            calendar.render();
        })
    }
}
</script>
<template>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div id='loading'>loading...</div>

                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="eventModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="modalTitle">Title</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            @click="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="eventId" value="">
                    <input type="hidden" id="eventHabitId" value="">

                    <label for="eventTitle">Title</label>
                    <input type="text" id="eventTitle" value="">

                    <label for="eventStart">Start</label>
                    <input type="text" id="eventStart" value="">

                    <label for="eventEnd">End</label>
                    <input type="text" id="eventEnd" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="saveModalEvent()">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal()">Close
                    </button>
                </div>
            </div>
        </div>
    </div>

</template>

