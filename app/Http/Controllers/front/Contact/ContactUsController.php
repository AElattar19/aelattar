<?php

namespace App\Http\Controllers\front\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ContactUsRepositoryInterface;

class ContactUsController extends Controller
{
    private ContactUsRepositoryInterface $ContactUsRepository;

    public function __construct(ContactUsRepositoryInterface $ContactUsRepository)
    {
        $this->ContactUsRepository = $ContactUsRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front.contact.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $data = [
            'name' => 'required|string',
            'email' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'description' => 'required|string',
        ];
        $validatedData = $request->validate($data);
        $post = $this->ContactUsRepository->create($request->all());
        session()->flash('add');
        return redirect()->route('ContactUs');
    }

  
}
