<?php

namespace App\Repositories;

use App\Models\OrderDetail;

class OrderDetailRepository
{
    protected $orderDetail;

    public function __construct(OrderDetail $orderDetail)
    {
        $this->orderDetail = $orderDetail;
    }

    public function save($data)
    {
        // return $this->orderDetail->save($data);
        $orderDetail = $this->orderDetail;
        // $orderDetail->order_id = $data['order_id'];
        // $orderDetail->project_id = $data['project_id'];
        // $orderDetail->qty = $data['qty'];
        // $orderDetail->unit_price = $data['unit_price'];
        $orderDetail->insert($data);
        return $orderDetail;
    }
}
