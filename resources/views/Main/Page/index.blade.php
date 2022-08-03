@extends('Main.Layout.MainWebLayout')

@section('Main')

<nav>
  <div class="active-page">
    <a class="active"href="#">Home</a>
  </div>
  <div class="nav-wrapper">

    <ul class="nav-menu ">
      <li class="links"><a class="active" href="{{url('/')}}">Home</a></li>
      <li class="links"><a href="{{url('/tata-ruang')}}">Tata Ruang</a></li>
      <li class="links"><a href="{{url('/regulasi')}}">Regulasi</a></li>
      <li class="links"><a href="{{url('/publikasi')}}">Publikasi</a></li>
      <li class="links"><a href="{{url('/tanggapan')}}">Tanggapan</a></li>
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


<section id="hero">
  <div class="text-center">
    <div class="hero-logo">
      <img src="{{URL::asset('/assets/Main/images/logo-simtaru.svg')}}" alt="">
    </div>
    <div class="hero-content">
      <h1>Jelajahi Tata Ruang Sulawesi Selatan</h1>
      <p>
        Semuanya lebih mudah dengan adanya aplikasi SIMTARU oleh Bidang Tata Ruang Dinas Pekerjaan Umum dan Tata Ruang Sulawesi Selatan.
      </p>
      <button>Download</button>
    </div>
    <div class="hero-map">
      <img src="{{URL::asset('/assets/Main/images/hero-map.png')}}" alt="">
    </div>
    <div class="hero-content-map">
      <h1>Penasaran? Silahkan coba di web kami!</h1>
      <button>Penelusuran Tata Ruang</button>
    </div>
  </div>
</section>


<section id="overview">
  <div class="text-center">
    <h1>Overview</h1>
    <div class="row overwiew-wrapper">
      <div class="col bordered">
        <span>2</span>
        Pengaduan Tata Ruang
      </div>
      <div class="col bordered">
        <span>1</span>
        Pertek Diterbitkan
      </div>
      <div class="col bordered">
        <span>1</span>
        Perda RTRW
      </div>
      <div class="col">
        <span>1</span>
        Perda RDTR
      </div>
    </div>
  </div>
</section>

<section id="overview-mobile">
  <div class="text-center">
    <h1>Overview</h1>
    <div class="row overwiew-wrapper">
      <div class="col bordered">
        <span>2</span>
        Pengaduan Tata Ruang
      </div>
      <div class="col ">
        <span>1</span>
        Pertek Diterbitkan
      </div>
      <div class="col bordered">
        <span>1</span>
        Perda RTRW
      </div>
      <div class="col">
        <span>1</span>
        Perda RDTR
      </div>
    </div>
  </div>
</section>

<section id="about-homepage">
  <div class="about-content">
    <div class="row">
      <div class="col-7">
        <h1>Mengenai SIMTARU</h1>
        {!!$datas->data()['deskripsiWeb']!!}
      </div>
      <div class="col-5 profile">
        <div class="image-card text-center">
          <img src="{{$datas->data()['imageUrl'] }}" alt="">
        </div>
        <div class="text-card">
          <h5>{{$datas->data()['nama'] }}</h5>
          <p>{{$datas->data()['jabatan'] }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="about-homepage-mobile">
  <div class="about-content">
    <h1>Mengenai <span>SIMTARU</span></h1>
    {!!$datas->data()['deskripsiWeb']!!}
    <div class="profile">
      <div class="image-card text-center">
        <img src="{{$datas->data()['imageUrl'] }}" alt="">
      </div>
      <div class="text-card">
        <h5>{{$datas->data()['nama'] }}</h5>
          <p>{{$datas->data()['jabatan'] }}</p>
      </div>
    </div>
  </div>
</section>

<!-- card -->
<div class="container-card" id="card">
  <div class="container" >
    <div class="row row-cols-1 row-cols-md-2 g-4" id="scroll-wrapper">
      <div class="col d-flex justify-content-center" id="horizontal">
        <div class="card">
          <img src="{{URL::asset('/assets/Main/images/image 36(1).png')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Penataan tata ruang</h5>
            <p class="card-text" style="color: black">Berdasarkan pada UU No. 26 Tahun 2007, Penataan ruang adalah suatu sistem proses perencanaan tata ruang, pemanfaatan ruang, dan pengendalian pemanfaatan ruang.</p>
            <p class="card-text" style="color: black">Pelaksanaan penataan ruang meliputi perencanaan tata ruang, pemanfaatan ruang serta pengendalian pemanfaatan ruang.</p>
            {{-- <a class="btn btn-primary button" href="#" role="button">Baca</a> --}}
          </div>
        </div>
      </div>
      <div class="col d-flex justify-content-center" id="horizontal">
        <div class="card">
          <img src="{{URL::asset('/assets/Main/images/image 35.png')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Perencanaan Tata Ruang</h5>
            <p class="card-text"style="color: black">Perencanaan tata ruang adalah suatu proses untuk menentukan struktur dan pola ruang yang meliputi penyusunan dan penetapan rencana tata ruang.</p>
            <p class="card-text" style="color: black">Rencana umum tata ruang dibedakan berdasarkan wilayah administrasi pemerintah, sebab kewenangan dalam mengatur pemanfaatan ruang dibagi menjadi:</p>
            <p class="card-text" style="color: black">1. Rencana Tata Ruang Wilayah Nasional</p>
            <p class="card-text" style="color: black">2. Rencana Tata Ruang Provinsi</p>
            <p class="card-text" style="color: black">3. Rencana Tata Ruang Wilayah Kabupaten/Kota</p>
            {{-- <a class="btn btn-primary button" href="#" role="button">Baca</a> --}}
          </div>
        </div>
      </div>
      <div class="col d-flex justify-content-center" id="horizontal">
        <div class="card">
          <img src="{{URL::asset('/assets/Main/images/image 24.png')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pemanfaatan Tata Ruang</h5>
            <p class="card-text"style="color: black">Pemanfaatan ruang adalah upaya untuk mewujudkan struktur ruang dan pola ruang sesuai dengan rencana tata ruang melalui penyusunan dan pelaksanaan program beserta pembiayaannya.</p>
            <p class="card-text" style="color: black">Pemanfaatan ini dilakukan dengan cara melaksanakan program pemanfaatan ruang serta pembiayaannya.</p>
            <p class="card-text" style="color: black">Melaksanakan program yaitu segala aktivitas pembangunan baik yang dilaksanakan oleh pemerintah maupun masyarakat - masyarakat agar dapat terwujud rencana tata ruang.</p>
            {{-- <a class="btn btn-primary button" href="#" role="button">Baca</a> --}}
          </div>
        </div>
      </div>
      <div class="col d-flex justify-content-center" id="horizontal">
        <div class="card">
          <img src="{{URL::asset('/assets/Main/images/unsplash_KmRfFNUio5w.png')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pengendalian Tata Ruang</h5>
            <p class="card-text" style="color: black">Pengendalian pemanfaatan ruang adalah upaya untuk mewujudkan tertib tata ruang. Pengendalian bisa dilakukan dengan cara menerapkan zonasi, perizinan, pemberian insentif dan disinsentif serta sanksi.</p>
            {{-- <a class="btn btn-primary button" href="#" role="button">Baca</a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Mobile Apps Ads -->
<div class="mobile-apps" id="mobile-apps">
  <div class="mobile-apps-bg">
    <div class="container">
      <div class="card" >
        <div class="card-information">
          
          <div class="card-body">
            <h1 class="">Ayo <i>download</i> aplikasinya!</h1>
            <p class="">Sistem Informasi Perencanaan, Pemanfaatan, dan Pengendalian Tata Ruang Sulawesi Selatan</p>
          </div>
          
          <div class="card-image text-center" >
            <div class="card-phone">
              
          <img src="{{URL::asset('/assets/Main/images/Front 1.png')}}" alt="">
            </div>
            <div class="card-badge">
              <a href="" target="_blank">
                <button class="btn-download google-play"></button>
              </a>
              <!-- <img src="src/images/google-play-badge 1.svg" alt=""> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addonStyle')
  <link rel="stylesheet" href="{{URL::asset('assets/Main/style/index.css')}}">
@endpush