<!--     <!doctype html>
    <html lang="en">
    <head> -->
        <!-- Required meta tags -->
        <!-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

        <!-- Bootstrap CSS -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Tabungan Berencana</title> -->
 <!--    </head>
    <body> -->

        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="{{url('dashboard')}}">Pecinta Duniawi</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <!-- <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a class="nav-link" href="{{url('dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('laporan')}}">Laporan</a>
            </li>
            <li class="nav-item active">
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
            <div class="section-header">
                <h1 class="display-4 mt-3 text-center">Daftar Tabungan Anda</h1>
            </div>
            <!-- <h1 class="display-4 mt-3 text-center">Daftar Tabungan Anda</h1> <br> -->
            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#tabunganberencana">
              Tambah Tabungan Baru
          </button><br>

          <!-- Modal -->
          <div class="modal fade" id="tabunganberencana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Tabungan Berencana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{url('/tabunganberencana/tambahtabunganberencana')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label >Nama Target</label>
                        <input type="text" class="form-control" name="namatarget" placeholder="Nama Tabungan" required>
                    </div>
                    <div class="form-group">
                        <label >Target Tabungan</label>
                        <input type="number" class="form-control" name="targettabungan" placeholder="Nominal Target Tabungan" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nominal Sekarang</label>
                        <input type="number" class="form-control" name="nominalsekarang" placeholder="Tidak perlu diisi apabila belum menabung">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>


                </form>

            </div>

        </div>
    </div>
</div>
@foreach($tabunganberencana as $index =>$tb)
    <div class="row">
        <div class="col-md-12">
          
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$tb->nama}}</h5>
                <div class="progress">
                  <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width:{{$datapersen[$index]}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$datapersen[$index]}}%/Rp {{number_format($tb->nominal_sekarang)}}</div><br>
                  
                </div>
                <p class="float-left">Rp {{number_format($tb->nominal_sekarang)}}</p>
                <p class="float-right" >Rp {{number_format($tb->target)}}</p> <br>
                   <a class="btn btn-danger float-right mr-3 "  href="{{url('/konfigurasi/deletepemasukan/')}}">Delete</a>
                    <a class="btn btn-primary float-right mr-3" href="{{url('/konfigurasi/updatepemasukan/')}}">Update</a>
                     <a class="btn btn-success float-right mr-3" href="{{url('/konfigurasi/subkategoripemasukan/')}}">Tambah Nominal Tabungan</a>
                    
              </div>
                    
            </div>
        </div>
    </div>
    <br>
    @endforeach
    

</div>
@endsection











<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>







