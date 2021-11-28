@extends('layouts.myApp')
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

@section('content')

<div class="breadcrumbs">
    <ul class="breadcrumb">
       <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
       <li>
          <a href="javascript:void(0)">
          <span>Booking Appointments</span>
          </a>
       </li>
    </ul>
 </div>
 <br>
 <link rel="stylesheet" href="{{ asset('css/calender.css') }}">
 <div class="mycontainer">
<div class="mainWrapper">
    <div id="myheader">
      <div id="monthDisplay"></div>
      <div>
        <button id="backButton">Prev</button>
        <button id="nextButton">Next</button>
      </div>
    </div>

    <div id="weekdays">
      <div>Sunday</div>
      <div>Monday</div>
      <div>Tuesday</div>
      <div>Wednesday</div>
      <div>Thursday</div>
      <div>Friday</div>
      <div>Saturday</div>
    </div>

    <div id="calendar"></div>
  </div>

  <div id="newEventModal">
    <h2>New Event</h2>

    <input id="eventTitleInput" placeholder="Event Title" />

    <button id="saveButton">Save</button>
    <button id="cancelButton">Cancel</button>
  </div>
    <input type="hidden" id="hdnStoreId" value="{{$_GET['id']}}">
    <!-- Modal -->
    <div class="modal fade" id="EventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="shchedule-data-div">
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


  <div id="deleteEventModal">
    <h2>Event</h2>

    <p id="eventText"></p>

    <button id="deleteButton">Delete</button>
    <button id="closeButton">Close</button>
  </div>

  <div id="modalBackDrop"></div>
</div>
  <script src="{{ asset('js/calender.js') }}"></script>


@endsection
