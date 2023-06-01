
<main id="main">
    <section style="background-image: url(<?php echo base_url(); ?>assets/medbloc/images/img01.png); background-size:cover; height:100px">
    
      </section>

<section id="data" class="content-sec container">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="heading2 fwbold text-capitalize">Hasil Cek Gula Darah </h2>
						<!-- content holder of the page -->
						<div class="content-block fwLight wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
								<div class="box-body">
									      <center>
                               <h1><span class="fa fa-user"></span> <?php echo $this->session->userdata('username'); 
                               $email=$this->session->userdata('email');
                                $info=$this->db->query("select * from  peserta where email='$email'")->row_array();
                                $id= $info['id_peserta'];
			                    $umur= $info['usia'];

                            ?></h1>


                               <h2><?=date('d')?> <?=date('F, Y')?></h2>
									      </center>
					              <blockquote>
					                <?php
					                 $tabelminat=$this->db->query("SELECT * FROM log_gula where id_peserta='$id' order by id_log desc limit 1")->result();
					                  foreach ($tabelminat as $data) {  ?>
					                  	<h3>Umur: <b><?php echo $umur; ?>    </b></h3>
					                    <h3>Kadar Gula: <b><?php echo $data->kadar_gula; ?>    mg/dL </b></h3>
					                    <h3>Hasil: <b><?php echo $data->hasil; ?>  </b></h3>
					                  <?php   } ?>

					                


					              </blockquote>
					    </div>
                  

              
</main>