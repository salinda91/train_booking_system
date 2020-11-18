@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 p-5 bg-light text-center">
                <h2 class="text-center">Welcome to Train Booking System</h2>

                <hr>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="mb-3">Trains</h2>
                            <table class="table">
                                <thead>
                                <tr class="bg-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Train Name</th>
                                    <th scope="col">Departure date</th>
                                    <th scope="col">Departure time</th>
                                    <th scope="col">Number of seats</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php $x=1; @endphp
                                @foreach($trainDetails as $train)

                                    <tr class="bg-light {{(!$train->is_vacant)?'disabled-div':''}}" >
                                        <th scope="col">{{$x}}</th>
                                        <th scope="col">{{$train->name}}</th>
                                        <th scope="col">{{$train->departure_date}}</th>
                                        <th scope="col">{{$train->departure_time}}</th>
                                        <th scope="col">{{$train->number_of_seats}}</th>
                                        <th scope="col">
                                            @if($train->is_vacant)
                                                <span class="badge-success badge">Seats Available</span>
                                            @else
                                                <span class="badge-danger badge">Seats Not Available</span>
                                            @endif
                                        </th>
                                        <th scope="col">
                                            @if($train->is_vacant)
                                                <a class="btn btn-sm btn-success" href="{{route('site.book',['id'=>$train->id])}}">Book Now</a>
                                            @endif
                                        </th>
                                    </tr>
                                    @php $x++; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="p-3 text-center">
                        {{$trainDetails->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')

@endsection

@section('extra-css')
    <style>
        .error {
            color: red;
        }
        .disabled-div{
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
@endsection
