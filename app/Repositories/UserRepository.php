<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->get();
    }

    public function getById($id)
    {
        return $this->user->find($id);
    }

    public function save($data)
    {
        $user = $this->user;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
    }

    public function update($data,$id)
    {
        $update = $this->user->find($id);
        $update->name = $data['name'];
        $update->email = $data['email'];
        $update->save();

    }

    public function delete($id)
    {
        $user = $this->user->find($id);
        $user->delete();

    }
}
