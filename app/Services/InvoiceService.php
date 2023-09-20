<?php

namespace App\Services;

use App\Repositories\InvoiceRepository;
use App\Repositories\OrderRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class InvoiceService
{
    protected $invoiceRepository;
    protected $orderRepo;

    public function __construct(InvoiceRepository $invoiceRepository, OrderRepository $orderRepo)
    {
        $this->invoiceRepository = $invoiceRepository;
        $this->orderRepo = $orderRepo;
    }

    // get all users
    public function getAll()
    {
        return $this->invoiceRepository->getAll();
    }

    // get user by id
    public function getById($id)
    {
        return $this->invoiceRepository->getById($id);
    }

    // update user
    public function updateData($data,$id)
    {
        $validator = Validator::make($data,
            [
                'code'  => 'required',
                'order_id'  => 'required',
                'date_invoice'  => 'required',
                'total_amount'  => 'required',
                'status'  => 'required',
            ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $invoice = $this->invoiceRepository->update($data,$id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal update data');
        }

        DB::commit();
        return $invoice;
    }

    // save user
    public function saveData($data)
    {
        $validator = Validator::make($data,
        [
            'code'  => 'required',
            'order_id'  => 'required',
            'date_invoice'  => 'required',
            'total_amount'  => 'required',
            'status'  => 'required',
        ]
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->invoiceRepository->save($data);
        return $result;
    }

    // delete user
    public function deleteData($id)
    {
        DB::beginTransaction();
        try {
            $invoice = $this->invoiceRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Gagal delete data');
        }

        DB::commit();
        return $invoice;
    }
}
