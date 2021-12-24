<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'tb_dosen';
    protected $primarykey = 'id';
    protected $allowedFields = ['id', 'nama_dosen', 'email', 'no_hp', 'info', 'password', 'role_id'];

    public function daftar_dosen()
    {
        return $this->db->table('tb_dosen')->where('role_id', '2')->get()->getresultArray();
    }
    //--------------------Model Pendaftaran--------------------------------------------------------------
    public function get_pendaftaran()
    {
        return $this->db->table('tb_pendaftaran')->get()->getresultArray();
    }
    public function get_isi_pendaftaran($id_pendaftaran)
    {
        return $this->db->table('tb_pendaftaran')->where('id_pendaftaran', $id_pendaftaran)->get()->getresultArray();
    }
    public function update_pendaftaran($datax, $id_pendaftaran)
    {
        return $this->db->table('tb_pendaftaran')->update($datax, array('id_pendaftaran' => $id_pendaftaran));
    }
    //--------------------Model Pendaftaran--------------------------------------------------------------
    public function insert_jadwal($data)
    {
        return $this->db->table('tb_jadwal')->insert($data);
    }
    public function get_jadwal()
    {
        return $this->db->table('tb_jadwal')->get()->getresultArray();
    }
    public function update_jadwal($data, $id_jadwal)
    {
        return $this->db->table('tb_jadwal')->update($data, array('id_jadwal' => $id_jadwal));
    }

    public function get_request($id_dosen)
    {
        return $this->db->table('tb_request_mhs')->where('id_dosen', $id_dosen)->where('jenis', 'proposal')->get()->getresultArray();
    }

    public function get_isi_request($id_request)
    {
        return $this->db->table('tb_request_mhs')->where('id_request', $id_request)->get()->getresultArray();
    }
    public function get_request_ta($id_dosen)
    {
        return $this->db->table('tb_request_mhs')->where('id_dosen', $id_dosen)->where('jenis', 'skripsi')->get()->getresultArray();
    }
    public function get_isi_request_ta($id_dosen, $id_mahasiswa)
    {
        return $this->db->table('tb_request_mhs')->where('id_dosen', $id_dosen)->where('id_mahasiswa', $id_mahasiswa)->where('jenis', 'skripsi')->get()->getresultArray();
    }
    public function insert_bimbingan($data)
    {
        return $this->db->table('bimbingan')->insert($data);
    }
    public function update_request($data, $id_request)
    {
        return $this->db->table('tb_request_mhs')->update($data, array('id_request' => $id_request));
    }
    public function update_tolak_request($data, $id_request)
    {
        return $this->db->table('tb_request_mhs')->update($data, array('id_request' => $id_request));
    }
    public function get_bimbingan($id_dosen)
    {
        return $this->db->table('tb_request_mhs')->where('id_dosen', $id_dosen)->where('status', 'diterima')->where('jenis', 'proposal')->get()->getresultArray();
    }
    public function get_bimbingan_skripsi($id_dosen)
    {
        return $this->db->table('tb_request_mhs')->where('id_dosen', $id_dosen)->where('status', 'diterima')->where('jenis', 'skripsi')->get()->getresultArray();
    }
    public function bimbingan_mhs($id_dosen, $id_mahasiswa)
    {
        return $this->db->table('bimbingan')->where('id_dosen', $id_dosen)->where('id_mahasiswa', $id_mahasiswa)->where('jenis', 'proposal')->get()->getresultArray();
    }
    public function bimbingan_mhs_skripsi($id_dosen, $id_mahasiswa)
    {
        return $this->db->table('bimbingan')->where('id_dosen', $id_dosen)->where('id_mahasiswa', $id_mahasiswa)->where('jenis', 'skripsi')->get()->getresultArray();
    }
    public function get_isi_bimbingan($id_bimbingan)
    {
        return $this->db->table('bimbingan')->where('id_bimbingan', $id_bimbingan)->get()->getresultArray();
    }
    public function get_detail($id_bimbingan)
    {
        return $this->db->table('bimbingan')->where('id_bimbingan', $id_bimbingan)->get()->getRowArray();
    }
    public function cek_file($id_bimbingan) //Check File Revisi  ada atau tidak
    {
        return $this->db->table('bimbingan')->where('id_bimbingan', $id_bimbingan)->get()->getRowArray();
    }
    public function update_bimbingan($data, $id_bimbingan)
    {
        return $this->db->table('bimbingan')->update($data, array('id_bimbingan' => $id_bimbingan));
    }
}
