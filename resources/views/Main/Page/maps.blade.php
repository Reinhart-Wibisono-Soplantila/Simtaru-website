@extends('Main.Layout.MainWebLayout')

@section('Main')
{{-- <nav>
  <div class="active-page">
    <a class="active"href="#">Tata Ruang</a>
  </div>
  <div class="menu-maps">
    <button class="btn button-maps" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-circle-chevron-left"></i>Pilih Peta</button>
  </div>
</nav> --}}

<nav>
  <div class="menu-maps">
    <button class="btn button-maps" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-bars"></i></button>
  </div>
  <div class="menu-maps-mobile">
    <button class="btn button-maps" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu-maps-mobile" aria-controls="offcanvasRight"><i class="fa-solid fa-circle-chevron-left"></i>Pilih Peta</button>
  </div>
  <div class="active-page">
    <a class="active"href="#">Tata Ruang</a>
  </div>

  <div class="nav-wrapper">
    <ul class="nav-menu ">
      <li class="links"><a href="{{url('/')}}">Home</a></li>
      <li class="links"><a class="active" href="{{url('/tata-ruang')}}">Tata Ruang</a></li>
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
  </div>

  <div class="menu-toggle">
    <input type="checkbox">
    <span></span>
    <span></span>
    <span></span>
  </div>
</nav>

  <div class="main">
    <div class="menu-maps">
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasRightLabel">Pilih Peta</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="nav-maps">
            <div class="sidebar">
              <div id="filter">
                <form class="row" action="/tata-ruang/detail" method="get">
                  @method('get')
                  @csrf
                  <ul>
                    <li>
                      <h1>
                        TATA <span>RUANG</span>
                      </h1>
                    </li>
                    <li>
                      <div class="dropdown">
                        <select class="btn btn-secondary" required name="Kota" id="Kota">
                          <option disabled selected value="">Pilih Kota</option>
                          {{-- @foreach ($datas as $item)
                            <option value="{{$item->data()['lokasi']}}">{{$item->data()['lokasi']}}</option>
                          @endforeach --}}
                          <option value="Kab. Bantaeng">Kab. Bantaeng</option>
                          <option value="Kab. Barru">Kab. Barru</option>
                          <option value="Kab. Bone">Kab. Bone</option>
                          <option value="Kab. Bulukumba">Kab. Bulukumba</option>
                          <option value="Kab. Enrekang">Kab. Enrekang</option>
                          <option value="Kab. Gowa">Kab. Gowa</option>
                          <option value="Kab. Jeneponto">Kab. Jeneponto</option>
                          <option value="Kab. Kepulauan Selayar">Kab. Kepulauan Selayar</option>
                          <option value="Kab. Luwu">Kab. Luwu</option>
                          <option value="Kab. Luwu Timur">Kab. Luwu Timur</option>
                          <option value="Kab. Luwu Utara">Kab. Luwu Utara</option>
                          <option value="Kab. Maros">Kab. Maros</option>
                          <option value="Kab. Pangkep">Kab. Pangkep</option>
                          <option value="Kab. Pinrang">Kab. Pinrang</option>
                          <option value="Kab. Sidrap">Kab. Sidrap</option>
                          <option value="Kab. Sinjai">Kab. Sinjai</option>
                          <option value="Kab. Soppeng">Kab. Soppeng</option>
                          <option value="Kab. Takalar">Kab. Takalar</option>
                          <option value="Kab. Toraja">Kab. Toraja</option>
                          <option value="Kab. Toraja Utara">Kab. Toraja Utara</option>
                          <option value="Kab. Wajo">Kab. Wajo</option>
                          <option value="Kota Makassar">Kota Makassar</option>
                          <option value="Kota Palopo">Kota Palopo</option>
                          <option value="Kota Pare-Pare">Kota Pare-Pare</option>
                          <option value="Sulawesi Selatan">Sulawesi Selatan</option>
            
                        </select>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <select class="btn btn-secondary" required name="RTR" id="RTR">
                          <option disabled selected value="">Pilih RTR</option>
                          <option value="RTR Kawasan Strategis">RTR Kawasan Strategis</option> 
                        <option value="RTR Maminasata">RTR Maminasata</option> 
                        <option value="RTRW Kab/Kota">RTRW Kab/Kota</option> 
                        <option value="RDTR Kab/Kota">RDTR Kab/Kota</option> 
                        <option value="Izin Pemanfaatan Ruang">Izin Pemanfaatan Ruang</option> 
                        <option value="Ruang Terbuka Hijau (RTH)">Ruang Terbuka Hijau (RTH)</option> 
                        </select>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <select class="btn btn-secondary" required name="jenis_peta" id="jenis_peta">
                          <option disabled selected value="">Jenis Peta</option>
                          <option value="Peta Kawasan Maminasata">Peta Kawasan Maminasata</option> 
                          <option value="Peta Administratif">Peta Administratif</option> 
                          <option value="Peta Pola Ruang">Peta Pola Ruang</option> 
                          <option value="Peta Struktur Ruang">Peta Struktur Ruang</option> 
                        </select>
                      </div>
                    </li>
                    <li>
                      <div class="button-send">
                        <button type="submit">Lihat</button>
                      </div>
                    </li>
            
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="menu-maps-mobile">
      <div class="offcanvas offcanvas-start" tabindex="-1" id="menu-maps-mobile" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasRightLabel">Pilih Peta</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="nav-maps">
            <div class="sidebar">
              <div id="filter">
                <form class="row" action="/tata-ruang/detail" method="get">
                  @method('get')
                  @csrf
                  <ul>
                    <li>
                      <h1>
                        TATA <span>RUANG</span>
                      </h1>
                    </li>
                    <li>
                      <div class="dropdown">
                        <select class="btn btn-secondary" required name="Kota" id="Kota">
                          <option disabled selected value="">Pilih Kota</option>
                          {{-- @foreach ($datas as $item)
                            <option value="{{$item->data()['lokasi']}}">{{$item->data()['lokasi']}}</option>
                          @endforeach --}}
                          <option value="Kab. Bantaeng">Kab. Bantaeng</option>
                          <option value="Kab. Barru">Kab. Barru</option>
                          <option value="Kab. Bone">Kab. Bone</option>
                          <option value="Kab. Bulukumba">Kab. Bulukumba</option>
                          <option value="Kab. Enrekang">Kab. Enrekang</option>
                          <option value="Kab. Gowa">Kab. Gowa</option>
                          <option value="Kab. Jeneponto">Kab. Jeneponto</option>
                          <option value="Kab. Kepulauan Selayar">Kab. Kepulauan Selayar</option>
                          <option value="Kab. Luwu">Kab. Luwu</option>
                          <option value="Kab. Luwu Timur">Kab. Luwu Timur</option>
                          <option value="Kab. Luwu Utara">Kab. Luwu Utara</option>
                          <option value="Kab. Maros">Kab. Maros</option>
                          <option value="Kab. Pangkep">Kab. Pangkep</option>
                          <option value="Kab. Pinrang">Kab. Pinrang</option>
                          <option value="Kab. Sidrap">Kab. Sidrap</option>
                          <option value="Kab. Sinjai">Kab. Sinjai</option>
                          <option value="Kab. Soppeng">Kab. Soppeng</option>
                          <option value="Kab. Takalar">Kab. Takalar</option>
                          <option value="Kab. Toraja">Kab. Toraja</option>
                          <option value="Kab. Toraja Utara">Kab. Toraja Utara</option>
                          <option value="Kab. Wajo">Kab. Wajo</option>
                          <option value="Kota Makassar">Kota Makassar</option>
                          <option value="Kota Palopo">Kota Palopo</option>
                          <option value="Kota Pare-Pare">Kota Pare-Pare</option>
                          <option value="Sulawesi Selatan">Sulawesi Selatan</option>
            
                        </select>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <select class="btn btn-secondary" required name="RTR" id="RTR">
                          <option disabled selected value="">Pilih RTR</option>
                          <option value="RTR Kawasan Strategis">RTR Kawasan Strategis</option> 
                        <option value="RTR Maminasata">RTR Maminasata</option> 
                        <option value="RTRW Kab/Kota">RTRW Kab/Kota</option> 
                        <option value="RDTR Kab/Kota">RDTR Kab/Kota</option> 
                        <option value="Izin Pemanfaatan Ruang">Izin Pemanfaatan Ruang</option> 
                        <option value="Ruang Terbuka Hijau (RTH)">Ruang Terbuka Hijau (RTH)</option> 
                        </select>
                      </div>
                    </li>
                    <li>
                      <div class="dropdown">
                        <select class="btn btn-secondary" required name="jenis_peta" id="jenis_peta">
                          <option disabled selected value="">Jenis Peta</option>
                          <option value="Peta Kawasan Maminasata">Peta Kawasan Maminasata</option> 
                          <option value="Peta Administratif">Peta Administratif</option> 
                          <option value="Peta Pola Ruang">Peta Pola Ruang</option> 
                          <option value="Peta Struktur Ruang">Peta Struktur Ruang</option> 
                        </select>
                      </div>
                    </li>
                    <li>
                      <div class="button-send">
                        <button type="submit">Lihat</button>
                      </div>
                    </li>
            
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="maps">
      @if ($maps != null)
        @foreach ($maps as $item)
          <iframe src="{{$item->data()['mapUrl'] }}" frameborder="0" id="iframe"></iframe>
          @break
        @endforeach
      @else
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Maaf,data yang anda cari tidak dapat kami temukan</h5>
          </div>
        </div>
      @endif
  
    </div>
  
  
    <!-- <div id="filter">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown button
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
    </div> -->
  </div>

@endsection

@push('addonStyle')
<link rel="stylesheet" href="{{URL::asset('assets/Main/style/maps.css')}}">

<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    
@endpush