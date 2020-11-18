<?php


namespace App\Repository;


use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminRepository implements AdminRepositoryInterface
{
    public function getTrainDetails()
    {
        return Train::with('createdBy')->paginate(10);
    }

    public function saveTrainDetails($request)
    {
        $train = new Train();
        $train->name = $request->train_name;
        $train->departure_date = $request->departure_date;
        $train->departure_time = $request->departure_time;
        $train->number_of_seats = $request->number_of_seats;
        $train->created_by = Auth::user()->id;
        $train->created_at = Carbon::now()->format('Y-m-d');

        return $train->save();
    }

    public function updateTrainDetails($request)
    {
        $train = Train::where('id',$request->id)->first();
        $train->name = $request->train_name;
        $train->departure_date = $request->departure_date;
        $train->departure_time = $request->departure_time;
        $train->number_of_seats = $request->number_of_seats;
        $train->updated_at = Carbon::now()->format('Y-m-d');

        return $train->save();
    }

    public function getSingleTrainDetail($id)
    {

        return Train::where('id', $id)->first();

    }


}
