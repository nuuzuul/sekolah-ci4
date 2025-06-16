<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KegiatanModel;
use App\Models\PenerimaanModel;
class Admin extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }

    public function loginProses()
    {
        $session = session();
        $model = new AdminModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $admin = $model->asArray()->where('email', $email)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $session->set([
                'admin_logged_in' => true,
                'admin_id' => $admin['id_admin'],
                'admin_email' => $admin['nama']
            ]);
            return redirect()->to('/admin/dashboard');
        }


        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function dashboard()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        $kegiatanModel = new KegiatanModel();
        $penerimaanModel = new PenerimaanModel();

        $data = [
            'title' => 'Dashboard Admin',
            'total_kegiatan' => $kegiatanModel->countAll(),
            'total_penerimaan' => $penerimaanModel->countAll()
        ];

        return view('admin/dashboard', $data);
    }
    public function kegiatan()
    {
        if (!session()->get('admin_logged_in')) return redirect()->to('/admin/login');

        $model = new KegiatanModel();
        $data['title'] = 'Manajemen Kegiatan';
        $data['kegiatan'] = $model->findAll();

        return view('admin/kegiatan', $data);
    }

    public function tambahKegiatan()
    {
        $model = new \App\Models\KegiatanModel();
        $file = $this->request->getFile('image');
        $imageName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi mime type gambar
            $mime = $file->getMimeType();
            if (!in_array($mime, ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])) {
                return redirect()->back()->with('error', 'File yang diunggah harus berupa gambar (jpg, jpeg, png, webp).');
            }

            $imageName = $file->getRandomName();
            $file->move('uploads', $imageName);
        }

        $model->save([
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'tanggal'       => $this->request->getPost('tanggal'),
            'image'         => $imageName
        ]);

        return redirect()->to('/admin/kegiatan')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function editKegiatan($id)
    {
        $model = new \App\Models\KegiatanModel();
        $dataLama = $model->find($id);

        $file = $this->request->getFile('image');
        $fileName = $dataLama['image'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi mime type gambar
            $mime = $file->getMimeType();
            if (!in_array($mime, ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])) {
                return redirect()->back()->with('error', 'File yang diunggah harus berupa gambar (jpg, jpeg, png, webp).');
            }

            // Hapus file lama
            if ($fileName && file_exists('uploads/' . $fileName)) {
                unlink('uploads/' . $fileName);
            }

            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
        }

        $model->update($id, [
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'tanggal'       => $this->request->getPost('tanggal'),
            'image'         => $fileName
        ]);

        return redirect()->to('/admin/kegiatan')->with('success', 'Kegiatan berhasil diedit.');
    }


    public function hapusKegiatan($id)
    {
        $model = new \App\Models\KegiatanModel();
        $data = $model->find($id);

        if ($data && $data['image'] && file_exists('uploads/' . $data['image'])) {
            unlink('uploads/' . $data['image']);
        }

        $model->delete($id);
        return redirect()->to('/admin/kegiatan')->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function penerimaan()
    {
        $model = new \App\Models\PenerimaanModel();
        $data['title'] = 'Penerimaan Siswa Baru';
        $data['penerimaan'] = $model->findAll();

        return view('admin/penerimaan', $data);
    }

    public function tambahPenerimaan()
    {
        $model = new \App\Models\PenerimaanModel();
        $file = $this->request->getFile('upload_dokumen');
        $fileName = null;

        // Jika file diupload
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi hanya PDF
            if ($file->getMimeType() !== 'application/pdf') {
                return redirect()->back()->with('error', 'File harus berformat PDF.');
            }

            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
        }

        $model->save([
            'nama_jurusan' => $this->request->getPost('nama_jurusan'),
            'jumlah_diterima' => $this->request->getPost('jumlah_diterima'),
            'upload_dokumen' => $fileName
        ]);

        return redirect()->to('/admin/penerimaan')->with('success', 'Data penerimaan ditambahkan.');
    }

    public function hapusPenerimaan($id)
    {
        $model = new \App\Models\PenerimaanModel();
        $data = $model->find($id);

        if ($data && $data['upload_dokumen'] && file_exists('uploads/' . $data['upload_dokumen'])) {
            unlink('uploads/' . $data['upload_dokumen']);
        }

        $model->delete($id);
        return redirect()->to('/admin/penerimaan')->with('success', 'Data berhasil dihapus.');
    }

    public function editPenerimaan($id)
    {
        $model = new \App\Models\PenerimaanModel();
        $dataLama = $model->find($id);

        $file = $this->request->getFile('upload_dokumen');
        $fileName = $dataLama['upload_dokumen']; // gunakan dokumen lama

        if ($file && $file->isValid() && !$file->hasMoved()) {
            //Validasi PDF
            if ($file->getMimeType() !== 'application/pdf') {
                return redirect()->back()->with('error', 'File harus berformat PDF.');
            }

            // Hapus dokumen lama
            if ($fileName && file_exists('uploads/' . $fileName)) {
                unlink('uploads/' . $fileName);
            }

            // Simpan file baru
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
        }

        $model->update($id, [
            'nama_jurusan' => $this->request->getPost('nama_jurusan'),
            'jumlah_diterima' => $this->request->getPost('jumlah_diterima'),
            'upload_dokumen' => $fileName
        ]);

        return redirect()->to('/admin/penerimaan')->with('success', 'Data penerimaan berhasil diperbarui.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Berhasil logout.');
    }

}
