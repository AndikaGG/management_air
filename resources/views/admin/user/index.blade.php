@extends('layout')
@section('title',"User")
@section('topnav',"User")

@section('main-content')


@if ((Auth::user()->name) === 'admin')
    <div class="col-md-3 grid-margin">
      <button class="btn btn-primary" data-toggle="modal" data-target="#userCreate" type="submit">Tambah User</button>
    </div>
@endif
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
            <h6 style="margin-left: -0.8rem;">Cari</h6>
            <form action="/admin/user/filter" method="GET">
                <div class="row">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" name="filter" width="200" autocomplete="off" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Cari" class="btn btn-success" style="border-radius:0px !important;padding:0.5rem 1rem;">
                    </div>
                </div>
            </form>
          </div>
          <br />
        <h3 class="card-title">Tabel user</h3>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th> ID </th>
              <th> Nama </th>
              <th> Alamat </th>
              <th> Email </th>
              <th> No Telepon </th>
              @if ((Auth::user()->name) === 'admin')
                <th> Aksi </th>
              @endif
            </tr>
          </thead>
          <tbody>
          @foreach ($user as $ser)
              <tr>
                  <td>{{ $ser -> id }}</td>
                  <td>{{ $ser -> name }}</td>
                  <td>{{ $ser -> alamat }}</td>
                  <td>{{ $ser -> email }}</td>
                  <td>{{ $ser -> no_tlp }}</td>
                  @if ((Auth::user()->name) === 'admin')
                    <td><!-- Button trigger modal -->
                      <button class="btn btn-primary" data-toggle="modal" data-target="#user{{ $ser -> id }}" type="submit">More</button>
                    </td>
                  @endif
              </tr>


              <!-- Modal Edit -->
              <div class="modal fade" id="user{{ $ser -> id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action='/admin/user/{{ $ser -> id }}' method="post">
                          <div class="form-group">
                            <label>Nama</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-money text-white"></i>
                                </span>
                              </div>
                              <input value="{{ $ser -> name }}" name="name" type="text" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
                            </div>
                          </div>


                          <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-money text-white"></i>
                                </span>
                              </div>
                              <input value="{{ $ser -> email }}" name="email"  type="text" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
                            </div>
                          </div>

                          <div class="form-group">
                            <label>Alamat</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-money text-white"></i>
                                </span>
                              </div>
                              <input value="{{ $ser -> alamat }}" name="alamat" type="text" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>No Telepon</label>
                            <div class="input-group">
                              <div class="input-group-prepend bg-primary">
                                <span class="input-group-text bg-transparent">
                                  <i class="fa fa-money text-white"></i>
                                </span>
                              </div>
                              <input value="{{ $ser -> no_tlp }}" name="no_tlp" type="text" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
                            </div>
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>

                          @if (($ser ->name) !== 'admin')
                            <a type="button" onclick="event.preventDefault();document.getElementById('delete').submit();"><button type="button" class="btn btn-outline-danger mr-2">Hapus</button></a>
                          @endif

                          <input type="hidden" name="id" value="{{ $ser -> id }}">
                          <input type="hidden" name="_method" value="put">
                          <input type="hidden" name="_token" value="{{ csrf_token()}}">
                          <input style="padding: 0.4rem 2.9rem;" class="btn btn-success mr-2" type="submit" name="submit" value="Simpan">
                        </form>
                        <form id="delete" action="/admin/user/{{$ser->id}}" method="post">
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
        {{-- {{ $user->links() }} --}}
      </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="userCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi user</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                  <form action='/admin/user' method="post">
                    <div class="form-group">
                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-primary">
                          <span class="input-group-text bg-transparent">
                            <i class="fa fa-money text-white"></i>
                          </span>
                        </div>
                        <input name="name" type="text" class="form-control" placeholder="nama" aria-label="Harga" aria-describedby="colored-addon1">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-primary">
                          <span class="input-group-text bg-transparent">
                            <i class="fa fa-money text-white"></i>
                          </span>
                        </div>
                        <input name="email"  type="text" class="form-control" placeholder="email" aria-label="Harga" aria-describedby="colored-addon1">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-primary">
                          <span class="input-group-text bg-transparent">
                            <i class="fa fa-money text-white"></i>
                          </span>
                        </div>
                        <input name="alamat" type="text" class="form-control" placeholder="alamat" aria-label="Harga" aria-describedby="colored-addon1">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No Telepon</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-primary">
                          <span class="input-group-text bg-transparent">
                            <i class="fa fa-money text-white"></i>
                          </span>
                        </div>
                        <input name="no_tlp" type="text" class="form-control" placeholder="no tlp" aria-label="Harga" aria-describedby="colored-addon1">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>password</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-primary">
                          <span class="input-group-text bg-transparent">
                            <i class="fa fa-money text-white"></i>
                          </span>
                        </div>
                        <input name="password" type="password" class="form-control" placeholder="password" aria-label="Harga" aria-describedby="colored-addon1">
                      </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <input name="id_user" type="hidden" value="2">
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
