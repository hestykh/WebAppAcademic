<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

	public function tampilkelas(){
		return $this->db->get('kelas');
	}

	public function getAllData($table){
    	return $this->db->get($table);
    }
	
	public function insert_data($table,$data){
		$this->db->insert($table, $data);
	}

    public function getSiswaNilai($kode_kbm,$jenis,$kategori, $kelas){
        //untuk menampilkan siswa pada kelas $kode_kelas yang belum memiliki(not in) nilai pada mapel $kode_mapel,jenis_nilai $jenis_nilai di semester $semester.
        return $this->db->query("
            SELECT nis, kode_siswaKelas, nama, nama_kelas
            FROM `siswa_kelas`
            JOIN `siswa` using (nis)
            JOIN `kelas` using (kode_kelas)
            WHERE `siswa_kelas`.kode_kelas = '$kelas' 
            AND nis NOT IN
                (SELECT nis FROM `nilai` WHERE kode_jenis = '$jenis' AND kode_kbm = '$kode_kbm' AND kode_kategori = '$kategori')
            AND kode_ta IN 
                (SELECT kode_ta FROM `kbm` where kode_kbm = '$kode_kbm')
            GROUP BY `siswa_kelas`.nis
            ORDER BY `siswa_kelas`.nis ASC
        ");
    }

    public  function update_dGuru($id,$data){
       $this->db->where('kode_guru',$id);
       $this->db->update('guru',$data);
    }

    public function edit_guru($where,$value){
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('role', 'guru.role = role.kode_role');
        $this->db->where($where,$value);
        return $this->db->get();
    }
    public function kodeMapel($kode_jadwal){
        $this->db->select('*')
        ->from('jadwal')
        ->join('kbm','jadwal.kode_kbm = kbm.kode_kbm')
        ->where("kode_jadwal = '$kode_jadwal'");
        return $this->db->get();
    }

	public function getDropDown($kode_guru){
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('kbm','jadwal.kode_kbm = kbm.kode_kbm');
        $this->db->join('guru','kbm.kode_guru = guru.kode_guru');
        $this->db->join('kelas','kbm.kode_kelas = kelas.kode_kelas');
        $this->db->join('siswa_kelas','data_mapel.kode_ta =siswa_kelas.kode_ta ');
        $this->db->join('mapel','kbm.kode_mapel = mapel.kode_mapel');
        $this->db->where("kbm.kode_guru = '$kode_guru'");
        $this->db->where("data_mapel.kode_ta = (select max(kode_ta) from data_mapel)");
        $this->db->where("siswa_kelas.kode_ta = (select max(kode_ta) from siswa_kelas)");
        $this->db->group_by('kbm.kode_kelas, kbm.kode_dataMapel');
        return $this->db->get();
    }
    public function jenisnilai(){
        $this->db->select('*');
        $this->db->from('jenis_nilai');
        return $this->db->get();
    }
    public function tahun_ajaran($kode_guru){
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('kbm','jadwal.kode_kbm = kbm.kode_kbm');
        $this->db->join('mapel','kbm.kode_mapel = mapel.kode_mapel');
        $this->db->join('kelas','jadwal.kode_kelas=kelas.kode_kelas');
        $this->db->join('tahun_ajaran','data_mapel.kode_ta=data_mapel.kode_ta');
        $this->db->where("jadwal.kode_guru = '$kode_guru'");
        $this->db->group_by('kbm.kode_mapel');
        return $this->db->get();
    }

    public function nilai_siswa($kode_kbm,$jenis,$kategori, $kelas){
    	return $this->db->query("
            SELECT kode_nilai, siswa.nis, nama, nama_mapel, nama_kategori , nama_jenis, nilai
            FROM nilai
            JOIN siswa ON nilai.nis = siswa.nis
            JOIN siswa_kelas ON siswa.nis = siswa_kelas.nis
            JOIN kbm ON nilai.kode_kbm = kbm.kode_kbm
            JOIN mapel ON kbm.kode_mapel = mapel.kode_mapel
            JOIN kategori using (kode_kategori)
            JOIN jenis_nilai using (kode_jenis)
            WHERE siswa_kelas.kode_kelas = '$kelas' 
            AND siswa.nis IN (
                SELECT nis FROM `nilai` WHERE kode_jenis = '$jenis' AND kode_kbm = '$kode_kbm' AND kode_kategori = '$kategori')
            AND siswa_kelas.kode_ta IN (
                SELECT kode_ta FROM `kbm` where kode_kbm = '$kode_kbm')
            GROUP BY siswa_kelas.nis
            ORDER BY siswa_kelas.nis ASC
        ");
        
    }
     public function nilai_siswa_new($kode_kbm,$kode_kategori,$kode_kelas,$kode_jenis){
        return $this->db->query("
            SELECT * 
            FROM nilai 
            JOIN siswa ON nilai.nis = siswa.nis
            JOIN siswa_kelas ON siswa.nis = siswa_kelas.nis
            JOIN kbm ON nilai.kode_kbm = kbm.kode_kbm
            JOIN mapel ON kbm.kode_mapel = mapel.kode_mapel
            JOIN kategori using (kode_kategori)
            JOIN jenis_nilai using (kode_jenis)
            WHERE nilai.kode_kbm = '$kode_kbm'
            AND nilai.kode_kategori = '$kode_kategori'
            AND kbm.kode_kelas = '$kode_kelas'
            AND nilai.kode_jenis = '$kode_jenis'
            ORDER BY siswa_kelas.nis ASC
        ");
        
    }
    public function edit_nilai($where,$value){
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->where($where,$value);
        return $this->db->get();
  }
  public  function update_nilai($id,$data){
       $this->db->where('kode_nilai',$id);
       $this->db->update('nilai',$data);
  }
    function delete_data($table,$where,$id){
      $this->db->where($where,$id);
      $this->db->delete($table);
    }
    function input_presensi ($assign_by,$tanggal){
        return $this->db->query("
            SELECT * FROM `siswa_kelas`
        JOIN `siswa` USING (nis)
        WHERE kode_kelas in 
            (SELECT kode_kelas FROM `kbm` WHERE kode_kbm = '$assign_by')
        AND kode_siswaKelas not IN 
            (SELECT kode_siswaKelas FROM `presensi` WHERE tanggal = '$tanggal' AND assign_by = '$assign_by')
        AND kode_ta in 
            (SELECT kode_ta FROM kbm WHERE kode_kbm = '$assign_by')
        ORDER BY nis ASC
        ");
    }
    function status(){
        $this->db->select('*')->from('status')->where("status != 'Aktif' AND status != 'Nonaktif' ");
        return $this->db->get();
    }
    public function tanggal_presensi($assign_by){
        $this->db->select('*');
        $this->db->from('presensi');
        $this->db->where("assign_by='$assign_by'");
        $this->db->group_by('tanggal');
        return $this->db->get();
    }
    public function v_presensi($assign_by,$tanggal){
        $this->db->select('*, status.status');
        $this->db->from('presensi');
        $this->db->join('status','presensi.kode_status=status.kode_status');
        $this->db->join('siswa_kelas','presensi.kode_siswaKelas=siswa_kelas.kode_siswaKelas');
        $this->db->join('siswa','siswa_kelas.nis=siswa.nis');
        $this->db->join('kbm','presensi.assign_by=kbm.kode_kbm');
        $this->db->where("tanggal='$tanggal'");
        $this->db->where("assign_by='$assign_by'");
        return $this->db->get();
    }
    public function edit_presensi($where,$value){
        $this->db->select('*');
        $this->db->from('presensi');
        $this->db->join('status', 'presensi.kode_status=status.kode_status');
        $this->db->where($where,$value);
        return $this->db->get();
    }
    public  function update_presensi($id,$data){
       $this->db->where('kode_presensi',$id);
       $this->db->update('presensi',$data);
  }
   public function bahan_mapel($kode_guru){
        $this->db->select('mapel.nama_mapel,kbm.kode_kbm');
        $this->db->from('kbm');
        $this->db->join('mapel','kbm.kode_mapel=mapel.kode_mapel');
        $this->db->where("kbm.kode_guru='$kode_guru'");
        $this->db->group_by('nama_mapel');
        return $this->db->get();
    }

     public function tabel_pertemuan(){
        $this->db->select('*');
        $this->db->from('pertemuan');
        return $this->db->get();
    }

    public function tabel_materi(){
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('pertemuan','materi.kode_mg = pertemuan.kode_mg');
        return $this->db->get();
    }
    public function data_materi($kode_kbm){
        $this->db->select('mapel.nama_mapel,kbm.kode_kbm,pertemuan.nama_pertemuan,materi.judul_materi,materi.file');
        $this->db->from('jadwal');
        $this->db->join('kbm','jadwal.kode_kbm=kbm.kode_kbm');
        $this->db->join('mapel','kbm.kode_mapel=mapel.kode_mapel');
        $this->db->join('materi','materi.kode_kbm=kbm.kode_kbm');
        $this->db->join('pertemuan','materi.kode_mg=pertemuan.kode_mg');
        $this->db->where("jadwal.kode_kbm='$kode_kbm'");
        return $this->db->get();
    }

   public function kbm ($kode_guru){
    $this->db->select('*');
    $this->db->from('kbm');
    $this->db->join('guru','kbm.kode_guru = guru.kode_guru');
    $this->db->join('tahun_ajaran','kbm.kode_ta = tahun_ajaran.kode_ta');
    $this->db->join('semester','kbm.kode_semester = semester.kode_semester');
    $this->db->join('kelas','kbm.kode_kelas = kelas.kode_kelas');
    $this->db->join('mapel','kbm.kode_mapel = mapel.kode_mapel');
     $this->db->where("kbm.kode_guru='$kode_guru'");
    return $this->db->get();
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
  public function foto($kode_guru){
    return $this->db->query("
    SELECT foto 
    FROM `guru`
    WHERE kode_guru = '$kode_guru'
    ");
  }
   public function jumlah_KBM(){
    $query = $this->db->query("select count(kode_kbm) jkbm from kbm");
    return $query;
  }
}