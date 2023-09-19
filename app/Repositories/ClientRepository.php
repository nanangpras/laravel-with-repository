<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAll()
    {
        return $this->client->get();
    }

    public function getById($id)
    {
        return $this->client->find($id);
    }

    public function save($data)
    {
        $client = $this->client;
        $client->name = $data['name'];
        $client->address = $data['address'];
        $client->email = $data['email'];
        $client->phone = $data['phone'];
        $client->reference_company_id = $data['reference_company_id'];
        $client->save();
    }

    public function update($data,$id)
    {
        $update = $this->client->find($id);
        $update->name = $data['name'];
        $update->address = $data['address'];
        $update->email = $data['email'];
        $update->phone = $data['phone'];
        $update->reference_company_id = $data['reference_company_id'];
        $update->save();

    }

    public function delete($id)
    {
        $client = $this->client->find($id);
        $client->delete();

    }
}
