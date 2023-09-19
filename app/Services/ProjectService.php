<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    // get all users
    public function getAll()
    {
        return $this->projectRepository->getAll();
    }

    // get user by id
    public function getById($id)
    {
        return $this->projectRepository->getById($id);
    }

    // update user
    public function updateData($data,$id)
    {
        $validator = Validator::make($data,
            [
                'name'  => 'bail|required|min:5',
                'description' => 'bail|required',
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $project = $this->projectRepository->update($data,$id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal update data');
        }

        DB::commit();
        return $project;
    }

    // save user
    public function saveData($data)
    {
        $validator = Validator::make($data,
            [
                'name'  => 'bail|required|min:5',
                'description' => 'bail|required',
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->projectRepository->save($data);
        return $result;
    }

    // delete user
    public function deleteData($id)
    {
        DB::beginTransaction();
        try {
            $project = $this->projectRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal delete data');
        }

        DB::commit();
        return $project;
    }
}
