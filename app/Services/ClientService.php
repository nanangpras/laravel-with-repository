<?php

namespace App\Services;

use App\Repositories\ClientRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ClientService
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    // get all users
    public function getAll()
    {
        return $this->clientRepository->getAll();
    }

    // get user by id
    public function getById($id)
    {
        return $this->clientRepository->getById($id);
    }

    // update user
    public function updateClient($data,$id)
    {
        $validator = Validator::make($data,
            [
                'name'  => 'bail|required|min:5',
                'email' => 'bail|required|email:rfc,dns',
                'address'  => 'required',
                'phone'  => 'required',
                'reference_company_id'  => 'required',
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $user = $this->clientRepository->update($data,$id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal update data');
        }

        DB::commit();
        return $user;
    }

    // save user
    public function saveClientData($data)
    {
        $validator = Validator::make($data,
        [
            'name'  => 'bail|required|min:5',
            'email' => 'bail|required|email:rfc,dns',
            'address'  => 'bail|required',
            'phone'  => 'bail|required',
            'reference_company_id'  => 'required',
        ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->clientRepository->save($data);
        return $result;
    }

    // delete user
    public function deleteClient($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->clientRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal delete data');
        }

        DB::commit();
        return $user;
    }
}
