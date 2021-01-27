@extends('layout')
@section('title',"judul")

@section('main-content')
<div class="col-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pembelian Galon</h4>
        <form action='/admin/galon' method="post">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-primary">
                      <span class="input-group-text bg-transparent">
                        <i class="fa fa-money text-white"></i>
                      </span>
                    </div>
                    <input name="harga_satuan" id="harga_satuan" onkeyup="multiply();"  type="text" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-primary">
                      <span class="input-group-text bg-transparent">
                        <i class="fa fa-calendar text-white"></i>
                      </span>
                    </div>
                    <input name="tgl_transaksi" type="text" class="form-control" placeholder="Tanggal" aria-label="Tanggal" aria-describedby="colored-addon1">
                  </div>
                </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-primary">
                      <span class="input-group-text bg-transparent">
                        <i class="fa fa-dropbox text-white"></i>
                      </span>
                    </div>
                    <input name="qty" id="kuantitas" onkeyup="multiply();" type="text" class="form-control" placeholder="Kuantitas" aria-label="Kuantitas" aria-describedby="colored-addon1">
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-primary">
                      <span class="input-group-text bg-transparent">
                        <i class="fa fa-tags text-white"></i>
                      </span>
                    </div>
                    <input name="total_harga" id="total" type="text" class="form-control" placeholder="Total Harga" aria-label="total_harga" aria-describedby="colored-addon1" value="0" readonly>
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 offset-md-8">
                <div class="form-group">
                    <input name="id_user" type="hidden" value="2">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input style="padding: 0.4rem 2.9rem;" class="btn btn-success mr-2" type="submit" name="submit" value="Simpan">
                </div>
            </div>
        </div>
        </form>
      </div>
    </div>
</div>

<div class="col-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pembelian Jerigen</h4>
        <form action='/admin/galon' method="post">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-primary">
                      <span class="input-group-text bg-transparent">
                        <i class="fa fa-money text-white"></i>
                      </span>
                    </div>
                    <input name="harga_satuan" id="harga_satuan" onkeyup="multiply();"  type="text" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-primary">
                      <span class="input-group-text bg-transparent">
                        <i class="fa fa-calendar text-white"></i>
                      </span>
                    </div>
                    <input name="tgl_transaksi" type="text" class="form-control" placeholder="Tanggal" aria-label="Tanggal" aria-describedby="colored-addon1">
                  </div>
                </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-primary">
                      <span class="input-group-text bg-transparent">
                        <i class="fa fa-dropbox text-white"></i>
                      </span>
                    </div>
                    <input name="qty" id="kuantitas" onkeyup="multiply();" type="text" class="form-control" placeholder="Kuantitas" aria-label="Kuantitas" aria-describedby="colored-addon1">
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend bg-primary">
                      <span class="input-group-text bg-transparent">
                        <i class="fa fa-tags text-white"></i>
                      </span>
                    </div>
                    <input name="total_harga" id="total" type="text" class="form-control" placeholder="Total Harga" aria-label="total_harga" aria-describedby="colored-addon1" value="0" readonly>
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 offset-md-8">
                <div class="form-group">
                    <input name="id_user" type="hidden" value="2">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input style="padding: 0.4rem 2.9rem;" class="btn btn-success mr-2" type="submit" name="submit" value="Simpan">
                </div>
            </div>
        </div>
        </form>
      </div>
    </div>
</div>


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <h5>Filter</h5>
          <form action="/admin/galon/filter" method="post">
              <div class="row">
                  <div class="form-group">
                    <div class="input-group">
                      <input id="datepicker" name="filter" width="200" value="100">
                    </div>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="submit" value="Sorting" class="btn btn-success mr-2">
                  </div>
              </div>


          </form>

          <br />
        <h4 class="card-title">Tabel Transaksi Galon</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> No </th>
              <th> Tanggal </th>
              <th> Harga Galon </th>
              <th> Kuantitas </th>
              <th> Total </th>
              <th> Diinput Oleh </th>
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
              <td>{{ $galon -> id_user }}</td>
              <td><!-- Button trigger modal -->
                 <button class="btn btn-primary" data-toggle="modal" data-target="#galon{{ $galon -> id }}" type="submit">More</button>
              </td>
          </tr>
          <!-- Modal -->
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
                          <input value="{{ $galon -> harga_satuan }}" name="harga_satuan" id="harga_satuan" onkeyup="multiply();"  type="text" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="colored-addon1">
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
                          <input value="{{ $galon -> tgl_transaksi }}" name="tgl_transaksi" type="text" class="form-control" placeholder="Tanggal" aria-label="Tanggal" aria-describedby="colored-addon1">
                        </div>
                      </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Kuantitas</label>
                              <div class="input-group">
                                <div class="input-group-prepend bg-primary">
                                  <span class="input-group-text bg-transparent">
                                    <i class="fa fa-dropbox text-white"></i>
                                  </span>
                                </div>
                                <input value="{{ $galon -> qty }}" name="qty" id="kuantitas" onkeyup="multiply();" type="text" class="form-control" placeholder="Kuantitas" aria-label="Kuantitas" aria-describedby="colored-addon1">
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
                                <input value="{{ $galon -> total_harga }}" name="total_harga" id="total" type="text" class="form-control" placeholder="Total Harga" aria-label="total_harga" aria-describedby="colored-addon1" value="0" readonly>
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
                                <input value="{{ $galon -> id_user }}" name="id_user" id="total" type="text" class="form-control" placeholder="id_user" aria-label="total_harga" aria-describedby="colored-addon1" value="0" readonly>
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
                      <input type="hidden" name="id" value="{{ $galon -> id }}">
                      <input name="id_user" type="hidden" value="2">
                      <input type="hidden" name="_method" value="put">
                      <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      <input style="padding: 0.4rem 2.9rem;" class="btn btn-success mr-2" type="submit" name="submit" value="Simpan">
                    </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>






@endsection
