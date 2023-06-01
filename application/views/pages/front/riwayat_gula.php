
<main id="main">
    <section style="background-image: url(<?php echo base_url(); ?>assets/medbloc/images/img01.png); background-size:cover; height:100px">
    
      </section>

<section id="data" class="content-sec container">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="heading2 fwbold text-capitalize noPrint">Riwayat  Cek Gula Darah </h2>
            <button onclick="window.print();" class="noPrint">
              Cetak
            </button>
						<!-- content holder of the page -->
						<div class="content-block fwLight wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
								<div class="box-body">
									      <center>
                               <h1 noPrint><span class="fa fa-user"></span> <?php echo $this->session->userdata('username'); ?></h1>
                             									      
                                      </center>
					              <blockquote>
					                 <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Waktu</th>        
            <th>Gula Darah</th>
            <th>Hasil Cek</th>
           
            

          </tr>
          </thead>
          <tbody>



<?php $i=1; 
 $email=$this->session->userdata('email');
$room_img=$this->db->query("SELECT * FROM log_gula join peserta on peserta.id_peserta=log_gula.id_peserta where peserta.email='$email'")->result();
foreach ($room_img as $t) {  ?>

          <tr>
            <td> <?php echo $i++; ?>
            </td>

            <td> <?php echo date('d-m-Y', strtotime($t->tanggal)); ?> </td>
            <td> <?php echo  $t->waktu; ?> </td>
            
            
            <td> <b><?php echo $t->kadar_gula; ?> mg/dL </b> </td>
             <td> <b><?php echo $t->hasil; ?> </b> </td>
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

					                


					              </blockquote>
					    </div>
                  

</main>