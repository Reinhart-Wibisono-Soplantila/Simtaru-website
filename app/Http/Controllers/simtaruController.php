<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Kreait\Laravel\Firebase\Facades\Firebase;

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
        // if ($request->Kota == 'Makassar' && $request->RTR == 'RTRW Kab/Kota') {
        //     $datas = app('firebase.firestore')->database()->collection('Peta')->document('EC4sTg1OI0EMyNqKlJxv')->snapshot();
        // } elseif ($request->Kota == 'Gowa' && $request->RTR == 'RTDTR Kab/Kota') {
        //     $datas = app('firebase.firestore')->database()->collection('Peta')->document('aMm5oKrJaeCMESgpPqjK')->snapshot();
        // } elseif ($request->Kota == 'Maros' && $request->RTR == 'RTDTR Kab/Kota') {
        //     $datas = app('firebase.firestore')->database()->collection('Peta')->document('dhqNLJ8DlIuwUDD4IpBk')->snapshot();
        // } elseif ($request->Kota == 'Makassar' && $request->RTR == 'RTR Maminasata') {
        //     $datas = app('firebase.firestore')->database()->collection('Peta')->document('0LP7G6affsbKc99sh5gD')->snapshot();
        // } else {
        //     $datas = null;
        // }
        // return dd($datas);
        return view('Main.Page.maps', ['datas' => $datas, 'maps' => $maps]);
    }

    public function pendaftaranIndex()
    {
        return view('Main.Page.pendaftaran');
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

        // $SHP = $request->file('SHP');
        // $file = $SHP->getClientOriginalName();
        // $firebase_storage_path = 'SHP/';
        // $bucket = app('firebase.storage')->getBucket();
        // $object = $bucket->upload($SHP, [
        //     'name' => $firebase_storage_path . $file,
        //     'predefinedAcl' => 'publicRead'
        // ]);

        // $publicUrl = "https://{$bucket->name()}.storage.googleapis.com/{$object->name()}";

        // ***************************
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
                ['name' => $firebase_storage_path . $name],
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
