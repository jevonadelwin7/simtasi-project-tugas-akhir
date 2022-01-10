<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\NilaiModel;
use App\Models\JadwalModel;

class Admin extends BaseController
{
    protected $DosenModel;
    public function __construct()
    {
        $this->DosenModel = new DosenModel();
        helper(['form']);
    }
    public function index()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 1) {
            $data = [
                'title' => 'Home',
                'isi' => 'admin/dashboard',
                'judul' => 'Dashboard',
                'userInfo' => $userInfo
            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function daftar_dosen()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 1) {
            $data = [
                'title' => 'Daftar Dosen',
                'isi' => 'admin/daftar_dosen',
                'daftar' => $this->DosenModel->daftar_dosen(),
                'judul' => 'Daftar Dosen',
                'userInfo' => $userInfo
            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function daftar_mahasiswa()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 1) {
            $data = [
                'title' => 'Daftar Mahasiswa',
                'isi' => 'admin/daftar_mahasiswa',
                'daftar' => $this->DosenModel->daftar_mahasiswa(),
                'judul' => 'Daftar Mahasiswa',
                'userInfo' => $userInfo
            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function tambah_dosen()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 1) {
            $data = [
                'title' => 'Home',
                'isi' => 'admin/tambah_dosen',
                'judul' => 'Dashboard',
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function pendaftaran()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 1) {
            $data = [
                'title' => 'Pendaftaran',
                'isi' => 'admin/pendaftaran',
                'judul' => 'Pendaftaran',
                'daftar' => $this->DosenModel->get_pendaftaran(),
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function delete_pendaftaran($id_pendaftaran)
    {
        $berkaslama = $this->DosenModel->get_detail_pendaftaran($id_pendaftaran);
        unlink('uploads/file_final/' . $berkaslama['file']);
        $this->DosenModel->delete_pendaftaran($id_pendaftaran);
        return redirect()->to(base_url('admin/pendaftaran'));
    }
    public function isi_pendaftaran($id_pendaftaran)
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 1) {
            $data = [
                'title' => 'isi Pendaftaran',
                'isi' => 'admin/isi_pendaftaran',
                'judul' => 'isi Pendaftaran',
                'pendaftaran' => $this->DosenModel->get_isi_pendaftaran($id_pendaftaran),
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function pilihan_pendaftaran()
    {
        if ($_POST['submit'] == 'terima') {
            $id_pendaftaran = $this->request->getPost('id_pendaftaran');
            $data = [
                'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
                'mahasiswa' => $this->request->getPost('nama_mhs'),
                'jenis' => $this->request->getPost('jenis'),
            ];
            $datax = [
                'pesan_dosen' => $this->request->getPost('komentar_dosen'),
                'status' => 'Berkas lengkap dan sudah diterima.',
                'status_bg' => 'success'

            ];
            $this->DosenModel->insert_jadwal($data);
            $this->DosenModel->insert_nilai($data);
            $this->DosenModel->update_pendaftaran($datax, $id_pendaftaran);
            return redirect()->to(base_url('admin/pendaftaran'));
        } else {
            $id_pendaftaran = $this->request->getPost('id_pendaftaran');
            $data = [
                'pesan_dosen' => $this->request->getPost('komentar_dosen'),
                'status' => 'Lengkapi berkas & kirim Ulang.',
                'status_bg' => 'warning'
            ];
            $this->DosenModel->update_pendaftaran($data, $id_pendaftaran);
            return redirect()->to(base_url('admin/pendaftaran'));
        }
    }

    public function jadwal()
    {
        $page = \Config\Services::pager();
        $jadwal = new JadwalModel();
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 1) {
            $data = [
                'title' => 'Jadwal Seminar & Sidang',
                'isi' => 'admin/jadwal_sidang_seminar',
                'judul' => 'Jadwal Seminar & Sidang',
                'dosen' => $this->DosenModel->daftar_dosen(),
                'jadwal' => $this->DosenModel->get_jadwal(),
                'jadwal_seminar' => $jadwal->where('jenis', 'proposal')->paginate(10),
                'jadwal_sidang' => $jadwal->where('jenis', 'skripsi')->paginate(10),
                'halaman' => $jadwal->pager,
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function update_jadwal($id_jadwal)
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'penguji' => $this->request->getPost('penguji'),
            'penguji_2' => $this->request->getPost('penguji_2'),
            'waktu' => $this->request->getPost('waktu'),
            'jam' => $this->request->getPost('jam'),
            'ruang' => $this->request->getPost('ruang'),

        ];
        $this->DosenModel->update_jadwal($data, $id_jadwal);
        return redirect()->to(base_url('admin/jadwal'));
    }

    public function delete_jadwal($id_jadwal)
    {
        $this->DosenModel->delete_jadwal($id_jadwal);
        return redirect()->to(base_url('admin/jadwal'));
    }

    public function delete_dosen($id)
    {
        $this->DosenModel->delete_dosen($id);
        return redirect()->to(base_url('admin/daftar_dosen'));
    }


    public function nilai_mahasiswa()
    {
        $page = \Config\Services::pager();
        $nilai = new NilaiModel();
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 1) {
            $data = [
                'title' => 'Nilai Mahasiswa',
                'isi' => 'admin/nilai_mhs',
                'judul' => 'Nilai Mahasiswa',
                'nilai' => $this->DosenModel->get_nilai(),
                'nilai_seminar' => $nilai->where('jenis', 'proposal')->paginate(5),
                'nilai_sidang' => $nilai->where('jenis', 'skripsi')->paginate(5),
                'halaman' => $nilai->pager,
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function update_nilai($id_nilai)
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'nilai' => $this->request->getPost('nilai'),
        ];
        $this->DosenModel->update_nilai($data, $id_nilai);
        return redirect()->to(base_url('admin/nilai_mahasiswa'));
    }
    public function delete_nilai($id_nilai)
    {
        $this->DosenModel->delete_nilai($id_nilai);
        return redirect()->to(base_url('admin/nilai_mahasiswa'));
    }
    public function profile_dosen($id)
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 1) {
            $data = [
                'title' => 'Home',
                'isi' => 'admin/profile',
                'profile' => $this->DosenModel->detail_dosen($id),
                'judul' => 'Profile Dosen',
                'userInfo' => $userInfo
            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function update_profile($id)
    {

        $data = [
            'id' => $this->request->getPost('id'),
            'nama_dosen' => $this->request->getPost('nama_dosen'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'role_id' => $this->request->getPost('role'),
        ];
        $this->DosenModel->update_profile($data, $id);
        return redirect()->back();
    }

    //------------------Menu Dosen--------------------------------
    public function request_mhs()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $id_dosen = $userInfo['id'];
        if ($userInfo['role_id'] == 2 || 1) {
            $data = [
                'title' => 'Home',
                'isi' => 'dosen/request_mhs',
                'judul' => 'Request Mahasiswa',
                'request' => $this->DosenModel->get_request($id_dosen),
                'request_ta' => $this->DosenModel->get_request_ta($id_dosen),
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function isi_request($id_request)
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $id_dosen = $userInfo['id'];
        if ($userInfo['role_id'] == 2 || 1) {
            $data = [
                'title' => 'Home',
                'isi' => 'dosen/isi_request',
                'judul' => 'Request Mahasiswa',
                'request' => $this->DosenModel->get_isi_request($id_request),
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function isi_request_ta($id_request)
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $id_dosen = $userInfo['id'];
        if ($userInfo['role_id'] == 2 || 1) {
            $data = [
                'title' => 'Home',
                'isi' => 'dosen/isi_request_ta',
                'judul' => 'Request Mahasiswa',
                'request' => $this->DosenModel->get_isi_request($id_request),
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function pilihan_request()
    {
        if ($_POST['submit'] == 'terima') {
            $id_request = $this->request->getPost('id_request');
            $data = [
                'mahasiswa' => $this->request->getPost('nama_mhs'),
                'dosen' => $this->request->getPost('nama_dosen'),
                'dosen' => $this->request->getPost('nama_dosen'),
                'judul' => $this->request->getPost('judul_proposal'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
                'jenis' => $this->request->getPost('jenis'),
            ];
            $datax = [
                'pesan_dosen' => $this->request->getPost('komentar_dosen'),
                'status' => 'diterima',
                'status_class' => 'success',
                'disabled' => 'disabled'
            ];
            $this->DosenModel->insert_bimbingan($data);
            $this->DosenModel->update_request($datax, $id_request);
            return redirect()->to(base_url('admin/request_mhs'));
        } else {
            $id_request = $this->request->getPost('id_request');
            $data = [
                'mahasiswa' => $this->request->getPost('nama_mhs'),
                'pesan_dosen' => $this->request->getPost('komentar_dosen'),
                'judul' => $this->request->getPost('judul_proposal'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
                'status' => 'ditolak',
                'status_class' => 'danger',
                'disabled' => ''
            ];
            $this->DosenModel->update_request($data, $id_request);
            return redirect()->to(base_url('admin/request_mhs'));
        }
    }
    public function bimbingan()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $id_dosen = $userInfo['id'];
        if ($userInfo['role_id'] == 2 || 1) {
            $data = [
                'title' => 'Bimbingan',
                'isi' => 'dosen/bimbingan',
                'bimbingan' => $this->DosenModel->get_bimbingan($id_dosen),
                'bimbingan_skripsi' => $this->DosenModel->get_bimbingan_skripsi($id_dosen),
                'judul' => 'Bimbingan',
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function bimbingan_mhs($id_dosen, $id_mahasiswa)
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $id_dosen = $userInfo['id'];
        if ($userInfo['role_id'] == 2 || 1) {
            $data = [
                'title' => 'Home',
                'isi' => 'dosen/bimbingan_mhs',
                'bimbingan' => $this->DosenModel->bimbingan_mhs($id_dosen, $id_mahasiswa),
                'bimbingan_skripsi' => $this->DosenModel->bimbingan_mhs_skripsi($id_dosen, $id_mahasiswa),
                'judul' => 'bimbingan',
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function bimbingan_mhs_skripsi($id_dosen, $id_mahasiswa)
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $id_dosen = $userInfo['id'];
        if ($userInfo['role_id'] == 2 || 1) {
            $data = [
                'title' => 'Home',
                'isi' => 'dosen/bimbingan_mhs',
                'bimbingan' => $this->DosenModel->bimbingan_mhs_skripsi($id_dosen, $id_mahasiswa),
                'judul' => 'bimbingan',
                'userInfo' => $userInfo

            ];
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function isi_bimbingan($id_bimbingan)
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $id_dosen = $userInfo['id'];
        if ($userInfo['role_id'] == 2 || 1) {
            $cekfile = $this->DosenModel->cek_file($id_bimbingan);
            if ($cekfile['file_revisi'] == '') {
                $data = [
                    'title' => 'Home',
                    'isi' => 'dosen/isi_bimbingan',
                    'bimbingan' => $this->DosenModel->get_isi_bimbingan($id_bimbingan),
                    'datarow' =>   $this->DosenModel->get_detail($id_bimbingan),
                    'judul' => 'bimbingan',
                    'iframeo' => '<!--',
                    'iframec' => '-->',
                    'message' => 'File Mahasiswa kosong',
                    'userInfo' => $userInfo

                ];
            } else {
                $data = [
                    'title' => 'Home',
                    'isi' => 'dosen/isi_bimbingan',
                    'bimbingan' => $this->DosenModel->get_isi_bimbingan($id_bimbingan),
                    'datarow' =>   $this->DosenModel->get_detail($id_bimbingan),
                    'judul' => 'bimbingan',
                    'iframeo' => '',
                    'iframec' => '',
                    'message' => '',
                    'userInfo' => $userInfo

                ];
            }
            echo view('layout/template_admin', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function update_bimbingan($id_bimbingan)
    {
        if ($_POST['submit'] == 'update') {
            if (!$this->validate([  //update
                'berkas' => [
                    'rules' => 'ext_in[berkas,pdf]|max_size[berkas,2048]',
                    'errors' => [
                        'ext_in' => 'File Extention Harus Berupa .pdf',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]

                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }
            $file = $this->request->getFile('berkas');
            if ($file->getError() == 4) {
                $data = [
                    'mahasiswa' => $this->request->getPost('nama_mhs'),
                    'judul' => $this->request->getPost('judul_proposal'),
                    'komentar' => $this->request->getPost('komentar'),
                    'jenis' => 'proposal'
                ];
                $this->DosenModel->update_bimbingan($data, $id_bimbingan);
                return redirect()->to(base_url('Dosen'));
            } else {
                //hapus file lama
                $berkaslama = $this->DosenModel->get_detail($id_bimbingan);
                if ($berkaslama['file_revisi'] != "") {
                    unlink('uploads/file_dosen/' . $berkaslama['file_revisi']);
                }
                $file = $this->request->getFile('berkas');
                $fileName = $file->getRandomName();
                $data = [
                    'mahasiswa' => $this->request->getPost('nama_mhs'),
                    'judul' => $this->request->getPost('judul_proposal'),
                    'komentar' => $this->request->getPost('komentar'),
                    'file_revisi' => $fileName,
                    'jenis' => 'proposal'

                ];
                $file->move('uploads/file_dosen', $fileName);
                $this->DosenModel->update_bimbingan($data, $id_bimbingan);
                return redirect()->to(base_url('Dosen'));
            }
        } else {  //insert
            $data = [
                'mahasiswa' => $this->request->getPost('nama_mhs'),
                'dosen' => $this->request->getPost('dosen'),
                'judul' => $this->request->getPost('judul_proposal'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
                'jenis' => 'proposal'
            ];

            $this->UsersModel->insert_bimbingan($data);
            return redirect()->to(base_url('Dosen'));
        }
    }
}
