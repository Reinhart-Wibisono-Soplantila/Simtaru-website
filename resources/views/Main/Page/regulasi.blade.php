@extends('Main.Layout.MainWebLayout')

@section('Main')
<div class="wrapper-regulasi">
  <nav>
    <div class="active-page">
      <a class="active" href="#hero">Regulasi</a>
    </div>

    <div class="nav-wrapper">
      <ul class="nav-menu ">
        <li class="links"><a  href="{{url('/')}}">Home</a></li>
        <li class="links"><a href="{{url('/tata-ruang')}}" target="_blank">Tata Ruang</a></li>
        <li class="links"><a class="active" href="{{url('/regulasi')}}">Regulasi</a></li>
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


  <section id="hero">
    <div class="text-center hero-content">
      <h1>REGULASI</h1>
    </div>
  </section>
  
  <div id="collapse-parent">
    <section id="pagination">
      <div class="wrapper-pagination">
        <ul>
          <p>
            <li>
              <a data-bs-toggle="collapse" href="#uu-collapse" role="button" aria-expanded="true" aria-controls="uu-collapse" >UU</a></li>
            <li>
              <a data-bs-toggle="collapse" href="#perpres-collapse" role="button" aria-expanded="false" aria-controls="perpres-collapse">PERPRES</a>
            </li>
            <li>
              <a data-bs-toggle="collapse" href="#kepres-collapse" role="button" aria-expanded="true" aria-controls="kepres-collapse" >KEPRES</a>
            </li>
            <li>
              <a data-bs-toggle="collapse" href="#pp-collapse" role="button" aria-expanded="true" aria-controls="pp-collapse" >PP</a>
            </li>
            <li>
              <a data-bs-toggle="collapse" href="#permen-collapse" role="button" aria-expanded="true" aria-controls="permen-collapse">PERMEN</a>
            </li>
            <li>
              <a data-bs-toggle="collapse" href="#perda-collapse" role="button" aria-expanded="true" aria-controls="perda-collapse">PERDA</a>
            </li>
            <li>
              <a data-bs-toggle="collapse" href="#pergub-collapse" role="button" aria-expanded="true" aria-controls="pergub-collapse">PERGUB</a>
            </li>
          </p>
        </ul>
      </div>

      <div class="wrapper-pagination-mobile">
        <ul>
          <p>
            <li>
              <a  data-bs-toggle="collapse" href="#uu-collapse" role="button" aria-expanded="true" aria-controls="uu-collapse" >UU</a></li>
            <li>
              <a data-bs-toggle="collapse" href="#perpres-collapse" role="button" aria-expanded="false" aria-controls="perpres-collapse">PERPRES</a>
            </li>
            <li>
              <a data-bs-toggle="collapse" href="#kepres-collapse" role="button" aria-expanded="true" aria-controls="kepres-collapse" >KEPRES</a>
            </li>
            <li>
              <a data-bs-toggle="collapse" href="#pp-collapse" role="button" aria-expanded="true" aria-controls="pp-collapse" >PP</a>
            </li>
          </p>
        </ul>
        <ul>
          <p>
            <li>
              <a data-bs-toggle="collapse" href="#permen-collapse" role="button" aria-expanded="true" aria-controls="permen-collapse">PERMEN</a>
            </li>
            <li>
              <a data-bs-toggle="collapse" href="#perda-collapse" role="button" aria-expanded="true" aria-controls="perda-collapse">PERDA</a>
            </li>
            <li>
              <a data-bs-toggle="collapse" href="#pergub-collapse" role="button" aria-expanded="true" aria-controls="pergub-collapse">PERGUB</a>
            </li>
          </p>
        </ul>
      </div>
    </section>

   

    <section id="content">
      <div id="uu-collapse" class="collapse show" data-bs-parent="#collapse-parent">
        <div class="wrapper-content">
          <div class="cards">
            @forelse ($datas as $item)
              @if ($item->data()['kategori'] == 'Undang-Undang')
              <div class="wrapper-undang2 row">
                <div class="col-lg-2 file-logo">
                  <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="">
                </div>
                <div class="col-lg-10 file-element">
                  <h5>{{$item->data()['judul']}}</h5>
                  {{-- <p>TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR 31 TAHUN 2004 TENTANG PERIKANAN</p> --}}
                  <div class="button">
                    <a href="{{$item->data()['link']}}"><button type="button">Download</button></a>
                  </div>
                </div>
              </div>
              <!-- divider between two cards-->
              <br>
              @else
                <?php $empty = True ?>
              @endif
            @empty
                Maaf, sepertinya data yang anda cari tidak ada
            @endforelse

            {{-- <div class="wrapper-undang2 row">
              <div class="col-lg-2 file-logo">
                <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="">
                
              </div>
              <div class="col-lg-10 file-element">
                <h5>UU Nomor 45 Tahun 2009</h5>
                <p>TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR 31 TAHUN 2004 TENTANG PERIKANAN</p>
                <div class="button">
                  <button type="button">Download</button>
                </div>
              </div>
            </div> --}}
                    
          </div>
        </div>
      </div>

      <!-- PERPRES -->
      <div id="perpres-collapse" class="collapse" data-bs-parent="#collapse-parent">
        <div class="wrapper-content">
          <div class="cards"> 
            @forelse ($datas as $item)
              @if ($item->data()['kategori'] == 'Peraturan Presiden')
              <div class="wrapper-undang2 row">
                <div class="col-lg-2 file-logo">
                  <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="">
                </div>
                <div class="col-lg-10 file-element">
                  <h5>{{$item->data()['judul']}}</h5>
                  {{-- <p>TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR 31 TAHUN 2004 TENTANG PERIKANAN</p> --}}
                  <div class="button">
                    <a href="{{$item->data()['link']}}"><button type="button">Download</button></a>
                  </div>
                </div>
              </div>
              <!-- divider between two cards-->
              <br>
              @endif

            @empty
              <div class="wrapper-undang2 row">
                <div class="col-lg-10 file-element">
                  <h5> Maaf, sepertinya data yang anda cari tidak ada</h5>
                </div>
              </div>
            @endforelse
                    
          </div>
        </div>
      </div>

      <!-- KEPRES -->
      <div id="kepres-collapse" class="collapse" data-bs-parent="#collapse-parent">
        <div class="wrapper-content">
          <div class="cards"> 
            @forelse ($datas as $item)
              @if ($item->data()['kategori'] == 'Keputusan Presiden')
              <div class="wrapper-undang2 row">
                <div class="col-lg-2 file-logo">
                  <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="">
                </div>
                <div class="col-lg-10 file-element">
                  <h5>{{$item->data()['judul']}}</h5>
                  {{-- <p>TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR 31 TAHUN 2004 TENTANG PERIKANAN</p> --}}
                  <div class="button">
                    <a href="{{$item->data()['link']}}"><button type="button">Download</button></a>
                  </div>
                </div>
              </div>
              <!-- divider between two cards-->
              <br>
              @endif
            @empty
              <div class="wrapper-undang2 row">
                <div class="col-lg-10 file-element">
                  <h5> Maaf, sepertinya data yang anda cari tidak ada</h5>
                </div>
              </div>
            @endforelse
                    
          </div>
        </div>
      </div>

      <!-- PP -->
      <div id="pp-collapse" class="collapse" data-bs-parent="#collapse-parent">
        <div class="wrapper-content">
          <div class="cards"> 
            @forelse ($datas as $item)
              @if ($item->data()['kategori'] == 'Peraturan Pemerintah')
              <div class="wrapper-undang2 row">
                <div class="col-lg-2 file-logo">
                  <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="">
                </div>
                <div class="col-lg-10 file-element">
                  <h5>{{$item->data()['judul']}}</h5>
                  {{-- <p>TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR 31 TAHUN 2004 TENTANG PERIKANAN</p> --}}
                  <div class="button">
                    <a href="{{$item->data()['link']}}"><button type="button">Download</button></a>
                  </div>
                </div>
              </div>
              <!-- divider between two cards-->
              <br>
              @endif
            @empty
              <div class="wrapper-undang2 row">
                <div class="col-lg-10 file-element">
                  <h5> Maaf, sepertinya data yang anda cari tidak ada</h5>
                </div>
              </div>
            @endforelse
                    
          </div>
        </div>
      </div>

      <!-- PERMEN -->
      <div id="permen-collapse" class="collapse" data-bs-parent="#collapse-parent">
        <div class="wrapper-content">
          <div class="cards"> 
            @forelse ($datas as $item)
              @if ($item->data()['kategori'] == 'Peraturan Menteri')
              <div class="wrapper-undang2 row">
                <div class="col-lg-2 file-logo">
                  <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="">
                </div>
                <div class="col-lg-10 file-element">
                  <h5>{{$item->data()['judul']}}</h5>
                  {{-- <p>TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR 31 TAHUN 2004 TENTANG PERIKANAN</p> --}}
                  <div class="button">
                    <a href="{{$item->data()['link']}}"><button type="button">Download</button></a>
                  </div>
                </div>
              </div>
              <!-- divider between two cards-->
              <br>
              @endif
            @empty
              <div class="wrapper-undang2 row">
                <div class="col-lg-10 file-element">
                  <h5> Maaf, sepertinya data yang anda cari tidak ada</h5>
                </div>
              </div>
            @endforelse
                    
          </div>
        </div>
      </div>

      <!-- PERDA -->
      <div id="perda-collapse" class="collapse" data-bs-parent="#collapse-parent">
        <div class="wrapper-content">
          <div class="cards"> 
            @forelse ($datas as $item)
              @if ($item->data()['kategori'] == 'Peraturan Daerah')
              <div class="wrapper-undang2 row">
                <div class="col-lg-2 file-logo">
                  <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="">
                </div>
                <div class="col-lg-10 file-element">
                  <h5>{{$item->data()['judul']}}</h5>
                  {{-- <p>TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR 31 TAHUN 2004 TENTANG PERIKANAN</p> --}}
                  <div class="button">
                    <a href="{{$item->data()['link']}}"><button type="button">Download</button></a>
                  </div>
                </div>
              </div>
              <!-- divider between two cards-->
              <br>
              @endif
            @empty
              <div class="wrapper-undang2 row">
                <div class="col-lg-10 file-element">
                  <h5> Maaf, sepertinya data yang anda cari tidak ada</h5>
                </div>
              </div>
            @endforelse
                    
          </div>
        </div>
      </div>

      <!-- PERGUB -->
      <div id="pergub-collapse" class="collapse" data-bs-parent="#collapse-parent">
        <div class="wrapper-content">
          <div class="cards"> 
            @forelse ($datas as $item)
              @if ($item->data()['kategori'] == 'Peraturan Bupati')
              <div class="wrapper-undang2 row">
                <div class="col-lg-2 file-logo">
                  <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="">
                </div>
                <div class="col-lg-10 file-element">
                  <h5>{{$item->data()['judul']}}</h5>
                  {{-- <p>TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR 31 TAHUN 2004 TENTANG PERIKANAN</p> --}}
                  <div class="button">
                    <a href="{{$item->data()['link']}}"><button type="button">Download</button></a>
                  </div>
                </div>
              </div>
              <!-- divider between two cards-->
              <br>
              @endif
            @empty
              <div class="wrapper-undang2 row">
                <div class="col-lg-10 file-element">
                  <h5> Maaf, sepertinya data yang anda cari tidak ada</h5>
                </div>
              </div>
            @endforelse
                    
          </div>
        </div>
      </div>

    </section>

  </div>

</div>
@endsection

@push('addonStyle')
<link rel="stylesheet" href="{{URL::asset('assets/Main/style/regulasi.css')}}">
@endpush