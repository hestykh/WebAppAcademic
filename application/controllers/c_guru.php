<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_guru extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_guru');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$x=$this->session->userdata('kode_guru');
		$data['ta'] = $this->m_guru->getAllData('tahun_ajaran')->result();
		// $data['kelas'] = $this->m_guru->getDropDown($x)->result();
		$data['foto'] = $this->m_guru->foto($this->session->userdata('kode_guru'))->result();
		$data['jenisnilai'] = $this->m_guru->getAllData('jenis_nilai')->result();
		$data['kategori'] = $this->m_guru->getAllData('kategori')->result();
		$data['kbm'] = $this->m_guru->kbm($this->session->userdata('kode_guru'))->result();
		$this->load->view('guru/sidebar',$data);
		$this->load->view('guru/header');
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
		$this->load->view('guru/index');
	}
	public function form_profil(){
		$kode_guru = $this->session->userdata('kode_guru');
		$data['hasil'] = $this->m_guru->edit_guru('kode_guru',$kode_guru)->result();
		$this->load->view('guru/v_profil_guru',$data);
	}
	public function update_profil(){
		$id = $this->input->post('id');
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
				    $data 			= array(
						'kode_guru'		=>$this->input->post('kode_guru'),
						'nip'		 	=>$this->input->post('nip'),
						'nama' 			=>$this->input->post('nama'),
						'role'			=>$this->input->post('bagian'),
						'status'		=>$this->input->post('status'),
						'telepon'	    =>$this->input->post('telepon'),
						'agama'		    =>$this->input->post('agama'),
						'jenis_kelamin'	=>$this->input->post('kelamin'),
						'tempat_lahir' 	=>$this->input->post('tempat'),
						'tanggal_lahir' =>$this->input->post('tanggal'),
						'pendidikan'  	=>$this->input->post('pendidikan'),
						'alamat'	    =>$this->input->post('alamat'),
						'email'		    =>$this->input->post('email'),
						'foto'			=>$foto
					);
				$this->m_guru->update_dGuru($id, $data);
				redirect('c_guru/form_profil');				
			}
		}
	}

	public function input_nilai(){
		//mengambil value dari inputan 
		$kode_jenis		= $this->input->post('jenis_nilai');
		$kode_kbm		= $this->input->post('kode_kbm');
		$kode_kategori	= $this->input->post('kode_kategori');
		$query = $this->db->query("
			select nama_kelas, `kbm`.kode_kelas 
			from kbm join kelas using (kode_kelas)
			where kode_kbm = '$kode_kbm'");
		$kode_kelas = "";
		$nama_kelas = "";
		foreach ($query->result() as $key) {
			$kode_kelas = $key->kode_kelas;
			$nama_kelas = $key->nama_kelas;
		}
		$data = array(
			'kbm'=>$kode_kbm,
			'kelas'=>$nama_kelas,
			'kategori'=>$kode_kategori,
			'jenis_nilai'=>$kode_jenis
		);
		$this->session->set_userdata($data);
		$data['siswa'] = $this->m_guru->getSiswaNilai($kode_kbm,$kode_jenis,$kode_kategori,$kode_kelas)->result();
		$this->load->view('guru/input_nilai', $data);
		// print_r($data);
	}

	public function input_nilai_siswa(){
		if(isset($_POST['submit'])){
			$submittedData	= $this->input->post();
			foreach ($submittedData as $key => $value) {
				if(strpos($key, "nilai|")!==false){
					$nis = explode("|", $key)[1];
					$data = array(
						'kode_kategori'	=>$this->session->userdata('kategori'),
						'kode_jenis'	=>$this->session->userdata('jenis_nilai'),
						'nilai'			=>$value,
						'kode_kbm'		=>$this->session->userdata('kbm'),
						'nis'			=>$nis,
					);
					$this->m_guru->insert_data('nilai',$data);
				}
			}
			redirect(base_url().'c_guru');
		}
	}

	public function vnilai_siswa(){
		$kode_jenis		= $this->input->post('jenis_nilai');
		$kode_kbm		= $this->input->post('kode_kbm');
		$kode_kategori	= $this->input->post('kode_kategori');
		$query = $this->db->query("
			select nama_kelas, `kbm`.kode_kelas 
			from kbm join kelas using (kode_kelas)
			where kode_kbm = '$kode_kbm'");
		$kode_kelas1 = $this->input->post('kode_kelas');
		$kode_kelas = "";
		$nama_kelas = "";
		foreach ($query->result() as $key) {
			$kode_kelas = $key->kode_kelas;
			$nama_kelas = $key->nama_kelas;
		}
		$data = array(
			'kbm'=>$kode_kbm,
			'kelas'=>$nama_kelas,
			'kategori'=>$kode_kategori,
			'jenis_nilai'=>$kode_jenis
		);
		$this->session->set_userdata($data);
		//$data['nilai'] = $this->m_guru->nilai_siswa($kode_kbm,$kode_jenis,$kode_kategori,$kode_kelas)->result();
		$data['nilai'] = $this->m_guru->nilai_siswa_new($kode_kbm,$kode_kategori,$kode_kelas,$kode_jenis)->result();
		$this->load->view('Guru/v_nilai_siswa',$data);
	}
	public function form_edit_nilai(){
		$id = $this->uri->segment(3);
		$data['hasilnilai'] = $this->m_guru->edit_nilai('kode_nilai',$id)->result();
		 $this->load->view('guru/form_edit_nilai',$data);
	}

	public function update_nilai(){
		$id = $this->uri->segment(3);
		if(isset($_POST['submit'])){
			$kode_nilai		= $this->input->post('kode_nilai');
			$nilai			= $this->input->post('nilai');
			$data			= array(
				'nilai' 	=>$nilai,
			);
			$this->m_guru->update_nilai($kode_nilai, $data);
			redirect('c_guru/vnilai_siswa');
		}
	}
	public function delete_nilai(){
	  $id = $this->uri->segment(3);
	  $this->m_guru->delete_data('nilai','kode_nilai',$id);
	  redirect('c_guru/vnilai_siswa');
	}

	public function v_input_presensi(){
		$assign_by = $this->session->userdata('kode_guru');
	 	$kode_kbm = $this->input->post('kode_kbm');
		$tanggal= date("Y-m-d");
		$data = array(
			'tanggal'=>$tanggal,
			'kode_kbm'=> $kode_kbm
		);
	
		$this->session->set_userdata($data);
	 	$data['status'] = $this->m_guru->status()->result();
		$data['hasil'] = $this->m_guru->input_presensi($kode_kbm,$tanggal)->result();
		$this->load->view('Guru/input_presensi',$data);
	}
	 public function input_presensi(){
	 	if(isset($_POST['submit'])){
			$submittedData = $this->input->post();
			$kode_siswaKelas = "";
			$kode_status = "";
			$tanggal = date("Y-m-d");
			foreach ($submittedData as $key => $value) {
				if(strpos($key, "radio|")!==false){
					$kode_siswaKelas = explode("|", $key)[1];
					$kode_status = $value;

					$data = array(
						'tanggal'=>$tanggal,
						'jam'=>$this->input->post('jam'),
						'kode_status'=>$kode_status,
						'kode_siswaKelas'=>$kode_siswaKelas,
						'keterangan'=>$this->input->post('keterangan|'.$kode_siswaKelas),
						'assign_by'=>$this->session->userdata('kode_kbm')
					);
					$this->m_guru->insert_data('presensi',$data);
				}
			}
			redirect(base_url().'c_guru');
		}
	 }
	 public function tanggal_presensi(){
	 	$kode_jadwal = $this->input->post('kode_jadwal');
	 	$data_jadwal = array(
			'kode_jadwal'=>$kode_jadwal,
		);
	
		$this->session->set_userdata($data_jadwal);

	 	$data['Tanggal'] = $this->m_guru->tanggal_presensi($kode_jadwal)->result();
	 	$this->load->view('guru/v_tanggal_presensi',$data);
	 }
	 public function v_presensi(){
	 	$tanggal = $this->uri->segment(3);
	 	$assign_by = $this->session->userdata('kode_kbm');
		$data['jadwal'] = $this->m_guru->v_presensi($assign_by,$tanggal)->result();
		$data['jumlah_kbm'] = $this->m_guru->jumlah_kbm()->result();
		//$data['jadwal'] = $this->m_guru->presensi()->result();
	 	$this->load->view('Guru/v_presensi',$data);
	 }
	public function form_edit_presensi(){
		$id = $this->uri->segment(3);
		$data['status'] = $this->m_guru->status()->result();
		$data['hasilpresensi'] = $this->m_guru->edit_presensi('kode_presensi',$id)->result();
		$this->load->view('guru/form_edit_presensi',$data);
	}
	public function update_presensi(){
		$id = $this->uri->segment(3);
		if(isset($_POST['submit'])){
			$kode_presensi		    =$this->input->post('kode_presensi');
			$kode_status			= $this->input->post('status');
			$keterangan             = $this->input->post('keterangan');
			$data			= array(
				'kode_status' 	=>$kode_status,
				'keterangan'=>$keterangan
			);
			$this->m_guru->update_presensi($kode_presensi, $data);
			redirect('c_guru/v_presensi');
		}
	}
	public function delete_presensi(){
	  $id = $this->uri->segment(3);
	  $this->m_guru->delete_data('presensi','kode_presensi',$id);
	  redirect($this->agent->referrer());
	}
	public function bahan_ajar(){
	 	$kode_guru = $this->session->userdata('kode_guru');
	 	$nama_mapel = $this->input->post('nama_mapel');
	 	$kode_dataMapel = $this->input->post('kode_dataMapel');
	 	$data_guru = array(
			'kode_guru'=>$kode_guru,
			'nama_mapel'=>$nama_mapel,
			'kode_dataMapel'=>$kode_dataMapel
		);
		$this->session->set_userdata($kode_guru);
	 	$data['Mapel'] = $this->m_guru->bahan_mapel($kode_guru)->result();
	 	$this->load->view('guru/bahan_ajar',$data);
	 }
	 public function form_upload_materi(){
		$nama_pertemuan = $this->input->post('nama_pertemuan');
		$data['pertemuan'] = $this->m_guru->tabel_pertemuan()->result();
		$data_mg = array(
			'nama_pertemuan' => $nama_pertemuan
		);
		if(isset($_POST['submit'])){
			$config['upload_path']          = './materi/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']             = 3000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('userfile'))
                {
		            $this->load->view('v_upload_materi',$data);	
                }
                else
                {
					$id = $this->input->post('kode_dataMapel');
					$kode_mg = $this->input->post('kode_mg');
					$judul_materi = $this->input->post('nama_materi');
					$kode_kbm = $this->input->post('kode_kbm');
                    $materi_ajar = $this->upload->data();
		            $file ='materi/'.$materi_ajar['file_name'];
		            $data_materi = array(
						'judul_materi' => $judul_materi,
						'kode_kbm' => $kode_kbm,
						'kode_mg' => $kode_mg,
						'file' => $file
					);
					$this->m_guru->insert_data('materi', $data_materi);
					redirect('c_guru/materi_pertemuan');						
			}
            
		}
		$this->load->view('guru/v_upload_materi',$data);
	}

	public function materi_pertemuan(){
	 	$kode_guru = $this->session->userdata('kode_guru');
	 	$nama_mapel = $this->input->post('nama_mapel');
	 	$kode_kbm = $this->uri->segment(3);
	 	$data= array(
			'kode_guru'=>$kode_guru,
			'nama_mapel'=>$nama_mapel,
			'kode_kbm'=>$kode_kbm
		);
		$this->session->set_userdata($data);
	 	$data['Mapel'] = $this->m_guru->bahan_mapel($kode_guru)->result();
	 //	$data['Materi'] = $this->m_guru->data_materi($kode_dataMapel)->result();
	 	$data['Materi'] = $this->m_guru->tabel_materi()->result();
	 	
	 	$this->load->view('guru/v_materi_pertemuan',$data);
	 }
	public function download(){
		$file1=$this->uri->segment(3);
		$file2=$this->uri->segment(4);
		$file='/'.$file1.'/'.$file2;
		force_download($file,'download');
	}	
	public function jadwal_ngajar(){
		$kode_guru = $this->session->userdata('kode_guru');
		$where = array('kbm.kode_guru'=>$kode_guru);
		$data['jadwalSenin'] = $this->m_guru->jadwal($where, 'Senin')->result();
		$data['jadwalSelasa'] = $this->m_guru->jadwal($where, 'Selasa')->result();
		$data['jadwalRabu'] = $this->m_guru->jadwal($where, 'Rabu')->result();
		$data['jadwalKamis'] = $this->m_guru->jadwal($where, 'Kamis')->result();
		$data['jadwalJumat'] = $this->m_guru->jadwal($where, 'Jumat')->result();
		$this->load->view('Kurikulum/v_jadwal_ngajar',$data);
	}
}