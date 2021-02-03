<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use DB;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = User::paginate(10);;

        // dd($request);
        return view('admin.user.index', ['user' => $user]);

    }

    public function filter(Request $request)
    {

        // menangkap data pencarian
		$filter = $request->filter;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $user = DB::table('Users')
        ->where('name','like',"%".$filter."%")
        ->paginate(10);

            // mengirim data pegawai ke view index
        return view('admin.user.index', ['user' => $user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->no_tlp = $request->no_tlp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('admin/user')->with('message','Berhasil Tambah User!');
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
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        return view('admin.user.index') -> with('user',$user);
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
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->no_tlp = $request->no_tlp;
        $user->email = $request->email;

        $user->save();

        return redirect('admin/user')->with('message','berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user')->with('message','Berhasil Dihapus!');
    }
}
