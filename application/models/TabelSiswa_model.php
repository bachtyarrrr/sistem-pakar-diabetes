<?php

/**
 *
 */
 class TabelSiswa_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }



public function tampilGejala(){
  $this->db->order_by("id_peserta", "desc");
  return $get=$this->db->get('peserta')->result_array();
}

public function barisGejala(){
return  $this->db->get('peserta')->num_rows();
}

public function siswa($perPage,$start){
  $this->db->order_by("id_peserta", "desc");
  return $get=$this->db->get('peserta',$perPage,$start)->result_array();
}
public function tampilKodePekerjaan(){
  $this->db->limit('1');
  $this->db->order_by("id_peserta", "desc");
  return $get=$this->db->get('peserta')->result_array();
}

public function tambahDataGejala(){
    $data = array(
      'nama' =>$this->input->post('nama') ,
      'usia' =>$this->input->post('usia') ,
      'email' =>$this->input->post('email'),
      'password' =>$this->input->post('password')
   );

  return $this->db->insert('peserta',$data);
}
public function deleteGejala($NoPekerjaan){
  return $this->db->delete('peserta',array('id_peserta'=>$NoPekerjaan));
}

public function getGejala($id_siswa=FALSE){
  $query = $this->db->get_where('peserta',array('id_peserta'=> $id_siswa));
  return $query->row_array();
}

public function updateGejala($NoPekerjaan){

    $data =array(
      'nama'=>$this->input->post('nama'),
      'usia' =>$this->input->post('usia'),
      'email'=>$this->input->post('email'),
      'password'=>$this->input->post('password'),
      'status'=>$this->input->post('status')
    );
  $this->db->where('id_peserta',$NoPekerjaan);
  return $this->db->update('peserta',$data);
}




}
