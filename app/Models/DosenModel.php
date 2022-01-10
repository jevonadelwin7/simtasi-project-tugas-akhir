<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'tb_dosen';
    protected $primarykey = 'id';
    protected $allowedFields = ['id', 'nama_dosen', 'email', 'no_hp', 'info', 'password', 'role_id'];

    public function detail_dosen($id)
    {
        return $this->db->table('tb_dosen')->where('id', $id)->get()->getresultArray();
    }
    public function daftar_dosen()
    {
        return $this->db->table('tb_dosen')->where('role_id', '2')->get()->getresultArray();
    }
    public function daftar_mahasiswa()
    {
        return $this->db->table('tb_user')->get()->getresultArray();
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
    public function get_detail_pendaftaran($id_pendaftaran)
    {
        return $this->db->table('tb_pendaftaran')->where('id_pendaftaran', $id_pendaftaran)->get()->getRowArray();
    }
    public function update_pendaftaran($datax, $id_pendaftaran)
    {
        return $this->db->table('tb_pendaftaran')->update($datax, array('id_pendaftaran' => $id_pendaftaran));
    }
    public function delete_pendaftaran($id_pendaftaran)
    {
        return $this->db->table('tb_pendaftaran')->where('id_pendaftaran', $id_pendaftaran)->delete();
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
    public function delete_jadwal($id_jadwal)
    {
        return $this->db->table('tb_jadwal')->where('id_jadwal', $id_jadwal)->delete();
    }
    public function delete_dosen($id)
    {
        return $this->db->table('tb_dosen')->where('id', $id)->delete();
    }
    //--------------------Nilai Mahasiswa--------------------------------------------------------------
    public function get_nilai_seminar()
    {
        return $this->db->table('tb_nilai')->where('jenis', 'proposal')->get()->getresultArray();
    }
    public function get_nilai_sidang()
    {
        return $this->db->table('tb_nilai')->where('jenis', 'skripsi')->get()->getresultArray();
    }
    public function get_nilai()
    {
        return $this->db->table('tb_nilai')->get()->getresultArray();
    }
    public function delete_nilai($id_nilai)
    {
        return $this->db->table('tb_nilai')->where('id_nilai', $id_nilai)->delete();
    }
    public function insert_nilai($data)
    {
        return $this->db->table('tb_nilai')->insert($data);
    }
    public function update_nilai($data, $id_nilai)
    {
        return $this->db->table('tb_nilai')->update($data, array('id_nilai' => $id_nilai));
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
    public function update_profile($data, $id)
    {
        return $this->db->table('tb_dosen')->update($data, array('id' => $id));
    }
}
