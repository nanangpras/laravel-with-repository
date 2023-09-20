<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ClientService;
use App\Services\InvoiceService;
use App\Services\OrderDetailService;
use App\Services\OrderService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $orderService;
    protected $orderDetailService;
    protected $invoiceService;
    protected $clientService;


    public function __construct(OrderService $orderService,OrderDetailService $orderDetailService, InvoiceService $invoiceService, ClientService $clientService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->invoiceService = $invoiceService;
        $this->clientService = $clientService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = $this->orderService->getAll();
        return view('pages.orders.data-order',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = $this->clientService->getAll();
        return view('pages.orders.input-order',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = [
            'date_invoice' => $request->input('date_invoice'),
            'client_id' => $request->input('client_id'),
            'status' => $request->input('status'),
        ];
        // simpan order
        $order = $this->orderService->saveData($data);
        $order_id = $this->orderService->getById($order->id);
        // dd($order_id);
        $this->orderService->calculateTotalAmount($order_id->id);

        // simpan order detail
        if ($request->project_id >0) {
            foreach ($request->project_id as $key => $value) {
                $detail = array (
                    'project_id' => $request->project_id[$key],
                    'qty' => $request->qty[$key],
                    'unit_price' => $request->unit_price[$key],
                    'order_id' => $order->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                );
                $this->orderDetailService->saveData($detail);
            }
        }
        // simpan invoice
        $inv = array(
            'code' => $request->code,
            'date_invoice' => $request->date_invoice,
            'status' => $request->status,
            'order_id' => $order->id,
            'total_amount' => 1
        );

        $this->invoiceService->saveData($inv);
        return redirect()->route('order.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
