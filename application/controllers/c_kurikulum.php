<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_kurikulum extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_kurikulum');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$data['foto'] = $this->m_kurikulum->foto($this->session->userdata('kode_guru'))->result();
		$data['guru'] = $this->m_kurikulum->get_where('guru', "role = '1'")->result();
		$data['kelas'] = $this->m_kurikulum->getAllData('kelas')->result();
		$data['kode_ta'] = $this->m_kurikulum->getAllData('tahun_ajaran')->result();
		$semester = $this->session->userdata('semester');
		$data['kbm'] = $this->m_kurikulum->kbm("kbm.kode_semester = '$semester'")->result();
		$this->load->view('kurikulum/sidebar',$data);
		$this->load->view('kurikulum/header');
		$this->load->view('variasi');

		if (date('m')==('01'||'02'||'03'||'04'||'05'||'06')) {
			$this->session->set_userdata('semester', '2');
		}else{
			$this->session->set_userdata('semester', '1');
		}

		if($this->session->userdata('status') != 'login'){
			redirect(base_url('c_login'));
		} elseif ($this->session->userdata('hakakses') == 'guru'){
			redirect(base_url('c_guru'));
		} elseif ($this->session->userdata('hakakses') == 'siswa'){
			redirect(base_url('c_siswa'));
		}elseif ($this->session->userdata('hakakses') == 'walikelas'){
			redirect(base_url('c_walikelas'));
		}
	}
	function goBack() {
    	window.history.back();
	}
	public function form_profil(){
		$kode_guru = $this->session->userdata('kode_guru');
		$data['hasil'] = $this->m_kurikulum->edit_guru('kode_guru',$kode_guru)->result();
		$this->load->view('Kurikulum/v_profil_kurikulum',$data);
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
				$this->m_kurikulum->update_dGuru($id, $data);
				redirect('c_kurikulum/form_profil');				
			}
		}
	}
	public function index(){
		$data['jumlah_guru']  = $this->m_kurikulum->jumlah_guru()->row_array();
		$data['jumlah_siswa'] = $this->m_kurikulum->jumlah_siswa()->row_array();
		$data['jumlah_nilai'] = $this->m_kurikulum->jumlah_nilai()->row_array();
		$this->load->view('Kurikulum/index',$data);
	}

	public function jadwal_ngajar(){
		$kode_guru = $this->input->post('kode_guru');
		$where = array('kbm.kode_guru'=>$kode_guru);
		$data['jadwalSenin'] = $this->m_kurikulum->jadwal($where, 'Senin')->result();
		$data['jadwalSelasa'] = $this->m_kurikulum->jadwal($where, 'Selasa')->result();
		$data['jadwalRabu'] = $this->m_kurikulum->jadwal($where, 'Rabu')->result();
		$data['jadwalKamis'] = $this->m_kurikulum->jadwal($where, 'Kamis')->result();
		$data['jadwalJumat'] = $this->m_kurikulum->jadwal($where, 'Jumat')->result();
		$this->load->view('Kurikulum/v_jadwal_ngajar',$data);
	}

	public function jadwal_kelas(){
		$kode_kelas = $this->input->post('kode_kelas');
		$where = array('kbm.kode_kelas'=>$kode_kelas);
		$data['jadwalSenin'] = $this->m_kurikulum->jadwal($where, 'Senin')->result();
		$data['jadwalSelasa'] = $this->m_kurikulum->jadwal($where, 'Selasa')->result();
		$data['jadwalRabu'] = $this->m_kurikulum->jadwal($where, 'Rabu')->result();
		$data['jadwalKamis'] = $this->m_kurikulum->jadwal($where, 'Kamis')->result();
		$data['jadwalJumat'] = $this->m_kurikulum->jadwal($where, 'Jumat')->result();
		$this->load->view('Kurikulum/v_jadwal_kelas',$data);

	}

	public function v_input_jadwal(){
		$where = array(
			'kbm.kode_kelas'=>$this->input->post('kode_kelas'),
			'kbm.kode_semester'=>$this->session->userdata('semester')
		);
		$data['kbm'] = $this->m_kurikulum->kbm($where)->result();
		$data['jam'] = $this->m_kurikulum->getAllData('jam')->result();
		$this->load->view('Kurikulum/Input_jadwaal',$data);
	}

	public function input_data_jadwal(){
		if(isset($_POST['submit'])){
			$data 			= array(
				'kode_kbm'	=> $this->input->post('kbm'),
				'hari'		=> $this->input->post('hari'),
				'kode_jam'	=> $this->input->post('jam')
			);
			$this->m_kurikulum->insertData('jadwal',$data);	
		}
			redirect(base_url().'c_kurikulum');
	}

	public function delete_jadwal(){
	  $id = $this->uri->segment(3);
	  $this->m_kurikulum->delete_data('jadwal','kode_jadwal',$id);
	  redirect($this->agent->referrer());
	}

	public function form_edit_jadwal(){
		$kode_jadwal = $this->uri->segment(3);
		$data['hasiljadwal'] = $this->m_kurikulum->tampilEditJadwal($kode_jadwal)->result();
		$data['kbm'] = $this->m_kurikulum->kbm($this->session->userdata('semester'))->result();
		$data['jam'] = $this->m_kurikulum->getAllData('jam')->result();
	    $this->load->view('Kurikulum/form_edit_jadwal',$data);
	}

	public function update_jadwal(){
		$id = $this->input->post('kode_jadwal');
		if(isset($_POST['submit'])){
			$data 			= array(
				'hari'		=> $this->input->post('hari'),
				'kode_jam' => $this->input->post('jam'),
				'kode_kbm'	=> $this->input->post('kbm')
			);
			$this->m_kurikulum->update_jadwal($id,$data);
			redirect('c_kurikulum/jadwal_ngajar');
		}
	}

	public function v_input_dataGuru(){
		$this->load->view('Kurikulum/input_data_guru');
	}

	public function input_data_guru(){
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
				    $data			= array(
						'kode_guru'		=>$this->input->post('kode_guru'),
						'nip'		 	=>$this->input->post('nip'),
						'password'		=>$this->input->post('nip'),
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
				$this->m_kurikulum->insertData('guru',$data);	
				redirect(base_url().'c_kurikulum/v_dataGuru');					
			}
		}
	//	redirect(base_url().'c_kurikulum');	
	}
	public function v_dataGuru(){
		$data['guru'] = $this->m_kurikulum->get_where('guru', "role = '1'")->result();
		$this->load->view('kurikulum/v_dataguru',$data);
	}
	public function form_edit_guru(){
		$kode_guru = $this->uri->segment(3);
		$data['hasil'] = $this->m_kurikulum->edit_guru('kode_guru',$kode_guru)->result();
		$this->load->view('Kurikulum/form_edit_dGuruu',$data);
	}
	public function update_dGuru(){
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
				$this->m_kurikulum->update_dGuru($id, $data);
				redirect('c_kurikulum/v_dataguru');				
			}
		}
	}
	public function delete_dGuru(){
	  $id = $this->uri->segment(3);
	  $this->m_kurikulum->delete_data('guru','kode_Guru',$id);
	  redirect('c_kurikulum/v_dataguru');
	}
	public function v_input_dataSiswa(){
		$data['kelas'] = $this->m_kurikulum->tampilkelas()->result();
		$this->load->view('Kurikulum/input_data_siswa',$data);
	}
	public function input_data_siswa(){
		if(isset($_POST['submit'])){
			$nama			= $this->input->post('nama');
			$nis  			= $this->input->post('nis');
			$agama			= $this->input->post('agama');
			$jenis_kelamin  = $this->input->post('kelamin');
			$tahun_masuk	= $this->input->post('tahun_masuk');
			$alamat  		= $this->input->post('alamat');
			$telepon	 	= $this->input->post('telepon');
			$status			= $this->input->post('status');
			$data			= array(
				'nis'		 	=>$nis,
				'password'		=>$nis,
				'nama' 			=>$nama,
				'agama'			=>$agama,
				'jenis_kelamin'	=>$jenis_kelamin,
				'tahun_masuk'	=>$tahun_masuk,
				'alamat'	    =>$alamat,
				'telepon'	    =>$telepon,
				'role'			=>'3',
				'status'		=>$status

			);
			$this->m_kurikulum->insertData('siswa',$data);	
			redirect(base_url().'c_kurikulum');
		}
	}
	public function v_datasiswa(){
		$data['siswa'] = $this->m_kurikulum->getAllData('siswa')->result();
		$this->load->view('kurikulum/v_datasiswa',$data);
	}
	public function form_edit_siswa(){
		$id = $this->uri->segment(3);
		$data['kelas'] = $this->m_kurikulum->dropDownSiswa()->result();
		$data['y'] = $this->m_kurikulum->edit_siswa('nis',$id)->result();
		 $this->load->view('Kurikulum/form_edit_siswa',$data);
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
				$this->m_kurikulum->update_siswa($id, $data);
				redirect('c_kurikulum/v_datasiswa');			
			}
		}
	}
	public function delete_siswa(){
	  $id = $this->uri->segment(3);
	  $this->m_kurikulum->delete_data('siswa','nis',$id);
	  redirect('c_kurikulum/v_datasiswa');
	}

	public function modal_Inputsiswa_kelas(){
		$kode_kelas = $this->input->post('kode_kelas');
		$kode_ta 	= $this->input->post('kode_ta');
		$session = array(
			'kode_kelas'=>$kode_kelas,
			'kode_ta'	=>$kode_ta
		);
		$this->session->set_userdata($session);
		$data['siswaKls'] = $this->m_kurikulum->getsiswaKelas($kode_kelas,$kode_ta)->result();
		$this->load->view('Kurikulum/input_siswa_kelas',$data);
	}

    public function input_siswaKelas(){
		if(isset($_POST['submit'])){
			$submittedData	= $this->input->post();
			foreach ($submittedData as $key => $value) {
				if(strpos($key, "pilih|")!==false){
					$nis = explode("|", $key)[1];
					$data = array(
						'kode_kelas'=>$this->input->post('kode_kelas'),
						'kode_ta' =>$this->input->post('kode_ta'),
						'nis' =>$nis,
					);
					$this->m_kurikulum->insertData('siswa_kelas',$data);
				}
			}	
			redirect(base_url().'c_kurikulum');
		}
	}

	public function v_SiswaKelas(){
		$kode_kelas = $this->input->post('kode_kelas');
		$kode_ta = $this->input->post('tahun_ajaran');

		$abc = $this->db->query("
			select * from siswa_kelas 
			join kelas using (kode_kelas) 
			join tahun_ajaran using (kode_ta) 
			where tahun_ajaran.kode_ta = '$kode_ta' and kelas.kode_kelas='$kode_kelas'");

		foreach ($abc->result() as $xyz) {
			$X = array(
				'nama_kelas' => $xyz->nama_kelas, 
				'tahun_ajaran' => $xyz->tahun_ajaran
			);
			$this->session->set_userdata($X);
		}

		$data['siswa_kelas'] = $this->m_kurikulum->lihat_siswaKelas($kode_kelas,$kode_ta)->result();
		$this->load->view('kurikulum/v_siswaKelas', $data);
	}
	public function form_edit_sisKelas(){
		$id = $this->uri->segment(3);
		$data['y'] = $this->m_kurikulum->edit_sisKelas('siswa_kelas.kode_siswaKelas',$id)->result();
		 $this->load->view('Kurikulum/form_edit_sisKelas',$data);
	}
	public function update_siswaKelas(){
		$id = $this->input->post('kode_siswaKelas');
		if(isset($_POST['submit'])){
			$kode_kelas			= $this->input->post('kode_kelas');
			$data			    = array(
				'kode_kelas'	=>$kode_kelas,
			);
			$this->m_kurikulum->update_siswaKelas($id, $data);
			redirect('c_kurikulum/v_datasiswa');
		}
	}
	public function delete_siswaKelas(){
	  $id = $this->uri->segment(3);
	  $this->m_kurikulum->delete_data('siswa_kelas','kode_siswaKelas',$id);
	  redirect($this->agent->referrer());
	}


	public function v_input_data_kbm(){
		$data['tahun_ajaran'] = $this->m_kurikulum->getAllData('tahun_ajaran')->result();
		$data['semester'] = $this->m_kurikulum->getAllData('semester')->result();
		$data['guru'] = $this->m_kurikulum->getAllData('guru')->result();
		$data['kelas'] = $this->m_kurikulum->getAllData('kelas')->result();
		$data['kode_mapel'] = $this->m_kurikulum->mapel()->result();
		$data['tahun_ajaran'] = $this->m_kurikulum->getAllData('tahun_ajaran')->result();
		$this->load->view('Kurikulum/input_kbm',$data);
	}
	public function input_data_kbm(){
		if(isset($_POST['submit'])){
			$kode_ta			= $this->input->post('kode_ta');
			$kode_semester  	= $this->input->post('kode_semester');
			$kode_guru          = $this->input->post('kode_guru');
			$kode_kelas			= $this->input->post('kode_kelas');
			$kode_mapel  	    = $this->input->post('kode_mapel');
			$data    			= array(
				'kode_ta' 			=>$kode_ta,
				'kode_semester'		=>$kode_semester,
				'kode_guru'     	=>$kode_guru,
				'kode_kelas'	    =>$kode_kelas,
				'kode_mapel'	     =>$kode_mapel
			);
			$this->m_kurikulum->insertData('kbm',$data);	
			redirect(base_url().'c_kurikulum');
		}
	}
	public function v_data_kbm(){
		$data['kbm'] = $this->m_kurikulum->tampil_kbm()->result();
		$this->load->view('kurikulum/v_data_kbm',$data);
	}
	public function form_edit_kbm(){
		$id = $this->uri->segment(3);
		$where = array('kbm.kode_kbm'=>$id);
		$data['kbm'] = $this->m_kurikulum->edit_kbm($where)->result();
		$data['tahun_ajaran'] = $this->m_kurikulum->getAllData('tahun_ajaran')->result();
		$data['semester'] = $this->m_kurikulum->getAllData('semester')->result();
		$data['guru'] = $this->m_kurikulum->getAllData('guru')->result();
		$data['kelas'] = $this->m_kurikulum->getAllData('kelas')->result();
		$data['kode_mapel'] = $this->m_kurikulum->mapel('')->result();
		$data['tahun_ajaran'] = $this->m_kurikulum->getAllData('tahun_ajaran')->result();
		$this->load->view('Kurikulum/form_edit_kbm',$data);
	}
	public function update_kbm(){
		if(isset($_POST['submit'])){
			$id					= $this->input->post('kode_kbm');
			$kode_ta			= $this->input->post('kode_ta');
			$kode_semester  	= $this->input->post('kode_semester');
			$kode_guru          = $this->input->post('kode_guru');
			$kode_kelas			= $this->input->post('kode_kelas');
			$kode_mapel  	= $this->input->post('kode_mapel');
			$data			= array(
				'kode_ta' 			=>$kode_ta,
				'kode_semester' 	=>$kode_semester,
				'kode_guru'     	=>$kode_guru,
				'kode_kelas'	    =>$kode_kelas,
				'kode_mapel '		=>$kode_mapel
			);
			$this->m_kurikulum->update_kbm($id, $data);
			redirect('c_kurikulum/v_data_kbm');
		}
	}
	public function delete_kbm(){
	  $id = $this->uri->segment(3);
	  $this->m_kurikulum->delete_data('kbm','kode_kbm',$id);
	  redirect('c_kurikulum/v_data_kbm');
	}
	public function v_input_tahun_ajaran(){
		$this->load->view('Kurikulum/input_tahun_ajaran');
	}
	public function input_tahun_ajaran(){
		if(isset($_POST['submit'])){
			$tahun_ajaran			= $this->input->post('kode_ta');
			$data    			= array(
				'tahun_ajaran' 			=>$tahun_ajaran
			);
			$this->m_kurikulum->insertData('tahun_ajaran',$data);	
			redirect(base_url().'c_kurikulum');
		}
	}
	public function v_tahun_ajaran(){
		$data['ta'] = $this->m_kurikulum->tampil_tahun_ajar()->result();
		$this->load->view('kurikulum/v_tahun_ajaran',$data);
	}

	public function form_edit_ta(){
		$id = $this->uri->segment(3);
		$where = array('tahun_ajaran.kode_ta'=>$id);
		$data['ta'] = $this->m_kurikulum->edit_ta($where)->result();
		$this->load->view('Kurikulum/form_edit_ta',$data);
	}
	public function update_ta(){
		if(isset($_POST['submit'])){
			$id					= $this->input->post('kode_ta');
			$tahun_ajaran		= $this->input->post('tahun_ajaran');
			$data			= array(
				'kode_ta' 			=>$kode_ta,
				'tahun_ajaran' 		=>$tahun_ajaran,
			);
			$this->m_kurikulum->update_ta($id, $data);
			redirect('c_kurikulum/v_tahun_ajaran');
		}
	}
	public function delete_ta(){
	  $id = $this->uri->segment(3);
	  $this->m_kurikulum->delete_data('tahun_ajaran','kode_ta',$id);
	  redirect('c_kurikulum/v_tahun_ajaran');
	}
	public function v_input_mapel(){
		$this->load->view('Kurikulum/input_mapel');
	}
	public function input_mapel(){
		if(isset($_POST['submit'])){
			$kode_mapel			= $this->input->post('kode_mapel');
			$nama_mapel			= $this->input->post('nama_mapel');
			$data    			= array(
				'kode_mapel'	=>$kode_mapel,	
				'nama_mapel'    =>$nama_mapel
			);
			$this->m_kurikulum->insertData('mapel',$data);	
			redirect(base_url().'c_kurikulum');
		}
	}
	public function v_mapel(){
		$data['mapel'] = $this->m_kurikulum->tampil_mapel()->result();
		$this->load->view('kurikulum/v_mapel',$data);
	}
	public function form_edit_mapel(){
		$id = $this->uri->segment(3);
		$where = array('mapel.kode_mapel'=>$id);
		$data['mapel'] = $this->m_kurikulum->edit_mapel($where)->result();
		$this->load->view('Kurikulum/form_edit_mapel',$data);
	}
	public function update_mapel(){
		if(isset($_POST['submit'])){
			$kode_mapel 		= $this->input->post('kode_mapel');
			$kode_mapel_new 	= $this->input->post('kode_mapel_new');
			$nama_mapel			= $this->input->post('nama_mapel');
			$data				= array(
				'kode_mapel' 			=>$kode_mapel_new,
				'nama_mapel' 			=>$nama_mapel
			);
			$this->m_kurikulum->update_mapel($kode_mapel, $data);
			redirect('c_kurikulum/v_mapel');
		}
	}
	public function delete_mapel(){
	  $id = $this->uri->segment(3);
	  $this->m_kurikulum->delete_data('mapel','kode_mapel',$id);
	  redirect('c_kurikulum/v_mapel');
	}
	public function v_input_kelas(){
		$this->load->view('Kurikulum/input_kelas');
	}
	public function input_kelas(){
		if(isset($_POST['submit'])){
			$kode_kelas		= $this->input->post('kode_kelas');
			$nama_kelas			= $this->input->post('nama_kelas');
			$data    			= array(
				'kode_kelas'	=>$kode_kelas,	
				'nama_kelas'    =>$nama_kelas
			);
			$this->m_kurikulum->insertData('kelas',$data);	
			redirect(base_url().'c_kurikulum');
		}
	}
	public function v_kelas(){
		$data['kelas'] = $this->m_kurikulum->getAllData('kelas')->result();
		$this->load->view('kurikulum/v_kelas',$data);
	}
	public function delete_kelas(){
	  $id = $this->uri->segment(3);
	  $this->m_kurikulum->delete_data('kelas','kode_kelas',$id);
	  redirect('c_kurikulum/v_kelas');
	}
	public function form_edit_kelas(){
		$id = $this->uri->segment(3);
		$where = array('kelas.kode_kelas'=>$id);
		$data['kelas'] = $this->m_kurikulum->get_where('kelas',$where)->result();
		$this->load->view('Kurikulum/form_edit_kelas',$data);
	}
	public function update_kelas(){
		if(isset($_POST['submit'])){
			$kode_kelas		 	= $this->input->post('kode_kelas');
			$where 				= array('kelas.kode_kelas'=>$kode_kelas);
			$nama_kelas			= $this->input->post('nama_kelas');
			$data				= array(
				'kode_kelas' 			=>$kode_kelas,
				'nama_kelas' 			=>$nama_kelas
			);
			$this->m_kurikulum->update_data($where,$kode_kelas, $data, 'kelas');
			redirect('c_kurikulum/v_kelas');
		}
	}
	public function data_nilai(){
		$kode_kategori    = $this->input->post('kode_kategori');
		$kode_semester    = $this->input->post('kode_semester');
		$kode_ta 		  = $this->input->post('kode_ta');

		$this->session->set_userdata('kode_kategori', $kode_kategori);

		$data['nilai'] = $this->m_siswa->nilai($kode_kategori,$kode_semester,$kode_ta, $this->session->userdata('nis'))->result();
		$this->load->view('siswa/nilai',$data);
	}
}