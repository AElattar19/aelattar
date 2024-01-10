<?php

namespace App\Http\Controllers\front\Contact;

use App\Rules\ReCaptcha;
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
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ];
        $validatedData = $request->validate($data);
        $post = $this->ContactUsRepository->create($request->except('g-recaptcha-response'));
        session()->flash('add');
        return redirect()->route('ContactUs');
    }

  
}
