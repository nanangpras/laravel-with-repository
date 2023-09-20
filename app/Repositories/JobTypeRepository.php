<?php

namespace App\Repositories;

use App\Models\JobType;

class JobTypeRepository
{
    protected $jobtype;

    public function __construct(JobType $jobtype)
    {
        $this->jobtype = $jobtype;
    }

    public function getAll()
    {
        return $this->jobtype->get();
    }

    public function getById($id)
    {
        return $this->jobtype->find($id);
    }

    public function save($data)
    {
        $jobtype = $this->jobtype;
        $jobtype->name = $data['name'];
        $jobtype->save();
    }

    public function update($data,$id)
    {
        $update = $this->jobtype->find($id);
        $update->name = $data['name'];
        $update->save();

    }

    public function delete($id)
    {
        $jobtype = $this->jobtype->find($id);
        $jobtype->delete();

    }
}
