<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'tb_user';
    protected $primarykey = 'id';
    protected $allowedFields = ['id', 'nama_user', 'email', 'no_hp', 'password', 'role_id'];

    public function daftar_dosen()
    {
        return $this->db->table('tb_dosen')->where('role_id', '2')->get()->getresultArray();
    }

    public function get_bimbingan($idmhs)
    {
        return $this->db->table('bimbingan')->where('id_mahasiswa', $idmhs)->where('jenis', 'proposal')->orderBy('id_bimbingan', 'ASC')->get()->getresultArray();
    }
    public function get_bimbingan_status($idmhs)
    {
        return $this->db->table('tb_request_mhs')->where('id_mahasiswa', $idmhs)->where('jenis', 'proposal')->get()->getresultArray();
    }
    public function get_bimbingan_ta($idmhs)
    {
        return $this->db->table('bimbingan')->where('id_mahasiswa', $idmhs)->where('jenis', 'skripsi')->orderBy('id_bimbingan', 'ASC')->get()->getresultArray();
    }
    public function get_status_pro_request($idmhs)
    {
        return $this->db->table('tb_request_mhs')->where('id_mahasiswa', $idmhs)->get()->getResultArray();
    }
    public function get_isi_request($id_request)
    {
        return $this->db->table('tb_request_mhs')->where('id_request', $id_request)->get()->getresultArray();
    }
    public function insert_data($data)
    {
        return $this->db->table('tb_request_mhs')->insert($data);
    }
    public function update_bimbingan($data, $id_bimbingan)
    {
        return $this->db->table('bimbingan')->update($data, array('id_bimbingan' => $id_bimbingan));
    }
    public function get_isi_bimbingan($id_bimbingan)
    {
        return $this->db->table('bimbingan')->where('id_bimbingan', $id_bimbingan)->get()->getResultArray();
    }
    public function cek_file($id_bimbingan) //Check File Revisi  ada atau tidak
    {
        return $this->db->table('bimbingan')->where('id_bimbingan', $id_bimbingan)->get()->getRowArray();
    }

    public function get_detail($id_bimbingan)
    {
        return $this->db->table('bimbingan')->where('id_bimbingan', $id_bimbingan)->get()->getRowArray();
    }
    public function cek_request($idmhs)
    {
        return $this->db->table('tb_request_mhs')->where('id_mahasiswa', $idmhs)->countAll();
    }
    public function cek_request_status($idmhs)
    {
        return $this->db->table('tb_request_mhs')->where('id_mahasiswa', $idmhs)->where('jenis', 'proposal')->get()->getresultArray();
    }
    public function cek_request_status_ta($idmhs)
    {
        return $this->db->table('tb_request_mhs')->where('id_mahasiswa', $idmhs)->where('jenis', 'skripsi')->get()->getresultArray();
    }
    public function update_request($datax, $id_request)
    {
        return $this->db->table('tb_request_mhs')->update($datax, array('id_request' => $id_request));
    }
    public function insert_bimbingan($data)
    {
        return $this->db->table('bimbingan')->insert($data);
    }
    public function cek_bimbingan($idmhs)
    {
        return $this->db->table('tb_request_mhs')->where('id_mahasiswa', $idmhs)->countAll();
    }
    public function delete_request($id_request)
    {
        return $this->db->table('tb_request_mhs')->where('id_request', $id_request)->delete();
    }

    //Pendaftaran Seminar & Sidang
    public function cek_pendaftaran($idmhs)
    {
        return $this->db->table('tb_pendaftaran')->where('id_mahasiswa', $idmhs)->where('jenis', 'proposal')->countAllResults();
    }
    public function cek_pendaftaran_sidang($idmhs)
    {
        return $this->db->table('tb_pendaftaran')->where('id_mahasiswa', $idmhs)->where('jenis', 'skripsi')->countAllResults();
    }
    public function get_pendaftaran($idmhs)
    {
        return $this->db->table('tb_pendaftaran')->where('id_mahasiswa', $idmhs)->where('jenis', 'proposal')->get()->getResultArray();
    }
    public function get_pendaftaran_sidang($idmhs)
    {
        return $this->db->table('tb_pendaftaran')->where('id_mahasiswa', $idmhs)->where('jenis', 'skripsi')->get()->getResultArray();
    }
    public function get_dosen()
    {
        return $this->db->table('tb_dosen')->get()->getResultArray();
    }
    public function insert_daftar_seminar($data)
    {
        return $this->db->table('tb_pendaftaran')->insert($data);
    }
    public function update_daftar($datax, $id_pendaftaran)
    {
        return $this->db->table('tb_pendaftaran')->update($datax, array('id_pendaftaran' => $id_pendaftaran));
    }
    public function get_detail_pendaftaran($id_pendaftaran)
    {
        return $this->db->table('tb_pendaftaran')->where('id_pendaftaran', $id_pendaftaran)->get()->getRowArray();
    }
    // Jadwal Seminar & Sidang
    public function get_jadwal()
    {
        return $this->db->table('tb_jadwal')->where('jenis', 'proposal')->get()->getresultArray();
    }
    public function get_jadwal_sidang()
    {
        return $this->db->table('tb_jadwal')->where('jenis', 'skripsi')->get()->getresultArray();
    }
    public function cek_nilai_seminar($idmhs)
    {
        return $this->db->table('tb_nilai')->where('id_mahasiswa', $idmhs)->where('jenis', 'proposal')->countAllResults();
    }
    public function cek_nilai_sidang($idmhs)
    {
        return $this->db->table('tb_nilai')->where('id_mahasiswa', $idmhs)->where('jenis', 'skripsi')->countAllResults();
    }
    public function get_nilai_seminar($idmhs)
    {
        return $this->db->table('tb_nilai')->where('id_mahasiswa', $idmhs)->where('jenis', 'proposal')->get()->getresultArray();
    }
    public function get_nilai_sidang($idmhs)
    {
        return $this->db->table('tb_nilai')->where('id_mahasiswa', $idmhs)->where('jenis', 'skripsi')->get()->getresultArray();
    }
}
