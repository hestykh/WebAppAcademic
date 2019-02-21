<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	function getAllData($table){
    	return $this->db->get($table);
    }

    function insertData($table,$data){
        $this->db->insert($table,$data);
    }

    function delete_data($table,$where,$id){
      $this->db->where($where,$id);
      $this->db->delete($table);
    }

    function GetAllData_id($table,$value,$id){
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($value,$id);
      $query = $this->db->get();
      return $query;
    }
  public function dropDownSiswa(){
    $this->db->select('*');
    $this->db->from('kelas');
    return $this->db->get();
  } 
  public function edit_siswa($where,$value){
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->where($where,$value);
    return $this->db->get();
  }
  public  function update_siswa($id,$data){
       $this->db->where('nis',$id);
       $this->db->update('siswa',$data);
  }
  public function mapel(){
    $this->db->select('*');
    $this->db->from('data_mapel');
    $this->db->join('mapel','data_mapel.kode_mapel=mapel.kode_mapel');
    return $this->db->get();
  }

  public function nilai($kategori,$semester,$tahun_ajaran,$nis){
    return $this->db->query("
      SELECT * 
      FROM `nilai`
      JOIN `kbm` using (kode_kbm)
      JOIN `mapel` using (kode_mapel)
      WHERE `nilai`.nis = '$nis' 
      AND `kbm`.kode_ta = '$tahun_ajaran'
      AND `kbm`.kode_semester = '$semester'
      AND `nilai`.kode_kategori = '$kategori'
      GROUP BY kode_kbm
      ORDER BY nama_mapel ASC
    ");
  }
   public function back_nilai(){
    return $this->db->query("
      SELECT * 
      FROM `nilai`
      JOIN `kbm` using (kode_kbm)
      JOIN `mapel` using (kode_mapel)
      GROUP BY kode_kbm
      ORDER BY nama_mapel ASC
    ");
  }
  public function vnilai ($nis, $kode_kbm, $kode_kategori){
    return $this->db->query("
      SELECT * 
      FROM `nilai` 
      JOIN `kbm` using (kode_kbm)
      JOIN `mapel` using (kode_mapel)
      JOIN `jenis_nilai`  using (kode_jenis)
      WHERE nis = '$nis' 
      AND kode_kbm = '$kode_kbm'
      AND kode_kategori = '$kode_kategori'
      GROUP BY kode_nilai
      ORDER BY nama_jenis ASC
    ");
  }
  public function vnilai_new ($nis, $kode_kbm, $kode_kategori,$kode_jenis){
    return $this->db->query("
      SELECT * 
      FROM `nilai` 
      JOIN `kbm` using (kode_kbm)
      JOIN `mapel` using (kode_mapel)
      JOIN `jenis_nilai`  using (kode_jenis)
      WHERE nis = '$nis' 
      AND kode_kbm = '$kode_kbm'
      AND kode_kategori = '$kode_kategori'
      AND kode_jenis = '$kode_jenis'
      GROUP BY kode_nilai
      ORDER BY nama_jenis ASC
    ");
  }
  public function nilai_rapot ($nis, $kode_kbm, $kode_kategori){
    return $this->db->query("
      SELECT round(AVG(nilai),0) as rapot
      FROM `nilai` 
      WHERE nis = '$nis' 
      AND kode_kbm = '$kode_kbm'
      AND kode_kategori = '$kode_kategori'
    ");
  }
  public function presensi($kode_siswaKelas){
    return $this->db->query("
      SELECT kode_presensi, tanggal, jam, `status`.status, keterangan, nama_mapel, nama
      FROM `presensi`
      JOIN `status` using (kode_status)
      JOIN `kbm` ON `presensi`.assign_by = `kbm`.kode_kbm
      JOIN `mapel` using (kode_mapel)
      JOIN `guru` using (kode_guru)
      JOIN `kelas` using (kode_kelas)
      JOIN `siswa_kelas` using (kode_kelas)
      WHERE `presensi`.kode_siswaKelas = '$kode_siswaKelas'
      GROUP BY kode_presensi
      ORDER BY kode_presensi DESC
      LIMIT 15
    ");
  }
  public function vpresensi($kode_presensi){
    return $this->db->query("
    SELECT kode_presensi, tanggal, jam, `status`.status, keterangan, nama_mapel, nama
    FROM `presensi`
    JOIN `status` using (kode_status)
    JOIN `kbm` ON `presensi`.assign_by = `kbm`.kode_kbm
    JOIN `mapel` using (kode_mapel)
    JOIN `guru` using (kode_guru)
    JOIN `kelas` using (kode_kelas)
    JOIN `siswa_kelas` using (kode_kelas)
    WHERE `presensi`.kode_presensi = '$kode_presensi'
    GROUP BY kode_presensi
    ORDER BY kode_presensi DESC
    LIMIT 15
      ");
  }
  public function jadwal($where, $hari){
    $this->db->select('*')
      ->from('jadwal')
      ->join('jam','jadwal.kode_jam = jam.kode_jam')
      ->join('kbm','jadwal.kode_kbm = kbm.kode_kbm')
      ->join('guru','kbm.kode_guru = guru.kode_guru')
      ->join('kelas','kbm.kode_kelas = kelas.kode_kelas')
      ->join('mapel','kbm.kode_mapel = mapel.kode_mapel')
      ->where($where)
      ->where("hari = '$hari'")
      ->where("kbm.kode_ta = (select max(kode_ta) from tahun_ajaran)")
      // ->group_by('kbm.kode_kelas')
      ->order_by('jam.jam_mulai' ,'asc');
    return $this->db->get();
  }
  public function bahan_mapel($kode_kelas){
        $this->db->select('mapel.nama_mapel,kbm.kode_kbm');
        $this->db->from('kbm');
        $this->db->join('mapel','kbm.kode_mapel=mapel.kode_mapel');
        $this->db->where("kbm.kode_kelas='$kode_kelas'");
        $this->db->where("kbm.kode_kbm IN (select kode_kbm from materi)");
        $this->db->group_by('nama_mapel');
        return $this->db->get();
    }
 public function tabel_materi(){
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('pertemuan','materi.kode_mg = pertemuan.kode_mg');
        return $this->db->get();
    }
}