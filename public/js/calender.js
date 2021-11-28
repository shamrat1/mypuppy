let nav = 0;
let clicked = null;
let events = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('events')) : [];

const calendar = document.getElementById('calendar');
const newEventModal = document.getElementById('newEventModal');
const deleteEventModal = document.getElementById('deleteEventModal');
const backDrop = document.getElementById('modalBackDrop');
const eventTitleInput = document.getElementById('eventTitleInput');
const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

function openModal(date) {

    clicked = date;

    const eventForDay = events.find(e => e.date === clicked);
    // console.log(eventForDay);
    if (eventForDay) {
        document.getElementById('eventText').innerText = eventForDay.title;
        deleteEventModal.style.display = 'block';
    } else {
        // console.log($('#store_id').val());
        // $('#EventModal').modal('show');
        $.ajax({
            type: "post",
            url: "get-schedule-data",
            data: {
                date: date,
                store_id: $('#hdnStoreId').val()
            },
            // dataType: "dataType",
            success: function(response) {
                if (response.status == 'success') {
                    var length = response.data.length;
                    var item = response.data;
                    var html = `<h3> Available timing for booking </h3>`;
                    for (let i = 0; i < length; i++) {
                        html += `
                                <span class="btn-availTime"> ` + item[i] + `</span> `;

                    }
                    $('.shchedule-data-div').html(html);
                    $('#EventModal').modal('show');
                } else {
                    alert(response.message);
                }
            },
            error: function(error) {
                alert("something went wrong");
            }
        });
    }

    // backDrop.style.display = 'block';
}

function load() {
    const dt = new Date();

    if (nav !== 0) {
        dt.setMonth(new Date().getMonth() + nav);
    }

    const day = dt.getDate();
    const month = dt.getMonth();
    const year = dt.getFullYear();

    const firstDayOfMonth = new Date(year, month, 1);
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
        weekday: 'long',
        year: 'numeric',
        month: 'numeric',
        day: 'numeric',
    });
    const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);

    document.getElementById('monthDisplay').innerText =
        `${dt.toLocaleDateString('en-us', { month: 'long' })} ${year}`;

    calendar.innerHTML = '';

    for (let i = 1; i <= paddingDays + daysInMonth; i++) {
        const daySquare = document.createElement('div');
        daySquare.classList.add('day');

        const dayString = `${month + 1}/${i - paddingDays}/${year}`;
        // console.log(dayString);
        if (i > paddingDays) {
            daySquare.innerText = i - paddingDays;
            const eventForDay = events.find(e => e.date === dayString);

            if (i - paddingDays === day && nav === 0) {
                // console.log('hi');
                daySquare.id = 'currentDay';
                //daySquare.addEventListener('click', () => openModal(dayString));
            }

            if (eventForDay) {
                const eventDiv = document.createElement('div');
                eventDiv.classList.add('event');
                eventDiv.innerText = eventForDay.title;
                daySquare.appendChild(eventDiv);
            }
            if (i - paddingDays < day) {
                daySquare.classList.add('expired-date');

            } else {

                daySquare.addEventListener('click', () => openModal(dayString));
            }
        } else {
            daySquare.classList.add('padding');
        }

        calendar.appendChild(daySquare);
    }
    $(".expired-date").css("background-color", "#f1e9e9b3");
    $(".expired-date").css("cursor", "not-allowed");
}

function closeModal() {
    eventTitleInput.classList.remove('error');
    newEventModal.style.display = 'none';
    deleteEventModal.style.display = 'none';
    backDrop.style.display = 'none';
    eventTitleInput.value = '';
    clicked = null;
    load();
}

function saveEvent() {
    // console.log('saved');
    if (eventTitleInput.value) {
        eventTitleInput.classList.remove('error');

        events.push({
            date: clicked,
            title: eventTitleInput.value,
        });

        localStorage.setItem('events', JSON.stringify(events));
        $.ajax({
            type: "post",
            url: "add-calendar-event-ajax",
            data: {
                date: clicked,
                title: eventTitleInput.value,
                action: 'add'
            },
            // dataType: "dataType",
            success: function(response) {
                if (response.status == 'success') {
                    alert(response.message);
                }
            },
            error: function(error) {
                alert("something went wrong");
            }
        });
        closeModal();
    } else {
        eventTitleInput.classList.add('error');
    }
}


function deleteEvent() {
    events = events.filter(e => e.date !== clicked);
    localStorage.setItem('events', JSON.stringify(events));
    $.ajax({
        type: "post",
        url: "add-calendar-event-ajax",
        data: {
            date: clicked,
            action: 'delete'
        },
        // dataType: "dataType",
        success: function(response) {
            if (response.status == 'success') {
                alert(response.message);
            }
        },
        error: function(error) {
            alert("something went wrong");
        }
    });
    closeModal();
}

function initButtons() {
    document.getElementById('nextButton').addEventListener('click', () => {
        nav++;
        load();
    });

    document.getElementById('backButton').addEventListener('click', () => {
        nav--;
        load();
    });

    document.getElementById('saveButton').addEventListener('click', saveEvent);
    document.getElementById('cancelButton').addEventListener('click', closeModal);
    document.getElementById('deleteButton').addEventListener('click', deleteEvent);
    document.getElementById('closeButton').addEventListener('click', closeModal);
}

initButtons();
load();
