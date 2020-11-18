<?php

namespace App\Http\Controllers;

use App\Repository\TrainRepositoryInterface;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    private $trainRepository;

    public function __construct(TrainRepositoryInterface $trainRepository)
    {
        $this->trainRepository = $trainRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.home');
    }

    public function search(Request $request)
    {

        $trainDetails = $this->trainRepository->searchTrainDetails($request);
        return view('pages.search-results')
            ->with('trainDetails', $trainDetails);
    }

    public function bookTrain($id)
    {

        $trainDetails = $this->trainRepository->singleTrainDetails($id);
        if (!$trainDetails) {
            abort(404);
        }
        return view('pages.book-train')
            ->with('trainDetails', $trainDetails);
    }

    public function bookSaveTrain(Request $request)
    {
        $validatedData = $request->validate([
            'nic' => 'required|string|min:10|max:12', //new NIC no has 12 characters
            'no_of_seats' => 'required'
        ]);

        $seatValidate = $this->trainRepository->validateSeatNumbers($request);
        if (!$seatValidate) {
            return redirect()->back()->with('error', 'The Numbers of seats you requested, is not available');
        }
        $res = $this->trainRepository->saveTrainBookingDetails($request);

        if ($res['status']) {
            return redirect()->back()->with('success', 'Train Time Booked successfully! Reference Number - ' . $res['ref_no']);
        } else {
            return redirect()->back()->with('error', 'Train Time Booking submitted! Please try again.');
        }
    }
}
