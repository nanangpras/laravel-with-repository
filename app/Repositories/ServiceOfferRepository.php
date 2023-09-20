<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\ServiceOffer;

class ServiceOfferRepository
{
    protected $serviceOffer;

    public function __construct(ServiceOffer $serviceOffer)
    {
        $this->serviceOffer = $serviceOffer;
    }

    public function getAll()
    {
        return $this->serviceOffer->get();
    }

    public function getById($id)
    {
        return $this->serviceOffer->find($id);
    }

    public function save($data)
    {
        $serviceOffer = $this->serviceOffer;
        $serviceOffer->client_id = $data['client_id'];
        $serviceOffer->project_id = $data['project_id'];
        $serviceOffer->description = $data['description'];
        $serviceOffer->date_offer = $data['date_offer'];
        $serviceOffer->price = $data['price'];
        $serviceOffer->save();
    }

    public function update($data,$id)
    {
        $update = $this->serviceOffer->find($id);
        $update->client_id = $data['client_id'];
        $update->project_id = $data['project_id'];
        $update->description = $data['description'];
        $update->date_offer = $data['date_offer'];
        $update->price = $data['price'];
        $update->save();

    }

    public function delete($id)
    {
        $service = $this->serviceOffer->find($id);
        $service->delete();

    }
}
