<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Auth  extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }
    public function index()
    {
        return view('layout/login');
    }
    public function admin()
    {
        return view('layout/login_admin');
    }
    public function register()
    {

        echo view('layout/register');
    }
    public function register_admin()
    {

        echo view('layout/register_admin');
    }
    public function save() // insert mhs data 
    {
        $validation = $this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong'
                ]
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required|valid_email[email]|is_unique[tb_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong',
                    'is_unique' => '{field} telah terdaftar. ',
                    'emailValid' => '{field} tidak valid'
                ]
            ],
            'no_hp' => [
                'label' => 'No Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong'
                ]
            ],
            'password1' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong'
                ]
            ],
            'repassword' => [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password1]',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong',
                    'matches' => '{field} Tidak Sama !!'
                ]
            ],

        ]);

        if (!$validation) {
            return view('layout/register', ['validation' => $this->validator]);
        } else {
            $no = $this->request->getPost('no');
            $nama_user = $this->request->getPost('nama_user');
            $email = $this->request->getPost('email');
            $no_hp = $this->request->getPost('no_hp');
            $password = $this->request->getPost('password1');
            $values = [
                'id' => $no,
                'nama_user' => $nama_user,
                'email' => $email,
                'no_hp' => $no_hp,
                'password' => Hash::make($password),
                'role_id' => 3,
            ];

            $userModel = new \App\Models\UsersModel();
            $query = $userModel->insert($values);
            if (!$query) {
                return redirect()->to('auth/register')->with('success', 'Berhasil Mendaftarkan Akun');
            } else {
                return redirect()->back()->with('fail', 'Gagal mendaftarkan Akun!');
            }
        }
    }
    function check() //Check Login Mahasiswa
    {
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[tb_user.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Masukkan format email yang benar',
                    'is_not_unique' => 'Email belum terdaftar'

                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'

                ]
            ],


        ]);
        if (!$validation) {
            return view('layout/login', ['validation' => $this->validator]);
        } else {
            //ccek  user
            $email = $this->request->getPost('email');
            $passsword = $this->request->getPost('password');
            $userModel = new \App\Models\UsersModel();
            $user_info = $userModel->where('email', $email)->first();
            $check_password = Hash::check($passsword, $user_info['password']);

            if (!$check_password) {
                session()->setFlashdata('fail',  'password salah');
                return redirect()->to('/auth')->withInput();
            } else {
                $user_id = $user_info['id'];
                $user_role = $user_info['role_id'];
                //$akses = '1';
                if ($user_role == 3) {
                    session()->set('loggedUser', $user_id);
                    //session()->set('akses', $akses);
                    return redirect()->to(base_url('Mahasiswa'));
                } else {
                    session()->set('loggedUser', $user_id);
                    return redirect()->to(base_url('Dosen'));
                }
            }
        }
    }
    function check_admin() //check login Dosen
    {
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[tb_dosen.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Masukkan format email yang benar',
                    'is_not_unique' => 'Email belum terdaftar'

                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'

                ]
            ],


        ]);
        if (!$validation) {
            return view('layout/login_admin', ['validation' => $this->validator]);
        } else {
            //cek  dosen
            $email = $this->request->getPost('email');
            $passsword = $this->request->getPost('password');
            $userModel = new \App\Models\DosenModel();
            $user_info = $userModel->where('email', $email)->first();
            $check_password = Hash::check($passsword, $user_info['password']);

            if (!$check_password) {
                session()->setFlashdata('fail',  'password salah');
                return redirect()->to('auth/admin')->withInput();
            } else {
                $user_id = $user_info['id'];
                $user_role = $user_info['role_id'];
                $akses = 1;
                if ($user_role == 3) {
                    session()->set('loggedUser', $user_id);
                    // session()->set('akses', $akses);
                    return redirect()->to(base_url('Mahasiswa'));
                } else if ($user_role == 1) {
                    session()->set('loggedUser', $user_id);
                    // session()->set('akses', $akses);
                    return redirect()->to(base_url('Admin'));
                } else {
                    session()->set('loggedUser', $user_id);
                    return redirect()->to(base_url('Dosen'));
                }
            }
        }
    }
    public function regis() // insert dosen data 
    {
        $validation = $this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong'
                ]
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required|is_unique[tb_dosen.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong',
                    'is_unique' => '{field} telah terdaftar. '
                ]
            ],
            'no_hp' => [
                'label' => 'No Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong'
                ]
            ],
            'password1' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong'
                ]
            ],
            'repassword' => [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password1]',
                'errors' => [
                    'required' => '{field} Wajib diisi & tidak boleh kosong',
                    'matches' => '{field} Tidak Sama !!'
                ]
            ],

        ]);
        if (!$validation) {
            // return view('admin/tambah_dosen', ['validation' => $this->validator]);
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $no = $this->request->getPost('no');
            $nama_user = $this->request->getPost('nama_user');
            $email = $this->request->getPost('email');
            $no_hp = $this->request->getPost('no_hp');
            $password = $this->request->getPost('password1');

            $values = [
                'id' => $no,
                'nama_dosen' => $nama_user,
                'email' => $email,
                'no_hp' => $no_hp,
                'password' => Hash::make($password),
                'role_id' => 2,
            ];

            $userModel = new \App\Models\DosenModel();
            $query = $userModel->insert($values);
            if (!$query) {
                // return redirect()->back()->with('fail', 'something went wrong');
                return redirect()->to('admin/tambah_dosen')->with('success', 'Berhasil Mendaftarkan Dosen');
            } else {
                return redirect()->back()->with('fail', 'something went wrong');
                //return redirect()->to('admin/tambah_dosen')->with('success', 'berhasil mendaftar');
            }
        }
    }


    //link youtube login register filter = https://www.youtube.com/watch?v=vKFcpQo-h-Q
    function logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/?access=out')->with('fail', 'anda telah keluar');
        }
    }
}
