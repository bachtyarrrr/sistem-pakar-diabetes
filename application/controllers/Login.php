<?php

 /**
  *
  */
 class Login extends CI_Controller
 {

   function __construct()
   {
     parent::__construct();
     $this->load->library('session');
     $this->load->helper('form');
     $this->load->library('form_validation');
     $this->load->library('upload');
     $this->load->helper('url_helper');
     $this->load->helper('text');
     $this->load->helper('date');
     $this->load->library('pagination');
     $this->load->model('LoginModel');
     $this->load->library('user_agent');
   }

public function signin(){
  $this->load->view('pages/forms/login');
}


public function register(){
    $name    = $this->input->post('name');
    $usia    = $this->input->post('usia');
    $email   = addslashes($this->input->post('email'));
    $password    = addslashes($this->input->post('password'));
    $re_password    = addslashes($this->input->post('re_password'));

    
    if($password != $re_password ){

      $this->session->set_flashdata('error','Registrasi Gagal Mohon Periksa Form');
      $backreload=$_SERVER['HTTP_REFERER'];
      echo "<script>  alert('LOGIN GAGAL'); document.location.href='$backreload'; </script>";
    }else{

       $date=date('Y-m-d');
            $simpan=$this->db->query("INSERT INTO peserta VALUES ('0', '$date', '$name','$email', '$usia', '$password','1')");

            $session_data=array(
                'username' => $name,
                'email' =>$email
              );

            $this->session->set_userdata($session_data);
            redirect('Halaman/dashboard');
            

    }
    


    
}


  





public function login_validation(){

$this->form_validation->set_rules('username','username','trim|required');
$this->form_validation->set_rules('password','password','trim|required');

if($this->form_validation->run()){
$username= $this->input->post('username');
$password= $this->input->post('password');

  $sql = $this->db->query("SELECT * from peserta WHERE email='$username' and password='$password'");
  $ceknp=$sql->num_rows();
  if($ceknp>0){

    $session_data=array(
      'username' => $this->db->query("SELECT nama from peserta WHERE email='$username' and password='$password'")->row()->nama,
      'email' => $this->db->query("SELECT email from peserta WHERE email='$username' and password='$password'")->row()->email
    );
    
    $this->session->set_userdata($session_data);
    redirect('Halaman/dashboard');

  }else if($this->LoginModel->login_model($username,$password)){
    $session_data=array(
      'username' => $username,
      'password' =>$password
    );

    $this->session->set_userdata($session_data);
    redirect('Halaman/view');

  }else {
    $this->session->set_flashdata('error','invalid username and password');
    $backreload=$_SERVER['HTTP_REFERER'];
    echo "<script>  alert('LOGIN GAGAL'); document.location.href='$backreload'; </script>"
    ;
  }


}else {
  $this->login_validation();
}

}


function logout(){
  $username=$this->session->userdata('username');
  $this->db->delete('riwayatjawaban',array('username'=>$username));
   $this->session->unset_userdata('username')
   ;

   redirect('/');
}










 }
