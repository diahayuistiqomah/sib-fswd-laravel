<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_users = Users::all();
        return view('layout.users.index', compact('data_users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enumValues = DB::select("SHOW COLUMNS FROM users WHERE Field = 'role'");
        $enumRow = $enumValues[0];
        $enumOptions = explode(",", str_replace("'", "", substr($enumRow->Type, 5, (strlen($enumRow->Type) - 6))));

        return view('layout.users.add', compact('enumOptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file avatar
        ]);
    
        // Buat instance User baru
        $user = new Users;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->created_at = now();
        $user->updated_at = now();
    
        // Upload dan simpan file avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
    
        $user->save();
    
        return redirect('/users')->with('success', 'User has been created.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pengguna)
    {
        $data_user = Users::find($id_pengguna);
        return view('layout.users.show', compact('data_user'));
    }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        // Temukan user yang akan diupdate
        $user = Users::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        // Update password jika ada input baru
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        
        $user->save();

        return redirect('/users')->with('success', 'User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan user yang akan dihapus
        $data_users = Users::find($id);
        $data_users->delete();

        return redirect('/users')->with('success', 'User has been deleted.');
    }
}
