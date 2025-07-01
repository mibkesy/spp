<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function cek_semester_aktif() {
		$this->db->where('sms_status', 'AKTIF');
		return $this->db->get('tb_semester')->row_array();
	}

	public function cek_tahun_aktif() {
		$this->db->where('ta_status', 'AKTIF');
		return $this->db->get('tb_tahun_pelajaran')->row_array();
	}

	public function simpan_kelas() {
		$data = array (
			'kelas'		=>   strtoupper($this->input->post('kelas')),
		);
	
		$this->db->insert('tb_kelas', $data);
	}

	public function edit_kelas($id) {
		$data = array (
			'kelas'		=>   strtoupper($this->input->post('kelas')),
		);
	
		$this->db->where('id', $id);
		$this->db->update('tb_kelas', $data);
	}

	public function data_bulan() {
		$this->db->order_by('bulan_urut', 'ASC');
		return $this->db->get('tb_bulan')->result_array();
	}

	public function data_siswa() {
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_kelas', 'tb_kelas.id = tb_siswa.siswa_kelas');
		return $this->db->get()->result_array();
	}

	public function simpan_siswa() {
		$nis = $this->input->post('nis');
		$data = array (
			'siswa_nis'			=>   $nis,
			'siswa_nama'		=>   ucwords($this->input->post('nama')),
			'siswa_jk'			=>   $this->input->post('jk'),
			'siswa_kelas'		=>   $this->input->post('kelas'),
		);
	
		$this->db->insert('tb_siswa', $data);
		$this->simpan_tagihan_byone($nis);
	}

	private function simpan_tagihan_byone($nis) {
		$cektaon = $this->cek_tahun_aktif();
		$data = array (
			'tagihan_siswa'			=>   $nis,
			'tagihan_infaq'			=>   0,
			'tagihan_akademik'		=>   0,
			'tagihan_registrasi'	=>   0,
			'tagihan_ta'			=>   $cektaon['ta_tahun'],
		);
	
		$this->db->insert('tb_tagihan', $data);
	}

	public function edit_siswa($id) {
		$nisbaru = $this->input->post('nis');
		if($id == $nisbaru) {
			$data = array (
				'siswa_nis'			=>   $this->input->post('nis'),
				'siswa_nama'		=>   ucwords($this->input->post('nama')),
				'siswa_jk'			=>   $this->input->post('jk'),
				'siswa_kelas'		=>   $this->input->post('kelas'),
			);
		
			$this->db->where('siswa_nis', $id);
			$this->db->update('tb_siswa', $data);
		}else {
			$data = array (
				'siswa_nis'			=>   $this->input->post('nis'),
				'siswa_nama'		=>   ucwords($this->input->post('nama')),
				'siswa_jk'			=>   $this->input->post('jk'),
				'siswa_kelas'		=>   $this->input->post('kelas'),
			);
		
			$this->db->where('siswa_nis', $id);
			$this->db->update('tb_siswa', $data);
			$this->edit_tagihan_byone($id,$nisbaru);
		}
	}

	private function edit_tagihan_byone($id,$nisbaru) {
		$data = array (
			'tagihan_siswa'			=>   $nisbaru,
		);
	
		$this->db->where('tagihan_siswa', $id);
		$this->db->update('tb_tagihan', $data);
	}

	public function simpan_transaksi($id) {
		$ceksis = $this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array();
		$cektaon = $this->cek_tahun_aktif();
		$infaq = $this->db->get_where('tb_biaya_infaq',['binf_ta' => $cektaon['ta_tahun'],'binf_siswaid' => $id])->row_array();
		$akademik = $this->db->get_where('tb_biaya_akademik',['baka_ta' => $cektaon['ta_tahun'],'baka_kelas' => $ceksis['siswa_kelas']])->row_array();
		$regis = $this->db->get_where('tb_biaya_registrasi',['bare_ta' => $cektaon['ta_tahun'],'bare_kelas' => $ceksis['siswa_kelas']])->row_array();
		$cektagihan = $this->db->get_where('tb_tagihan',['tagihan_siswa' => $id, 'tagihan_ta' => $cektaon['ta_tahun']])->row_array();
		$cektrax = $this->db->get_where('tb_transaksi',['transaksi_siswaid' => $id, 'transaksi_ta' => $cektaon['ta_tahun']])->result_array();
		$totalinfaq = 0;
		$totalakademik = 0;
		$totalregis = 0;
		foreach($cektrax as $ctr) {
			$totalinfaq += $ctr['transaksi_infaq'];
			$totalakademik += $ctr['transaksi_akademik'];
			$totalregis += $ctr['transaksi_registrasi'];
		}
		$trxid = md5(rand());
		if($this->input->post('jinfaq') == '') {
			$tipinfaq = 0;
		}else {
			$tipinfaq = $this->input->post('jinfaq');
		}
		if($this->input->post('jakademik') == '') {
			$tipaka = 0;
		}else {
			$tipaka = $this->input->post('jakademik');
		}
		if($this->input->post('jregistrasi') == '') {
			$tipregi = 0;
		}else {
			$tipregi = $this->input->post('jregistrasi');
		}
		$total = $tipinfaq+$tipaka+$this->input->post('spp')+$tipregi;
		if($cektagihan['tagihan_infaq'] == 0) {
			if($totalinfaq == $infaq['binf_biaya']) {
				$taginfaq = 0;
			}else {
				$taginfaq = $this->input->post('tinfaq')-$this->input->post('jinfaq');
			}
		}else {
			$taginfaq = $cektagihan['tagihan_infaq'] - $this->input->post('jinfaq');
		}

		if($cektagihan['tagihan_akademik'] == 0) {
			if($totalakademik == $akademik['baka_biaya']) {
				$tagaka = 0;
			}else {
				$tagaka = $this->input->post('takademik')-$this->input->post('jakademik');
			}
		}else {
			$tagaka = $cektagihan['tagihan_akademik'] - $this->input->post('jakademik');
		}

		if($cektagihan['tagihan_registrasi'] == 0) {
			if($totalregis == $regis['bare_biaya']) {
				$tagreg = 0;
			}else {
				$tagreg = $this->input->post('tregistrasi')-$this->input->post('jregistrasi');
			}
		}else {
			$tagreg = $cektagihan['tagihan_registrasi'] - $this->input->post('jregistrasi');
		}

		$this->simpan_tagihan($id,$taginfaq,$tagaka,$tagreg);

		$cektagspp = $this->db->get_where('tb_tagihan_spp',['tspp_siswa' => $id, 'tspp_ta' => $cektaon['ta_tahun'], 'tspp_bulan' => $this->input->post('bulan')])->row_array();
		if($cektagspp) {
			$this->db->where('tspp_id', $cektagspp['tspp_id']);
			$this->db->delete('tb_tagihan_spp');
		}
		
		$data = array (
			'transaksi_id'				=>   $trxid,
			'transaksi_siswaid'			=>   $id,
			'transaksi_ta'				=>   $cektaon['ta_tahun'],
			'transaksi_tgl'				=>   $this->input->post('tanggal'),
			'transaksi_infaq'			=>   $this->input->post('jinfaq'),
			'transaksi_akademik'		=>   $this->input->post('jakademik'),
			'transaksi_spp'				=>   $this->input->post('spp'),
			'transaksi_registrasi'		=>   $this->input->post('jregistrasi'),
			'transaksi_total'			=>   $total,
			'tratagih_infaq'			=>   $taginfaq,
			'tratagih_akademik'			=>   $tagaka,
			'tratagih_registrasi'		=>   $tagreg,
			'transaksi_created'			=>   date('Y-m-d H:i:s'),
			'transaksi_updated'			=>   date('Y-m-d H:i:s'),
		);
	
		if($this->db->insert('tb_transaksi', $data)) {
			$relasi = array (
				'trabu_bulan'			=>	$this->input->post('bulan'),
				'trabu_transaksiid'		=>	$trxid,
				'trabu_siswa'			=>	$id,
			);
			$this->db->insert('tb_transaksi_bulan', $relasi);
		}
	}

	public function simpan_tagihan($id,$taginfaq,$tagaka,$tagreg) {
		$data = array (
			'tagihan_infaq'			=>   $taginfaq,
			'tagihan_akademik'		=>   $tagaka,
			'tagihan_registrasi'	=>   $tagreg,
		);
	
		$this->db->where('tagihan_siswa', $id);
		$this->db->update('tb_tagihan', $data);
	}

	public function simpan_biaya_spp() {
		$data = array (
			'bspp_siswaid'		=>   $this->input->post('nis'),
			'bspp_ta'			=>   $this->input->post('tahun'),
			'bspp_biaya'		=>   $this->input->post('biaya'),
		);
	
		$this->db->insert('tb_biaya_spp', $data);
	}

	public function edit_biaya_spp($id) {
		$data = array (
			'bspp_siswaid'		=>   $this->input->post('nis'),
			'bspp_ta'			=>   $this->input->post('tahun'),
			'bspp_biaya'		=>   $this->input->post('biaya'),
		);
	
		$this->db->where('bspp_id', $id);
		$this->db->update('tb_biaya_spp', $data);
	}

	public function simpan_biaya_infaq() {
		$data = array (
			'binf_siswaid'		=>   $this->input->post('nis'),
			'binf_ta'			=>   $this->input->post('tahun'),
			'binf_biaya'		=>   $this->input->post('biaya'),
		);
	
		$this->db->insert('tb_biaya_infaq', $data);
	}

	public function edit_biaya_infaq($id) {
		$data = array (
			'binf_siswaid'		=>   $this->input->post('nis'),
			'binf_ta'			=>   $this->input->post('tahun'),
			'binf_biaya'		=>   $this->input->post('biaya'),
		);
	
		$this->db->where('binf_id', $id);
		$this->db->update('tb_biaya_infaq', $data);
	}

	public function simpan_biaya_akademik() {
		$data = array (
			'baka_kelas'		=>   $this->input->post('kelas'),
			'baka_ta'			=>   $this->input->post('tahun'),
			'baka_biaya'		=>   $this->input->post('biaya'),
		);
	
		$this->db->insert('tb_biaya_akademik', $data);
	}

	public function edit_biaya_akademik($id) {
		$data = array (
			'baka_kelas'		=>   $this->input->post('kelas'),
			'baka_ta'			=>   $this->input->post('tahun'),
			'baka_biaya'		=>   $this->input->post('biaya'),
		);
	
		$this->db->where('baka_id', $id);
		$this->db->update('tb_biaya_akademik', $data);
	}

	public function simpan_biaya_registrasi() {
		$data = array (
			'bare_kelas'		=>   $this->input->post('kelas'),
			'bare_ta'			=>   $this->input->post('tahun'),
			'bare_biaya'		=>   $this->input->post('biaya'),
		);
	
		$this->db->insert('tb_biaya_registrasi', $data);
	}

	public function edit_biaya_registrasi($id) {
		$data = array (
			'bare_kelas'		=>   $this->input->post('kelas'),
			'bare_ta'			=>   $this->input->post('tahun'),
			'bare_biaya'		=>   $this->input->post('biaya'),
		);
	
		$this->db->where('bare_id', $id);
		$this->db->update('tb_biaya_registrasi', $data);
	}

	public function simpan_ket_biaya() {
		$data = array (
			'bila_ket'			=>   ucwords($this->input->post('ket')),
			'bila_biaya'		=>   $this->input->post('biaya'),
			'bila_kelas'		=>   $this->input->post('kelas'),
		);
	
		$this->db->insert('tb_biaya_lain', $data);
	}

	public function edit_ket_biaya($id) {
		$data = array (
			'bila_ket'			=>   ucwords($this->input->post('ket')),
			'bila_biaya'		=>   $this->input->post('biaya'),
			'bila_kelas'		=>   $this->input->post('kelas'),
		);
	
		$this->db->where('bila_id', $id);
		$this->db->update('tb_biaya_lain', $data);
	}

	public function simpan_akses() {
		$data = array (
			'admin_id'			=>   md5(rand()),
			'admin_nama'		=>   ucwords($this->input->post('nama')),
			'admin_username'	=>   strtolower($this->input->post('username')),
			'admin_password'	=>   password_hash('12345', PASSWORD_DEFAULT),
			'admin_foto'		=>   'admin-avatar.png',
			'admin_ttd'			=>   '',
		);
	
		$this->db->insert('tb_admin', $data);
	}

	public function edit_akses($id) {
		$data = array (
			'admin_nama'		=>   ucwords($this->input->post('nama')),
			'admin_username'	=>   strtolower($this->input->post('username')),
		);
	
		$this->db->where('admin_id', $id);
		$this->db->update('tb_admin', $data);
	}

	public function simpan_trala($id) {
		$cektaon = $this->cek_tahun_aktif();
		$data = array (
			'trala_id'			=>   md5(rand()),
			'trala_tgl'			=>   $this->input->post('tgl'),
			'trala_nis'			=>   $id,
			'trala_jml'			=>   $this->input->post('jml'),
			'trala_ket'			=>   $this->input->post('ket'),
			'trala_created'		=>   date('Y-m-d H:i:s'),
			'trala_ta'			=>   $cektaon['ta_tahun'],
		);
	
		$this->db->insert('tb_transaksi_lain', $data);
	}

	public function edit_trala($id) {
		$data = array (
			'trala_tgl'		=>   $this->input->post('tgl'),
			'trala_jml'		=>   $this->input->post('jml'),
			'trala_ket'		=>   $this->input->post('ket'),
		);
	
		$this->db->where('trala_id', $id);
		$this->db->update('tb_transaksi_lain', $data);
	}

	public function simpan_tahun() {
		$data = array (
			'ta_tahun'		=>   $this->input->post('tahun'),
			'ta_status'		=>   'TIDAK AKTIF',
		);
	
		$this->db->insert('tb_tahun_pelajaran', $data);
	}

	public function edit_tahun($id) {
		$data = array (
			'ta_tahun'		=>   $this->input->post('tahun'),
		);
	
		$this->db->where('ta_id', $id);
		$this->db->update('tb_tahun_pelajaran', $data);
	}

	public function data_transaksi_home() {
		$cek = $this->cek_tahun_aktif();
		$this->db->order_by('transaksi_updated', 'DESC');
		$this->db->where('transaksi_ta', $cek['ta_tahun']);
		$this->db->limit(10);
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function data_transaksi() {
		$cek = $this->cek_tahun_aktif();
		$this->db->order_by('transaksi_updated', 'DESC');
		$this->db->where('transaksi_ta', $cek['ta_tahun']);
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function data_kwitansi() {
		$this->db->order_by('transaksi_updated', 'DESC');
		$this->db->group_by('transaksi_tgl');
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function data_events() {
		$this->db->order_by('id');
		return $this->db->get('tb_kalender');
	}

	public function data_agenda() {
		$this->db->order_by('created', 'DESC');
		return $this->db->get('tb_kalender')->result_array();
	}

	public function simpan_agenda() {
		if($this->input->post('times')) {
			$start = $this->input->post('start').'T'.$this->input->post('times').':00';
		}else {
			$start = $this->input->post('start');
		}
		if($this->input->post('timee')) {
			$end = $this->input->post('end').'T'.$this->input->post('timee').':00';
		}else {
			$end = $this->input->post('end');
		}
		$data = array (
			'title'				=>   ucwords($this->input->post('judul')),
			'datestart'			=>   $start,
			'dateend'			=>   $end,
			'color'				=>   $this->input->post('warna'),
			'timestart'			=>   $this->input->post('times'),
			'timeend'			=>   $this->input->post('timee'),
			'sec_datestart'		=>   $this->input->post('start'),
			'sec_dateend'		=>   $this->input->post('end'),
		);
	
		$this->db->insert('tb_kalender', $data);
	}

	public function edit_agenda($id) {
		if($this->input->post('times')) {
			$start = $this->input->post('start').'T'.$this->input->post('times').':00';
		}else {
			$start = $this->input->post('start');
		}
		if($this->input->post('timee')) {
			$end = $this->input->post('end').'T'.$this->input->post('timee').':00';
		}else {
			$end = $this->input->post('end');
		}
		$data = array (
			'title'				=>   ucwords($this->input->post('judul')),
			'datestart'			=>   $start,
			'dateend'			=>   $end,
			'color'				=>   $this->input->post('warna'),
			'timestart'			=>   $this->input->post('times'),
			'timeend'			=>   $this->input->post('timee'),
			'sec_datestart'		=>   $this->input->post('start'),
			'sec_dateend'		=>   $this->input->post('end'),
		);
	
		$this->db->where('id', $id);
		$this->db->update('tb_kalender', $data);
	}

	public function data_transaksiby($daterange) {
		$cek = $this->cek_tahun_aktif();
		$this->db->where('transaksi_tgl >=', $daterange[0]);
		$this->db->where('transaksi_tgl <=', $daterange[1]);
		$this->db->order_by('transaksi_updated', 'DESC');
		$this->db->where('transaksi_ta', $cek['ta_tahun']);
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function hasil($id) {
		$this->db->select('SUM(trala_jml) as totalstor');
		$this->db->where('trala_nis', $id);
		$this->db->from('tb_transaksi_lain');
		return $this->db->get()->row()->totalstor;
	}

	public function hasil2($id) {
		$cek = $this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array();
		$this->db->select('SUM(bila_biaya) as harusstor');
		$this->db->where('bila_kelas', $cek['siswa_kelas']);
		$this->db->from('tb_biaya_lain');
		return $this->db->get()->row()->harusstor;
	}

	public function hasil3($id) {
		$this->db->select('SUM(tspp_jml) as tagspp');
		$this->db->where('tspp_siswa', $id);
		$this->db->from('tb_tagihan_spp');
		return $this->db->get()->row()->tagspp;
	}

	public function data_transaksi_lain_lap() {
		$cek = $this->cek_tahun_aktif();
		$this->db->order_by('trala_created', 'DESC');
		$this->db->where('trala_ta', $cek['ta_tahun']);
		return $this->db->get('tb_transaksi_lain')->result_array();
	}

	public function data_transaksi_lain($id) {
		$this->db->order_by('trala_created', 'DESC');
		$this->db->where('trala_nis', $id);
		return $this->db->get('tb_transaksi_lain')->result_array();
	}

	public function data_transaksi_lain_filter($id,$keter) {
		$this->db->order_by('trala_created', 'DESC');
		$this->db->where('trala_nis', $id);
		$this->db->where('trala_ket', $keter);
		return $this->db->get('tb_transaksi_lain')->result_array();
	}

	public function data_transaksi_lainby($daterange) {
		$cek = $this->cek_tahun_aktif();
		$this->db->where('trala_tgl >=', $daterange[0]);
		$this->db->where('trala_tgl <=', $daterange[1]);
		$this->db->order_by('trala_created', 'DESC');
		$this->db->where('trala_ta', $cek['ta_tahun']);
		return $this->db->get('tb_transaksi_lain')->result_array();
	}

	public function simpan_kepsek() {
		// get foto
	    $config['upload_path'] = 'assets/img/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'kepsek'		=>	ucwords($this->input->post('nama')),
                    'nik'			=>	$this->input->post('nik'),
					'ttd'			=>	$gambar['file_name'],
                );
                $this->db->where('id', 1);
				$this->db->update('tb_settings', $data);
				$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
				redirect('admin/pengaturan/kepala-sekolah');
           }
	    }else {
	    	$data = array(
                'kepsek'		=>	ucwords($this->input->post('nama')),
                'nik'			=>	$this->input->post('nik'),
				'ttd'			=>	$this->input->post('gambar_old'),
	        );
	        $this->db->where('id', 1);
			$this->db->update('tb_settings', $data);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/pengaturan/kepala-sekolah');
	    }
	}

	public function update_profil() {
		$sandi = $this->input->post('password');
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array();

		if(password_verify($sandi, $cek['admin_password'])) {

			// get foto
		    $config['upload_path'] = 'assets/img/';
		    $config['allowed_types'] = 'jpg|png|jpeg|gif';
		    $config['encrypt_name'] = TRUE;
		
		    $this->upload->initialize($config);
		    if (!empty($_FILES['gambar']['name'])) {
		        if ( $this->upload->do_upload('gambar') ) {
		            $gambar = $this->upload->data();
		                
		            $data = array(
	                    'admin_nama'			=>	ucwords($this->input->post('nama')),
	                    'admin_username'		=>	strtolower($this->input->post('username')),
						'admin_foto'			=>	$gambar['file_name'],
	                );
	                $this->db->where('admin_id', $this->session->userdata('id'));
					$this->db->update('tb_admin', $data);
					$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
					redirect('admin/atur/profil');
	           }
		    }else {
		    	$data = array(
	                'admin_nama'			=>	ucwords($this->input->post('nama')),
                    'admin_username'		=>	strtolower($this->input->post('username')),
					'admin_foto'			=>	$this->input->post('gambar_old'),
		        );
		        $this->db->where('admin_id', $this->session->userdata('id'));
				$this->db->update('tb_admin', $data);
				$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
				redirect('admin/atur/profil');
		    }
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password salah');
			redirect('admin/atur/profil');
		}
	}

	public function update_ttd() {
		// get foto
	    $config['upload_path'] = 'assets/img/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
					'admin_ttd'			=>	$gambar['file_name'],
                );
                $this->db->where('admin_id', $this->session->userdata('id'));
				$this->db->update('tb_admin', $data);
				$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
				redirect('admin/atur/ttd');
           }
	    }else {
	    	 $data = array(
				'admin_ttd'			=>	$gambar['file_name'],
            );
	        $this->db->where('admin_id', $this->session->userdata('id'));
			$this->db->update('tb_admin', $data);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/atur/ttd');
	    }
	}

	public function update_password() {
		$sandi = $this->input->post('password');
		$sandi2 = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array();

		if(password_verify($sandi, $cek['admin_password'])) {
			$this->db->set('admin_password', $sandi2);
			$this->db->where('admin_id', $this->session->userdata('id'));
			$this->db->update('tb_admin');
			$this->session->set_flashdata('flash', 'Password anda berhasil diperbaharui');
			redirect('admin/atur/password');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password lama salah');
			redirect('admin/atur/password');
		}
	}
}