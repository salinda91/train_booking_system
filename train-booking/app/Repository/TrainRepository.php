<?php


namespace App\Repository;


use App\Models\Train;
use App\Models\TrainBooking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TrainRepository implements TrainRepositoryInterface
{
    public function searchTrainDetails($request)
    {
        $trains = Train::where('status', 1)->orderBy('departure_date', 'ASC');
        if (!is_null($request->departure_date)) {
            $trains->whereDate('departure_date', '>=', $request->departure_date);
        }
        $trains->where(function ($q) {
            $q->whereDate('departure_date', '>=', Carbon::now()->format('Y-m-d'));
        });

        return $trains->paginate(10);

    }

    public function singleTrainDetails($id)
    {
        return Train::where('id', $id)->first();
    }

    public function saveTrainBookingDetails($request)
    {
        $book = new TrainBooking();
        $book->ref_no = $this->generateReferenceNumber();
        $book->train_id = $request->train_id;
        $book->nic = $request->nic;
        $book->number_of_seats = $request->no_of_seats;
        $book->created_at = Carbon::now()->format('Y-m-d');
        $res = $book->save();

        if ($res) {

            $train = Train::where('id', $request->train_id)->first();
            $remaining = ($train->number_of_seats - $request->no_of_seats);
            $train->number_of_seats = $remaining;
            if ($remaining <= 0) {
                $train->is_vacant = 0;
            }
            $train->save();


        }

        return array('status' => $res, 'ref_no' => $book->ref_no);
    }

    private function generateReferenceNumber()
    {
        return Carbon::now()->format('is') . Str::random(5);
    }

    public function validateSeatNumbers($request)
    {
        $train = Train::where('id', $request->train_id)->first();

        if ($request->no_of_seats > $train->number_of_seats) {
            return false;
        }

        return true;

    }
}
