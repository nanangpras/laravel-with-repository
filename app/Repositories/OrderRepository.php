<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Request;

class OrderRepository
{
    protected $order;
    protected $orderdetail;

    public function __construct(Order $order, OrderDetail $orderdetail)
    {
        $this->order = $order;
        $this->orderdetail = $orderdetail;
    }

    public function getAll()
    {
        return $this->order->get();
    }

    public function getById($id)
    {
        return $this->order->find($id);
    }

    public function saveOrder($data)
    {

        $order = $this->order;
        $order->date_invoice = $data['date_invoice'];
        $order->client_id = $data['client_id'];
        $order->status = $data['status'];

        $total = $order->orderDetails->sum(function ($detail){
            return $detail->qty * $detail->unit_price;
        });

        $order->total_amount = $total;
        $order->save();

        return $order;

    }

    public function updateTotalAmount($total)
    {
        $order = $this->order;
        $order->total_amount = $total;
        $order->save();
    }

    public function update($data,$id)
    {
        $update = $this->order->find($id);
        $update->name = $data['name'];
        $update->save();

    }

    public function delete($id)
    {
        $jobtype = $this->order->find($id);
        $jobtype->delete();

    }
}
