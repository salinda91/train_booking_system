<?php

namespace App\Http\Controllers;

use App\Repository\AdminRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $adminRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function getAllTrains()
    {

        $trainDetails = $this->adminRepository->getTrainDetails();
        return view('admin.trains')
            ->with('trainDetails', $trainDetails);
    }

    public function addAllTrains()
    {

        return view('admin.trains-add');
    }

    public function saveAllTrains(Request $request)
    {
        $validatedData = $request->validate([
            'train_name' => 'required',
            'departure_date' => 'required',
            'departure_time' => 'required',
            'number_of_seats' => 'required|max:10|min:1',
        ]);

        $res = $this->adminRepository->saveTrainDetails($request);
        if ($res) {
            return redirect()->back()->with('success', 'Train Details submitted successfully');
        } else {
            return redirect()->back()->with('error', 'Train Details was not submitted! Please try again.');
        }
    }

    public function editTrain($id)
    {

        $train = $this->adminRepository->getSingleTrainDetail($id);

        return view('admin.trains-edit')
            ->with('train',$train);
    }

    public function editSaveTrain(Request $request)
    {
        $validatedData = $request->validate([
            'train_name' => 'required',
            'departure_date' => 'required',
            'departure_time' => 'required',
            'number_of_seats' => 'required|max:10|min:1',
        ]);

        $res = $this->adminRepository->updateTrainDetails($request);
        if ($res) {
            return redirect()->back()->with('success', 'Train Details updated successfully');
        } else {
            return redirect()->back()->with('error', 'Train Details was not updated! Please try again.');
        }
    }
}
