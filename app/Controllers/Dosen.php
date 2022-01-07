<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Dosen extends BaseController
{
    protected $DosenModel;
    public function __construct()
    {
        $this->DosenModel = new DosenModel();
    }
    public function index()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 2) {
            $data = [
                'title' => 'Home',
                'isi' => 'dosen/dashboard',
                'judul' => 'Dashboard',
                'userInfo' => $userInfo

            ];
            echo view('layout/template_dosen', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }
    public function tambah_dosen()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        if ($userInfo['role_id'] == 2) {
            $data = [
                'title' => 'Home',
                'isi' => 'dosen/tambah_dosen',
                'judul' => 'Dashboard',
                'userInfo' => $userInfo

            ];
            echo view('layout/template_dosen', $data);
        } else {
            echo view('errors/html/error_404');
        }
    }






    //------------------Menu Dosen--------------------------------
    public function request_mhs()
    {
        $userModel = new \App\Models\DosenModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $id_dosen = $userInfo['id'];
        $data = [
            'title' => 'Home',
            'isi' => 'dosen/request_mhs',
            'judul' => 'Request Mahasiswa',
            'request' => $this->DosenModel->get_request($id_dosen),
            'request_ta' => $this->DosenModel->get_request_ta($id_dosen),
            'userInfo' => $userInfo

        ];
        if ($userInfo['role_id'] == 2) {

            echo view('layout/template_dosen', $data);
        } elseif ($userInfo['role_id'] == 1) {

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
        $data = [
            'title' => 'Home',
            'isi' => 'dosen/isi_request',
            'judul' => 'Request Mahasiswa',
            'request' => $this->DosenModel->get_isi_request($id_request),
            'userInfo' => $userInfo

        ];
        if ($userInfo['role_id'] == 2) {

            echo view('layout/template_dosen', $data);
        } elseif ($userInfo['role_id'] ==  1) {

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
            echo view('layout/template_dosen', $data);
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
            return redirect()->to(base_url('dosen/request_mhs'));
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
            return redirect()->to(base_url('dosen'));
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
                'title' => 'Home',
                'isi' => 'dosen/bimbingan',
                'bimbingan' => $this->DosenModel->get_bimbingan($id_dosen),
                'bimbingan_skripsi' => $this->DosenModel->get_bimbingan_skripsi($id_dosen),
                'judul' => 'bimbingan',
                'userInfo' => $userInfo

            ];
            echo view('layout/template_dosen', $data);
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
        $data = [
            'title' => 'Home',
            'isi' => 'dosen/bimbingan_mhs',
            'bimbingan' => $this->DosenModel->bimbingan_mhs($id_dosen, $id_mahasiswa),
            'bimbingan_skripsi' => $this->DosenModel->bimbingan_mhs_skripsi($id_dosen, $id_mahasiswa),
            'judul' => 'bimbingan',
            'userInfo' => $userInfo
        ];
        if ($userInfo['role_id'] == 2) {

            echo view('layout/template_dosen', $data);
        } elseif ($userInfo['role_id'] == 1) {

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
            echo view('layout/template_dosen', $data);
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
        $cekfile = $this->DosenModel->cek_file($id_bimbingan);
        if ($cekfile['file'] == '') {
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
        if ($userInfo['role_id'] == 2) {

            echo view('layout/template_dosen', $data);
        } elseif ($userInfo['role_id'] == 1) {

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
