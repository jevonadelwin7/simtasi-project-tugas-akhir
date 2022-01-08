<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\JadwalModel;

class Mahasiswa extends BaseController
{
    protected $UsersModel;
    public function __construct()
    {
        $this->UsersModel = new UsersModel();
    }

    public function index()

    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 3) {
            $idmhs = $userInfo['id'];
            $tot = $this->UsersModel->cek_request($idmhs);
            if ($tot > 0) {
                $pesan = 'Sudah Melakukan Request';
                $color = 'success';
            } else {
                $pesan = 'Belum Melakukan Request';
                $color = 'secondary';
            }
            $data = [
                'title' => 'Home',
                'isi' => 'mahasiswa/dash',
                'judul' => 'Dashboard Mahasiswa',
                'bimbingan' => $this->UsersModel->get_bimbingan_status($idmhs),
                'req_status' => $this->UsersModel->cek_request_status($idmhs),
                'pesan' => $pesan,
                'color' => $color,
                'userInfo' => $userInfo
            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function daftar_dosen()
    {

        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $idmhs = $userInfo['id'];
        if ($userInfo['role_id'] == 3) {
            $data = [
                'title' => 'Daftar Dosen',
                'isi' => 'mahasiswa/daftar_dosen',
                'daftar' => $this->UsersModel->daftar_dosen(),
                'req_proposal' => $this->UsersModel->cek_request_status($idmhs),
                'req_ta' => $this->UsersModel->cek_request_status_ta($idmhs),
                'judul' => 'Daftar Dosen',
                'userInfo' => $userInfo
            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function daftar_topik()
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);

        if ($userInfo['role_id'] == 3) {
            $data = [
                'title' => 'Daftar Topik TA',
                'isi' => 'mahasiswa/daftar_topik',
                'judul' => 'Daftar Topik TA',
                'userInfo' => $userInfo
            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function bimbingan()
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $idmhs = $userInfo['id'];
        if ($userInfo['role_id'] == 3) {
            $data = [
                'title' => 'Bimbingan',
                'isi' => 'mahasiswa/bimbingan',
                'judul' => 'Bimbingan',
                'bimbingan' => $this->UsersModel->get_bimbingan($idmhs),
                'bimbingan_ta' => $this->UsersModel->get_bimbingan_ta($idmhs),
                'status_proposal' => $this->UsersModel->get_status_pro_request($idmhs),
                'userInfo' => $userInfo
            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function pendaftaran_sidang()
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 3) {
            $idmhs = $userInfo['id'];
            $tot = $this->UsersModel->cek_pendaftaran_sidang($idmhs);
            if ($tot > 0) {
                $pesan = 'Anda sudah Melakukan Request';
                $color = 'success';
                $data = [
                    'title' => 'Pendaftaran Sidang',
                    'isi' => 'mahasiswa/pendaftaran_sidang',
                    'judul' => 'Pendaftaran Sidang',
                    'pendaftaran' => $this->UsersModel->get_pendaftaran_sidang($idmhs),
                    'dosen' => $this->UsersModel->get_dosen(),
                    'pesan' => $pesan,
                    'color' => $color,
                    'userInfo' => $userInfo
                ];
                echo view('layout/template', $data);
            } else {
                $pesan = 'Anda belum Mengumpulkan berkas !';
                $color = 'secondary';
                $data = [
                    'title' => 'Pendaftaran Sidang',
                    'isi' => 'mahasiswa/insert_sidang',
                    'judul' => 'Pendaftaran Sidang',
                    'pendaftaran' => $this->UsersModel->get_pendaftaran_sidang($idmhs),
                    'dosen' => $this->UsersModel->get_dosen(),
                    'pesan' => $pesan,
                    'color' => $color,
                    'userInfo' => $userInfo
                ];
                echo view('layout/template', $data);
            }
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function pendaftaran_seminar()
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 3) {
            $idmhs = $userInfo['id'];
            $tot = $this->UsersModel->cek_pendaftaran($idmhs);
            if ($tot > 0) {
                $pesan = 'Anda sudah Melakukan Request';
                $color = 'success';
                $data = [
                    'title' => 'Pendaftaran Seminar',
                    'isi' => 'mahasiswa/pendaftaran_seminar',
                    'judul' => 'Pendaftaran seminar',
                    'pendaftaran' => $this->UsersModel->get_pendaftaran($idmhs),
                    'dosen' => $this->UsersModel->get_dosen(),
                    'pesan' => $pesan,
                    'color' => $color,
                    'userInfo' => $userInfo
                ];
                echo view('layout/template', $data);
            } else {
                $pesan = 'Anda belum Mengumpulkan berkas !';
                $color = 'secondary';
                $data = [
                    'title' => 'Pendaftaran Seminar',
                    'isi' => 'mahasiswa/insert_seminar',
                    'judul' => 'Pendaftaran seminar',
                    'pendaftaran' => $this->UsersModel->get_pendaftaran($idmhs),
                    'dosen' => $this->UsersModel->get_dosen(),
                    'pesan' => $pesan,
                    'color' => $color,
                    'userInfo' => $userInfo
                ];
                echo view('layout/template', $data);
            }
        } else {
            echo view('errors/html/error_404');
        }
    }

    public function daftar()
    {
        if ($_POST['submit'] == 'kirim') {
            if (!$this->validate([
                'berkas' => [
                    'rules' => 'ext_in[berkas,rar,zip   ]|max_size[berkas,2048]',
                    'errors' => [
                        'ext_in' => 'File Extention Harus Berupa .zip atau .rar',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]

                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }
            $id_pendaftaran = $this->request->getPost('id_pendaftaran');
            $file = $this->request->getFile('berkas');
            if ($file->getError() == 4) {
                $data = [
                    'pesan_mahasiswa' => $this->request->getPost('komentar'),
                    'status_bg' => 'secondary',
                    'status' => 'menunggu'
                ];
                $this->UsersModel->update_daftar($data, $id_pendaftaran);
                return redirect()->to(base_url('mahasiswa/pendaftaran_seminar'));
            } else {
                //hapus file lama
                $id_pendaftaran = $this->request->getPost('id_pendaftaran');
                $berkaslama = $this->UsersModel->get_detail_pendaftaran($id_pendaftaran);
                if ($berkaslama['file'] != "") {
                    unlink('uploads/file_final/' . $berkaslama['file']);
                }
                $file = $this->request->getFile('berkas');
                $fileName = $file->getRandomName();

                $data = [

                    'pesan_mahasiswa' => $this->request->getPost('komentar'),
                    'file' => $fileName,
                    'status_bg' => 'secondary',
                    'status' => 'Berkas terkirim, Dosen akan memeriksa kelengkapan berkas.'
                ];



                $file->move('uploads/file_final', $fileName);
                $this->UsersModel->update_daftar($data, $id_pendaftaran);
                return redirect()->to(base_url('mahasiswa/pendaftaran_seminar'));
            }
        } else {

            $file = $this->request->getFile('berkas');
            $fileName = $file->getRandomName();
            $file->move('uploads/file_final', $fileName);
            // $id_pendaftaran = $this->request->getPost('id_pendaftaran');
            $data = [
                'mahasiswa' => $this->request->getPost('nama_mhs'),
                'pesan_mahasiswa' => $this->request->getPost('komentar'),
                'id_dosen' => '543212345', //$this->request->getPost('id_dosen'),
                'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
                'jenis' => $this->request->getPost('jenis'),
                'file' => $fileName,
                'status_bg' => 'secondary',
                'status' => 'menunggu pemeriksaan kelengkapan berkas'
            ];
            $this->UsersModel->insert_daftar_seminar($data);
            return redirect()->back();
        }
    }

    public function daftar_sidang()
    {
        if ($_POST['submit'] == 'kirim') {
            if (!$this->validate([
                'berkas' => [
                    'rules' => 'ext_in[berkas,rar,zip   ]|max_size[berkas,2048]',
                    'errors' => [
                        'ext_in' => 'File Extention Harus Berupa .zip atau .rar',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]

                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }
            $id_pendaftaran = $this->request->getPost('id_pendaftaran');
            $file = $this->request->getFile('berkas');
            if ($file->getError() == 4) {
                $data = [
                    'pesan_mahasiswa' => $this->request->getPost('komentar'),
                ];
                $this->UsersModel->update_daftar($data, $id_pendaftaran);
                return redirect()->to(base_url('mahasiswa/pendaftaran_seminar'));
            } else {
                //hapus file lama
                $id_pendaftaran = $this->request->getPost('id_pendaftaran');
                $berkaslama = $this->UsersModel->get_detail_pendaftaran($id_pendaftaran);
                if ($berkaslama['file'] != "") {
                    unlink('uploads/file_final/' . $berkaslama['file']);
                }
                $file = $this->request->getFile('berkas');
                $fileName = $file->getRandomName();

                $data = [

                    'pesan_mahasiswa' => $this->request->getPost('komentar'),
                    'file' => $fileName,
                    'status_bg' => 'secondary',
                    'status' => 'Berkas terkirim, Dosen akan memeriksa kelengkapan berkas.'
                ];



                $file->move('uploads/file_final', $fileName);
                $this->UsersModel->update_daftar($data, $id_pendaftaran);
                return redirect()->to(base_url('mahasiswa/pendaftaran_seminar'));
            }
        } else {

            $file = $this->request->getFile('berkas');
            $fileName = $file->getRandomName();
            $file->move('uploads/file_final', $fileName);
            // $id_pendaftaran = $this->request->getPost('id_pendaftaran');
            $data = [
                'mahasiswa' => $this->request->getPost('nama_mhs'),
                'pesan_mahasiswa' => $this->request->getPost('komentar'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
                'jenis' => 'proposal',
                'file' => $fileName,
                'status_bg' => 'secondary',
                'status' => 'menunggu'
            ];
            $this->UsersModel->insert_daftar_seminar($data);
            return redirect()->to(base_url('mahasiswa/pendaftaran_seminar'));
        }
    }


    public function request_bimbingan($id)
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 3) {
            $data = [
                'title' => 'Request Bimbingan',
                'isi' => 'mahasiswa/request_bimbingan',
                'judul' => 'Request Bimbingan',
                'idosen' => $id,
                'userInfo' => $userInfo
            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }

    public function request_bimbingan_proposal($id)
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 3) {
            $data = [
                'title' => 'Request Bimbingan',
                'isi' => 'mahasiswa/request_bimbingan_proposal',
                'judul' => 'Request Bimbingan',
                'idosen' => $id,
                'userInfo' => $userInfo
            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function insert_request_proposal()
    {
        $data = [
            'id_dosen' => $this->request->getPost('id_dosen'),
            'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
            'mahasiswa' => $this->request->getPost('nama_mhs'),
            'judul' => $this->request->getPost('judul_proposal'),
            'tentang_judul' => $this->request->getPost('tentang_judul'),
            'pesan' => $this->request->getPost('pesan'),
            'jenis' => 'proposal',
            'status' => 'menunggu',
            'status_class' => 'secondary'
        ];
        $this->UsersModel->insert_data($data);
        return redirect()->to(base_url('mahasiswa/bimbingan'));
    }
    public function insert_request_ta()
    {
        $data = [
            'id_dosen' => $this->request->getPost('id_dosen'),
            'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
            'mahasiswa' => $this->request->getPost('nama_mhs'),
            'judul' => $this->request->getPost('judul_ta'),
            'tentang_judul' => $this->request->getPost('tentang_judul'),
            'pesan' => $this->request->getPost('pesan'),
            'jenis' => 'skripsi',
            'status' => 'menunggu',
            'status_class' => 'secondary'
        ];
        $this->UsersModel->insert_data($data);
        return redirect()->to(base_url('mahasiswa'));
    }
    public function isi_bimbingan($id_bimbingan)
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 3) {
            $cekfile = $this->UsersModel->cek_file($id_bimbingan);
            if ($cekfile['file_revisi'] == '') {
                $data = [
                    'title' => 'Request Bimbingan',
                    'isi' => 'mahasiswa/isi_bimbingan',
                    'judul' => 'Halaman Bimbingan',
                    'bimbingan' => $this->UsersModel->get_isi_bimbingan($id_bimbingan),
                    'iframeo' => '<!--',
                    'iframec' => '-->',
                    'message' => 'File Revisi kosong',
                    'userInfo' => $userInfo
                ];
            } else {
                $data = [
                    'title' => 'Request Bimbingan',
                    'isi' => 'mahasiswa/isi_bimbingan',
                    'judul' => 'Halaman Bimbingan',
                    'bimbingan' => $this->UsersModel->get_isi_bimbingan($id_bimbingan),
                    'iframeo' => '',
                    'iframec' => '',
                    'message' => '',
                    'userInfo' => $userInfo
                ];
            }

            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }

    public function isi_request($id_request)
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 3) {
            $data = [
                'title' => 'Home',
                'isi' => 'mahasiswa/isi_request',
                'judul' => 'Request Mahasiswa',
                'request' => $this->UsersModel->get_isi_request($id_request),
                'userInfo' => $userInfo

            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function pilihan_request()
    {
        if ($_POST['submit'] == 'ajukan') {
            $id_request = $this->request->getPost('id_request');
            $data = [
                'mahasiswa' => $this->request->getPost('nama_mhs'),
                'pesan' => $this->request->getPost('komentar'),
                'judul' => $this->request->getPost('judul_proposal'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
                'status' => 'diajukan kembali',
                'status_class' => 'warning',
                'disabled' => ''
            ];
            $this->UsersModel->update_request($data, $id_request);
            return redirect()->to(base_url('mahasiswa/bimbingan'));
        } else {
            $id_request = $this->request->getPost('id_request');
            $this->UsersModel->delete_request($id_request);
            return redirect()->to(base_url('mahasiswa/bimbingan'));
        }
    }


    public function update_bimbingan($id_bimbingan)
    {
        if ($_POST['submit'] == 'update') {
            if (!$this->validate([
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
                    'komentar_mhs' => $this->request->getPost('komentar_mhs'),
                    'jenis' => 'proposal'
                ];
                $this->UsersModel->update_bimbingan($data, $id_bimbingan);
                return redirect()->to(base_url('mahasiswa/bimbingan'));
            } else {
                //hapus file lama
                $berkaslama = $this->UsersModel->get_detail($id_bimbingan);
                if ($berkaslama['file'] != "") {
                    unlink('uploads/file_mahasiswa/' . $berkaslama['file']);
                }
                $file = $this->request->getFile('berkas');
                $fileName = $file->getRandomName();
                $data = [
                    'mahasiswa' => $this->request->getPost('nama_mhs'),
                    'judul' => $this->request->getPost('judul_proposal'),
                    'komentar_mhs' => $this->request->getPost('komentar_mhs'),
                    'file' => $fileName,
                    'jenis' => 'proposal'

                ];
                $file->move('uploads/file_mahasiswa', $fileName);
                $this->UsersModel->update_bimbingan($data, $id_bimbingan);
                return redirect()->to(base_url('mahasiswa/bimbingan'));
            }
        } else { //insert bimbingan
            $data = [
                'mahasiswa' => $this->request->getPost('nama_mhs'),
                'dosen' => $this->request->getPost('dosen'),
                'judul' => $this->request->getPost('judul_proposal'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'id_mahasiswa' => $this->request->getPost('id_mahasiswa'),
                'jenis' => 'proposal'
            ];

            $this->UsersModel->insert_bimbingan($data);
            return redirect()->to(base_url('mahasiswa/bimbingan'));
        }
    }
    public function view_pdf($id_bimbingan)
    {

        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $idmhs = $userInfo['id'];
        if ($userInfo['role_id'] == 3) {
            $data = [
                'judul' => 'ISI',
                'title' => 'Daftar Dosen',
                'isi' => 'mahasiswa/view_file',
                'datarow' => $this->UsersModel->get_detail($id_bimbingan),
                'userInfo' => $userInfo
            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function jadwal_seminar()
    {
        $page = \Config\Services::pager();
        $jadwal = new JadwalModel();
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $idmhs = $userInfo['id'];
        if ($userInfo['role_id'] == 3) {
            $data = [
                'title' => 'Jadwal Seminar',
                'isi' => 'mahasiswa/jadwal_seminar',
                'judul' => 'Jadwal Seminar',
                'jadwal' => $jadwal->where('jenis', 'proposal')->paginate(10),
                'halaman' => $jadwal->pager,
                //'jadwal' => $this->UsersModel->get_jadwal(),
                'userInfo' => $userInfo
            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function jadwal_sidang()
    {
        $page = \Config\Services::pager();
        $jadwal = new JadwalModel();
        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $idmhs = $userInfo['id'];
        if ($userInfo['role_id'] == 3) {
            $data = [
                'title' => 'Jadwal Sidang',
                'isi' => 'mahasiswa/jadwal_sidang',
                'judul' => 'Jadwal Sidang',
                'jadwal' => $jadwal->where('jenis', 'skripsi')->paginate(10),
                'halaman' => $jadwal->pager,
                'userInfo' => $userInfo
            ];
            echo view('layout/template', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function hasil_seminar()
    {

        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 3) {
            $idmhs = $userInfo['id'];
            $tot = $this->UsersModel->cek_nilai_seminar($idmhs);
            if ($tot > 0) {
                $pesan = 'Nilai anda telah keluar!';
                $color = 'success';
                $data = [
                    'title' => 'Hasil Seminar',
                    'isi' => 'mahasiswa/hasil_seminar',
                    'judul' => 'Hasil Seminar',
                    'nilai' => $this->UsersModel->get_nilai_seminar($idmhs),
                    'pesan' => $pesan,
                    'color' => $color,
                    'userInfo' => $userInfo
                ];
                echo view('layout/template', $data);
            } else {
                $pesan = 'Nilai Anda Belum Ada';
                $color = 'secondary';
                $data = [
                    'title' => 'Hasil Seminar',
                    'isi' => 'mahasiswa/hasil',
                    'judul' => 'Hasil seminar',
                    'nilai' => $this->UsersModel->get_nilai_seminar($idmhs),
                    'pesan' => $pesan,
                    'color' => $color,
                    'userInfo' => $userInfo
                ];
                echo view('layout/template', $data);
            }
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function hasil_sidang()
    {

        $userModel = new \App\Models\UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 3) {
            $idmhs = $userInfo['id'];
            $tot = $this->UsersModel->cek_nilai_sidang($idmhs);
            if ($tot > 0) {
                $pesan = 'Nilai anda telah keluar!';
                $color = 'success';
                $data = [
                    'title' => 'Hasil Seminar',
                    'isi' => 'mahasiswa/hasil_sidang',
                    'judul' => 'Hasil Seminar',
                    'nilai' => $this->UsersModel->get_nilai_sidang($idmhs),
                    'pesan' => $pesan,
                    'color' => $color,
                    'userInfo' => $userInfo
                ];
                echo view('layout/template', $data);
            } else {
                $pesan = 'Nilai Anda Belum Ada';
                $color = 'secondary';
                $data = [
                    'title' => 'Hasil Seminar',
                    'isi' => 'mahasiswa/hasil',
                    'judul' => 'Hasil seminar',
                    'nilai' => $this->UsersModel->get_nilai_sidang($idmhs),
                    'pesan' => $pesan,
                    'color' => $color,
                    'userInfo' => $userInfo
                ];
                echo view('layout/template', $data);
            }
        } else {
            echo view('errors/html/error_404');
        }
    }
}
