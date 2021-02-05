<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi_tanki;
use DB;

class transaksi_tankiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $transaksi_tanki = Transaksi_tanki::paginate(10);;

        // dd($request);
        return view('admin.tanki.index', ['transaksi_tanki' => $transaksi_tanki]);


    }

    public function filter(Request $request)
    {

        // menangkap data pencarian
		$filter = $request->filter;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $transaksi_tanki = Transaksi_tanki::
        where('tgl_transaksi','like',"%".$filter."%")
        ->paginate(10);

            // mengirim data pegawai ke view index
        return view('admin.tanki.index', ['transaksi_tanki' => $transaksi_tanki]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tanki.index');
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
            'nama_pengantar' => 'required',
        ]);

        $transaksi_tanki = new Transaksi_tanki;

        $transaksi_tanki->tgl_transaksi = $request->tgl_transaksi;
        $transaksi_tanki->harga_satuan = $request->harga_satuan;
        $transaksi_tanki->nama_pengantar = $request->nama_pengantar;
        $transaksi_tanki->id_user = $request->id_user;

        $transaksi_tanki->save();

        return redirect('admin/tanki')->with('message','Berhasil Tambah Data!');
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
        $transaksi_tanki = Transaksi_tanki::find($id);

        if (!$transaksi_tanki) {
            abort(404);
        }

        return view('admin.tanki.index') -> with('tanki',$transaksi_tanki);
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
            'nama_pengantar' => 'required',
        ]);

        $transaksi_tanki = Transaksi_tanki::find($id);

        $transaksi_tanki->tgl_transaksi = $request->tgl_transaksi;
        $transaksi_tanki->harga_satuan = $request->harga_satuan;
        $transaksi_tanki->nama_pengantar = $request->nama_pengantar;
        $transaksi_tanki->id_user = $request->id_user;

        $transaksi_tanki->save();

        return redirect('admin/tanki')->with('message','Berhasil Edit Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi_tanki = Transaksi_tanki::find($id);
        $transaksi_tanki->delete();

        return redirect('admin/tanki')->with('message','Berhasil Hapus Data!');
    }
}
