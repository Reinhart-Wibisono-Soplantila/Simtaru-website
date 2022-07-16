<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


class simtaruController extends Controller
{
    public function index()
    {
        return view('Main.Page.index');
    }

    public function regulasiIndex()
    {
        $datas = app('firebase.firestore')->database()->collection('Regulasi')->documents();
        return view('Main.Page.regulasi', ['datas' => $datas]);
    }

    public function publikasiIndex()
    {
        return view('Main.Page.publikasi');
    }

    // public function regulasiUU()
    // {
    //     return view('Main.Page.regulasi-uu');
    // }

    // public function regulasiKepres()
    // {
    //     return view('Main.Page.regulasi-kepres');
    // }

    // public function regulasiPerda()
    // {
    //     return view('Main.Page.regulasi-perda');
    // }

    // public function regulasiPergub()
    // {
    //     return view('Main.Page.regulasi-pergub');
    // }

    // public function regulasiPermen()
    // {
    //     return view('Main.Page.regulasi-permen');
    // }

    // public function regulasiPerpes()
    // {
    //     return view('Main.Page.regulasi-perpres');
    // }

    // public function regulasiPP()
    // {
    //     return view('Main.Page.regulasi-pp');
    // }

    public function mapsIndex()
    {
        $datas = app('firebase.firestore')->database()->collection('Peta')->document('0LP7G6affsbKc99sh5gD')->snapshot();
        return view('Main.Page.maps', ['datas' => $datas]);
    }

    public function mapsDetail(Request $request)
    {
        if ($request->Kota == 'Makassar' && $request->RTR == 'RTRW Kab/Kota') {
            $datas = app('firebase.firestore')->database()->collection('Peta')->document('EC4sTg1OI0EMyNqKlJxv')->snapshot();
        } elseif ($request->Kota == 'Gowa' && $request->RTR == 'RTDTR Kab/Kota') {
            $datas = app('firebase.firestore')->database()->collection('Peta')->document('aMm5oKrJaeCMESgpPqjK')->snapshot();
        } elseif ($request->Kota == 'Maros' && $request->RTR == 'RTDTR Kab/Kota') {
            $datas = app('firebase.firestore')->database()->collection('Peta')->document('dhqNLJ8DlIuwUDD4IpBk')->snapshot();
        } elseif ($request->Kota == 'Makassar' && $request->RTR == 'RTR Maminasata') {
            $datas = app('firebase.firestore')->database()->collection('Peta')->document('0LP7G6affsbKc99sh5gD')->snapshot();
        } else {
            $datas = null;
        }
        return view('Main.Page.maps', ['datas' => $datas]);
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
            'SHP' => 'required|file|mimes:rar',
            'koordinat' => 'required'
        ]);

        $current_time = new Carbon();
        $current_time->timezone('GMT+8');
        $current_time = $current_time->toDateTimeString();

        $SHP = $request->file('SHP');
        $file = $SHP->getClientOriginalName();
        $firebase_storage_path = 'SHP/';

        $uuid = (string) Str::uuid();
        // app('firebase.storage')->getBucket()->upload($SHP, ['name' => $firebase_storage_path . $file, 'public' => true, 'metadata' => ['firebaseStorageDownloadTokens' => $uuid]]);
        echo "await admin.storage().bucket().upload(filePath, {
            destination: thumbFilePathForUpload,
            metadata: {
                metadata: {
                    firebaseStorageDownloadTokens: uuid,
                }
            },
        });";
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
            'fileUrl' => $file,
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
