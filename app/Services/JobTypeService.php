<?php

namespace App\Services;

use App\Repositories\JobTypeRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class JobTypeService
{
    protected $jobTypeRespository;

    public function __construct(JobTypeRepository $jobTypeRespository)
    {
        $this->jobTypeRespository = $jobTypeRespository;
    }

    // get all users
    public function getAll()
    {
        return $this->jobTypeRespository->getAll();
    }

    // get user by id
    public function getById($id)
    {
        return $this->jobTypeRespository->getById($id);
    }

    // update user
    public function updateData($data,$id)
    {
        $validator = Validator::make($data,
            [
                'name'  => 'bail|required|min:5',
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $jobtype = $this->jobTypeRespository->update($data,$id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal update data');
        }

        DB::commit();
        return $jobtype;
    }

    // save user
    public function saveData($data)
    {
        $validator = Validator::make($data,
            [
                'name'  => 'bail|required|min:5',
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->jobTypeRespository->save($data);
        return $result;
    }

    // delete user
    public function deleteData($id)
    {
        DB::beginTransaction();
        try {
            $jobtype = $this->jobTypeRespository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal delete data');
        }

        DB::commit();
        return $jobtype;
    }
}
