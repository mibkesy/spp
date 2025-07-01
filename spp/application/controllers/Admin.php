<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		if($this->session->userdata('status') != 'sudah_log') {
			redirect('login');
		}
	}

	public function load() {
		$list_events = $this->Admin_model->data_events();
		foreach ($list_events->result_array() as $row) {
			$data[] = array (
				'id'		=>	$row['id'],
				'title'		=>	$row['title'],
				'start'		=>	$row['datestart'],
				'end'		=>	$row['dateend'],
				'color'		=>	$row['color'],
			);
        }
        echo json_encode($data);
	}

	public function index() {
		$data = array (
			'title'				=>	'Dashboard',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'csiswa'			=>	$this->db->get('tb_siswa')->num_rows(),
			'ckelas'			=>	$this->db->get('tb_kelas')->num_rows(),
			'transaksi'			=>	$this->Admin_model->data_transaksi_home(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer');
	}

	public function kelas() {
		$data = array (
			'title'				=>	'Data Kelas',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/kelas', $data);
		$this->load->view('admin/footer');
	}

	public function kelas_add() {
		$data = array (
			'title'				=>	'Input Kelas',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('kelas', 'kelas', 'required|is_unique[tb_kelas.kelas]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Nama kelas sudah ada']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/kelas_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_kelas();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/kelas');
		}
	}

	public function kelas_edit($id) {
		$data = array (
			'title'				=>	'Edit Kelas',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelid'				=>	$this->db->get_where('tb_kelas',['id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('kelas', 'kelas', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/kelas_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_kelas($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/kelas');
		}
	}

	public function kelas_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('id', $id);
		$this->db->delete('tb_kelas');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/kelas');
	}

	public function siswa() {
		$data = array (
			'title'				=>	'Data Siswa',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'siswa'				=>	$this->Admin_model->data_siswa(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
			'bulan'				=>	$this->db->get('tb_bulan')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/siswa', $data);
		$this->load->view('admin/footer');
	}

	public function siswa_add() {
		$data = array (
			'title'				=>	'Input Siswa',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
		);
		$this->form_validation->set_rules('nis', 'nis', 'required|is_unique[tb_siswa.siswa_nis]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Nis siswa sudah ada']);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kelas', 'kelas', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('jk', 'jk', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/siswa_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_siswa();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/siswa');
		}
	}

	public function siswa_edit($id) {
		$data = array (
			'title'				=>	'Edit Siswa',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'siswaid'			=>	$this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array(),
		);
		$this->form_validation->set_rules('nis', 'nis', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kelas', 'kelas', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('jk', 'jk', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/siswa_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_siswa($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/siswa');
		}
	}

	public function siswa_bayar($id) {
		$data = array (
			'title'				=>	'Bayar SPP',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'sis'				=>	$this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
			'bulan'				=>	$this->db->get('tb_bulan')->result_array(),
		);
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('bulan', 'bulan', 'required', [
					'required'	=>	'Pilih salah satu bulan']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/bayar_spp', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->simpan_transaksi($id);
			$this->session->set_flashdata('flash', 'Transaksi baru berhasil ditambahkan');
			redirect('admin/transaksi');
		}
	}

	public function cetak_tagihan($id) {
		$bulansaatini = substr(date('m'), 1);
		$bulanlalu = $bulansaatini - 1;
		$bulanlalu2 = $bulansaatini - 2;
		$batas = 21;
		$cektaon = $this->Admin_model->cek_tahun_aktif();
		$cekspp = $this->db->get_where('tb_biaya_spp',['bspp_siswaid' => $id,'bspp_ta' => $cektaon['ta_tahun']])->row_array();
		// query pengecekan bulan spp yg sudh di bayarkan
		$cektrabu = $this->db->get_where('tb_transaksi_bulan',['trabu_siswa' => $id,'trabu_bulan' => $bulansaatini])->row_array();
		$cektrabulalu = $this->db->get_where('tb_transaksi_bulan',['trabu_siswa' => $id,'trabu_bulan' => $bulanlalu])->row_array();
		$cektrabulalu2 = $this->db->get_where('tb_transaksi_bulan',['trabu_siswa' => $id,'trabu_bulan' => $bulanlalu2])->row_array();
		// query pengecekan tagihan spp yg sudh diinputkan
		$cektaspini = $this->db->get_where('tb_tagihan_spp',['tspp_siswa' => $id,'tspp_bulan' => $bulansaatini])->row_array();
		$cektasplalu = $this->db->get_where('tb_tagihan_spp',['tspp_siswa' => $id,'tspp_bulan' => $bulanlalu])->row_array();
		$cektasplalu2 = $this->db->get_where('tb_tagihan_spp',['tspp_siswa' => $id,'tspp_bulan' => $bulanlalu2])->row_array();
		// pengecekan tagihan minimal 3 bulan yang telah lewat
		if($cektrabu) { // jika ada, no aksi!
		}else { // jika tidak ada
			if($cektaspini) { // jika tagihan bulan ini sudah ada, maka jangan input
					//
			}else { // jika tidak ada, input !
				$tdata = array (
					'tspp_siswa'		=>	$id,
					'tspp_ta'			=>	$cektaon['ta_tahun'],
					'tspp_jml'			=>	$cekspp['bspp_biaya'],
					'tspp_bulan'		=>	$bulansaatini,
				);
				$this->db->insert('tb_tagihan_spp', $tdata);
			}
		}

		if($cektrabulalu) { // jika ada, no aksi!
		}else { // jika tidak ada
			if($cektasplalu) { // jika tagihan bulan ini sudah ada, maka jangan input
					//
			}else { // jika tidak ada, input !
				$tdata = array (
					'tspp_siswa'		=>	$id,
					'tspp_ta'			=>	$cektaon['ta_tahun'],
					'tspp_jml'			=>	$cekspp['bspp_biaya'],
					'tspp_bulan'		=>	$bulanlalu,
				);
				$this->db->insert('tb_tagihan_spp', $tdata);
			}
		}
		if($cektrabulalu2) { // jika ada, no aksi!
		}else { // jika tidak ada
			if($cektasplalu2) { // jika tagihan bulan ini sudah ada, maka jangan input
					//
			}else { // jika tidak ada, input !
				$tdata = array (
					'tspp_siswa'		=>	$id,
					'tspp_ta'			=>	$cektaon['ta_tahun'],
					'tspp_jml'			=>	$cekspp['bspp_biaya'],
					'tspp_bulan'		=>	$bulanlalu2,
				);
				$this->db->insert('tb_tagihan_spp', $tdata);
			}
		}
		$totalstor = $this->Admin_model->hasil($id);
		$harusstor = $this->Admin_model->hasil2($id);
		$tagihstor = $harusstor - $totalstor;
		$data = array (
			'title'				=>	'Kartu',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'bulan'				=>	$this->Admin_model->data_bulan(),
			'tagstor'			=>	$tagihstor,
			'tagihanspp'		=>	$this->Admin_model->hasil3($id),
			// 'bulan'				=>	$this->db->get('tb_bulan')->result_array(),
			'siswa'				=>	$this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array(),
			'tasis'				=>	$this->db->get_where('tb_tagihan',['tagihan_siswa' => $id])->row_array(),
		);
		$this->load->view('admin/tagihan', $data);
	}

	public function cetak_kartu_kosong() {
		$data = array (
			'title'				=>	'Kartu',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'bulan'				=>	$this->db->get('tb_bulan')->result_array(),
		);
		$this->load->view('admin/cetak_kartu_kosong26', $data);
	}

	public function cetak_kartu_depan($id) {
		$data = array (
			'title'				=>	'Kartu',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'bulan'				=>	$this->db->get('tb_bulan')->result_array(),
			'kepsek'			=>	$this->db->get_where('tb_settings',['id' => 1])->row_array(),
			'siswa'				=>	$this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array(),
		);
		$this->load->view('admin/kartu_depan', $data);
	}

	public function cetak_kartu($id) {
		$data = array (
			'title'				=>	'Kartu',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'bulan'				=>	$this->libulancetak(),
		);
		$this->load->view('admin/cetak_kartu13', $data);
	}

	private function libulancetak() {
		$this->db->order_by('bulan_urut', 'ASC');
		return $this->db->get('tb_bulan')->result_array();
	}

	public function cetak_kartu_all($id) {
		$data = array (
			'title'				=>	'Kartu',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'bulan'				=>	$this->libulancetak(),
		);
		$this->load->view('admin/cetak_kartu15', $data);
	}

	public function siswa_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('siswa_nis', $id);
		$this->db->delete('tb_siswa');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/siswa');
	}

	public function action_import() {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$cektaon = $this->Admin_model->cek_tahun_aktif();
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('./assets/');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            //upload gagal
            $this->session->set_flashdata('error', 'PROSES IMPORT GAGAL! '.$this->upload->display_errors());
            //redirect halaman
            redirect('admin/siswa');
        } else {
            $data_upload = $this->upload->data();
            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./assets/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            $data = array();
            $numrow = 1;
            foreach($sheet as $row){
            	if($numrow > 1){
            		array_push($data, array(
            			'siswa_nis'				=> $row['A'],
            			'siswa_nama'			=> ucwords($row['B']),
            			'siswa_jk'				=> $row['C'],
            			'siswa_kelas'			=> $row['D'],
            		));
            	}
            	$numrow++;
            }
            if($this->db->insert_batch('tb_siswa', $data)) {
            	$data_upload = $this->upload->data();
	            $excelreader     = new PHPExcel_Reader_Excel2007();
	            $loadexcel         = $excelreader->load('./assets/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
	            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	            $data = array();
	            $numrow = 1;
            	foreach($sheet as $row){
	            	if($numrow > 1){
	            		array_push($data, array(
	            			'tagihan_siswa'				=> $row['A'],
	            			'tagihan_infaq'				=> 0,
	            			'tagihan_akademik'			=> 0,
	            			'tagihan_registrasi'		=> 0,
	            			'tagihan_ta'				=> $cektaon['ta_tahun'],
	            		));
	            	}
	            	$numrow++;
	            }
	            $this->db->insert_batch('tb_tagihan', $data);
            }
            //delete file from server
            unlink(realpath('./assets/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('flash', 'PROSES IMPORT BERHASIL!');
            //redirect halaman
            redirect('admin/siswa');
        }
    }

    public function biaya_spp() {
    	$cektaon = $this->Admin_model->cek_tahun_aktif();
		$data = array (
			'title'				=>	'Atur Biaya SPP Siswa',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'biaya'				=>	$this->db->get_where('tb_biaya_spp',['bspp_ta' => $cektaon['ta_tahun']])->result_array(),
			'siswa'				=>	$this->db->get('tb_siswa')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/biaya_spp', $data);
		$this->load->view('admin/footer');
	}

	public function biaya_spp_add() {
		$data = array (
			'title'				=>	'Input Biaya SPP Siswa',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'siswa'				=>	$this->db->get('tb_siswa')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->form_validation->set_rules('nis', 'nis', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tahun', 'tahun', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_spp_add', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$cek = $this->db->get_where('tb_biaya_spp',['bspp_siswaid' => $this->input->post('nis'), 'bspp_ta' => $this->input->post('tahun')])->row_array();
			if($cek) {
				$this->session->set_flashdata('error', 'Siswa dengan tahun pelajaran tersebut sudah ada');
				redirect('admin/master/biaya-spp/new');
			}else {
				$this->Admin_model->simpan_biaya_spp();
				$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
				redirect('admin/master/biaya-spp');
			}
		}
	}

	public function biaya_spp_edit($id) {
		$data = array (
			'title'				=>	'Edit Biaya SPP Siswa',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'siswa'				=>	$this->db->get('tb_siswa')->result_array(),
			'biaya'				=>	$this->db->get_where('tb_biaya_spp',['bspp_id' => $id])->row_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->form_validation->set_rules('nis', 'nis', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tahun', 'tahun', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_spp_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_biaya_spp($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/biaya-spp');
		}
	}

	public function impor_biaya_spp() {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$cektaon = $this->Admin_model->cek_tahun_aktif();
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('./assets/');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            //upload gagal
            $this->session->set_flashdata('error', 'PROSES IMPORT GAGAL! '.$this->upload->display_errors());
            //redirect halaman
            redirect('admin/master/biaya-spp');
        } else {
            $data_upload = $this->upload->data();
            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./assets/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            $data = array();
            $numrow = 1;
            foreach($sheet as $row){
            	if($numrow > 1){
            		array_push($data, array(
            			'bspp_siswaid'			=> $row['A'],
            			'bspp_ta'				=> $row['B'],
            			'bspp_biaya'			=> $row['C'],
            		));
            	}
            	$numrow++;
            }
            $this->db->insert_batch('tb_biaya_spp', $data);
            //delete file from server
            unlink(realpath('./assets/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('flash', 'PROSES IMPORT BERHASIL!');
            //redirect halaman
            redirect('admin/master/biaya-spp');
        }
    }

	public function biaya_spp_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('bspp_id', $id);
		$this->db->delete('tb_biaya_spp');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/biaya-spp');
	}

	public function biaya_infaq() {
    	$cektaon = $this->Admin_model->cek_tahun_aktif();
		$data = array (
			'title'				=>	'Atur Biaya Infaq',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'biaya'				=>	$this->db->get_where('tb_biaya_infaq',['binf_ta' => $cektaon['ta_tahun']])->result_array(),
			'siswa'				=>	$this->db->get('tb_siswa')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/biaya_infaq', $data);
		$this->load->view('admin/footer');
	}

	public function biaya_infaq_add() {
		$data = array (
			'title'				=>	'Input Biaya Infaq',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'siswa'				=>	$this->db->get('tb_siswa')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->form_validation->set_rules('nis', 'nis', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tahun', 'tahun', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_infaq_add', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$cek = $this->db->get_where('tb_biaya_infaq',['binf_siswaid' => $this->input->post('nis'), 'binf_ta' => $this->input->post('tahun')])->row_array();
			if($cek) {
				$this->session->set_flashdata('error', 'Siswa dengan tahun pelajaran tersebut sudah ada');
				redirect('admin/master/biaya-infaq/new');
			}else {
				$this->Admin_model->simpan_biaya_infaq();
				$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
				redirect('admin/master/biaya-infaq');
			}
		}
	}

	public function biaya_infaq_edit($id) {
		$data = array (
			'title'				=>	'Edit Biaya Infaq',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'siswa'				=>	$this->db->get('tb_siswa')->result_array(),
			'biaya'				=>	$this->db->get_where('tb_biaya_infaq',['binf_id' => $id])->row_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->form_validation->set_rules('nis', 'nis', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tahun', 'tahun', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_infaq_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_biaya_infaq($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/biaya-infaq');
		}
	}

	public function impor_biaya_infaq() {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$cektaon = $this->Admin_model->cek_tahun_aktif();
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('./assets/');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            //upload gagal
            $this->session->set_flashdata('error', 'PROSES IMPORT GAGAL! '.$this->upload->display_errors());
            //redirect halaman
            redirect('admin/master/biaya-infaq');
        } else {
            $data_upload = $this->upload->data();
            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./assets/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            $data = array();
            $numrow = 1;
            foreach($sheet as $row){
            	if($numrow > 1){
            		array_push($data, array(
            			'binf_siswaid'			=> $row['A'],
            			'binf_ta'				=> $row['B'],
            			'binf_biaya'			=> $row['C'],
            		));
            	}
            	$numrow++;
            }
            $this->db->insert_batch('tb_biaya_infaq', $data);
            //delete file from server
            unlink(realpath('./assets/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('flash', 'PROSES IMPORT BERHASIL!');
            //redirect halaman
            redirect('admin/master/biaya-infaq');
        }
    }

	public function biaya_infaq_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('binf_id', $id);
		$this->db->delete('tb_biaya_infaq');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/biaya-infaq');
	}

	public function biaya_akademik() {
    	$cektaon = $this->Admin_model->cek_tahun_aktif();
		$data = array (
			'title'				=>	'Atur Biaya Akademik',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'biaya'				=>	$this->db->get_where('tb_biaya_akademik',['baka_ta' => $cektaon['ta_tahun']])->result_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/biaya_akademik', $data);
		$this->load->view('admin/footer');
	}

	public function biaya_akademik_add() {
		$data = array (
			'title'				=>	'Input Biaya Akademik',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->form_validation->set_rules('kelas', 'kelas', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tahun', 'tahun', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_akademik_add', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$cek = $this->db->get_where('tb_biaya_akademik',['baka_kelas' => $this->input->post('kelas'), 'baka_ta' => $this->input->post('tahun')])->row_array();
			if($cek) {
				$this->session->set_flashdata('error', 'Kelas dengan tahun pelajaran tersebut sudah ada');
				redirect('admin/master/biaya-akademik/new');
			}else {
				$this->Admin_model->simpan_biaya_akademik();
				$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
				redirect('admin/master/biaya-akademik');
			}
		}
	}

	public function biaya_akademik_edit($id) {
		$data = array (
			'title'				=>	'Edit Biaya Akademik',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'biaya'				=>	$this->db->get_where('tb_biaya_akademik',['baka_id' => $id])->row_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->form_validation->set_rules('kelas', 'kelas', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tahun', 'tahun', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_akademik_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_biaya_akademik($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/biaya-akademik');
		}
	}

	public function impor_biaya_akademik() {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$cektaon = $this->Admin_model->cek_tahun_aktif();
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('./assets/');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            //upload gagal
            $this->session->set_flashdata('error', 'PROSES IMPORT GAGAL! '.$this->upload->display_errors());
            //redirect halaman
            redirect('admin/master/biaya-akademik');
        } else {
            $data_upload = $this->upload->data();
            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./assets/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            $data = array();
            $numrow = 1;
            foreach($sheet as $row){
            	if($numrow > 1){
            		array_push($data, array(
            			'baka_kelas'			=> $row['A'],
            			'baka_ta'				=> $row['B'],
            			'baka_biaya'			=> $row['C'],
            		));
            	}
            	$numrow++;
            }
            $this->db->insert_batch('tb_biaya_akademik', $data);
            //delete file from server
            unlink(realpath('./assets/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('flash', 'PROSES IMPORT BERHASIL!');
            //redirect halaman
            redirect('admin/master/biaya-akademik');
        }
    }

	public function biaya_akademik_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('baka_id', $id);
		$this->db->delete('tb_biaya_akademik');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/biaya-akademik');
	}

	public function biaya_registrasi() {
    	$cektaon = $this->Admin_model->cek_tahun_aktif();
		$data = array (
			'title'				=>	'Atur Biaya Registrasi',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'biaya'				=>	$this->db->get_where('tb_biaya_registrasi',['bare_ta' => $cektaon['ta_tahun']])->result_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/biaya_registrasi', $data);
		$this->load->view('admin/footer');
	}

	public function biaya_registrasi_add() {
		$data = array (
			'title'				=>	'Input Biaya Registrasi',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->form_validation->set_rules('kelas', 'kelas', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tahun', 'tahun', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_registrasi_add', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$cek = $this->db->get_where('tb_biaya_registrasi',['bare_kelas' => $this->input->post('kelas'), 'bare_ta' => $this->input->post('tahun')])->row_array();
			if($cek) {
				$this->session->set_flashdata('error', 'Kelas dengan tahun pelajaran tersebut sudah ada');
				redirect('admin/master/biaya-registrasi/new');
			}else {
				$this->Admin_model->simpan_biaya_registrasi();
				$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
				redirect('admin/master/biaya-registrasi');
			}
		}
	}

	public function biaya_registrasi_edit($id) {
		$data = array (
			'title'				=>	'Edit Biaya Registrasi',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'biaya'				=>	$this->db->get_where('tb_biaya_registrasi',['bare_id' => $id])->row_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->form_validation->set_rules('kelas', 'kelas', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('tahun', 'tahun', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_registrasi_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_biaya_registrasi($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/biaya-registrasi');
		}
	}

	public function impor_biaya_registrasi() {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$cektaon = $this->Admin_model->cek_tahun_aktif();
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('./assets/');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            //upload gagal
            $this->session->set_flashdata('error', 'PROSES IMPORT GAGAL! '.$this->upload->display_errors());
            //redirect halaman
            redirect('admin/master/biaya-registrasi');
        } else {
            $data_upload = $this->upload->data();
            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./assets/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            $data = array();
            $numrow = 1;
            foreach($sheet as $row){
            	if($numrow > 1){
            		array_push($data, array(
            			'bare_kelas'			=> $row['A'],
            			'bare_ta'				=> $row['B'],
            			'bare_biaya'			=> $row['C'],
            		));
            	}
            	$numrow++;
            }
            $this->db->insert_batch('tb_biaya_registrasi', $data);
            //delete file from server
            unlink(realpath('./assets/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('flash', 'PROSES IMPORT BERHASIL!');
            //redirect halaman
            redirect('admin/master/biaya-registrasi');
        }
    }

	public function biaya_registrasi_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('bare_id', $id);
		$this->db->delete('tb_biaya_registrasi');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/biaya-registrasi');
	}

	public function biaya_lain() {
		$data = array (
			'title'				=>	'Biaya Lain Lain',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'biaya'				=>	$this->db->get_where('tb_biaya_lain')->result_array(),
			'kelas'				=>	$this->db->get_where('tb_kelas')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/biaya_lain', $data);
		$this->load->view('admin/footer');
	}

	public function biaya_lain_add() {
		$data = array (
			'title'				=>	'Input Biaya Lain Lain',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
		);
		$this->form_validation->set_rules('kelas', 'kelas', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('ket', 'ket', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_lain_add', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$cek = $this->db->get_where('tb_biaya_lain',['bila_kelas' => $this->input->post('kelas'), 'bila_ket' => $this->input->post('ket')])->row_array();
			if($cek) {
				$this->session->set_flashdata('error', 'Biaya tersebut sudah ada pada kelas yang dipilih');
				redirect('admin/master/biaya-lainnya/new');
			}else {
				$this->Admin_model->simpan_ket_biaya();
				$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
				redirect('admin/master/biaya-lainnya');
			}
		}
	}

	public function biaya_lain_edit($id) {
		$data = array (
			'title'				=>	'Edit Biaya Lain Lain',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'bila'				=>	$this->db->get_where('tb_biaya_lain',['bila_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('kelas', 'kelas', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('biaya', 'biaya', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('ket', 'ket', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/biaya_lain_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_ket_biaya($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/biaya-lainnya');
		}
	}

	public function impor_biaya_lain() {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$cektaon = $this->Admin_model->cek_tahun_aktif();
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('./assets/');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            //upload gagal
            $this->session->set_flashdata('error', 'PROSES IMPORT GAGAL! '.$this->upload->display_errors());
            //redirect halaman
            redirect('admin/master/biaya-lainnya');
        } else {
            $data_upload = $this->upload->data();
            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./assets/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            $data = array();
            $numrow = 1;
            foreach($sheet as $row){
            	if($numrow > 1){
            		array_push($data, array(
            			'bila_ket'				=> $row['A'],
            			'bila_biaya'			=> $row['B'],
            			'bila_kelas'			=> $row['C'],
            		));
            	}
            	$numrow++;
            }
            $this->db->insert_batch('tb_biaya_lain', $data);
            //delete file from server
            unlink(realpath('./assets/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('flash', 'PROSES IMPORT BERHASIL!');
            //redirect halaman
            redirect('admin/master/biaya-lainnya');
        }
    }

	public function biaya_lain_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('bila_id', $id);
		$this->db->delete('tb_biaya_lain');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/biaya-lainnya');
	}

	public function akses() {
		$data = array (
			'title'				=>	'Data Akses',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'ladmin'			=>	$this->db->get('tb_admin')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/akses', $data);
		$this->load->view('admin/footer');
	}

	public function akses_add() {
		$data = array (
			'title'				=>	'Input Akses',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('username', 'username', 'required|is_unique[tb_admin.admin_username]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Username sudah digunakan sebelumnya']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/akses_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_akses();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/master/akses');
		}
	}

	public function akses_edit($id) {
		$data = array (
			'title'				=>	'Edit Akses',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'aksid'				=>	$this->db->get_where('tb_admin',['admin_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('username', 'username', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/akses_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_akses($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/akses');
		}
	}

	public function akses_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('admin_id', $id);
		$this->db->delete('tb_admin');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/akses');
	}

	public function transaksi() {
		$data = array (
			'title'				=>	'Data Transaksi',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'transaksi'			=>	$this->Admin_model->data_transaksi(),
			'siswa'				=>	$this->Admin_model->data_siswa(),
			'kelas'				=>	$this->db->get('tb_kelas')->result_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
			'bulan'				=>	$this->db->get('tb_bulan')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('admin/footer');
	}

	public function transaksi_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$cektrx = $this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array();
		$cektrabu = $this->db->get_where('tb_transaksi_bulan',['trabu_transaksiid' => $id])->row_array();
		$cektag = $this->db->get_where('tb_tagihan',['tagihan_siswa' => $cektrx['transaksi_siswaid']])->row_array();
		if($cektag['tagihan_infaq'] == 0) {
			$tinfaq = $cektrx['transaksi_infaq'];
		}else {
			$tinfaq = $cektag['tagihan_infaq'] + $cektrx['transaksi_infaq'];
		}
		if($cektag['tagihan_akademik'] == 0) {
			$takademik = $cektrx['transaksi_akademik'];
		}else {
			$takademik = $cektag['tagihan_akademik'] + $cektrx['transaksi_akademik'];
		}
		if($cektag['tagihan_registrasi'] == 0) {
			$tregis = $cektrx['transaksi_registrasi'];
		}else {
			$tregis = $cektag['tagihan_registrasi'] + $cektrx['transaksi_registrasi'];
		}

		$siswan = $cektrx['transaksi_siswaid'];
		$jml = $cektrx['transaksi_spp'];
		$blnn = $cektrabu['trabu_bulan'];
		$this->kembalikantagihan($siswan,$jml,$blnn);
		$this->db->set(['tagihan_infaq' => $tinfaq, 'tagihan_akademik' => $takademik, 'tagihan_registrasi' => $tregis]);
		$this->db->where('tagihan_siswa', $cektrx['transaksi_siswaid']);
		$this->db->update('tb_tagihan');
		$this->db->where('transaksi_id', $id);
		$this->db->delete('tb_transaksi');
		$this->db->where('trabu_transaksiid', $id);
		$this->db->delete('tb_transaksi_bulan');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/transaksi');
	}

	private function kembalikantagihan($siswan,$jml,$blnn) {
		$cektaon = $this->Admin_model->cek_tahun_aktif();
		$tadata = array (
			'tspp_siswa'		=>	$siswan,
			'tspp_ta'			=>	$cektaon['ta_tahun'],
			'tspp_jml'			=>	$jml,
			'tspp_bulan'		=>	$blnn,
		);
		$this->db->insert('tb_tagihan_spp', $tadata);
	}

	public function transaksiby($id) {
		$data = array (
			'title'				=>	'KWITANSI',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'transaksi'			=>	$this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array(),
		);
		$this->load->view('admin/kwitansi1', $data);
	}

	public function set_tahun() {
		$data = array (
			'title'				=>	'Pengaturan Tahun Pelajaran',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'tahun'				=>	$this->db->get('tb_tahun_pelajaran')->result_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/tahun', $data);
		$this->load->view('admin/footer');
	}

	public function set_tahun_add() {
		$data = array (
			'title'				=>	'Input Tahun Pelajaran',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('tahun', 'tahun', 'required|is_unique[tb_tahun_pelajaran.ta_tahun]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Tahun pelajaran sudah ada']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/tahun_add', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->simpan_tahun();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/pengaturan/tahun-pelajaran');
		}
	}

	public function set_tahun_edit($id) {
		$data = array (
			'title'				=>	'Edit Tahun Pelajaran',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'tahun'				=>	$this->db->get_where('tb_tahun_pelajaran',['ta_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('tahun', 'tahun', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/tahun_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_tahun($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/pengaturan/tahun-pelajaran');
		}
	}

	public function set_tahun_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('ta_id', $id);
		$this->db->delete('tb_tahun_pelajaran');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/pengaturan/tahun-pelajaran');
	}

	public function set_tahun_aktif($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$cek = $this->Admin_model->cek_tahun_aktif();
		$this->db->set('ta_status', 'AKTIF');
		$this->db->where('ta_id', $id);
		$this->db->update('tb_tahun_pelajaran');
		$this->db->set('ta_status', 'TIDAK AKTIF');
		$this->db->where('ta_id', $cek['ta_id']);
		$this->db->update('tb_tahun_pelajaran');
		redirect('admin/pengaturan/tahun-pelajaran');
	}

	public function agenda() {
		$data = array (
			'title'				=>	'Agenda',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'agenda'			=>	$this->Admin_model->data_agenda(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/agenda', $data);
		$this->load->view('admin/footer');
	}

	public function agenda_add() {
		$data = array (
			'title'				=>	'Buat Agenda',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('start', 'start', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('warna', 'warna', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/agenda_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_agenda();
			$this->session->set_flashdata('flash', 'Agenda baru berhasil ditambahkan');
			redirect('admin/agenda');
		}
	}

	public function agenda_edit($id) {
		$data = array (
			'title'				=>	'Edit Agenda',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'agenda'			=>	$this->db->get_where('tb_kalender',['id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('start', 'start', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('warna', 'warna', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/agenda_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_agenda($id);
			$this->session->set_flashdata('flash', 'Agenda berhasil diperbaharui');
			redirect('admin/agenda');
		}
	}

	public function agenda_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('id', $id);
		$this->db->delete('tb_kalender');
		$this->session->set_flashdata('flash', 'Agenda berhasil dihapus');
		redirect('admin/agenda');
	}

	public function lap_transaksi() {
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_transaksi', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksiby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_transaksi', $data);
			$this->load->view('admin/footer');
		}
	}

	public function lap_transaksi_print() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_print', $data);
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksiby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_print', $data);
		}
	}

	public function lap_transaksi_excel() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_excel', $data);
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksiby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_excel', $data);
		}
	}

	public function lap_transaksi_printby() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_print', $data);
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksiby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_print', $data);
		}
	}

	public function lap_transaksi_excelby() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_excel', $data);
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksiby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_excel', $data);
		}
	}

	public function transaksi_lainnya() {
		$data = array (
			'title'				=>	'Transaksi Lainnya',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'biaya'				=>	$this->db->get('tb_biaya_lain')->result_array(),
			'siswa'				=>	$this->Admin_model->data_siswa(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/list_siswa_transaksi_lainnya', $data);
		$this->load->view('admin/footer');
	}

	public function transaksi_lainnya_add($id) {
		$cek = $this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array();
		$data = array (
			'title'				=>	'Input Transaksi Lainnya',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'biayalain'			=>	$this->db->get_where('tb_biaya_lain',['bila_kelas' => $cek['siswa_kelas']])->result_array(),
			'siswa'				=>	$this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array(),
		);
		$this->form_validation->set_rules('tgl', 'tgl', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('jml', 'jml', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('ket', 'ket', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/transaksi_lain_add', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$hitungbila = $this->db->get_where('tb_transaksi_lain',['trala_nis' => $id, 'trala_ket' => $this->input->post('ket')])->result_array();
			$totalbilaket = 0;
			foreach($hitungbila as $hb) {
				$totalbilaket += $hb['trala_jml'];
			}
			$cektagihanbila = $this->db->get_where('tb_biaya_lain',['bila_ket' => $this->input->post('ket')])->row_array();
			$sisaket = $cektagihanbila['bila_biaya'] - $totalbilaket;
			if($this->input->post('jml') > $cektagihanbila['bila_biaya']) {
				$this->session->set_flashdata('error', 'Total yang harus di bayar untuk '.$this->input->post('ket').' tidak boleh lebih dari '.number_format($cektagihanbila['bila_biaya'],0,',','.'));
				redirect('admin/transaksi-lainnya/bayar/'.$id);
			}
			if($this->input->post('jml') > $sisaket) {
				$this->session->set_flashdata('error', 'Sisa yang harus di bayar untuk '.$this->input->post('ket').' tidak boleh lebih dari '.number_format($cektagihanbila['bila_biaya'],0,',','.'));
				redirect('admin/transaksi-lainnya/bayar/'.$id);
			}
			if($totalbilaket == $cektagihanbila['bila_biaya']) {
				$this->session->set_flashdata('error', 'Pembayaran untuk '.$this->input->post('ket').' sudah lunas atas nama '.$cek['siswa_nama']);
				redirect('admin/transaksi-lainnya/bayar/'.$id);
			}
			$this->Admin_model->simpan_trala($id);
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/transaksi-lainnya');
		}
	}

	public function transaksi_lainnya_edit($id) {
		$cektrala = $this->db->get_where('tb_transaksi_lain',['trala_id' => $id])->row_array();
		$cek = $this->db->get_where('tb_siswa',['siswa_nis' => $cektrala['trala_nis']])->row_array();
		$data = array (
			'title'				=>	'Edit Transaksi Lainnya',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'biayalain'			=>	$this->db->get_where('tb_biaya_lain',['bila_kelas' => $cek['siswa_kelas']])->result_array(),
			'siswa'				=>	$this->db->get_where('tb_siswa',['siswa_nis' => $cek['siswa_nis']])->row_array(),
			'tralaid'			=>	$this->db->get_where('tb_transaksi_lain',['trala_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('tgl', 'tgl', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('jml', 'jml', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('ket', 'ket', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/transaksi_lain_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->edit_trala($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/transaksi-lainnya');
		}
	}

	public function transaksi_lainnya_del($id) {
		$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
		if($cekunci['yn'] == 'YES') {
			$this->session->set_flashdata('error', 'Akses demo dibatasi');
			redirect('admin/dashboard');
		}
		$this->db->where('trala_id', $id);
		$this->db->delete('tb_transaksi_lain');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/transaksi-lainnya');
	}

	public function transaksi_lainnya_detail($id) {
		$cek = $this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array();
		$keter = $this->input->post('ket');
		if($keter == '') {
			$data = array (
				'title'				=>	'Rincian Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lain($id),
				'biaya'				=>	$this->db->get_where('tb_biaya_lain',['bila_kelas' => $cek['siswa_kelas']])->result_array(),
				'siswa'				=>	$this->Admin_model->data_siswa(),
				'keter'				=>	$keter,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/transaksi_lain', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'				=>	'Rincian Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lain_filter($id,$keter),
				'biaya'				=>	$this->db->get_where('tb_biaya_lain',['bila_kelas' => $cek['siswa_kelas']])->result_array(),
				'siswa'				=>	$this->Admin_model->data_siswa(),
				'keter'				=>	$keter,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/transaksi_lain', $data);
			$this->load->view('admin/footer');
		}
	}

	public function transaksi_lainnya_detail_print($id) {
		$cek = $this->db->get_where('tb_siswa',['siswa_nis' => $id])->row_array();
		$keter = $this->uri->segment(5);
		if($keter == '') {
			$data = array (
				'title'				=>	'Rincian Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lain($id),
				'biaya'				=>	$this->db->get_where('tb_biaya_lain',['bila_kelas' => $cek['siswa_kelas']])->result_array(),
				'siswa'				=>	$this->Admin_model->data_siswa(),
				'keter'				=>	$keter,
			);
			$this->load->view('admin/transaksi_lain_print', $data);
		}else {
			$data = array (
				'title'				=>	'Rincian Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lain_filter($id,$keter),
				'biaya'				=>	$this->db->get_where('tb_biaya_lain',['bila_kelas' => $cek['siswa_kelas']])->result_array(),
				'siswa'				=>	$this->Admin_model->data_siswa(),
				'keter'				=>	$keter,
			);
			$this->load->view('admin/transaksi_lain_print', $data);
		}
	}

	public function kwitansi_lainnya($id) {
		$data = array (
			'title'				=>	'KWITANSI',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'trala'				=>	$this->db->get_where('tb_transaksi_lain',['trala_id' => $id])->row_array(),
		);
		$this->load->view('admin/kwitansi2', $data);
	}

	public function lap_transaksi_lainnya() {
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lain_lap(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_transaksi_lain', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lainby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_transaksi_lain', $data);
			$this->load->view('admin/footer');
		}
	}

	public function lap_transaksi_lainnya_print() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lain_lap(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_lain_print', $data);
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lainby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_lain_print', $data);
		}
	}

	public function lap_transaksi_lainnya_excel() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lain_lap(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_lain_excel', $data);
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lainby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_lain_excel', $data);
		}
	}

	public function lap_transaksi_lainnya_printby() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lain_lain(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_lain_print', $data);
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lainby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_lain_print', $data);
		}
	}

	public function lap_transaksi_lainnya_excelby() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lain_lap(),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_lain_excel', $data);
		}else {
			$data = array (
				'title'				=>	'Laporan Transaksi Lainnya',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'transaksi'			=>	$this->Admin_model->data_transaksi_lainby(array($start,$end)),
				'mulai'				=>	$start,
				'sampai'			=>	$end,
			);
			$this->load->view('admin/lap_transaksi_lain_excel', $data);
		}
	}

	public function atur_kepsek() {
		$data = array (
			'title'				=>	'Atur Data Kepala Sekolah',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kepsek'			=>	$this->db->get_where('tb_settings',['id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/kepala_sekolah', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->simpan_kepsek();
		}
	}

	public function atur_profil() {
		$data = array (
			'title'				=>	'Atur Profil',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('username', 'username', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/set_profil', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->update_profil();
		}
	}

	public function atur_ttd() {
		$data = array (
			'title'				=>	'Atur Tanda Tangan',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('id', 'id', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/set_ttd', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->update_ttd();
		}
	}

	public function atur_pass() {
		$data = array (
			'title'				=>	'Atur Password',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->form_validation->set_rules('password1', 'password1', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'matches'	=>	'Konfirmasi password baru salah']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/set_password', $data);
			$this->load->view('admin/footer');
		}else {
			$cekunci = $this->db->get_where('tb_lock',['id' => 1])->row_array();
			if($cekunci['yn'] == 'YES') {
				$this->session->set_flashdata('error', 'Akses demo dibatasi');
				redirect('admin/dashboard');
			}
			$this->Admin_model->update_password();
		}
	}

	public function buku_panduan() {
		$data = array (
			'title'				=>	'Manual Book',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/manual', $data);
		$this->load->view('admin/footer');
	}
}