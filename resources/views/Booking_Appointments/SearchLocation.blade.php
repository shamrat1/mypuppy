@extends('layouts.myApp')
@section('content')
<style>
    :root {
        --color-one: #c6c6ce;
        --color-two: #030324;
        --color-three: #512461;
    }
    .card {
        border: 1px solid var(--color-three);
        outline: 2px solid var(--color-two);
        margin-bottom: 2px;
        transition: border 0.1s, transform 0.3s;
    }

    .card:hover {
        border: 1px solid var(--color-two);
        cursor: pointer;
    }

    .card .card-body td {
        color: var(--color-two);
    }

    .card img:hover {
      opacity: 0.6;
    }

    .card-p {
        color: var(--color-three);
        background: var(--color-one);
        padding:25px;
    }

</style>
    <div class="breadcrumbs">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li>
                <a href="{{ url('/services') }}">
                    <span>Services</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <span>{{ $service }}</span>
                </a>
            </li>

            <li>
                <a href="javascript:void(0)">
                    <span>Search Service Location</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="container text-center alert alert-info">
        <h3>Book an Appointment for <span class="text-primary">{{ $service }} </span> Service.</h3>
        <div class="row p-3">

            <div class="col-md-3">
                <strong>Select State :</strong>
                <?php $states = App\Models\State::orderBy('state', 'ASC')->get(); ?>
                <select name="state_id" id="state_id" class="form-control" size="1">
                    <option disabled selected>--Select State--</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->state }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <strong>Select City :</strong>
                <select name="city_id" id="city_id" class="form-control" size="1">
                    <option disabled selected>--Select City--</option>
                </select>
            </div>
            <div class="col-md-3">
                <strong>Select Suburb:</strong>
                <select name="suburb_id" id="suburb_id" class="form-control" size="1">
                    <option disabled selected>--Select Suburb--</option>
                </select>
            </div>
            <div class="col pt-5">

                <button type="button" class="alert alert-primary" id="search">Search</button>

            </div>
        </div>
    </div>
    <div  class="container" id="searched_result_row">
        <div id="searched_result"></div>
    </div>
    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#state_id").on('change', function() {
                $('#searched_result_row').removeClass('d-none').addClass('d-none');
                $('#city_id').find('option').not(':first').remove();
                var selected_value = $('#state_id').val();
                data = {
                    "_token": "{{ csrf_token() }}",
                    "state_id": selected_value,
                };
                // console.log(data);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('city_dropdown') }}",
                    data: data,
                    success: function(response) {
                        // console.log(response.dat );
                        var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                //   console.log(response.data)
                                var id = response.data[i].city_type_id;
                                var name = response.data[i].city;

                                var option = "<option value='" + id + "'>" + name + "</option>";

                                $("#city_id").append(option);
                            }
                        }
                    },
                    error: function(error) {
                        console.log(error.responseText);
                    }
                });
            });

            //suburb
            $("#city_id").on('change', function() {
                $('#searched_result_row').removeClass('d-none').addClass('d-none');
                $('#suburb_id').find('option').not(':first').remove();
                var selected_value = $('#city_id').val();
                data = {
                    "_token": "{{ csrf_token() }}",
                    "city_id": selected_value,
                };
                // console.log(data);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('suburb_dropdown') }}",
                    data: data,
                    success: function(response) {
                        // console.log(response.dat );
                        var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                //   console.log(response.data)
                                var id = response.data[i].suburb_type_id;
                                var name = response.data[i].suburb;

                                var option = "<option value='" + id + "'>" + name + "</option>";

                                $("#suburb_id").append(option);
                            }
                        }
                    },
                    error: function(error) {
                        console.log(error.responseText);
                    }
                });
            });
            //search_serviceList
            $("#search").on('click', function() {
                $('#searched_result').html('');
                var state = $('#state_id').val();
                var city = $('#city_id').val();
                var suburb = $('#suburb_id').val();
                data = {
                    "_token": "{{ csrf_token() }}",
                    "state_id": state,
                    "city_id": city,
                    "suburb_id": suburb
                };
                $.ajax({
                    type: 'POST',
                    url: "{{ route('search-service-list') }}",
                    data: data,
                    success: function(response) {
                        if(response.status == 'success') {
                            if(response.is_data_available == 1) {
                                var searchedData = response.data;
                                var length = response.result_count;
                                var html = ``;

                                for (var i = 0; i < length; i++) {
                                    html += `<div class="col-xs-12 col-sm-12 col-md-12 p-3">
                                        <div class="card">
                                            <div class="card-body card-p">
                                                    <div class="row">
                                                        <div class="col-xs-8 col-sm-8 col-md-8">
                                                            <h3><span class="text-primary">Store Name :</span>  `+searchedData[i].store_name+` </h3>
                                                            <p><strong>Address :</strong>  `+searchedData[i].address+`
                                                                <span>  `+searchedData[i].suburb+` </span>
                                                                <span> `+searchedData[i].city+` </span>
                                                                <span> `+searchedData[i].state+` </span>
                                                                <span> -  `+searchedData[i].pincode+` </span>
                                                            </p>
                                                            <p><strong>Phone :</strong>  `+searchedData[i].phone+` </p>
                                                        </div>
                                                        <div class="col-xs-4 col-sm-4 col-md-4 text-center p-5">
                                                                <a href="{{ url('book-appointment?id=`+searchedData[i].id+`') }}">Book Now</a>
                                                        </div>
                                                    </div>
                                            </div>
                                        </h3>
                                    </div>`;
                                }
                                $('#searched_result_row').removeClass('d-none');
                                $('#searched_result').html(html);

                            } else {
                                alert('no result found');
                            }
                        }
                    },
                    error: function(error) {
                        console.log(error.responseText);
                    }
                });
            });
        }); // end of doc ready
    </script>
