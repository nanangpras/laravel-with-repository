<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice = $this->invoiceService->getAll();
        return view('pages.invoice.data-invoice',compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.invoice.input-invoice');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'code'  ,
            'order_id' ,
            'date_invoice' ,
            'total_amount',
            'status',
        ]);
        $this->invoiceService->saveData($data);
        return redirect()->route('invoice.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = $this->invoiceService->getById($id);
        return view('pages.jobtypes.edit-invoice',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only([
            'code'  ,
            'order_id' ,
            'date_invoice' ,
            'total_amount',
            'status',
        ]);
        $this->invoiceService->updateData($data,$id);
        return redirect()->route('invoice.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->invoiceService->deleteData($id);
        return redirect()->route('invoice.index')->with('success','Data berhasil dihapus');
    }
}
