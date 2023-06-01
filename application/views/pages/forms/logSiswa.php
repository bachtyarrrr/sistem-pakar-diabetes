<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">
<div class="dataknowledge">

    <div class="box">
      <div class="box-header btnRight">
        <h3 class="box-title">Riwayat Diagnosa Peserta </h3>
      
     <a href="<?php echo base_url(); ?>cetakdiagnosa/<?=$this->uri->segment('2')?>" class="btn btn-primary"> <i class="fa fa-download"></i> Cetak Excell</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Nama Peserta</th>
            <th>Penyakit</th>
            <th>Diabetes</th>
            <th>Solusi</th>
           
            

          </tr>
          </thead>
          <tbody>



<?php $i=1; 

$room_img=$this->db->query("SELECT * FROM log_hasil join peserta on peserta.id_peserta=log_hasil.id_peserta join tabeldiabetes on tabeldiabetes.KodeDiabetes=log_hasil.KodePenyakit where log_hasil.id_peserta='$getGejala[id_peserta]'")->result();
foreach ($room_img as $t) {  ?>

          <tr>
            <td> <?php echo $i++; ?>
            </td>
            <td> <?php echo date('d-m-Y', strtotime($t->tanggal)); ?> </td>
            <td> <?php echo $t->waktu; ?> </td>
            <td> <?php echo $t->nama; ?> </td>
            <td> <b><?php echo $t->NamaDiabetes; ?> </b> <br/>
                <small><?php echo $t->Deskripsi; ?></small></td>

            <td> <?php   $q_cek=$this->db->query("SELECT * FROM tabelpenyakit Where KodePenyakit='$t->KodeDiabetes'")->result();
            foreach ($q_cek as $cek) { echo $cek->NamaPenyakit. ", ";  } ?></td>

              <td> <b><?php echo $t->solusi; ?> </b> </td>
           
          </tr>

  <?php } ?>

          </tbody>
          <!-- <tfoot>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>

          </tr>
          </tfoot> -->
        </table>



        <?php if (		 $this->session->flashdata('success')) {?>
          <script>
      $(document).ready(function(){


                              swal({
                                  title: "Berhasil !",
                                  text: "<?php echo $this->session->flashdata('success'); ?>",
                                  timer:3000,
                                  showConfirmButton: true,
                                  type: 'success'
                              });
                              });
                          </script>
        <?php  } ?>



        <script>
      $(function(){ TablesDatatables.init(); });
      function validate(a)
      {
var id= a.value;

          swal({
                  title: "Are you sure?",
                  text: "You want to delete this !",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, Delete it!",
                  closeOnConfirm: false }, function()
              {

                  $(location).attr('href','<?php echo base_url(); ?>deleteSiswa/'+id);

              }
          );
      }
       </script>


        <div class="pagination1">
        	<?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
      <!-- /.box-body -->
    </div>



</div>

  </section>
  <!-- /.content -->
</div>
