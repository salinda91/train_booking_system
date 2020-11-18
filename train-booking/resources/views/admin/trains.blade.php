@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-right mb-4">
                <a href="{{route('admin.trains.add')}}" class="btn btn-primary btn-lg">Add Train</a>
            </div>
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
                                <th scope="col">status</th>
                                <th scope="col">Created by</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $x=1; @endphp
                            @foreach($trainDetails as $train)

                                <tr class="bg-light">
                                    <th scope="col">{{$x}}</th>
                                    <th scope="col">{{$train->name}}</th>
                                    <th scope="col">{{$train->departure_date}}</th>
                                    <th scope="col">{{$train->departure_time}}</th>
                                    <th scope="col">{{$train->number_of_seats}}</th>
                                    <th scope="col">
                                        @if($train->status)
                                            <span class="badge-success badge">Active</span>
                                        @else
                                            <span class="badge-danger badge">Inactive</span>
                                        @endif
                                    </th>
                                    <th scope="col">{{$train->createdBy->name}}</th>
                                    <th scope="col">{{\Carbon\Carbon::parse($train->created_at)->format('Y-m-d H:i:s')}}</th>
                                    <th scope="col">
                                        <a href="{{route('admin.trains.edit',['id'=>$train->id])}}"
                                           class="m-1 btn btn-info btn-sm">Edit</a>
                                        @if($train->status)
                                            <a href="#" class="m-1 btn btn-warning btn-sm">Inactive</a>
                                        @else
                                            <a href="#" class="m-1 btn btn-success btn-sm">Active</a>

                                        @endif
                                        <a href="#" class="m-1 btn btn-danger btn-sm"
                                           onclick="deleteTrain({{$train->id}})">Delete</a>
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

@endsection

@section('extra-js')
    <script>
        function deleteTrain(id) {

        }
    </script>
@endsection
