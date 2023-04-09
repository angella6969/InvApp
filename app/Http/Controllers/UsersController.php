<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\rent_log;
use Illuminate\Http\Request;
use App\View\Components\rent;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('welcome');
        return view('authentication.index',[
            "user" => User::all()->where('role_id','1' || 'role_id','2'),
            "users" => User::with(['role'])
               ->paginate(20)
            //    ->withQueryString()
               
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('welcome');
        return view('authentication.create',[
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'username'=>['required','min:3','max:200','unique:users'],
            'email'=>['required','email:dns','unique:users'],
            'password'=>['required','min:5','max:255']
        ]);
        
        $validatedData['password'] = Hash::make( $validatedData['password']);
        $validatedData['status'] = "active";
        $validatedData['role_id'] = 3;
        User::create($validatedData);
        return redirect('/users')->with('success', 'Berhasil Menambahkan User');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $users = User::findOrFail($id);
        return view('authentication.show',[
            'users' => $users ,
            "logs" => rent_log::with(['item', 'user'])->where('user_id',$users->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('authentication.edit',[
            "users" => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $data = [
            'name'=> 'required|max:255',
        ];
        if ($request->email != $request->email || $request->username != $request->username ) {
            $data['email'] = ['required','email:dns','unique:users'];
            $data['username'] = ['required','min:3','max:200','unique:users'];
        }
        $validatedData = $request->validate($data);
        User::where('id', $id)->update($validatedData);
        return redirect('/users')->with('success', 'Update Berhasil');
    }

    public function activated(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $data = [
            'name'=> 'required|max:255',
        ];
        if ($request->email != $request->email || $request->username != $request->username ) {
            $data['email'] = ['required','email:dns','unique:users'];
            $data['username'] = ['required','min:3','max:200','unique:users'];
        }
        $validatedData = $request->validate($data);
        User::where('id', $id)->update($validatedData);
        return redirect('/users')->with('success', 'Berhasil Menambahkan Data : Akun Status Inactive');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/users')->with('success', 'Berhasil Menghapus Data');
    }
}
