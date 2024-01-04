<?php

namespace App\Http\Controllers\front\Course;
use App\Http\Controllers\Controller;
use App\Models\Track;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\TrackRepositoryInterface;

class TrackController extends Controller
{
    private CategoryRepositoryInterface $CategoryRepository; 
    private TrackRepositoryInterface $TrackRepository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(CategoryRepositoryInterface $CategoryRepository, TrackRepositoryInterface $TrackRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
        $this->TrackRepository = $TrackRepository;
    }
    public function index($slug)
    {

        $data = $this->TrackRepository->getbySlug($slug);
        return view('front.library.index', compact('data'));
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
    public function store(StoreTrackRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrackRequest $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
    }
}
