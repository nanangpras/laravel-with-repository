<?php

namespace App\Services;

use App\Repositories\ServiceOfferRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ServiceOfferService
{
    protected $serviceOfferRepository;

    public function __construct(ServiceOfferRepository $serviceOfferRepository)
    {
        $this->serviceOfferRepository = $serviceOfferRepository;
    }

    // get all users
    public function getAll()
    {
        return $this->serviceOfferRepository->getAll();
    }

    // get user by id
    public function getById($id)
    {
        return $this->serviceOfferRepository->getById($id);
    }

    // update user
    public function updateData($data,$id)
    {
        $validator = Validator::make($data,
            [
                'client_id'  => 'required',
                'description' => 'bail|required',
                'project_id' => 'required',
                'date_offer' => 'required',
                'price' => 'required',
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $service = $this->serviceOfferRepository->update($data,$id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal update data');
        }

        DB::commit();
        return $service;
    }

    // save user
    public function saveData($data)
    {
        $validator = Validator::make($data,
            [
                'client_id'  => 'required',
                'description' => 'bail|required',
                'project_id' => 'required',
                'date_offer' => 'required',
                'price' => 'required',
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->serviceOfferRepository->save($data);
        return $result;
    }

    // delete user
    public function deleteData($id)
    {
        DB::beginTransaction();
        try {
            $service = $this->serviceOfferRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal delete data');
        }

        DB::commit();
        return $service;
    }
}
