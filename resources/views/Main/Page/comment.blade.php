@extends('Main.Layout.MainWebLayout')

@section('Main')


<nav>
  <div class="active-page">
    <a class="active" href="#hero">Tanggapan</a>
  </div>
  <div class="nav-wrapper">

    <ul class="nav-menu ">
      <li class="links"><a href="{{url('/')}}">Home</a></li>
      <li class="links"><a href="{{url('/tata-ruang')}}" target="_blank">Tata Ruang</a></li>
      <li class="links"><a href="{{url('/regulasi')}}">Regulasi</a></li>
      <li class="links"><a href="{{url('/publikasi')}}">Publikasi</a></li>
      <li class="links"><a class="active" href="{{url('/tanggapan')}}">Tanggapan</a></li>
      <li class="button-pendaftaran">
        <form action="/pendaftaran" method="GET">
          @csrf
          <button class="button">Pendaftaran</button>
        </form>
      </li>
    </ul>

    <div class="menu-toggle">
      <input type="checkbox">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</nav>


<main>
  <section id="hero">
    <div class="text-center hero-content">
      <h1>TANGGAPAN</h1>
    </div>
  </section>

  <div class="container">
      <div id="tanggapan-box">
          <form action="/tanggapan" method="POST">
            @csrf


            <div id="tanggapan-box" class="col d-flex justify-content-center footer-information">
              <div id="tanggapan-bio" class="tanggapan-block">
                <div class="input-group mb-3" id="input-field">
                    <!-- <span class="input-group-text" id="inputGroup-sizing-default">Default</span> -->
                    <input type="text" class="form-control" placeholder="Nama" required name="nama" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3" id="input-field">
                    <!-- <span class="input-group-text" id="inputGroup-sizing-default">Default</span> -->
                    <input type="email" class="form-control" placeholder="Email" required name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3" id="input-field">
                    <!-- <span class="input-group-text" id="inputGroup-sizing-default">Default</span> -->
                    <input type="text" class="form-control" placeholder="Judul tanggapan kamu" required name="judul" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
              </div>
              <div id="tanggapan-field" class="tanggapan-block">
                  <div class="input-group mb-3" id="input-field">
                      <input type="text" class="form-control" placeholder="Tanggapan" required name="pesan" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
              </div>
            </div>
            <div class="d-grid gap-2" id="tombolsubmit">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div><br>
          </form>
      </div>
  </div>
</main>

@endsection

@push('addonStyle')
<link rel="stylesheet" href="{{URL::asset('assets/Main/style/comment.css')}}">
@endpush