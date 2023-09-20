<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\JobTypeService;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    protected $jobTypeService;

    public function __construct(JobTypeService $jobTypeService)
    {
        $this->jobTypeService = $jobTypeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobtype = $this->jobTypeService->getAll();
        return view('pages.jobtypes.data-jobtype',compact('jobtype'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jobtypes.input-jobtype');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
        ]);
        $this->jobTypeService->saveData($data);
        return redirect()->route('jobtype.index')->with('success','Data berhasil ditambahkan');
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
        $edit = $this->jobTypeService->getById($id);
        return view('pages.jobtypes.edit-jobtype',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only([
            'name',
        ]);
        $this->jobTypeService->updateData($data,$id);
        return redirect()->route('jobtype.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->jobTypeService->deleteData($id);
        return redirect()->route('jobtype.index')->with('success','Data berhasil dihapus');
    }
}
