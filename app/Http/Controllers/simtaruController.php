<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Kreait\Laravel\Firebase\Facades\Firebase;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;

class simtaruController extends Controller
{
    public function index()
    {
        $datas = app('firebase.firestore')->database()->collection('InfoWeb')->document('rgYeQRniohc4Ptg62ujU')->snapshot();
        return view('Main.Page.index', ['datas' => $datas]);
        // $datas = explode('<h2>', $datas->data()['deskripsiWeb']);
        // return $datas;
    }

    public function regulasiIndex()
    {
        $datas = app('firebase.firestore')->database()->collection('Regulasi')->documents();
        return view('Main.Page.regulasi', ['datas' => $datas]);
    }

    public function publikasiIndex()
    {
        $datas = app('firebase.firestore')->database()->collection('Publikasi')->documents();
        return view('Main.Page.publikasi', ['datas' => $datas]);
    }

    public function mapsIndex()
    {
        $datas = app('firebase.firestore')->database()->collection('Peta')->documents();
        $maps = app('firebase.firestore')->database()->collection('Peta')->documents();
        return view('Main.Page.maps', ['datas' => $datas, 'maps' => $maps]);
    }

    public function mapsDetail(Request $request)
    {
        $maps = app('firebase.firestore')->database()->collection('Peta')->documents();
        $datas = app('firebase.firestore')->database()->collection('Peta')->documents();
        foreach ($datas as $item) {
            if ($request->Kota == $item->data()['lokasi'] && $request->RTR == $item->data()['rtr']  && $request->jenis_peta == $item->data()['jenis_peta']) {
                $maps = app('firebase.firestore')->database()->collection('Peta')->where('mapUrl', '=', $item->data()['mapUrl'])->documents();
                break;
            } else {
                $maps = null;
            }
        }
        return view('Main.Page.maps', ['datas' => $datas, 'maps' => $maps]);
    }

    public function pendaftaranIndex()
    {
        // Get semua data
        $provinces = Province::all();
        return view('Main.Page.pendaftaran', compact('provinces'));
    }

    public function getKabupaten(request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $KotaKabupatens = Regency::where('province_id', $id_provinsi)->get();
        $option = "<option disabled selected value=''>Pilih Kota/Kabupaten</option>";
        foreach ($KotaKabupatens as $Kabupaten) {
            $option .= "<option value='$Kabupaten->id'>$Kabupaten->name</option>";
        }
        echo $option;
    }

    public function getKecamatan(request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $Kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option disabled selected value=''>Pilih Kecamatan</option>";
        foreach ($Kecamatans as $Kecamatan) {
            $option .= "<option value='$Kecamatan->id'>$Kecamatan->name</option>";
        }
        echo $option;
    }

    public function pendaftaranStore(Request $request)
    {
        $validatedData = $request->validate([
            'KTP' => 'required',
            'Nama' => 'required',
            'Gender' => 'required',
            'Alamat' => 'required',
            'Provinsi' => 'required',
            'KotaKabupaten' => 'required',
            'Kecamatan' => 'required',
            'KodePos' => 'required',
            'Pekerjaan' => 'required',
            'StatusKewarganegaraan' => 'required',
            'Email' => 'required|email',
            'NomorHandphone' => 'required',
            'SHP' => 'required|file|mimes:zip',
            'koordinat' => 'required'
        ]);

        $current_time = new Carbon();
        $current_time->timezone('GMT+8');
        $current_time = $current_time->toDateTimeString();


        $provinsi = Province::where('id', $request->Provinsi)->get();
        $KotaKabupaten = Regency::where('id', $request->KotaKabupaten)->get();
        $Kecamatan = District::where('id', $request->Kecamatan)->get();
        $request->Provinsi = $provinsi[0]['name'];
        $request->KotaKabupaten = $KotaKabupaten[0]['name'];
        $request->Kecamatan = $Kecamatan[0]['name'];

        $image = $request->file('SHP'); //image file from frontend  
        $firebase_storage_path = 'SHP/';
        $name = $image->getClientOriginalName();
        $localfolder = public_path('firebase-temp-uploads') . '/';
        $extension = $image->getClientOriginalExtension();
        $file      = $name . '.' . $extension;
        $FileName = $request->Nama . '_' . $current_time . '.' . $extension;
        $bucket = app('firebase.storage')->getBucket();
        $uuid = Uuid::uuid4()->toString();
        if ($image->move($localfolder, $file)) {
            $uploadedfile = fopen($localfolder . $file, 'r');
            $object = $bucket->upload(
                $uploadedfile,
                ['name' => $firebase_storage_path . $FileName],
                ['acl' => []],
                ['predefinedAcl' => 'publicRead'],
                ['metadata' => [
                    'firebaseStorageDownloadTokens' => $uuid
                ]],
                ['firebaseStorageDownloadTokens' => $uuid]
            );
            //will remove from local laravel folder  
            unlink($localfolder . $file);
        }


        // $publicUrl = "https://{$bucket->name()}.storage.googleapis.com/{$object->name()}";

        // **************************************



        $newDatas = app('firebase.firestore')->database()->collection('DaftarPerizinan')->newDocument();
        $newDatas->set([
            'createdAt' => $current_time,
            'nik' => $validatedData['KTP'],
            'nama' => $request->Nama,
            'jenisKelamin' => $request->Gender,
            'alamat' => $request->Alamat,
            'provinsi' => $request->Provinsi,
            'kabKota' => $request->KotaKabupaten,
            'kecamatan' => $request->Kecamatan,
            'kodePos' => $request->KodePos,
            'pekerjaan' => $request->Pekerjaan,
            'kewarganegaraan' => $request->StatusKewarganegaraan,
            'email' => $request->Email,
            'noTlp' => $request->NomorHandphone,
            'koordinat' => $request->koordinat,
            'namaFile' => $FileName
        ]);
        // return view('Main.Page.pendaftaran')->with('alert', 'Data berhasil di upload');
        return redirect()->back()->with('success', 'Pendaftaran berhasil dilakukan');
    }

    public function tanggapanIndex()
    {
        return view('Main.Page.comment');
    }

    public function tanggapanStore(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'judul' => 'required',
            'pesan' => 'required',
        ]);
        $newDatas = app('firebase.firestore')->database()->collection('Tanggapan')->newDocument();
        $newDatas->set([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'judul' => $validatedData['judul'],
            'pesan' => $validatedData['pesan'],
        ]);
        return redirect()->back()->with('success', 'Tanggapan berhasil disimpan');
    }
}
