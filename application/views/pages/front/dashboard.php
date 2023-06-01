
<main id="main">
    <section style="background-image: url(<?php echo base_url(); ?>assets/medbloc/images/img01.png); background-size:cover; height:100px">
    
      </section>

<section id="data" class="content-sec container">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="heading2 fwbold text-capitalize">Selamat Datang, <?php echo $this->session->userdata('username'); ?> </h2>
						<p>Tanggal Register <span class="fa fa-calendar"></span> <?php 
            $email=$this->session->userdata('email');
						$tgl=$this->db->query("SELECT tgl_register FROM peserta where email='$email'")->row()->tgl_register;
             
             echo date('d-m-Y', strtotime($tgl));
						?>
							

						</p>
						<!-- content holder of the page -->
						<div class="content-block fwLight wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
								<h4 class="heading4 fwbold" data-heading="01.">Aplikasi Sistem Pakar</h4>
									<a href="<?php echo base_url('Halaman/riwayat_gula'); ?>" class="btn-primary btn-grey text-uppercase md-round text-uppercase fwSemi-bold">Riwayat Gula </a>

								<a href="<?php echo base_url('Halaman/riwayat'); ?>" class="btn-primary btn-grey text-uppercase md-round text-uppercase fwSemi-bold">Riwayat test </a>
						</div>
						
					</div>
				</div>
			</section>
</main>