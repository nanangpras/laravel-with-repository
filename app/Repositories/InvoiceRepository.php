<?php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository
{
    protected $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function getAll()
    {
        return $this->invoice->get();
    }

    public function getById($id)
    {
        return $this->invoice->find($id);
    }

    public function save($data)
    {
        $invoice = $this->invoice;
        $invoice->code = $data['code'];
        $invoice->order_id = $data['order_id'];
        $invoice->date_invoice = $data['date_invoice'];
        $invoice->total_amount = $data['total_amount'];
        $invoice->status = $data['status'];
        $invoice->save();
    }

    public function update($data,$id)
    {
        $update = $this->invoice->find($id);
        $update->code = $data['code'];
        $update->order_id = $data['order_id'];
        $update->date_invoice = $data['date_invoice'];
        $update->total_amount = $data['total_amount'];
        $update->status = $data['status'];
        $update->save();

    }

    public function delete($id)
    {
        $jobtype = $this->invoice->find($id);
        $jobtype->delete();

    }
}
