<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function getAll()
    {
        return $this->project->get();
    }

    public function getById($id)
    {
        return $this->project->find($id);
    }

    public function save($data)
    {
        $project = $this->project;
        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->save();
    }

    public function update($data,$id)
    {
        $update = $this->project->find($id);
        $update->name = $data['name'];
        $update->description = $data['description'];
        $update->save();

    }

    public function delete($id)
    {
        $project = $this->project->find($id);
        $project->delete();

    }
}
