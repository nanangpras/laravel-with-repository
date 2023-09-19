<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // get all users
    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    // get user by id
    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }

    // update user
    public function updateUser($data,$id)
    {
        $validator = Validator::make($data,
            [
                'name'  => 'bail|required|min:5',
                'email' => 'bail|required|email:rfc,dns',
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $user = $this->userRepository->update($data,$id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal update data');
        }

        DB::commit();
        return $user;
    }

    // save user
    public function saveUserData($data)
    {
        $validator = Validator::make($data,
            [
                'name'  => 'bail|required|min:5',
                'email' => 'bail|required|email:rfc,dns',
                'password' => 'bail|required|min:6'
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->userRepository->save($data);
        return $result;
    }

    // delete user
    public function deletUserId($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal delete data');
        }

        DB::commit();
        return $user;
    }
}
