<?php


namespace App\Repository;


interface AdminRepositoryInterface
{
    public function getTrainDetails();

    public function saveTrainDetails($request);
    public function updateTrainDetails($request);
    public function getSingleTrainDetail($id);
}
