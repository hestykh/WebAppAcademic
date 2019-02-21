<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->library('session');
		$this->load->view('variasi');
	}

	public function index(){
		if($this->session->userdata('status') != "login"){
			$this->load->view('login');
		} else {
			$hakakses = $this->session->userdata('hakakses');
			
			if ($hakakses == 'guru'){
				redirect(base_url('c_guru'));
			} elseif ($hakakses == 'tatausaha') {
				redirect(base_url('c_kurikulum'));
			} elseif ($hakakses == 'siswa') {
				redirect(base_url('c_siswa'));
			} elseif ($hakakses == 'walikelas') {
				redirect(base_url('c_walikelas'));
			}

		}	
	}

	public function authenticate(){
		$drop_down=$this->input->post('role');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$whereSiswa = array(
				'nis' => $username,
				'password' => $password
			);

		$cekSiswa = $this->m_login->data_login('siswa',$whereSiswa)->num_rows();

		if (empty($cekSiswa)) {
			$whereGuru = array(
				'nip' => $username,
				'password' => $password
				);	

			$cekGuru = $this->m_login->data_login('guru',$whereGuru)->num_rows();
			if ($cekGuru>0) {
				$query = $this->m_login->data_login('guru',$whereGuru)->result();
				foreach ($query as $key) {
					$hakakses = $key->nama_role;

					if (($key->status == 'Aktif')){
						$nama = $key->nama;
						$kode_guru =$key->kode_guru;

						$data_session = array(
							'nama' => $nama,
							'kode_guru' =>$kode_guru,
							'status' => 'login',
							'hakakses' => $hakakses
						);
						$this->session->set_userdata($data_session);
						if ($hakakses == 'Guru'){
							redirect(base_url('c_guru'));
						} elseif ($hakakses == 'Tata Usaha') {
							redirect(base_url('c_kurikulum'));
						} 
					}else{
						echo "Tidak Aktif <br>";
						echo anchor('c_login','Login Ulang');
					}
				}
			}else{
				echo "username atau password salah <br>";
				echo anchor('c_login','Cik login deui');
			}
		} else {
			if ($cekSiswa > 0) {
				$query = $this->db->query("
					SELECT * 
					FROM `siswa` 
					JOIN `siswa_kelas` using (nis) 
					JOIN `role` ON `siswa`.role = `role`.kode_role 
					JOIN `status` ON `siswa`.status = `status`.kode_status 
					WHERE `nis` = '$username' AND `password` = '$password'
				")->result();
				foreach ($query as $key) {
					$hakakses = $key->nama_role;
					if (($key->status == 'Aktif')){
						$nama = $key->nama;
						$nis  = $key->nis;
						$kode_siswaKelas = $key->kode_siswaKelas;

						$data_session = array(
							'nama' => $nama,
							'nis' =>$nis,
							'kode_siswaKelas' =>$kode_siswaKelas,
							'status' => 'login',
							'hakakses' => $hakakses
						);
						$this->session->set_userdata($data_session);
						redirect(base_url('c_siswa/index'));
					}else{
						echo "Tidak Aktif <br>";
						echo anchor('c_login','Login Ulang');
					}
				}
			} else {
				echo "username atau password salah <br>";
				echo anchor('c_login','Cik login deui');
			}
		}



		/*$table = '';
		if (($drop_down == '1') or ($drop_down == '2')) {
			$where = array(
				'role' => $drop_down,
				'nip' => $username,
				'password' => ($password)
			);
			$table = 'guru';
			$cek = $this->m_login->data_login($table,$where)->num_rows();
			if ($cek>0) {
				$query = $this->m_login->data_login($table,$where)->result();
				foreach ($query as $key) {
					$hakakses = $key->nama_role;

					if (($key->status == 'Aktif')){
						$nama = $key->nama;
						$kode_guru =$key->kode_guru;

						$data_session = array(
							'nama' => $nama,
							'kode_guru' =>$kode_guru,
							'status' => 'login',
							'hakakses' => $hakakses
						);
						$this->session->set_userdata($data_session);
						if ($hakakses == 'Guru'){
							redirect(base_url('c_guru'));
						} elseif ($hakakses == 'Tata Usaha') {
							redirect(base_url('c_kurikulum'));
						} 
					}else{
						echo "Tidak Aktif <br>";
						echo anchor('c_login','Login Ulang');
					}
				}
			}else{
				echo "username atau password salah <br>";
				echo anchor('c_login','Cik login deui');
			}
		}elseif ($drop_down == '3') {
			$where = array(
				'role' => $drop_down,
				'nis' => $username,
				'password' => ($password)
			);
			$cek = $this->m_login->data_login('siswa',$where)->num_rows();
			// print_r($cek);
			if ($cek>0) {
				$query = $this->db->query("
					SELECT * 
					FROM `siswa` 
					JOIN `siswa_kelas` using (nis) 
					JOIN `role` ON `siswa`.role = `role`.kode_role 
					JOIN `status` ON `siswa`.status = `status`.kode_status 
					WHERE `role` = '$drop_down' AND `nis` = '$username' AND `password` = '$password'
				")->result();
				foreach ($query as $key) {
					$hakakses = $key->nama_role;
					if (($key->status == 'Aktif')){
						$nama = $key->nama;
						$nis  = $key->nis;
						$kode_siswaKelas = $key->kode_siswaKelas;

						$data_session = array(
							'nama' => $nama,
							'nis' =>$nis,
							'kode_siswaKelas' =>$kode_siswaKelas,
							'status' => 'login',
							'hakakses' => $hakakses
						);
						$this->session->set_userdata($data_session);
						redirect(base_url('c_siswa/index'));
					}else{
						echo "Tidak Aktif <br>";
						echo anchor('c_login','Login Ulang');
					}
				}
			}else{
				echo "username atau password salah <br>";
				echo anchor('c_login','Cik login deui');
			}
		}*/
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
}