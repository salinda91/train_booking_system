<?php


namespace App\Repository;


interface TrainRepositoryInterface
{
    public function searchTrainDetails($request);
    public function singleTrainDetails($id);
    public function saveTrainBookingDetails($request);
    public function validateSeatNumbers($request);
}
