<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ClientService;
use App\Services\ProjectService;
use App\Services\ServiceOfferService;
use Illuminate\Http\Request;

class ServiceOfferController extends Controller
{
    protected $serviceOfferService;
    protected $projectService;
    protected $clientService;

    public function __construct(ServiceOfferService $serviceOfferService,ProjectService $projectService, ClientService $clientService)
    {
        $this->serviceOfferService = $serviceOfferService;
        $this->projectService = $projectService;
        $this->clientService = $clientService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service_offer = $this->serviceOfferService->getAll();
        return view('pages.service-offer.data-so',compact('service_offer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = $this->clientService->getAll();
        $proyek = $this->projectService->getAll();
        return view('pages.service-offer.input-so',compact('client','proyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'client_id',
            'project_id',
            'description',
            'date_offer',
            'price',
        ]);
        $this->serviceOfferService->saveData($data);
        return redirect()->route('service-offer.index')->with('success','Data berhasil ditambahkan');
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
