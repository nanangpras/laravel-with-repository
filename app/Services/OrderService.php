<?php

namespace App\Services;

use App\Repositories\InvoiceRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class OrderService
{
    protected $orderRepository;
    protected $invoiceRepository;
    protected $orderDetailRepository;

    public function __construct(OrderRepository $orderRepository,InvoiceRepository $invoiceRepository,OrderDetailRepository $orderDetailRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->invoiceRepository = $invoiceRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    // get all users
    public function getAll()
    {
        return $this->orderRepository->getAll();
    }

    // get user by id
    public function getById($id)
    {
        return $this->orderRepository->getById($id);
    }

    // update user


    // save user
    public function saveData($dataOrder)
    {
        // save order
        $orderyes = $this->orderRepository->saveOrder($dataOrder);

        return $orderyes;
    }

    // total amount
    public function calculateTotalAmount($id)
    {
        $order = $this->orderRepository->getById($id);
        // dd($order);
        if ($order) {
            $total_amount = $order->orderDetails->sum(function ($detail){
                return $detail->qty * $detail->unit_price;
            });
            $this->orderRepository->updateTotalAmount($order, $total_amount);
        }
    }

}
