@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 p-5 bg-light text-center">
                <h2 class="text-center">Welcome to Train Booking System</h2>

                <hr>
                <h4 class="m-4">Search a train here</h4>
                <form class="form-inline align-items-center mt-2" style="display: block !important;" action="{{route('site.search')}}">

                    <input type="date" class="form-control mb-2 mr-sm-2" name="departure_date">
                    <input type="time" class="form-control mb-2 mr-sm-2" name="departure_time">

                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
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
    </style>
@endsection
