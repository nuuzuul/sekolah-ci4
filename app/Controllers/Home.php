<?php

namespace App\Controllers;
use App\Models\KegiatanModel;
class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Beranda - SekolahKu';

        $kegiatanModel = new KegiatanModel();
        $data['kegiatan'] = $kegiatanModel->orderBy('tanggal', 'DESC')->findAll();

        return view('home/index', $data);
    }

    public function penerimaan()
    {
        $model = new \App\Models\PenerimaanModel();
        $data['penerimaan'] = $model->findAll();
        return view('home/penerimaan', $data);
    }



    public function kontak()
    {
        $data['title'] = 'Kontak Sekolah';
        return view('home/kontak', $data);
    }
}

