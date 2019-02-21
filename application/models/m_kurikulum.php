<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kurikulum extends CI_Model {

	function getAllData($table){
    return $this->db->get($table);
  }

  public function get_where($table, $where){
    return $this->db->get_where($table, $where);
  }

  public function get_limit($table, $limit, $order_by){
    $this->db->select($table)
      ->order_by($order_by)
      ->limit($limit);
    return $this->db->get();
  }

  function insertData($table,$data){
    $this->db->insert($table,$data);
  }

  function delete_data($table,$where,$id){
    $this->db->where($where,$id);
    $this->db->delete($table);
  }

  public function update_data($where,$id,$data,$table){
       $this->db->where($where,$id);
       $this->db->update($table,$data);
  }

	public function tampilmapel(){
		return $this->db->get('mapel');
	}

	public function tampilkelas(){
		return $this->db->get('kelas');
	}
  public function foto($kode_guru){
    return $this->db->query("
    SELECT foto 
    FROM `guru`
    WHERE kode_guru = '$kode_guru'
    ");
  }

	// public function side_guru(){
 //    return $this->db->query("
 //      SELECT *
 //      FROM `guru`
 //      WHERE 
 //    ");
 //  }

  public function tampilguru(){
      $this->db->select('*');
      $this->db->from('guru');
      $this->db->group_by('nip');
      return $this->db->get();
  }

  public function edit_guru($where,$value){
    $this->db->select('*');
    $this->db->from('guru');
    $this->db->join('role', 'guru.role = role.kode_role');
    $this->db->where($where,$value);
    return $this->db->get();
  }
  public  function update_dGuru($id,$data){
       $this->db->where('kode_guru',$id);
       $this->db->update('guru',$data);
  }
  public function tampilsiswa(){
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->group_by('nis');
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
  public  function update_siswaKelas($id,$data){
       $this->db->where('kode_siswaKelas',$id);
       $this->db->update('siswa_kelas',$data);
  }
  public function update_jadwal($id,$data){
      $this->db->where('kode_jadwal',$id);
      $this->db->update('jadwal',$data);
  }
  public function mapel(){
  $this->db->select('*');
  $this->db->from('mapel');
  return $this->db->get();
  }
  public function kelas(){
    $this->db->select('*');
    $this->db->from('siswa_kelas');
    $this->db->join('kelas','siswa_kelas.kode_kelas=kelas.kode_kelas');
    return $this->db->get();
  }
  public function guru(){
    $this->db->select('*');
    $this->db->from('guru');
    $this->db->where("role='1'");
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

  public function jadwalKelas($where, $hari){
    $this->db->select('*')
      ->from('jadwal')
      ->join('jam','jadwal.kode_jam = jam.kode_jam')
      ->join('kbm','jadwal.kode_kbm = kbm.kode_kbm')
      ->join('guru','kbm.kode_guru = guru.kode_guru')
      ->join('kelas','kbm.kode_kelas = kelas.kode_kelas')
      ->join('data_mapel','kbm.kode_dataMapel = data_mapel.kode_dataMapel')
      ->join('mapel','data_mapel.kode_mapel = mapel.kode_mapel')
      ->where($where)
      ->where("hari = '$hari'")
      // ->group_by('kbm.kode_kelas')
      ->order_by('jam.jam_mulai' ,'asc');
    return $this->db->get();
  }

  public function kbm($where){
    $this->db->select('*');
    $this->db->from('kbm');
    $this->db->join('guru','kbm.kode_guru = guru.kode_guru');
    $this->db->join('tahun_ajaran','kbm.kode_ta = tahun_ajaran.kode_ta');
    $this->db->join('semester','kbm.kode_semester = semester.kode_semester');
    $this->db->join('kelas','kbm.kode_kelas = kelas.kode_kelas');
    $this->db->join('mapel','kbm.kode_mapel = mapel.kode_mapel');
    $this->db->where("kbm.kode_ta = (select max(kode_ta) from tahun_ajaran)");
    $this->db->where($where);
    return $this->db->get();
    }
  
  public function tampilEditJadwal($kode_jadwal){
      $this->db->select('*')
      ->from('jadwal')
      ->join('jam','jadwal.kode_jam = jam.kode_jam')
      ->join('kbm','jadwal.kode_kbm = kbm.kode_kbm')
      ->join('guru','kbm.kode_guru = guru.kode_guru')
      ->join('kelas','kbm.kode_kelas = kelas.kode_kelas')
      ->join('mapel','kbm.kode_mapel = mapel.kode_mapel')
      ->where("kode_jadwal='$kode_jadwal'");
      return $this->db->get();
    }
    public function edit_jadwal_ngajar($where,$value){
      $this->db->select('*');
      $this->db->from('jadwal');
      $this->db->join('guru','jadwal.kode_guru=guru.kode_guru');
      $this->db->join('mapel','jadwal.kode_mapel=mapel.kode_mapel');
      $this->db->join('kelas','jadwal.kode_kelas=kelas.kode_kelas');
      $this->db->order_by('guru.nama','asc');
      $this->db->order_by("field(jadwal.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat')");
      $this->db->order_by('jadwal.jam_mulai' ,'asc');
    $this->db->where($where,$value);
    return $this->db->get();
  }
  public function dropDownSiswa(){
    $this->db->select('*');
    $this->db->from('kelas');
    return $this->db->get();
  } 
  public function getsiswaKelas ($kode_kelas,$kode_ta){
    return $this->db->query("
      SELECT * 
      FROM `siswa`
      WHERE nis NOT IN (
          SELECT nis FROM `siswa_kelas` 
          WHERE kode_kelas = '$kode_kelas' 
          AND kode_ta >= '$kode_ta' 
          OR left(kode_kelas, 1) IN (
            SELECT left(kode_kelas,1) from `siswa_kelas`))
      OR nis NOT IN (
          SELECT nis FROM `siswa_kelas`)"
    );
  }

  public function lihat_siswaKelas ($kode_kelas,$tahun_ajaran){
  //untuk menampilkan siswa pada kelas $kode_kelas yang belum memiliki(not in) kelas dan tahun ajaran
    return $this->db->query("
      SELECT * 
      FROM `siswa`
      JOIN `siswa_kelas` ON `siswa`.nis=`siswa_kelas`.nis 
      JOIN `kelas` ON `siswa_kelas`.kode_kelas=`kelas`.kode_kelas 
      JOIN `tahun_ajaran` ON `siswa_kelas`.kode_ta=`tahun_ajaran`.kode_ta
      WHERE `siswa_kelas`.kode_ta = '$tahun_ajaran' 
      AND `siswa_kelas`.kode_kelas = '$kode_kelas'");
    }

    public function edit_sisKelas($where,$value){
    $this->db->select('*');
    $this->db->from('siswa_kelas');
    $this->db->join('siswa','siswa_kelas.nis = siswa.nis');
    $this->db->join('kelas','siswa_kelas.kode_kelas = kelas.kode_kelas');
    $this->db->where($where,$value);
    return $this->db->get();
  }
  public function tampil_kbm (){
    $this->db->select('*');
    $this->db->from('kbm');
    $this->db->join('guru','kbm.kode_guru = guru.kode_guru');
    $this->db->join('tahun_ajaran','kbm.kode_ta = tahun_ajaran.kode_ta');
    $this->db->join('semester','kbm.kode_semester = semester.kode_semester');
    $this->db->join('kelas','kbm.kode_kelas = kelas.kode_kelas');
    $this->db->join('mapel','kbm.kode_mapel = mapel.kode_mapel');
    $this->db->order_by('kbm.kode_kelas','asc');
    return $this->db->get();
  }

  public function edit_kbm($kode_kbm){
    $this->db->select('*');
    $this->db->from('kbm');
    $this->db->join('guru','kbm.kode_guru = guru.kode_guru');
    $this->db->join('tahun_ajaran','kbm.kode_ta = tahun_ajaran.kode_ta');
    $this->db->join('semester','kbm.kode_semester = semester.kode_semester');
    $this->db->join('kelas','kbm.kode_kelas = kelas.kode_kelas');
    $this->db->join('mapel','kbm.kode_mapel = mapel.kode_mapel');
    $this->db->where($kode_kbm);
    return $this->db->get();
  }
  public  function update_kbm($id,$data){
    $this->db->where('kode_kbm',$id);
    $this->db->update('kbm',$data);
  }
public function tampil_tahun_ajar (){
    $this->db->select('*');
    $this->db->from('tahun_ajaran');
    $this->db->order_by('kode_ta','asc');
    return $this->db->get();
  }
  public function edit_ta($kode_ta){
    $this->db->select('*');
    $this->db->from('tahun_ajaran');
    $this->db->where($kode_ta);
    return $this->db->get();
  }
  public  function update_ta($id,$data){
    $this->db->where('kode_ta',$id);
    $this->db->update('tahun_ajaran',$data);
  }
  public function tampil_mapel (){
    $this->db->select('*');
    $this->db->from('mapel');
    return $this->db->get();
  }
  public function edit_mapel($kode_mapel){
    $this->db->select('*');
    $this->db->from('mapel');
    $this->db->where($kode_mapel);
    return $this->db->get();
  }
  public  function update_mapel($id,$data){
    $this->db->where('kode_mapel',$id);
    $this->db->update('mapel',$data);
  }
  public function jumlah_guru(){
    $query = $this->db->query("select count(kode_guru) jguru from guru");
    return $query;
  }

  public function jumlah_siswa(){
    $query = $this->db->query("select count(nis) jsiswa from siswa");
    return $query;
  }

  public function jumlah_nilai(){
    $query = $this->db->query("select count(kode_nilai) jnilai from nilai");
    return $query;
  }

  public function dnilai($kode_ta,$kode_kelas){
    return $this->db->query("
     SELECT * 
      FROM `nilai`
      JOIN `kbm` using (kode_kbm)
      JOIN `mapel` using (kode_mapel)
      WHERE `kbm`.kode_ta = '$kode_ta'
      AND 'kbm'.kode_kelas = '$kode_kelas'
      ORDER BY nama_mapel ASC
    ");
  }
}


