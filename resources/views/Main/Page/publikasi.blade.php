@extends('Main.Layout.MainWebLayout')

@section('Main')
{{-- <div class="wrapper-regulasi">
    <nav>
        <div class="col-md-9 nav-child-wrapper">
            <ul class="nav-menu">
                <li class="links"><a href="{{url('/')}}">Home</a></li>
                <li class="links"><a href="{{url('/tata-ruang')}}">Tata Ruang</a></li>
                <li class="links"><a href="{{url('/regulasi')}}">Regulasi</a></li>
                <li class="links"><a class="active"  href="{{url('/publikasi')}}">Publikasi</a></li>
                <li class="links"><a href="{{url('/tanggapan')}}">Tanggapan</a></li>
            </ul>
        </div>
        <div class="col-md-3 button">
            <form action="/pendaftaran" method="GET">
                @csrf
                <button>Pendaftaran</button>
              </form>
        </div>
    </nav>

    <section id="hero">
        <div class="text-center hero-content">
            <h1>PUBLIKASI</h1>
        </div>
    </section>

    <div id="collapse-parent">
        <section id="pagination">
            <div class="wrapper-pagination">
                <ul>
                    <p>
                        <li>
                            <a data-bs-toggle="collapse" href="#2020-collapse" role="button" aria-expanded="true" aria-controls="2020-collapse" >2020</a >
                        </li>
                        <li>
                            <a data-bs-toggle="collapse" href="#2021-collapse" role="button" aria-expanded="true" aria-controls="2021-collapse" >2021</a >
                        </li>
                    </p>
                </ul>
            </div>
        </section>

        <section id="content">
            <div id="2020-collapse" class="collapse show" data-bs-parent="#collapse-parent" >
                <div class="wrapper-content">
                    <div class="cards">
                        <div class="wrapper-undang2 row">
                            <div class="col-lg-2 file-logo">
                                <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="" />
                            </div>
                            <div class="col-lg-10 file-element">
                                <h5>UU Nomor 45 Tahun 2009</h5>
                                <p>
                                    TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR
                                    31 TAHUN 2004 TENTANG PERIKANAN
                                </p>
                                <div class="button">
                                    <button type="button">Download</button>
                                </div>
                            </div>
                        </div>
                        <!-- divider between two cards-->
                        <br />
                        <div class="wrapper-undang2 row">
                            <div class="col-lg-2 file-logo">
                                <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="" />
                            </div>
                            <div class="col-lg-10 file-element">
                                <h5>UU Nomor 45 Tahun 2009</h5>
                                <p>
                                    TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR
                                    31 TAHUN 2004 TENTANG PERIKANAN
                                </p>
                                <div class="button">
                                    <button type="button">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="2021-collapse" class="collapse" data-bs-parent="#collapse-parent" >
                <div class="wrapper-content">
                    <div class="cards">
                        <div class="wrapper-undang2 row">
                            <div class="col-lg-2 file-logo">
                                <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="" />
                            </div>
                            <div class="col-lg-10 file-element">
                                <h5>UU Nomor 45 Tahun 2009</h5>
                                <p>
                                    TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR
                                    31 TAHUN 2004 TENTANG PERIKANAN
                                </p>
                                <div class="button">
                                    <button type="button">Download</button>
                                </div>
                            </div>
                        </div>
                        <!-- divider between two cards-->
                        <br />
                        <div class="wrapper-undang2 row">
                            <div class="col-lg-2 file-logo">
                                <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="" />
                            </div>
                            <div class="col-lg-10 file-element">
                                <h5>UU Nomor 45 Tahun 2009</h5>
                                <p>
                                    TENTANG PERUBAHAN ATAS UNDANG-UNDANG NOMOR
                                    31 TAHUN 2004 TENTANG PERIKANAN
                                </p>
                                <div class="button">
                                    <button type="button">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JavaScript Bundle with Popper -->
</div> --}}
<div class="wrapper-regulasi">
    
    <nav>
        <div class="active-page">
          <a class="active" href="#hero">Publikasi</a>
        </div>

        <div class="nav-wrapper">
          <ul class="nav-menu ">
            <li class="links"><a href="{{url('/')}}">Home</a></li>
            <li class="links"><a href="{{url('/tata-ruang')}}" target="_blank">Tata Ruang</a></li>
            <li class="links"><a href="{{url('/regulasi')}}">Regulasi</a></li>
            <li class="links"><a class="active"  href="{{url('/publikasi')}}">Publikasi</a></li>
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
      </nav>


    <section id="hero">
      <div class="text-center hero-content">
        <h1>PUBLIKASI</h1>
      </div>
    </section>

    <div id="collapse-parent">
      <section id="pagination">
        <div class="wrapper-pagination">
          <ul>
            <p>
              <li>
                <a data-bs-toggle="collapse" href="#pub2020-collapse" role="button" aria-expanded="true" aria-controls="pub2020-collapse" >2020</a></li>
              <li>
                <a data-bs-toggle="collapse" href="#pub2021-collapse" role="button" aria-expanded="false" aria-controls="pub2021-collapse">2021</a>
              </li>
            </p>
          </ul>
        </div>
      </section>
 
      <section id="content">
        <div id="pub2020-collapse" class="collapse show" data-bs-parent="#collapse-parent">
          <div class="wrapper-content">
            <div class="cards">
                @forelse ($datas as $item)
                {{-- nyalakan kalau sudah ada kategori di publikasi --}}
                    @if ($item->data()['tahun'] == 2020)
                    <div class="wrapper-undang2 row">
                        <div class="col-lg-2 file-logo">
                            <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="" />
                        </div>
                        <div class="col-lg-10 file-element">
                            {{-- nama dan deskripsi perlu diganti setelah publikasi sudah ada --}}
                          <h5>{{$item->data()['judul']}}</h5>
                          <p>{{$item->data()['penerbit']}}</p>
                          <div class="button">
                            <a href="{{$item->data()['link']}}"><button type="button">Download</button></a>
                          </div>
                        </div>
                      </div>
                      <br>
                    @else
                        <?php $empty = True ?>
                    @endif 
                    @empty
                        Maaf, sepertinya data yang anda cari tidak ada
                    @endforelse
            </div>
          </div>
        </div>

        <!-- PERPRES -->
        <div id="pub2021-collapse" class="collapse" data-bs-parent="#collapse-parent">
          <div class="wrapper-content">
            <div class="cards"> 
                @forelse ($datas as $item)
                {{-- nyalakan kalau sudah ada kategori di publikasi --}}
                    @if ($item->data()['tahun'] == 2021)
                    <div class="wrapper-undang2 row">
                        <div class="col-lg-2 file-logo">
                            <img src="{{URL::asset('assets/Main/images/pdf.png')}}" alt="" />
                          
                        </div>
                        <div class="col-lg-10 file-element">
                            <h5>{{$item->data()['judul']}}</h5>
                            <p>{{$item->data()['penerbit']}}</p>
                          <div class="button">
                            <a href="{{$item->data()['link']}}"><button type="button">Download</button></a>
                          </div>
                        </div>
                      </div>
                      <br>
                    @else
                        <?php $empty = True ?>
                    @endif
                    @empty
                        Maaf, sepertinya data yang anda cari tidak ada
                    @endforelse
                      
            </div>
          </div>
        </div>

      </section>

    </div>
@endsection

@push('addonStyle')
    <link rel="stylesheet" href="{{URL::asset('assets/Main/style/publikasi.css')}}">
@endpush
