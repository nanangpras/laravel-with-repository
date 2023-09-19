<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job = $this->jobService->getAll();
        return view('pages.jobs.data-job',compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jobs.input-job');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'description',
            'start_date',
            'end_date',
            'job_type_id',
        ]);
        $this->jobService->saveData($data);
        return redirect()->route('job.index')->with('success','Data berhasil ditambahkan');
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
        $edit = $this->jobService->getById($id);
        return view('pages.jobs.edit-job',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only([
            'name',
            'description',
            'start_date',
            'end_date',
            'job_type_id',
        ]);
        $this->jobService->updateData($data,$id);
        return redirect()->route('job.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->jobService->deleteData($id);
        return redirect()->route('job.index')->with('success','Data berhasil dihapus');
    }
}
