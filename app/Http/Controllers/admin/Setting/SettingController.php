<?php

namespace App\Http\Controllers\admin\Setting;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Repositories\Interfaces\SettingRepositoryInterface;

class SettingController extends Controller
{
    private SettingRepositoryInterface $repository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(SettingRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $data = $this->repository->getLatest();
        return view('dashboard.setting.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'title' => 'required|string|max:255',
            'mk' => 'required|string',
            'md' => 'required|string|max:255',
            'des' => 'required|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ];
        $validatedData = $request->validate($data);
        $this->repository->update($id, $request->except('logo','favicon'));
        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
