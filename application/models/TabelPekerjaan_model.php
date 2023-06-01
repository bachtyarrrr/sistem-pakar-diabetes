<?php

/**
 *
 */
 class tabelpekerjaan_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }



public function tampilGejala(){
  $this->db->order_by("NoPenyakit", "desc");
  return $get=$this->db->get('tabelpenyakit')->result_array();
}

public function barisGejala(){
return  $this->db->get('tabelpenyakit')->num_rows();
}

public function tabelpekerjaan($perPage,$start){
  $this->db->order_by("NoPenyakit", "desc");
  return $get=$this->db->get('tabelpenyakit',$perPage,$start)->result_array();
}
public function tampilKodePekerjaan(){
  $this->db->limit('1');
  $this->db->order_by("NoPenyakit", "desc");
  return $get=$this->db->get('tabelpenyakit')->result_array();
}

public function tambahDataGejala(){
    $data = array(
      'NamaPekerjaan' =>$this->input->post('NamaPekerjaan') ,
      'KodePekerjaan' =>$this->input->post('KodePekerjaan')
   );

  return $this->db->insert('tabelpenyakit',$data);
}
public function deleteGejala($NoPekerjaan){
  return $this->db->delete('tabelpenyakit',array('NoPenyakit'=>$NoPekerjaan));
}

public function getGejala($NoPekerjaan=FALSE){
  $query = $this->db->get_where('tabelpenyakit',array('NoPenyakit'=> $NoPekerjaan));
  return $query->row_array();
}

public function updateGejala($NoPekerjaan){

    $data =array(
      'NamaPekerjaan'=>$this->input->post('NamaPekerjaan'),
      'KodePekerjaan'=>$this->input->post('KodePekerjaan')
    );
  $this->db->where('NoPenyakit',$NoPekerjaan);
  return $this->db->update('tabelpenyakit',$data);
}




}
