<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 'USER') {
            return view('dashboard')->with('user', Auth::user());
        }
        if (request()->ajax()) {

            $query = User::all();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">
                                Aksi
                            </button>
                            <div class="dropdown-menu">
                                
                                <form action="' . route('user.destroy', $item) . '" method="POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type="submit" class="dropdown-item text-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->rawColumns(['action'])
                ->make();
        }
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->roles == 'USER') {
            return view('dashboard')->with('user', Auth::user());
        }
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        if (Auth::user()->roles == 'USER') {
            return view('dashboard')->with('user', Auth::user());
        }

        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        User::create($data);

        return to_route('user.index')->with('success', 'User has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'old_password' => 'required',
            'password' => ['required'],
            'confirm_password' => ['required|same:password'],
        ]);

        $check = Hash::check($request->old_password, auth()->user()->password);

        if ($check) {
            $data = [
                'name' => $request->name,
                'password' => bcrypt($request->password),
            ];
            $user->update($data);

            return to_route('user.edit', $user)->with('success', 'password has been updated');
        } else {
            return to_route('user.edit', $user)->with('failed', 'failed to change password');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if (Auth::user()->roles == 'USER') {
            return view('dashboard')->with('user', Auth::user());
        }

        $user->delete();

        return to_route('user.index')->with('success', 'User has been deleted');
    }
}
