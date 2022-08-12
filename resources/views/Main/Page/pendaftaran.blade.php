@extends('Main.Layout.MainWebLayout')

@section('Main')
<nav>
  <div class="active-page">
    <a class="active" href="#hero">Pendaftaran</a>
  </div>
  <div class="nav-wrapper">

    <ul class="nav-menu ">
      <li class="links"><a href="{{url('/')}}">Home</a></li>
      <li class="links"><a href="{{url('/tata-ruang')}}" target="_blank">Tata Ruang</a></li>
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
      <div class="text-center hero-content">
        <h1>PENDAFTARAN</h1>
      </div>
    </section>

    <div class="container">
      <form action="/pendaftaran" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="pendaftaran-box">
          <div id="pendaftaran-box-responsive" class="col d-flex justify-content-center footer-information">
            {{-- <div class="row justify-content-evenly"> --}}
              <!--Column 1-->
              <div class="form1 col-6 pt-3 px-3 ">
                <div class="col pb-3">
                  @error('KTP')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                  <label for="KTP" class="form-label" id="label-pendaftaran">Nomor KTP</label>
                  <input type="text" class="form-control" name="KTP" id="input-pendaftaran"  placeholder="Masukkan nomor KTP anda"/>
                </div>
                
                

                <div class="col pb-3">
                  <label for="Nama" class="form-label" id="label-pendaftaran" >Nama Lengkap</label>
                  <input type="text" class="form-control" name="Nama" id="input-pendaftaran" required placeholder="Masukkan nama lengkap anda"/>
                  @error('Nama')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>

                <label for="inputAddress" id="label-pendaftaran" class="form-label">Jenis Kelamin</label>
                <div class="col pb-3">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="inlineRadio1" value="Laki-laki"/>
                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>          
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="inlineRadio2" value="Perempuan"/>
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                  </div>
                  @error('Gender')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror

                  <div class="col pt-3">
                    <label for="Alamat" id="label-pendaftaran" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="Alamat" id="input-pendaftaran-alamat" required placeholder="Masukkan alamat anda"/>
                    @error('Alamat')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <label for="inputEmail4" id="label-pendaftaran" class="form-label pt-3">Asal Provinsi</label>
                  <div class="input-group">
                    <select class="form-select Provinsi" name="Provinsi" id="input-pendaftaran" aria-label="Example select with button addon" required >
                      <option disabled selected value="">Pilih Provinsi</option>
                      @foreach ($provinces as $provinsi)
                          <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                      @endforeach
                    </select>
                    @error('Provinsi')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <label for="inputEmail4" id="label-pendaftaran" class="form-label pt-3">Asal Kota/Kabupaten</label>
                  <div class="input-group">
                    <select class="form-select Kabupaten" name="KotaKabupaten" id="input-pendaftaran" aria-label="Example select with button addon" required >
                      <option disabled selected value="">Pilih Kota/Kabupaten</option>
                    </select>
                    @error('KotaKabupaten')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <label for="inputEmail4" id="label-pendaftaran" class="form-label pt-3">Asal Kecamatan</label>
                  <div class="input-group">
                    <select class="form-select Kecamatan" name="Kecamatan" id="input-pendaftaran" aria-label="Example select with button addon" required >
                      <option disabled selected value="">Pilih Kecamatan</option>
                    </select>
                    @error('Kecamatan')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <div class="col pt-3">
                    <label for="inputAddress" id="label-pendaftaran" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" name="KodePos" id="input-pendaftaran" required placeholder="Masukkan kode pos anda"/>
                    @error('KodePos')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <div class="col pt-3">
                    <label for="inputAddress" id="label-pendaftaran" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" name="Pekerjaan" id="input-pendaftaran" required placeholder="Masukkan pekerjaan anda"/>
                    @error('Pekerjaan')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <label for="inputAddress" id="label-pendaftaran" class="form-label pt-3">Status</label>
                  <div class="col">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="StatusKewarganegaraan" id="inlineRadio1" value="WNI"/>
                      <label class="form-check-label" for="inlineRadio1">WNI</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="StatusKewarganegaraan" id="inlineRadio2" value="WNA"/>
                      <label class="form-check-label" for="inlineRadio2">WNA</label>
                    </div>
                    @error('StatusKewarganegaraan')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                  </div>
                  </br>
                </div>
              </div>

              <!--Column 2-->
              <div class="form1 col-6 pt-3 px-3">
                <div class="col pb-3">
                  <label for="inputAddress" id="label-pendaftaran" class="form-label">Email</label>
                  <input type="Email" class="form-control" name="Email" id="input-pendaftaran" required placeholder="Masukkan alamat email anda"/>
                  @error('Email')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>

                <div class="col pb-3">
                  <label for="inputAddress"  id="label-pendaftaran" class="form-label">Nomor Handphone</label>
                  <input type="text" class="form-control" name="NomorHandphone" id="input-pendaftaran" required placeholder="Masukkan nomor telepon anda"/>
                  @error('NomorHandphone')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>

                <div class="col pb-3">
                  <label for="inputAddress" class="form-label" id="label-pendaftaran">Koordinat</label>
                  <input type="text" class="form-control" name="koordinat" id="input-pendaftaran" placeholder="Masukkan koordinat"/>
                </div>

                <div class="col pb-3">
                  <label for="formFile" id="label-pendaftaran" class="form-label">Upload SHP (zip)</label>
                  <input class="form-control" name="SHP" type="file" id="formFile" accept=".zip">
                  @error('SHP')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>

                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="submit" id="tomboldaftar">
                    Daftar
                  </button>
                </div>
              </div>
            {{-- </div> --}}
          </div>
        </div>
      </form>
    </div>


  
@endsection

@push('addonStyle')
  <link rel="stylesheet" href="{{URL::asset('assets/Main/style/pendaftaran.css')}}">
@endpush

@push('addonScript')
    <script>
      $(function(){
        $.ajaxSetup({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $(function(){
          $('.Provinsi').on('change', function(){
            let id_provinsi = $('.Provinsi').val();
            $.ajax({
              url : "{{route('getKabupaten')}}",
              type : 'POST',
              data : {id_provinsi:id_provinsi},
              cache : false,

              success: function(msg){
                $('.Kabupaten').html(msg);
                // $('.Kecamatan').html('');
              },
              error: function(data){
                console.log('error:',data)
              }
            })
          })
        })

        $(function(){
          $('.Kabupaten').on('change', function(){
            let id_kabupaten = $('.Kabupaten').val();
            $.ajax({
              url : "{{route('getKecamatan')}}",
              type : 'POST',
              data : {id_kabupaten:id_kabupaten},
              cache : false,

              success: function(msg){
                $('.Kecamatan').html(msg);
              },
              error: function(data){
                console.log('error:',data)
              }
            })
          })
        })
      });
    </script>
@endpush

@push('addonHead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush