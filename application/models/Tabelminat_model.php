<?php

/**
 *
 */
 class tabelminat_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }



public function tampilPenyakit(){
  $this->db->order_by("KodeDiabetes", "desc");
  return $get=$this->db->get('tabeldiabetes')->result_array();
}

public function barisPenyakit(){
return  $this->db->get('tabeldiabetes')->num_rows();
}

public function tabelminat($perPage,$start){
  $this->db->order_by("KodeDiabetes", "desc");
  return $get=$this->db->get('tabeldiabetes',$perPage,$start)->result_array();
}
public function tampilKodeMinat(){
  $this->db->limit('1');
  $this->db->order_by("KodeDiabetes", "desc");
  return $get=$this->db->get('tabeldiabetes')->result_array();
}

public function tambahDataPenyakit(){
    $data = array(
      'NamaDiabetes' =>$this->input->post('NamaMinat') ,
      'KodeDiabetes' =>$this->input->post('KodeMinat') ,
      'Deskripsi' =>$this->input->post('Deskripsi'),
      'solusi' =>$this->input->post('solusi')
   );

  return $this->db->insert('tabeldiabetes',$data);
}
public function deletePenyakit($KodeDiabetes){
  return $this->db->delete('tabeldiabetes',array('NoDiabetes'=>$KodeDiabetes));
}

public function getPenyakit($KodeDiabetes=FALSE){
  $query = $this->db->get_where('tabeldiabetes',array('NoDiabetes'=> $KodeDiabetes));
  return $query->row_array();
}

public function updateMinat($KodeDiabetes){

    $data =array(
     'NamaDiabetes' =>$this->input->post('NamaMinat') ,
      'Deskripsi'=>$this->input->post('Deskripsi'),
       'solusi' =>$this->input->post('solusi')
    );
  $this->db->where('NoDiabetes',$KodeDiabetes);
  return $this->db->update('tabeldiabetes',$data);
}




}
