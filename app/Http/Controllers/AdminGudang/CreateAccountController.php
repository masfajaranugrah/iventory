<?php

namespace App\Http\Controllers\AdminGudang;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class CreateAccountController extends Controller
{
    public function create(){
        $users = User::where('role', 'manager')->orWhere('role', 'karyawan')->get();
        return view('Admin.Components.Register.register', compact('users'));
    }

    public function register(Request $request){
    $this->validate($request, [
        'name' => 'required',
        'username' => 'required|unique:users',
        'email' => 'required|min:4|email:rfc,dns|unique:users',
        'password' => [
            'required',
            'string',
            Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
        ],
        'password_confirm' => [
            'required',
            'string',
            'same:password',
            Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
        ],
        'role' => 'required|in:admin,manager,karyawan'
    ],[
            'name.required' => 'name tidak boleh kosong',
            'username.unique' => 'username sudah ada, tolong gunakan name yang berbeda',
            'username.required' => 'username tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'email.unique' => 'mohon maaf email sudah terdaftar',
            'email.email' => 'mohon masukkan email dengan benar',
            'password.required' => 'password tidak boleh kosong',
            'password_confirm.required' => 'password tidak boleh kosong',
            'password_confirm.same' => 'Password tidak sama',


        ]);
    $data =  new User();
    $data->name = $request->name;
    $data->username = $request->username;
    $data->email = $request->email;
    $data->password = bcrypt($request->password);
    $data->password_confirm = bcrypt($request->password_confirm);
    $data->role =  $request->role ;
    $data->remember_token = $request->_token;
    $data->save();
    return redirect('/admin-gudang/cerateAccount')->with('success', 'create new user success ');

}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

public function update(Request $request, $id)
    {
        $users =  User::find($id);
    $users->name = $request->name;
    $users->username = $request->username;
    $users->email = $request->email;
    $users->password = bcrypt($request->password);
    $users->password_confirm = bcrypt($request->password_confirm);
    $users->role =  $request->role ;
    $users->remember_token = $request->_token;
    $users->save();
        Session::flash('success', 'Update successful!');
        return redirect('/admin-gudang/cerateAccount')->with('success', 'update user success ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('admin-gudang/cerateAccount')->with('success', 'delete user success ');
    }
}
