@extends('layout')
@section('title',"Transaksi Tanki")
@section('topnav',"Transaksi Tanki")

@section('main-content')


<div class="col-md-3 grid-margin">
  <button class="btn btn-primary" data-toggle="modal" data-target="#tankiCreate" type="submit">Tambah Transaksi</button>
</div>

@if ($errors->any())       
  <div class="toast-container position-absolute" style="z-index: 999; right:40px;">
    <div class="toast " data-autohide="false">
      <div class="toast-header bg-danger">
        <strong class="mr-auto text-black">Gagal!</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
      </div>
      <div class="toast-body">
         Isi Field yang Masih Kosong!
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
            <form action="/admin/tanki/filter" method="GET">
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
        <h3 class="card-title">Tabel Transaksi tanki</h3>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th> No </th>
              <th> Nama Pengantar </th>
              <th> Tanggal </th>
              <th> Harga tanki </th>
              <th> Pencatat </th>
              <th> Aksi </th>
            </tr>
          </thead>
          <tbody>
          @foreach ($transaksi_tanki as $tanki)
              <tr>
                  <td>{{ $tanki -> id }}</td>
                  <td>{{ $tanki -> nama_pengantar }}</td>
                  <td>{{ $tanki -> tgl_transaksi }}</td>
                  <td>Rp.{{ $tanki -> harga_satuan }}</td>
                  <td>{{ $tanki ->user->name }}</td>
                  <td><!-- Button trigger modal -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tanki{{ $tanki -> id }}" type="submit">Detail</button>
                  </td>
              </tr>


              <!-- Modal Edit -->
              <div class="modal fade" id="tanki{{ $tanki -> id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action='/admin/tanki/{{ $tanki -> id }}' method="post">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nama Pengantar</label>
                              <div class="input-group">
                                <input value="{{ $tanki -> nama_pengantar }}" name="nama_pengantar" type="text" class="form-control" placeholder="Nama Pengantar" aria-describedby="colored-addon1">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Harga tanki</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-money text-white"></i>
                                </span>
                              </div>
                              <input value="{{ $tanki -> harga_satuan }}" name="harga_satuan" type="number" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
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
                              <input autocomplete="off" value="{{ $tanki -> tgl_transaksi }}" name="tgl_transaksi" type="text" class="form-control" placeholder="Tanggal" aria-label="Tanggal" aria-describedby="colored-addon1">
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Pencatat</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend bg-primary">
                                        <span class="input-group-text bg-transparent">
                                          <i class="fa fa-group text-white"></i>
                                        </span>
                                      </div>
                                      <input value="{{ $tanki->user->name }}" id="total" type="text" class="form-control" placeholder="id_user" aria-describedby="colored-addon1" value="0" readonly>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                          <a type="button" onclick="event.preventDefault();document.getElementById('delete').submit();"><button type="button" class="btn btn-outline-danger mr-2">Hapus</button></a>
                          <input name="id_user" type="hidden" value="{{ $tanki -> id_user }}">
                          <input type="hidden" name="_method" value="put">
                          <input type="hidden" name="_token" value="{{ csrf_token()}}">
                          <input style="padding: 0.4rem 2.9rem;" class="btn btn-success mr-2" type="submit" name="submit" value="Simpan">
                        </form>
                        <form id="delete" action="/admin/tanki/{{$tanki->id}}" method="post">
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
        {{ $transaksi_tanki->links() }}
      </div>
    </div>

    <!-- Modal Create -->
      <div class="modal fade" id="tankiCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi tanki</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                  <form action='/admin/tanki' method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Pengantar</label>
                          <div class="input-group">
                            <div class="input-group-prepend bg-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="fa fa-user text-white"></i>
                              </span>
                            </div>
                            <input name="nama_pengantar" type="text" class="form-control" placeholder="Nama Pengantar"  aria-describedby="colored-addon1">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label>Harga tanki</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-money text-white"></i>
                                </span>
                              </div>
                              <input name="harga_satuan" type="number" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
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
