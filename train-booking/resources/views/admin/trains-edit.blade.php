@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right mb-4">
                <a href="{{route('admin.trains')}}" class="btn btn-primary btn-lg">View Trains</a>
            </div>
            @include('admin.message')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-3">Edit Train</h2>
                        <form id="add_train_form" method="post" action="{{route('admin.train.edit.save')}}">
                            @csrf
                            <input type="hidden" value="{{$train->id}}" name="id">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="train_name">Train Name</label>
                                        <input type="text" class="form-control" id="train_name" name="train_name" value="{{ $train->name }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="departure_date">Departure Date</label>
                                        <input type="date" class="form-control" id="departure_date"
                                               name="departure_date" value="{{ $train->departure_date}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="departure_time">Departure Time</label>
                                        <input type="time" class="form-control" id="departure_time"
                                               name="departure_time" value="{{ $train->departure_time }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="number_of_seats">Number of Seats</label>
                                        <input type="number" class="form-control" id="number_of_seats"
                                               name="number_of_seats" max="10" min="1" value="{{ $train->number_of_seats}}">
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-success btn-lg">Update</button>
                        </form>

                    </div>
                </div>
                <div class="p-3 text-center">
                    {{--                    {{$tickets->links()}}--}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')

@endsection
