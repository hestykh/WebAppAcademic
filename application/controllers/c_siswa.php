<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_siswa');
		$this->load->library('pagination');
		$data['foto'] = $this->m_siswa->GetAllData_id('siswa','nis',$this->session->userdata('nis'))->result();
		$data['kategori'] = $this->m_siswa->getAllData('kategori')->result();
		$data['kode_ta'] = $this->m_siswa->getAllData('tahun_ajaran')->result();
		$data['semester'] =$this->m_siswa->getAllData('semester')->result();
		$this->load->view('siswa/sidebar',$data);
		$this->load->view('siswa/header');
		$this->load->view('variasi');

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('c_login'));
		} elseif ($this->session->userdata('hakakses') == 'kurikulum'){
			redirect(base_url('c_kurikulum'));
		} elseif ($this->session->userdata('hakakses') == 'siswa'){
			redirect(base_url('c_siswa'));
		}elseif ($this->session->userdata('hakakses') == 'walikelas'){
			redirect(base_url('c_walikelas'));
		}
	}

	public function index(){
		$this->load->view('siswa/index');	
	}

	public function profil_siswa(){
		$nis = $this->session->userdata('nis');
		$data['kelas'] = $this->m_siswa->dropDownSiswa()->result();
		$data['y'] = $this->m_siswa->edit_siswa('nis',$nis)->result();
		 $this->load->view('siswa/v_profil_siswa',$data);
	}
	public function update_siswa(){
		$id = $this->input->post('nis');
		if(isset($_POST['submit'])){
			$config['upload_path']          = './android/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 30000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            $foto=$this->input->post('userfoto');
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfoto'))
                {	
                	echo $this->upload->display_errors();
                }else{
		            $profil = $this->upload->data();
		            $foto   = 'android/'.$profil['file_name'];
		            $nama			= $this->input->post('nama');
					$nis  			= $this->input->post('nis_baru');
					$agama			= $this->input->post('agama');
					$jenis_kelamin  = $this->input->post('jenis_kelamin');
					$tahun_masuk	= $this->input->post('tahun_masuk');
					$alamat  		= $this->input->post('alamat');
					$telepon	 	= $this->input->post('telepon');
					$status			= $this->input->post('status');
				    $data 			= array(
						'nis'		 	=>$nis,
						'nama' 			=>$nama,
						'agama'			=>$agama,
						'jenis_kelamin'	=>$jenis_kelamin,
						'tahun_masuk'	=>$tahun_masuk,
						'telepon'	    =>$telepon,
						'alamat'	    =>$alamat,
						'status'		=>$status,
						'foto'			=>$foto
					);
				$this->m_siswa->update_siswa($id, $data);
				redirect('c_siswa/profil_siswa');			
			}
		}
	}

	public function modal_nilai(){
		$kode_kategori    = $this->input->post('kode_kategori');
		$kode_semester    = $this->input->post('kode_semester');
		$kode_ta 		  = $this->input->post('kode_ta');

		$this->session->set_userdata('kode_kategori', $kode_kategori);

		$data['nilai'] = $this->m_siswa->nilai($kode_kategori,$kode_semester,$kode_ta, $this->session->userdata('nis'))->result();
		$this->load->view('siswa/nilai',$data);
	}
	public function back_nilai(){
		$kode_ta = $this->uri->segment(5);
		$kode_semester = $this->uri->segment(4);
		$kode_kategori = $this->session->userdata('kode_kategori');
		$nis = $this->session->userdata('nis');

		$data['nilai'] = $this->m_siswa->nilai($kode_kategori,$kode_semester,$kode_ta, $nis)->result();
		$this->load->view('siswa/nilai',$data);
	}
	
	public function v_nilai_old(){
		$kode_kbm = $this->uri->segment(3);
		$data['nilaiMapel'] = $this->m_siswa->vnilai($this->session->userdata('nis'), $kode_kbm, $this->session->userdata('kode_kategori'))->result();
		$this->load->view('siswa/v_nilai',$data);
	}

	public function v_nilai(){
		$kode_kbm = $this->uri->segment(3);
		$kode_kategori = $this->session->userdata('kode_kategori');
		$nis = $this->session->userdata('nis');

		$data['nilai_kd1'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'kd1')->row_array();
		$data['nilai_kd2'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'kd2')->row_array();
		$data['nilai_kd3'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'kd3')->row_array();
		$data['nilai_kd4'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'kd4')->row_array();
		$data['nilai_kd5'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'kd5')->row_array();
		$data['nilai_kd6'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'kd6')->row_array();
		$data['nilai_kd7'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'kd7')->row_array();
		$data['nilai_kd8'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'kd8')->row_array();
		$data['nilai_uts'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'uts')->row_array();
		$data['nilai_uas'] = $this->m_siswa->vnilai_new($nis, $kode_kbm, $kode_kategori,'uas')->row_array();
		$data['nilai_rapot'] = $this->m_siswa->nilai_rapot($nis, $kode_kbm, $kode_kategori)->row_array();	
		$this->load->view('siswa/v_nilai_new',$data);
	}

	public function presensi(){
		$kode_siswaKelas = $this->session->userdata('kode_siswaKelas');
		$data['presensi'] = $this->m_siswa->presensi($kode_siswaKelas)->result();
		$this->load->view('siswa/presensi',$data);
	}
	function myFunction() {
    window.open("http://localhost:8080/akademik/index.php/c_siswa/vpresensi");
}
	public function vpresensi(){
		$kode_presensi = $this->uri->segment(3);
		$data['hasil'] = $this->m_siswa->vpresensi($kode_presensi)->result();
		$this->load->view('siswa/v_presensi',$data);
	}
	public function jadwal_kelas(){
		$kode_siswaKelas = $this->session->userdata('kode_siswaKelas');
		$query = $this->db->query("
			SELECT kode_kelas 
			FROM siswa_kelas 
			WHERE kode_siswaKelas = '$kode_siswaKelas'");
		$kode_kelas = "";
		foreach ($query->result() as $key) {
			$kode_kelas = $key->kode_kelas;
		}
		$where = array(
			'kbm.kode_kelas'=>$kode_kelas
		);
		$data['jadwalSenin'] = $this->m_siswa->jadwal($where, 'Senin')->result();
		$data['jadwalSelasa'] = $this->m_siswa->jadwal($where, 'Selasa')->result();
		$data['jadwalRabu'] = $this->m_siswa->jadwal($where, 'Rabu')->result();
		$data['jadwalKamis'] = $this->m_siswa->jadwal($where, 'Kamis')->result();
		$data['jadwalJumat'] = $this->m_siswa->jadwal($where, 'Jumat')->result();
		$this->load->view('siswa/v_jadwal_kelas',$data);
	}
	public function bahan_ajar(){
	 	$kode_siswaKelas = $this->session->userdata('kode_siswaKelas');
	 	$nama_mapel = $this->input->post('nama_mapel');
	 	$query = $this->db->query("
			SELECT kode_kelas 
			FROM siswa_kelas 
			WHERE kode_siswaKelas = '$kode_siswaKelas'");
	 	$kode_kelas = "";
		foreach ($query->result() as $key) {
			$kode_kelas = $key->kode_kelas;
		}
	 	$data_guru = array(
			'kode_siswaKelas'=>$kode_siswaKelas,
			'nama_mapel'=>$nama_mapel,
			
		);
		$this->session->set_userdata($kode_kelas);
	 	$data['Mapel'] = $this->m_siswa->bahan_mapel($kode_kelas)->result();
	 	$this->load->view('siswa/bahan_ajar',$data);
	 }
	 public function materi_pertemuan(){
	 	$kode_siswaKelas = $this->session->userdata('kode_siswaKelas');
	 	$nama_mapel = $this->input->post('nama_mapel');
	 	$kode_kbm = $this->uri->segment(3);
	 	$query = $this->db->query("
			SELECT kode_kelas 
			FROM siswa_kelas 
			WHERE kode_siswaKelas = '$kode_siswaKelas'");
	 	$kode_kelas = "";
		foreach ($query->result() as $key) {
			$kode_kelas = $key->kode_kelas;
		}
	 	$data = array(
			'kode_siswaKelas'=>$kode_siswaKelas,
			'nama_mapel'=>$nama_mapel,
			
		);
		$this->session->set_userdata($data);
	 	$data['Mapel'] = $this->m_siswa->bahan_mapel($kode_kelas)->result();
	 //	$data['Materi'] = $this->m_guru->data_materi($kode_dataMapel)->result();
	 	$data['Materi'] = $this->m_siswa->tabel_materi()->result();
	 	
	 	$this->load->view('siswa/v_materi_pertemuan',$data);
	 }
}
	