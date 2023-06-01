<?php


class Dataknowledge_control extends CI_Controller {
			public function __construct(){
					parent::__construct();
					$this->load->library('session');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('upload');
					$this->load->helper('url_helper');
					$this->load->helper('text');
					$this->load->helper('date');
					$this->load->library('pagination');
					
          $this->load->model('dataknowledge_model');
					$this->load->model('TabelPertanyaan_model');
					$this->load->model('TabelRule_model');
					$this->load->model('tabelminat_model');
					$this->load->model('TabelPekerjaan_model');
					$this->load->model('TabelSiswa_model');
					$this->load->model('TabelArtikel_model');
					$this->load->model('Gejala_model');
			}

public function pagination(){

	$config['full_tag_open'] = "<ul class='pagination'>";
$config['full_tag_close'] = '</ul>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';
$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
return $config;
}
public function dataRule(){
	if (!empty($this->session->userdata('username'))) {

		$row=$this->TabelRule_model->barisRule();
		$this->load->library('form_validation');
			$config = $this->pagination();
		$config['base_url'] = 'http://localhost/pakar_diabetes/tabelrule';
		$config['total_rows'] = $row;
		$config['per_page'] = 8;
		$start=$this->uri->segment(2);
		$this->pagination->initialize($config);
		$data['rows'] =$row;
		$data['tabelrule'] = $this->TabelRule_model->tampilTabelRule($config['per_page'],$start);
		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/tabelrule',$data);
		$this->load->view('pages/static/footer');
	}else {
		redirect('/');
	}

}

public function tambahRule(){
$data['tabelminat']=$this->tabelminat_model->tampilPenyakit();
$data['TabelRule'] = $this->TabelRule_model->tampilRuleKode();
	$this->load->view('pages/static/header');
	$this->load->view('pages/action/tambahRule',$data);
	$this->load->view('pages/static/footer');
}

public function ajaxTambahRule(){
	if (isset($_POST['selectData'])) {
		$data=$_POST['selectData'];
		$query = $this->db->get_where('tabelminat',array('NamaMinat'=> $data));
		$query= $query->row_array();
		echo $query['KodeMinat'];
}
}

public function tambahDataRule(){
$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
	$this->form_validation->set_rules('NamaMinat','NamaMinat','required');
		$this->form_validation->set_rules('KodeMinat','KodeMinat','required');
			$this->form_validation->set_rules('KodeRule','KodeRule','required');
$this->form_validation->set_rules('KodePertanyaan','KodePertanyaan','required');
			if ($this->form_validation->run()===true) {
$dataPertanyaan = $this->input->post('NamaMinat');

 $this->TabelRule_model->tambahDataRule();
 	$this->session->set_flashdata('success', "Data $dataPertanyaan berhasil ditambah");
				redirect('Dataknowledge_control/dataRule');
			}else {

				$data['tabelminat']=$this->tabelminat_model->tampilPenyakit();
				$data['TabelRule'] = $this->TabelRule_model->tampilRuleKode();
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/tambahRule',$data);
					$this->load->view('pages/static/footer');
			}

}
public function deleteRule($NoRule){
	$query = $this->db->get_where('tabelrule',array('NoRule'=> $NoRule));
	$query = $query->row_array();
$hasil = $query['KodeRule'];
	$this->TabelRule_model->deleteRule($NoRule);

		$this->session->set_flashdata('success', "Rule $hasil berhasil dihapus");
redirect('Dataknowledge_control/dataRule');
}

public function updateRule($NoRule){
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('NamaMinat','NamaMinat','required');
			$this->form_validation->set_rules('KodeMinat','KodeMinat','required');
				$this->form_validation->set_rules('KodeRule','KodeRule','required');
				$this->form_validation->set_rules('KodePertanyaan','KodePertanyaan','required');

				if ($this->form_validation->run()===true) {
		$dataRule = $this->input->post('KodePertanyaan');

		$this->TabelRule_model->updateRule($NoRule);
		$this->session->set_flashdata('success', "Data $dataRule berhasil diubah");
					redirect('Dataknowledge_control/dataRule');
				}else {

					$data['tabelminat'] = $this->tabelminat_model->tampilPenyakit();
					$data['getRule'] = $this->TabelRule_model->getRule($NoRule);
						$this->load->view('pages/static/header');
						$this->load->view('pages/action/updateRule',$data);
						$this->load->view('pages/static/footer');

				}

}


	public function dataPenyakit()
	{

		if (!empty($this->session->userdata('username'))) {

      $row=$this->dataknowledge_model->barisPertanyaan();
      $this->load->library('form_validation');
				$config = $this->pagination();
      $config['base_url'] = 'http://localhost/pakar_diabetes/tabelpertanyaan';
      $config['total_rows'] = $row;
      $config['per_page'] = 8;


      $start=$this->uri->segment(2);
      $this->pagination->initialize($config);
      $data['rows'] =$row;
      $data['dataknowledge'] = $this->dataknowledge_model->tabelKnowledge($config['per_page'],$start);
			$this->load->view('pages/static/header');
			$this->load->view('pages/forms/tabelpertanyaan',$data);
			$this->load->view('pages/static/footer');
		}else {
			redirect('/');
		}

	}


public function tambahPertanyaan(){

$data['Gejala']=$this->TabelPekerjaan_model->tampilGejala();
$data['TabelPertanyaan'] = $this->TabelPertanyaan_model->tampilPertanyaan();
	$this->load->view('pages/static/header');
	$this->load->view('pages/action/tambahPertanyaan',$data);
	$this->load->view('pages/static/footer');
}

public function tambahDataPertanyaan(){
	$this->load->helper('form');
	$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
	$this->form_validation->set_rules('NamaPekerjaan','NamaPekerjaan','required');
		$this->form_validation->set_rules('Pertanyaan','Pertanyaan','required');
			$this->form_validation->set_rules('KodePertanyaan','KodePertanyaan','required');

			if ($this->form_validation->run()===true) {
$dataPertanyaan = $this->input->post('KodePertanyaan');

 $this->TabelPertanyaan_model->tambahDataPertanyaan();
 	$this->session->set_flashdata('success', "Data $dataPertanyaan berhasil ditambah");
				redirect('Dataknowledge_control/dataPenyakit');
			}else {

				$data['Gejala']=$this->Gejala_model->tampilGejala();
				$data['TabelPertanyaan'] = $this->TabelPertanyaan_model->tampilPertanyaan();
				$this->load->view('pages/static/header');
				$this->load->view('pages/action/tambahPertanyaan',$data);
				$this->load->view('pages/static/footer');
			}

}


public function updatePertanyaan($noPertanyaan){
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('NamaPekerjaan','NamaPekerjaan','required');
			$this->form_validation->set_rules('Pertanyaan','Pertanyaan','required');
				$this->form_validation->set_rules('KodePertanyaan','KodePertanyaan','required');

				if ($this->form_validation->run()===true) {
		$dataPertanyaan = $this->input->post('KodePertanyaan');

		$this->TabelPertanyaan_model->updatePertanyaan($noPertanyaan);
		$this->session->set_flashdata('success', "Data $dataPertanyaan berhasil diubah");
					redirect('Dataknowledge_control/dataPenyakit');
				}else {

					$data['Gejala']=$this->Gejala_model->tampilGejala();
					$data['getPertanyaan']=$this->TabelPertanyaan_model->getPertanyaan($noPertanyaan);
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/updatePertanyaan',$data);
					$this->load->view('pages/static/footer');

				}

}



public function deletePertanyaan($noPertanyaan){
	$query = $this->db->get_where('tabelpertanyaan',array('NoPertanyaan'=> $noPertanyaan));
	$query = $query->row_array();
$hasil = $query['KodePertanyaan'];
	$this->TabelPertanyaan_model->deletePertanyaan($noPertanyaan);

	$this->session->set_flashdata('success', "Kode Pertanyaan $hasil berhasil dihapus");
redirect('Dataknowledge_control/dataPenyakit');
}




	public function datatabelminat()
	{

		if (!empty($this->session->userdata('username'))) {

      $row=$this->tabelminat_model->barisPenyakit();
      $this->load->library('form_validation');
				$config = $this->pagination();
      $config['base_url'] = 'http://localhost/pakar_diabetes/tabelminat';
      $config['total_rows'] = $row;
      $config['per_page'] = 8;


      $start=$this->uri->segment(2);
      $this->pagination->initialize($config);
      $data['rows'] =$row;
      $data['datapenyakit'] = $this->tabelminat_model->tabelminat($config['per_page'],$start);
			$this->load->view('pages/static/header');
			$this->load->view('pages/forms/tabelminat',$data);
			$this->load->view('pages/static/footer');
		}else {
			redirect('/');
		}

	}

	public function tambahMinat(){
		$this->load->helper('form');
		$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('NamaMinat','NamaMinat','required');
			$this->form_validation->set_rules('KodeMinat','KodeMinat','required');
				$this->form_validation->set_rules('Deskripsi','Deskripsi','required');

				if ($this->form_validation->run()===true) {
	$dataPenyakit = $this->input->post('KodeMinat');

	 $this->tabelminat_model->tambahDataPenyakit();
	 	$this->session->set_flashdata('success', "Data $dataPenyakit berhasil ditambah");
					redirect('Dataknowledge_control/datatabelminat');
				}else {
					$data['tabelminat'] = $this->tabelminat_model->tampilKodeMinat();
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/tambahMinat',$data);
					$this->load->view('pages/static/footer');
				}

	}

	public function deletePenyakit($noPenyakit){
		$query = $this->db->get_where('tabeldiabetes',array('NoDiabetes'=> $noPenyakit));
		$query = $query->row_array();
	$hasil = $query['KodeDiabetes'];
		$this->tabelminat_model->deletePenyakit($noPenyakit);

		$this->session->set_flashdata('success', "Kode Pertanyaan $hasil berhasil dihapus");
	redirect('Dataknowledge_control/datatabelminat');
	}


	public function updateMinat($noPenyakit){
		$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
			$this->form_validation->set_rules('NamaMinat','NamaMinat','required');
				$this->form_validation->set_rules('KodeMinat','KodeMinat','required');
					$this->form_validation->set_rules('Deskripsi','Deskripsi','required');
					if ($this->form_validation->run()===true) {
			$dataPenyakit = $this->input->post('KodeMinat');

			$this->tabelminat_model->updateMinat($noPenyakit);
			$this->session->set_flashdata('success', "Data $dataPenyakit` berhasil diubah");
						redirect('Dataknowledge_control/datatabelminat');
					}else {

						$data['getPenyakit']=$this->tabelminat_model->getPenyakit($noPenyakit);
						$this->load->view('pages/static/header');
						$this->load->view('pages/action/updateMinat',$data);
						$this->load->view('pages/static/footer');

					}

	}


	public function dataGejala()
	{

		if (!empty($this->session->userdata('username'))) {

      $row=$this->TabelPekerjaan_model->barisGejala();
      $this->load->library('form_validation');
				$config = $this->pagination();
      $config['base_url'] = 'http://localhost/pakar_diabetes/TabelPekerjaan';
      $config['total_rows'] = $row;
      $config['per_page'] = 8;


      $start=$this->uri->segment(2);
      $this->pagination->initialize($config);
      $data['rows'] =$row;
      $data['TabelPekerjaan'] = $this->TabelPekerjaan_model->TabelPekerjaan($config['per_page'],$start);
			$this->load->view('pages/static/header');
			$this->load->view('pages/forms/TabelPekerjaan',$data);
			$this->load->view('pages/static/footer');
		}else {
			redirect('/');
		}

	}




	public function tambahGejala(){
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('NamaPekerjaan','NamaPekerjaan','required');
			$this->form_validation->set_rules('KodePekerjaan','KodePekerjaan','required');


				if ($this->form_validation->run()===true) {
	$dataGejala = $this->input->post('KodePekerjaan');

	 $this->TabelPekerjaan_model->tambahDataGejala();
		$this->session->set_flashdata('success', "Data $dataGejala berhasil ditambah");
					redirect('Dataknowledge_control/dataGejala');
				}else {
					$data['TabelPekerjaan'] = $this->TabelPekerjaan_model->tampilKodePekerjaan();
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/tambahGejala',$data);
					$this->load->view('pages/static/footer');
				}

	}
	public function deleteGejala($NoPekerjaan){
		$query = $this->db->get_where('TabelPekerjaan',array('NoPekerjaan'=> $NoPekerjaan));
		$query = $query->row_array();
	$hasil = $query['KodePekerjaan'];
		$this->TabelPekerjaan_model->deleteGejala($NoPekerjaan);

		$this->session->set_flashdata('success', "Kode Pertanyaan $hasil berhasil dihapus");
	redirect('Dataknowledge_control/dataGejala');
	}

	public function updateGejala($NoPekerjaan){
		$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
			$this->form_validation->set_rules('NamaPekerjaan','NamaPekerjaan','required');
				$this->form_validation->set_rules('KodePekerjaan','KodePekerjaan','required');
					if ($this->form_validation->run()===true) {
			$dataGejala = $this->input->post('KodePekerjaan');

			$this->TabelPekerjaan_model->updateGejala($NoPekerjaan);
			$this->session->set_flashdata('success', "Data $dataGejala` berhasil diubah");
						redirect('Dataknowledge_control/dataGejala');
					}else {

						$data['getGejala']=$this->TabelPekerjaan_model->getGejala($NoPekerjaan);
						$this->load->view('pages/static/header');
						$this->load->view('pages/action/updateGejala',$data);
						$this->load->view('pages/static/footer');

					}

	}





	public function dataSiswa()
	{

		if (!empty($this->session->userdata('username'))) {

      $row=$this->TabelSiswa_model->barisGejala();
      $this->load->library('form_validation');
				$config = $this->pagination();
      $config['base_url'] = 'http://localhost/pakar_diabetes/tabelsiswa';
      $config['total_rows'] = $row;
      $config['per_page'] = 8;


      $start=$this->uri->segment(2);
      $this->pagination->initialize($config);
      $data['rows'] =$row;
      $data['TabelPekerjaan'] = $this->TabelSiswa_model->Siswa($config['per_page'],$start);
			$this->load->view('pages/static/header');
			$this->load->view('pages/forms/tabelsiswa',$data);
			$this->load->view('pages/static/footer');
		}else {
			redirect('/');
		}

	}




	public function tambahSiswa(){
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('usia','Usia','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');


				if ($this->form_validation->run()===true) {
				$datanama= $this->input->post('nama');
				$this->TabelSiswa_model->tambahDataGejala();
				$this->session->set_flashdata('success', "Data $dataGejala berhasil ditambah");
					redirect('Dataknowledge_control/dataSiswa');
				}else {
					$data['TabelPekerjaan'] = $this->TabelPekerjaan_model->tampilKodePekerjaan();
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/tambahSiswa',$data);
					$this->load->view('pages/static/footer');
				}

	}
	public function deleteSiswa($NoPekerjaan){
		$query = $this->db->get_where('tabelpekerjaan',array('NoPekerjaan'=> $NoPekerjaan));
	   	$query = $query->row_array();
	    $hasil = $query['KodePekerjaan'];
		$this->TabelSiswa_model->deleteGejala($NoPekerjaan);

		$this->session->set_flashdata('success', "Data berhasil dihapus");
	redirect('Dataknowledge_control/dataSiswa');
	}

	public function updateSiswa($id_siswa){
		    $this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
			$this->form_validation->set_rules('nama','nama','required');
			$this->form_validation->set_rules('usia','usia','required');
			$this->form_validation->set_rules('email','email','required');
					if ($this->form_validation->run()===true) {
							$dataGejala = $this->input->post('nama');
                            $status=$this->input->post('status');

							$this->TabelSiswa_model->updateGejala($id_siswa);

                            if($status=='1'){

                            	$this->load->library('MyPHPMailer'); 
						        $mailrecipient= $this->input->post('email');

						        $isi     = "<div style='background-color: #eeeeef; padding: 50px 0; '>    
						                        <div style='max-width:640px; margin:0 auto; '>  <div style='color: #fff; text-align: center; background-color:#dc3545; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;'>
						                            <h1>Unison Healthcare</h1> 
						                        </div> 
						                                <div style='padding: 20px; background-color: rgb(255, 255, 255);'>
						                                <center><img src='https://idmetafora.com/unison/asset/img/logoUH.png'></center>
						                                            
						                                <p style=''><span style='color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;'>Hello, $dataGejala</span><span style='color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;'><span style='font-weight: bold;'><br></span></span></p>            
						                                <p style=''><span style='color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;'><span style='font-weight: bold;'>You </span> have proses successfully on Sikdewa Sistem.</span></p>
						                                
						                               

						                                      
						                                <p style=''><span style='color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;'><br></span></p>
						                                <p style=''><span style='color: rgb(85, 85, 85); font-size: 14px; line-height: 20px;'>Thank you,</span><br><br></p>            
						                                <p style='color: rgb(85, 85, 85); font-size: 14px;'>Sistem Pakar Minat</p>        
						                            </div>    
						                        </div>
						                    </div>";


						        $fromEmail ="info@unison-healthcare.com";
						      
						        $isiEmail = "$isi";
						        $mail = new PHPMailer();
						        $mail->IsHTML(true);    // set email format to HTML
						        // $mail->IsSMTP();   // we are going to use SMTP
						        $mail->SMTPAuth   = true; // enabled SMTP authentication
						        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
						        $mail->Host       = "ssl://smtp.unison-healthcare.com";      // setting GMail as our SMTP server
						        $mail->Port       = 465;                   // SMTP port to connect to GMail
						        // $mail->SMTPDebug = 2;
						        $mail->Username   = "info@unison-healthcare.com";  // alamat email kamu
						        $mail->Password   = "katasandi123";            // password GMail
						        // $mail->FromName = "TElkom MEtra";
						        $mail->SetFrom('info@unison-healthcare.com','Unison Healthcare');  //Siapa yg mengirim email
						        $mail->Subject    = "Informasi Pendaftaran";
						        $mail->Body       = $isiEmail;
						      
						        $mail->AddAddress($mailrecipient);
						        
						        if(!$mail->Send()) {
						            echo "Mailer Error: " . $mail->ErrorInfo;
						        }
                            }




							$this->session->set_flashdata('success', "Data $dataGejala` berhasil diubah");
						redirect('Dataknowledge_control/dataSiswa');
					}else {

						$data['getGejala']=$this->TabelSiswa_model->getGejala($id_siswa);
						$this->load->view('pages/static/header');
						$this->load->view('pages/action/updateSiswa',$data);
						$this->load->view('pages/static/footer');

					}

	}




	public function dataArtikel()
	{

		if (!empty($this->session->userdata('username'))) {

      $row=$this->TabelArtikel_model->barisGejala();
      $this->load->library('form_validation');
				$config = $this->pagination();
      $config['base_url'] = 'http://localhost/pakar_diabetes/tabelsiswa';
      $config['total_rows'] = $row;
      $config['per_page'] = 8;


      $start=$this->uri->segment(2);
      $this->pagination->initialize($config);
      $data['rows'] =$row;
      $data['TabelPekerjaan'] = $this->TabelArtikel_model->Siswa($config['per_page'],$start);
			$this->load->view('pages/static/header');
			$this->load->view('pages/forms/tabelartikel',$data);
			$this->load->view('pages/static/footer');
		}else {
			redirect('/');
		}

	}




	public function tambahArtikel(){
	$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		

				if ($this->form_validation->run()===true) {
				$datanama= $this->input->post('judul');
				$this->TabelArtikel_model->tambahDataGejala();
				$this->session->set_flashdata('success', "Data $dataGejala berhasil ditambah");
					redirect('Dataknowledge_control/dataArtikel');
				}else {
					$data['TabelPekerjaan'] = $this->TabelPekerjaan_model->tampilKodePekerjaan();
					$this->load->view('pages/static/header');
					$this->load->view('pages/action/tambahArtikel',$data);
					$this->load->view('pages/static/footer');
				}

	}
	public function deleteArtikel($NoPekerjaan){
		$query = $this->db->get_where('tabelartikel',array('id_artikel'=> $NoPekerjaan));
		$query = $query->row_array();
	    $hasil = $query['id_artikel'];
		$this->TabelArtikel_model->deleteGejala($NoPekerjaan);

		$this->session->set_flashdata('success', "Data berhasil dihapus");
	    redirect('Dataknowledge_control/dataArtikel');
	}

	public function updateArtikel($id_siswa){
		$this->form_validation->set_error_delimiters('<div class="bg-danger">', '</div>');
			$this->form_validation->set_rules('judul','judul','required');
			$this->form_validation->set_rules('deskripsi','deskripsi','required');
					if ($this->form_validation->run()===true) {
			$dataGejala = $this->input->post('judul');

			$this->TabelArtikel_model->updateGejala($id_siswa);
			$this->session->set_flashdata('success', "Data $dataGejala` berhasil diubah");
						redirect('Dataknowledge_control/dataArtikel');
					}else {

						$data['getGejala']=$this->TabelArtikel_model->getGejala($id_siswa);
						$this->load->view('pages/static/header');
						$this->load->view('pages/action/updateArtikel',$data);
						$this->load->view('pages/static/footer');

					}

	}



	public function logSiswa($id_siswa){
		$data['getGejala']=$this->TabelSiswa_model->getGejala($id_siswa);
		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/logSiswa',$data);
		$this->load->view('pages/static/footer');

	}



	public function log_gula($id_siswa){
		$data['getGejala']=$this->TabelSiswa_model->getGejala($id_siswa);
		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/log_gula',$data);
		$this->load->view('pages/static/footer');

	}


	public function cetakdiagnosa($id_siswa){
		$data['getGejala']=$this->TabelSiswa_model->getGejala($id_siswa);
		$this->load->view('pages/forms/diagnosa_excell',$data);
		 

	}

	public function cetakgula($id_siswa){
		$data['getGejala']=$this->TabelSiswa_model->getGejala($id_siswa);
		$this->load->view('pages/forms/gula_excell',$data);
		 

	}






}
