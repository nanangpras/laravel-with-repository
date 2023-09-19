<?php

namespace App\Repositories;

use App\Models\Job;

class JobRepository
{
    protected $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function getAll()
    {
        return $this->job->get();
    }

    public function getById($id)
    {
        return $this->job->find($id);
    }

    public function save($data)
    {
        $job = $this->job;
        $job->name = $data['name'];
        $job->start_date = $data['start_date'];
        $job->end_date = $data['end_date'];
        $job->description = $data['description'];
        $job->job_type_id = $data['job_type_id'];
        $job->save();
    }

    public function update($data,$id)
    {
        $update = $this->job->find($id);
        $update->name = $data['name'];
        $update->start_date = $data['start_date'];
        $update->end_date = $data['end_date'];
        $update->description = $data['description'];
        $update->job_type_id = $data['job_type_id'];
        $update->save();

    }

    public function delete($id)
    {
        $job = $this->job->find($id);
        $job->delete();

    }
}
