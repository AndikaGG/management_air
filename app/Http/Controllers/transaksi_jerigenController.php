<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi_jerigen;
use DB;

class transaksi_jerigenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $transaksi_jerigen = Transaksi_jerigen::paginate(10);;

        // dd($request);
        return view('admin.jerigen.index', ['transaksi_jerigen' => $transaksi_jerigen]);


    }

    public function filter(Request $request)
    {

        // menangkap data pencarian
		$filter = $request->filter;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $transaksi_jerigen = Transaksi_jerigen::
        where('tgl_transaksi','like',"%".$filter."%")
        ->paginate(10);

            // mengirim data pegawai ke view index
        return view('admin.jerigen.index', ['transaksi_jerigen' => $transaksi_jerigen]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jerigen.index');
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

        $transaksi_jerigen = new Transaksi_jerigen;

        $transaksi_jerigen->id = $request->id;
        $transaksi_jerigen->tgl_transaksi = $request->tgl_transaksi;
        $transaksi_jerigen->harga_satuan = $request->harga_satuan;
        $transaksi_jerigen->qty = $request->qty;
        $transaksi_jerigen->total_harga = $request->total_harga;
        $transaksi_jerigen->id_user = $request->id_user;

        $transaksi_jerigen->save();

        return redirect('admin/jerigen')->with('message','Berhasil Tambah Data!');
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
        $transaksi_jerigen = Transaksi_jerigen::find($id);

        if (!$transaksi_jerigen) {
            abort(404);
        }

        return view('admin.jerigen.index') -> with('jerigen',$transaksi_jerigen);
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

        $transaksi_jerigen = Transaksi_jerigen::find($id);

        $transaksi_jerigen->tgl_transaksi = $request->tgl_transaksi;
        $transaksi_jerigen->harga_satuan = $request->harga_satuan;
        $transaksi_jerigen->qty = $request->qty;
        $transaksi_jerigen->total_harga = $request->total_harga;
        $transaksi_jerigen->id_user = $request->id_user;

        $transaksi_jerigen->save();

        return redirect('admin/jerigen')->with('message','Berhasil Edit Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi_jerigen = Transaksi_jerigen::find($id);
        $transaksi_jerigen->delete();

        return redirect('admin/jerigen')->with('message','Berhasil Hapus Data!');
    }
}
