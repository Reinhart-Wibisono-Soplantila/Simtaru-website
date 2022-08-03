@extends('Main.Layout.MainWebLayout')

@section('Main')
<nav>
  <div class="active-page">
    <a class="active" href="#hero">Pendaftaran</a>
  </div>
  <div class="nav-wrapper">

    <ul class="nav-menu ">
      <li class="links"><a href="{{url('/')}}">Home</a></li>
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
                    <select class="form-select" name="Provinsi" id="input-pendaftaran" aria-label="Example select with button addon" required >
                      <option disabled selected value="">Pilih Provinsi</option>
                      <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                      <option value="Sumatera Utara">Sumatera Utara</option>
                      <option value="Sumatera Selatan">Sumatera Selatan</option>
                      <option value="Sumatera Barat">Sumatera Barat</option>
                      <option value="Bengkulu">Bengkulu</option>
                      <option value="Riau">Riau</option>
                      <option value="Kepulauan Riau">Kepulauan Riau</option>
                      <option value="Jambi">Jambi</option>
                      <option value="Lampung">Lampung</option>
                      <option value="Bangka Belitung">Bangka Belitung</option>
                      <!-- Pulau Kalimantan -->
                      <option value="Kalimantan Barat">Kalimantan Barat</option>
                      <option value="Kalimantan Timur">Kalimantan Timur</option>
                      <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                      <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                      <option value="Kalimantan Utara">Kalimantan Utara</option>
                      <!-- Pulau Jawa -->
                      <option value="Banten">Banten</option>
                      <option value="DKI Jakarta">DKI Jakarta</option>
                      <option value="Jawa Barat">Jawa Barat</option>
                      <option value="Jawa Tengah">Jawa Tengah</option>
                      <option value="DI Yogyakarta">DI Yogyakarta</option>
                      <option value="Jawa Timur">Jawa Timur</option>
                      <!-- Pulau Nusa Tenggara & Bali -->
                      <option value="Bali">Bali</option>
                      <option value="Nusa Tenggara Timur (NTT)">Nusa Tenggara Timur (NTT)</option>
                      <option value="Nusa Tenggara Barat (NTB)">Nusa Tenggara Barat (NTB)</option>
                      <!-- Pulau Sulawesi -->
                      <option value="Gorontalo">Gorontalo</option>
                      <option value="Sulawesi Barat">Sulawesi Barat</option>
                      <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                      <option value="Sulawesi Utara">Sulawesi Utara</option>
                      <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                      <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                      <option value="Maluku Utara">Maluku Utara</option>
                      <option value="Maluku">Maluku</option>
                      <option value="Papua Barat">Papua Barat</option>
                      <option value="Papua (Daerah Khusus)">Papua (Daerah Khusus)</option>
                    </select>
                    @error('Provinsi')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <label for="inputEmail4" id="label-pendaftaran" class="form-label pt-3">Asal Kota/Kabupaten</label>
                  <div class="input-group">
                    <select class="form-select" name="KotaKabupaten" id="input-pendaftaran" aria-label="Example select with button addon" required >
                      <option disabled selected value="">Pilih Kota/Kabupaten</option>
                      <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                      <option value="Sumatera Utara">Sumatera Utara</option>
                      <option value="Sumatera Selatan">Sumatera Selatan</option>
                    </select>
                    @error('KotaKabupaten')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <label for="inputEmail4" id="label-pendaftaran" class="form-label pt-3">Asal Kecamatan</label>
                  <div class="input-group">
                    <select class="form-select" name="Kecamatan" id="input-pendaftaran" aria-label="Example select with button addon" required >
                      <option disabled selected value="">Pilih Kecamatan</option>
                      <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                      <option value="Sumatera Utara">Sumatera Utara</option>
                      <option value="Sumatera Selatan">Sumatera Selatan</option>
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
                  <label for="formFile" id="label-pendaftaran" class="form-label">Upload SHP (rar)</label>
                  <input class="form-control" name="SHP" type="file" id="formFile">
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

      {{-- <form action="/pendaftaran" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="pendaftaran-box">
          <div class="row justify-content-evenly">
            <!--Column 1-->
            <div class="col-6 pt-3">
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
                  <select class="form-select" name="Provinsi" id="input-pendaftaran" aria-label="Example select with button addon" required >
                    <option disabled selected value="">Pilih Provinsi</option>
                    <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                    <option value="Sumatera Barat">Sumatera Barat</option>
                    <option value="Bengkulu">Bengkulu</option>
                    <option value="Riau">Riau</option>
                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Lampung">Lampung</option>
                    <option value="Bangka Belitung">Bangka Belitung</option>
                    <!-- Pulau Kalimantan -->
                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                    <!-- Pulau Jawa -->
                    <option value="Banten">Banten</option>
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="DI Yogyakarta">DI Yogyakarta</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <!-- Pulau Nusa Tenggara & Bali -->
                    <option value="Bali">Bali</option>
                    <option value="Nusa Tenggara Timur (NTT)">Nusa Tenggara Timur (NTT)</option>
                    <option value="Nusa Tenggara Barat (NTB)">Nusa Tenggara Barat (NTB)</option>
                    <!-- Pulau Sulawesi -->
                    <option value="Gorontalo">Gorontalo</option>
                    <option value="Sulawesi Barat">Sulawesi Barat</option>
                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    <option value="Maluku Utara">Maluku Utara</option>
                    <option value="Maluku">Maluku</option>
                    <option value="Papua Barat">Papua Barat</option>
                    <option value="Papua (Daerah Khusus)">Papua (Daerah Khusus)</option>
                  </select>
                  @error('Provinsi')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>

                <label for="inputEmail4" id="label-pendaftaran" class="form-label pt-3">Asal Kota/Kabupaten</label>
                <div class="input-group">
                  <select class="form-select" name="KotaKabupaten" id="input-pendaftaran" aria-label="Example select with button addon" required >
                    <option disabled selected value="">Pilih Kota/Kabupaten</option>
                    <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                  </select>
                  @error('KotaKabupaten')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>

                <label for="inputEmail4" id="label-pendaftaran" class="form-label pt-3">Asal Kecamatan</label>
                <div class="input-group">
                  <select class="form-select" name="Kecamatan" id="input-pendaftaran" aria-label="Example select with button addon" required >
                    <option disabled selected value="">Pilih Kecamatan</option>
                    <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
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
            <div class="col-6 pt-3">
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
                <label for="formFile" id="label-pendaftaran" class="form-label">Upload SHP (rar)</label>
                <input class="form-control" name="SHP" type="file" id="formFile">
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
          </div>
        </div>
      </form> --}}
    </div>


  
@endsection

@push('addonStyle')
<link rel="stylesheet" href="{{URL::asset('assets/Main/style/pendaftaran.css')}}">
@endpush
