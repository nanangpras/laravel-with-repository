<?php

namespace App\Services;

use App\Repositories\JobRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class JobService
{
    protected $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    // get all users
    public function getAll()
    {
        return $this->jobRepository->getAll();
    }

    // get user by id
    public function getById($id)
    {
        return $this->jobRepository->getById($id);
    }

    // update user
    public function updateData($data,$id)
    {
        $validator = Validator::make($data,
            [
                'name'  => 'bail|required|min:5',
                'start_date' => 'bail|required',
                'end_date' => 'bail|required',
                'description' => 'required',
                'job_type_id' => 'required'
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $job = $this->jobRepository->update($data,$id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal update data');
        }

        DB::commit();
        return $job;
    }

    // save user
    public function saveData($data)
    {
        $validator = Validator::make($data,
            [
                'name'  => 'bail|required|min:5',
                'start_date' => 'bail|required|date',
                'end_date' => 'bail|required|date',
                'description' => 'required',
                'job_type_id' => 'required'
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->jobRepository->save($data);
        return $result;
    }

    // delete user
    public function deleteData($id)
    {
        DB::beginTransaction();
        try {
            $job = $this->jobRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal delete data');
        }

        DB::commit();
        return $job;
    }
}
