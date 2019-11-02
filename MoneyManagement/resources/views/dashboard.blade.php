    <!-- <!doctype html>
    <html lang="en">
    <head> -->
        <!-- Required meta tags -->
        <!-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

        <!-- <title>Dashboard</title>
    </head>
    <body> -->

        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="{{url('dashboard')}}">Pecinta Duniawi</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="{{url('dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('laporan')}}">Laporan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('tabunganberencana')}}">Tabungan Berencana</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/konfigurasi')}}">Konfigurasi</a>
            </li>

        </ul> -->

        <!-- <ul class="navbar-nav ml-auto"> -->
            <!-- Authentication Links -->
            <!-- @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login/Register</a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
        @endguest
    </ul>
</div>
</nav> -->
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <a class="btn btn-primary mb-3 " href="{{url('/transaksi/cetakpdf')}}">Cetak Laporan format PDF</a>
               <a class="btn btn-success mb-3 center" href="{{url('/transaksi/cetakexcel')}}">Cetak Laporan format Excel</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#pemasukanmodal">
              Tambah Pemasukan
          </button><br>

          <!-- Modal -->
          <div class="modal" id="pemasukanmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{url('transaksi/tambahtransaksipemasukan')}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label >Nominal</label>
                        <input type="number" class="form-control" name="nominal" placeholder="Nominal" required>
                    </div>
                    <div class="form-group">
                        <label >Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                    </div>
                    <div class="form-group">
                        <label >Upload Foto</label>
                        <input type="file" name="uploadfoto" class="form-control-file" id="exampleFormControlFile1" accept=".png, .jpg, .jpeg">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            @foreach($kategoripemasukan as $kp)
                            <option>{{$kp->nama}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Sub Kategori</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            @foreach($kategoripemasukan as $kp)
                            <option>{{$kp->nama}}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>


                </form>

            </div>

        </div>
    </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#pengeluaranmodal">
  Tambah Pengeluaran
</button> <br>

<!-- Modal -->
<div class="modal" id="pengeluaranmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
     <form method="POST" enctype="multipart/form-data" action="{{url('transaksi/tambahtransaksipengeluaran')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label >Nominal</label>
            <input type="number" class="form-control" name="nominal" placeholder="Nominal" required>
        </div>
        <div class="form-group">
            <label >Keterangan</label>
            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
        </div>
        <div class="form-group">
            <label >Upload Foto</label>
            <input type="file" name="uploadfoto" class="form-control-file" id="exampleFormControlFile1" accept=".png, .jpg, .jpeg">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori</label>
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach($kategoripengeluaran as $kp)
                            <option>{{$kp->nama}}</option>
                            @endforeach

            </select>
        </div>
        <div class="form-group">
                        <label for="exampleFormControlSelect1">Sub Kategori</label>
                        <select name="kategori" class="form-control" id="exampleFormControlSelect1">
                            @foreach($kategoripemasukan as $kp)
                            <option value="{{$kp->id}}">{{$kp->nama}}</option>
                            @endforeach

                        </select>
                    </div>
        <button type="submit" class="btn btn-success">Submit</button>


    </form>
</div>

</div>

</div>

</div>

</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Daftar Transaksi</h2>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-transaksi">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="col-md-12">
                    <a class="btn btn-primary mb-3 center" href="{{url('/transaksi/cetakpdf')}}">Cetak Laporan format PDF</a>
                    <a class="btn btn-success mb-3 center" href="{{url('/transaksi/cetakexcel')}}">Cetak Laporan format Excel</a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-8">
        <h1 class="display-4 mt-2 bold">Daftar Transaksi</h1>
        <h3 class="display-5 mt-2">Lihat berdasarkan</h3>
        <select>
              <option value="bulan">Bulan</option>
              <option value="tahun">Tahun</option>
        </select> <br> <br>
         
            <div class="card text-black bg-light mb-3" style="max-width: 100%;">
              <div class="card-body">
                <p class="card-title">Tanggal</p>
                <p class="card-title float-right">Nominal</p>
                <p class="card-text">Kategori</p>
                <p class="card-text float-left">Keterangan</p>
            </div>
</div> -->


    </div>
    
</div>
</div>











<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
@endsection






