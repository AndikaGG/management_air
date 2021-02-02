<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi_galon;
use DB;

class transaksi_galonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $transaksi_galon = Transaksi_galon::paginate(10);;

        



        // dd($request);
        return view('admin.galon.index', ['transaksi_galon' => $transaksi_galon]);


    }

    public function filter(Request $request)
    {

        // menangkap data pencarian
		$filter = $request->filter;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $transaksi_galon = DB::table('Transaksi_galon')
        ->where('tgl_transaksi','like',"%".$filter."%")
        ->paginate(10);

            // mengirim data pegawai ke view index
        return view('admin.galon.index', ['transaksi_galon' => $transaksi_galon]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galon.index');
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
            'tgl_transaksi' => 'required',
            'harga_satuan' => 'required',
            'qty' => 'required',
            'total_harga' => 'required'
        ]);

        $transaksi_galon = new Transaksi_galon;

        $transaksi_galon->id = $request->id;
        $transaksi_galon->tgl_transaksi = $request->tgl_transaksi;
        $transaksi_galon->harga_satuan = $request->harga_satuan;
        $transaksi_galon->qty = $request->qty;
        $transaksi_galon->total_harga = $request->total_harga;
        $transaksi_galon->id_user = $request->id_user;

        $transaksi_galon->save();

        return redirect('admin/galon')->with('message','Berhasil Tambah Galon!');
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
        $transaksi_galon = Transaksi_galon::find($id);

        if (!$transaksi_galon) {
            abort(404);
        }

        return view('admin.galon.index') -> with('galon',$transaksi_galon);
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
            'tgl_transaksi' => 'required',
            'harga_satuan' => 'required',
            'qty' => 'required',
            'total_harga' => 'required'
        ]);

        $transaksi_galon = Transaksi_galon::find($id);

        $transaksi_galon->tgl_transaksi = $request->tgl_transaksi;
        $transaksi_galon->harga_satuan = $request->harga_satuan;
        $transaksi_galon->qty = $request->qty;
        $transaksi_galon->total_harga = $request->total_harga;
        $transaksi_galon->id_user = $request->id_user;

        $transaksi_galon->save();

        return redirect('admin/galon')->with('message','berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi_galon = Transaksi_galon::find($id);
        $transaksi_galon->delete();

        return redirect('admin/galon')->with('message','Berhasil Dihapus!');
    }
}
