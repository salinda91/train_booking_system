@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 p-5 bg-light">
                <h2 class="text-center">Welcome to Train Booking System</h2>

                <hr>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">{{$trainDetails->name}} ON {{$trainDetails->departure_date}}
                                @ {{$trainDetails->departure_time}}</h4>
                            <hr>
                            @include('inc.message')
                            <form action="{{route('site.book.save')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$trainDetails->id}}" name="train_id">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nic">NIC Number</label>
                                            <input type="text" class="form-control" id="nic"
                                                   name="nic" value="{{ old('nic') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_of_seats">Number Of Seats</label>
                                            <select name="no_of_seats" id="no_of_seats" class="form-control">
                                                @for($x=1;$x<=10;$x++)
                                                    <option value="{{$x}}">{{$x}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm m-3">Submit</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        function bookTRain(id) {

        }
    </script>
@endsection

@section('extra-css')
    <style>
        .error {
            color: red;
        }

        .disabled-div {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
@endsection
