<?php

namespace App\Http\Controllers\admin\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;

class AdminController extends Controller
{
    private UserRepositoryInterface $repository;
    /**
     * Display a listing of the resource.
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $admins = $this->repository->all();
            return DataTables::of($admins)
               ->addIndexColumn()
               ->addColumn('checkbox', function ($row) {
                   return '<input type="checkbox" id="'.$row->id.'" value="'.$row->id.'" name="ids[]"  />';
               })
               ->addColumn('status', function ($row) {
                   return $row->is_admin == 1 ? "active" : "Inactive";
               })
               ->addColumn('action', function ($admins) {

                   $html = '<a class="btn btn-info btn-sm" href="' . route('admins.edit', $admins->id) . '">
                                   <i class="fas fa-pencil-alt">
                                   </i>
                               </a> &nbsp;';

                       $html .= '<form action="' . route('admins.destroy', $admins->id) . '"
                                         method="post" style="display: inline-block;">
                                       ' . method_field('delete') . '
                                        ' . csrf_field() . '
                                       <button type="submit"
                                               class="btn  modal-effect btn btn-sm btn-danger">
                                           <i class="fas fa-trash">
                                           </i>
                                       </button>
                                   </form>';


                   return $html;
               })
               ->rawColumns(['checkbox','status','action'])
               ->make(true);
   }

   return view('dashboard.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('dashboard.admins.create');
    }

    public function profile(){


        return view('dashboard.admins.profile');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'status' => 'required',
            'photo' =>'required'
        ]);


        $Admins = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);
        $photo = Arr::pull($validate, 'photo');
        $photo && uploadMedia('Avatar', $photo, $Admins);

      // $Admins->addMediaFromRequest('photo')->toMediaCollection('Avatar');

        return view('dashboard.admins.index');
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
        $admin = User::find($id);
        return view('dashboard.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'photo' => 'nullable',
            'status' => 'numeric',
        ]);

        $Admins = User::find($id) ;
        $Admins->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);


        $photo = Arr::pull($validate, 'photo');

        if ($request->password != null){
            $Admins->update(['password' => Hash::make($request->password)]);
        }

            $photo && uploadMedia('Avatar', $photo, $Admins);

            return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function massDelete(Request $request)
    {
        $admins = User::whereIn('id', $request->get('ids'))->get();

        $admins->each(function ($admin) {
            $admin->delete();
        });

        return redirect()->route('admins.index');
    }
}
