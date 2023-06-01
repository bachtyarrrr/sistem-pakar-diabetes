<?php

/**
 *
 */
 class TabelArtikel_model extends CI_Model
 {


  public function __construct()
   {

     $this->load->database();
   }



public function tampilGejala(){
  $this->db->order_by("id_artikel", "desc");
  return $get=$this->db->get('tabelartikel')->result_array();
}

public function barisGejala(){
return  $this->db->get('tabelartikel')->num_rows();
}

public function siswa($perPage,$start){
  $this->db->order_by("id_artikel", "desc");
  return $get=$this->db->get('tabelartikel',$perPage,$start)->result_array();
}
public function tampilKodePekerjaan(){
  $this->db->limit('1');
  $this->db->order_by("id_artikel", "desc");
  return $get=$this->db->get('tabelartikel')->result_array();
}

public function tambahDataGejala(){
    $data = array(
      'judul' =>$this->input->post('judul') ,
      'deskripsi' =>$this->input->post('deskripsi'),
      'tanggal' =>date('Y-m-d')
   );

  return $this->db->insert('tabelartikel',$data);
}
public function deleteGejala($NoPekerjaan){
  return $this->db->delete('tabelartikel',array('id_artikel'=>$NoPekerjaan));
}

public function getGejala($id_siswa=FALSE){
  $query = $this->db->get_where('tabelartikel',array('id_artikel'=> $id_siswa));
  return $query->row_array();
}

public function updateGejala($NoPekerjaan){

    $data =array(
      'judul'=>$this->input->post('judul'),
      'deskripsi'=>$this->input->post('deskripsi')
    );
  $this->db->where('id_artikel',$NoPekerjaan);
  return $this->db->update('tabelartikel',$data);
}




}
