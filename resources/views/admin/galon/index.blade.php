@extends('layout')
@section('title',"Transaksi Galon")
@section('topnav',"Transaksi Galon")

@section('main-content')


<div class="col-md-3 grid-margin">
  <button class="btn btn-primary" data-toggle="modal" data-target="#galonCreate" type="submit">Tambah Transaksi</button>
</div>

@if ($errors->any())       
  <div class="toast-container position-absolute" style="z-index: 999; right:40px;">
    <div class="toast " data-autohide="false">
      <div class="toast-header bg-danger">
        <strong class="mr-auto text-black">Gagal!</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
      </div>
      <div class="toast-body">
         Isi Field yang Masih Kosong! @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
     @endforeach
      </div>
    </div>
  </div>
@endif

@if(session()->has('message'))
    <div class="toast-container position-absolute" style="z-index: 999; right:40px;">
      <div class="toast">
        <div class="toast-header bg-success">
          <strong class="mr-auto text-black">Info!</strong>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
          {{ session()->get('message') }}
        </div>
      </div>
    </div>
@endif



<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="col">
            <h6 style="margin-left: -0.8rem;">Filter Berdasarkan Bulan</h6>
            <form action="/admin/galon/filter" method="GET">
                <div class="row">
                    <div class="form-group">
                      <div class="input-group">
                        <input id="datepicker1" name="filter" width="200" autocomplete="off" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Filter" class="btn btn-success" style="border-radius:0px !important;padding:0.5rem 1rem;">
                    </div>
                </div>
            </form>
          </div>
          <br />
        <h3 class="card-title">Tabel Transaksi Galon</h3>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th> No </th>
              <th> Tanggal </th>
              <th> Harga Galon </th>
              <th> Kuantitas </th>
              <th> Total </th>
              <th> Pencatat </th>
              <th> Aksi </th>
            </tr>
          </thead>
          <tbody>
          @foreach ($transaksi_galon as $galon)
              <tr>
                  <td>{{ $galon -> id }}</td>
                  <td>{{ $galon -> tgl_transaksi }}</td>
                  <td>Rp.{{ $galon -> harga_satuan }}</td>
                  <td>{{ $galon -> qty }}</td>
                  <td>Rp.{{ $galon -> total_harga }}</td>
                  <td>{{ $galon->user->name }}</td>
                  <td><!-- Button trigger modal -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#galon{{ $galon -> id }}" type="submit">Detail</button>
                  </td>
              </tr>


              <!-- Modal Edit -->
              <div class="modal fade" id="galon{{ $galon -> id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action='/admin/galon/{{ $galon -> id }}' method="post">
                          <div class="form-group">
                            <label>Harga Galon</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-money text-white"></i>
                                </span>
                              </div>
                              <input value="{{ $galon -> harga_satuan }}" name="harga_satuan" id="harga_satuanEdit" onkeyup="multiplyEdit();"  type="number" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-calendar text-white"></i>
                                </span>
                              </div>
                              <input autocomplete="off" id="" value="{{ $galon -> tgl_transaksi }}" name="tgl_transaksi" type="text" class="form-control" placeholder="Tanggal" aria-label="Tanggal" aria-describedby="colored-addon1">
                            </div>
                          </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Kuantitas</label>
                                  <div class="input-group">
                                    <input value="{{ $galon -> qty }}" name="qty" id="kuantitasEdit" onchange="multiplyEdit();" type="number" class="form-control" placeholder="Kuantitas" aria-label="Kuantitas" aria-describedby="colored-addon1">
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Total</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend bg-primary">
                                      <span class="input-group-text bg-transparent">
                                        <i class="fa fa-tags text-white"></i>
                                      </span>
                                    </div>
                                    <input value="{{ $galon -> total_harga }}" name="total_harga" id="totalEdit" type="text" class="form-control" placeholder="Total Harga" aria-label="total_harga" aria-describedby="colored-addon1" value="0" readonly>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Pencatat</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend bg-primary">
                                      <span class="input-group-text bg-transparent">
                                        <i class="fa fa-group text-white"></i>
                                      </span>
                                    </div>
                                    <input value="{{ $galon->user->name }}" id="total" type="text" class="form-control" placeholder="id_user" aria-label="total_harga" aria-describedby="colored-addon1" value="0" readonly>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 offset-md-8">
                                <div class="form-group">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                          <a type="button" onclick="event.preventDefault();document.getElementById('delete').submit();"><button type="button" class="btn btn-outline-danger mr-2">Hapus</button></a>
                          <input type="hidden" name="id" value="{{ $galon -> id }}">
                          <input name="id_user" type="hidden" value="{{ $galon->id_user }}">
                          <input type="hidden" name="_method" value="put">
                          <input type="hidden" name="_token" value="{{ csrf_token()}}">
                          <input style="padding: 0.4rem 2.9rem;" class="btn btn-success mr-2" type="submit" name="submit" value="Simpan">
                        </form>
                        <form id="delete" action="/admin/galon/{{$galon->id}}" method="post">
                          <input type="hidden" name="_method" value="delete">
                          <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
          </tbody>
        </table>
        <br>
        {{ $transaksi_galon->links() }}
      </div>
    </div>

    <!-- Modal Create -->
      <div class="modal fade" id="galonCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi Galon</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                  <form action='/admin/galon' method="post">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label>Harga Per Galon</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-money text-white"></i>
                                </span>
                              </div>
                              <input name="harga_satuan" id="harga_satuanCreate" onkeyup="multiplyCreate();"  type="number" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-calendar text-white"></i>
                                </span>
                              </div>
                              <input style="width: 246%;" autocomplete="off" id="datepickerCreate" name="tgl_transaksi" type="text" class="form-control" placeholder="Tanggal" aria-label="Tanggal" aria-describedby="colored-addon1">
                            </div>
                          </div>
                       </div>
                  
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Kuantitas</label>
                            <div class="input-group">
                              <input value="0" name="qty" id="kuantitasCreate" onchange="multiplyCreate();" type="number" class="form-control" placeholder="Kuantitas" aria-label="Kuantitas" aria-describedby="colored-addon1">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Total</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-tags text-white"></i>
                                </span>
                              </div>
                              <input name="total_harga" id="totalCreate" type="text" class="form-control" placeholder="Total Harga" aria-label="total_harga" aria-describedby="colored-addon1" value="0" readonly>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <input name="id_user" type="hidden" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input style="padding: 0.4rem 2.9rem;" class="btn btn-success mr-2" type="submit" name="submit" value="Simpan">
                  </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>









@endsection
