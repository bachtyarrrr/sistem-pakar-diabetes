<?php


class Halaman extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('LoginModel');
		$this->load->helper('url_helper');
		$this->load->helper('text');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->model('Konsultasi_model');
		$this->load->model('Jawaban_model');
		$this->load->model('Admin_model');
	}

	public function view()
	{

		if (!empty($this->session->userdata('username'))) {
			$data['user'] = $this->Admin_model->getAllUser()->num_rows();
			$data['pertanyaan'] = $this->Admin_model->getAllPertanyaan()->num_rows();
			$data['penyakit'] = $this->Admin_model->getAllPenyakit()->num_rows();
			$data['diagnosa'] = $this->Admin_model->getAllDiagnosa()->num_rows();
			$this->load->view('pages/static/header');
			$this->load->view('pages/forms/home', $data);
			$this->load->view('pages/static/footer');
		} else {
			redirect('/');
		}
	}


	public function home()
	{

		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;
		$this->load->view('pages/front/header', $data);
		$this->load->view('pages/front/awal');
		$this->load->view('pages/front/footer');
	}


	public function dashboard()
	{
		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;
		$this->load->view('pages/front/header', $data);
		$this->load->view('pages/front/dashboard', $data);
		$this->load->view('pages/front/footer');
	}


	public function test()
	{
		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;



		$username = $this->session->userdata('username');
		$this->db->select('*');
		$this->db->from('riwayatjawaban');
		$this->db->where('username', $username);
		$qCek = $this->db->get();

		if ($qCek->num_rows() > 0) {


			$this->load->view('pages/front/header', $data);
			$this->load->view('pages/front/test', $data);
			$this->load->view('pages/front/footer');
		} else {


			$row = $this->Konsultasi_model->baris();

			$config['base_url'] = base_url() . 'Halaman/test';
			$config['total_rows'] = $row;
			$config['per_page'] = 1;
			$start = $this->uri->segment(2);
			$this->pagination->initialize($config);

			$data['konsul'] = $this->Konsultasi_model->konsul_pertanyaan($config['per_page'], $start);
			$data['totalhalaman'] = $row;
			$data['halaman'] = $start;



			$this->load->view('pages/front/header', $data);
			$this->load->view('pages/front/test', $data);
			$this->load->view('pages/front/footer');
		}
	}


	public function cekgula()
	{
		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;



		$username = $this->session->userdata('username');


		$row = $this->Konsultasi_model->baris();

		$config['base_url'] = base_url() . 'Halaman/test';
		$config['total_rows'] = $row;
		$config['per_page'] = 1;
		$start = $this->uri->segment(2);
		$this->pagination->initialize($config);

		$data['konsul'] = $this->Konsultasi_model->konsul_pertanyaan($config['per_page'], $start);
		$data['totalhalaman'] = $row;
		$data['halaman'] = $start;



		$this->load->view('pages/front/header', $data);
		$this->load->view('pages/front/cek_gula', $data);
		$this->load->view('pages/front/footer');
	}

	public function hasil_gula()
	{
		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from  peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;

		if (!empty($this->session->userdata('username'))) {

			$info = $this->db->query("select * from  peserta where email='$email'")->row_array();

			$id = $info['id_peserta'];
			$umur = $info['usia'];
			$kadar_gula = $this->input->post('kadar_gula');

			if ($umur < 20 && $kadar_gula <= 70) {

				$hasil = 'Rendah';
			} else if ($umur < 20 && $kadar_gula >= 170) {

				$hasil = 'Tinggi';
			} else if ($umur > 20 && $kadar_gula <= 100) {

				$hasil = 'Rendah';
			} else if ($umur > 20 && $kadar_gula >= 180) {

				$hasil = 'Tinggi';
			} else {

				$hasil = 'Normal';
			}


			$tgl = date('Y-m-d');
			$waktu = date('H:i:s');

			$cek = $this->db->query("select count(id_log) as hasil from log_gula where id_peserta='$id' and tanggal='$tgl'")->row()->hasil;

			if ($cek < 1) {

				$this->db->query("INSERT INTO log_gula VALUES ('0', '$id', '$kadar_gula', '$hasil','$tgl','$waktu')");
			}

			$this->load->view('pages/front/header', $data);
			$this->load->view('pages/front/hasil_gula', $data);
			$this->load->view('pages/front/footer');
		} else {
			redirect('/');
		}
	}


	public function jawaban()
	{
		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from  peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;

		if (!empty($this->session->userdata('username'))) {

			$username = $this->session->userdata('username');

			$this->Jawaban_model->jawabanUser();
			$data['jawabanUser'] = $this->Jawaban_model->tampilJawaban();
			$this->db->select('*');
			$this->db->from('riwayatjawaban');
			$this->db->where('username', $username);
			$this->db->where('jawaban', 'YA');
			$qCek = $this->db->get();

			if ($qCek->num_rows() > 0) {


				$query1 = $this->db->query("SELECT kodePertanyaan from riwayatjawaban where jawaban ='YA' and username='$username'");
				foreach ($query1->result() as $row) {
					$a = $row->kodePertanyaan;
					$b[] = $a;
				}
				$bca = implode(",", $b);
				$bca = "$bca";

				$this->db->select('*');
				$this->db->from('tabelrule');
				$this->db->where('KodePertanyaan', $bca);
				$queryHasil = $this->db->get();
				$queryHasil2 = $queryHasil->result_array();

				if ($queryHasil->num_rows() > 0) {

					foreach ($queryHasil2 as $KodeMinat) {
						$data = $KodeMinat['KodeMinat'];
					}

					$this->db->select('*');
					$this->db->from('tabelminat');
					$this->db->where('KodeMinat', $data);
					$queryHasilPenyakit = $this->db->get();
					$queryHasilPenyakit2['tabelminat'] = $queryHasilPenyakit->result_array();
					$queryHasilPenyakit2['status'] = $this->db->query("select status from  peserta where email='$email'")->row()->status;

					$this->load->view('pages/front/header', $queryHasilPenyakit2);
					$this->load->view('pages/front/hasildiagnosa', $queryHasilPenyakit2);
					$this->load->view('pages/front/footer');
					$username = $this->session->userdata('username');
					// $this->db->delete('riwayatjawaban',array('username'=>$username));

				} else {
					$data['Backward'] = $this->Jawaban_model->cariPertanyaan();
					$data['status'] = $this->db->query("select status from  peserta where email='$email'")->row()->status;

					$this->load->view('pages/front/header', $data);
					$this->load->view('pages/front/test2', $data);
					$this->load->view('pages/front/footer');
				}
			} else {
				$data['status'] = $this->db->query("select status from  peserta where email='$email'")->row()->status;

				$data['Backward'] = $this->Jawaban_model->cariPertanyaan();
				$data['jawabanUser'] = $this->Jawaban_model->tampilJawaban();
				$this->load->view('pages/front/header', $data);
				$this->load->view('pages/front/test2', $data);
				$this->load->view('pages/front/footer');
			}
		} else {
			redirect('/');
		}
	}


	public function noresult2()
	{

		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from  peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;
		$this->load->view('pages/front/header', $data);
		$this->load->view('pages/front/noresult2');
		$this->load->view('pages/front/footer');
	}

	public function noresult()
	{
		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/noresult');
		$this->load->view('pages/static/footer');
	}

	function logout()
	{
		$username = $this->session->userdata('username');
		// $this->db->delete('riwayatjawaban',array('username'=>$username));
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');

		redirect('/');
	}


	// riasec


	public function uji()
	{
		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from  peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;


		$this->load->view('pages/front/header', $data);
		$this->load->view('pages/front/uji', $data);
		$this->load->view('pages/front/footer');
	}


	public function jawab()
	{

		$konsul = $this->db->query("SELECT * FROM tabelpertanyaan order by NoPertanyaan Asc")->result();
		foreach ($konsul as $kons) {

			$tgl = date('Y-m-d');
			$waktu = date('H:i:s');
			$jawab = $this->input->post($kons->KodePertanyaan);
			$username = $this->session->userdata('username');
			$this->db->query("INSERT INTO riwayatjawaban VALUES ('0', '$kons->KodePertanyaan', '$kons->Pertanyaan', '$tgl','$waktu', '$username', '$jawab')");
		}

		$rule_1 = array();
		$rules = $this->db->query("SELECT kodePertanyaan, KodePenyakit FROM tabelrule order by NoRule Asc")->result();
		foreach ($rules as $rule) {

			$kodeminat = $rule->KodePenyakit;
			$pertanyaan = str_replace(",", "','", $rule->kodePertanyaan);


			$rule_1[] = $this->db->query("select count(noRJawaban) as jumlah from riwayatjawaban where jawaban='YA' and KodePertanyaan in ('$pertanyaan')")->row()->jumlah . ',' . $kodeminat;

			// echo "<br/>";   

		}

		rsort($rule_1);




		$link = substr($rule_1[0], -5);
		$queryall = $this->db->query("SELECT * from riwayatjawaban where jawaban ='YA' and username='$username' ORDER BY noRjawaban DESC LIMIT 120");
		if ($queryall->num_rows() >= 120) {
			$link = "M007";
		}
		$email = $this->session->userdata('email');
		$id_siswa = $this->db->query("SELECT id_peserta FROM peserta where email='$email'")->row()->id_peserta;
		$tgl = date('Y-m-d');
		$jam = date('H:i:s');
		$this->db->query("INSERT INTO log_hasil VALUES ('0', '$id_siswa', '$link', '$tgl','$jam');");
		$this->db->query("DELETE FROM riwayatjawaban where username='$username'");

		redirect('/Halaman/hasil?token=' . $link);
	}


	public function hasil()
	{
		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;


		$this->load->view('pages/front/header', $data);
		$this->load->view('pages/front/hasil', $data);
		$this->load->view('pages/front/footer');
	}


	public function riwayat()
	{
		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;


		$this->load->view('pages/front/header', $data);
		$this->load->view('pages/front/riwayat', $data);
		$this->load->view('pages/front/footer');
	}

	public function riwayat_gula()
	{
		if ($this->session->userdata('email')) {
			$email = $this->session->userdata('email');
			$status = $this->db->query("select status from peserta where email='$email'")->row()->status;
		}
		$data['status'] = $status;


		$this->load->view('pages/front/header', $data);
		$this->load->view('pages/front/riwayat_gula', $data);
		$this->load->view('pages/front/footer');
	}

	public function JawabSatu()
	{
		$kd_pert = $this->input->post('kd_pert');
		$jawab = $this->input->post('jawab');
		$konsul = $this->db->query("SELECT KodePertanyaan FROM tabelpertanyaan where KodePertanyaan='$kd_pert'")->row()->KodePertanyaan;
		$tgl = date('Y-m-d');
		$waktu = date('H:i:s');

		$username = $this->session->userdata('username');
		$this->db->query("INSERT INTO riwayatjawaban VALUES ('0', '$konsul', '', '$tgl','$waktu', '$username', '$jawab')");
	}
}
