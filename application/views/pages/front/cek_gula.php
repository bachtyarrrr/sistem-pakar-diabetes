
<main id="main">
    <section style="background-image: url(<?php echo base_url(); ?>assets/medbloc/images/img01.png); background-size:cover; height:100px">
    
      </section>

<section id="data" class="content-sec container">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="heading2 fwbold text-capitalize">Cek Gula Darah Anda : </h2>
						<!-- content holder of the page -->
						<div class="content-block fwLight wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
								
						<div class="container">
						<div class="jawaban">
						    <div class="row">

						    



						  <div class="jawab">

						    
						    <div class="diagnosa-box">
						      <div class="pertanyaan-box">
                                   <?php echo form_open('Halaman/hasil_gula'); ?>

						           <center>  <h2>Masukkan Jumlah Gula Darah Anda</h2></center>
                                  <center>  <input type="text" name="kadar_gula" class="form-control" id="number" aria-describedby="number" placeholder="0 mg/dL " onkeypress="return hanyaAngka(event)" style="width:50%" required></center>
                                  	<script>
										function hanyaAngka(evt) {
										  var charCode = (evt.which) ? evt.which : event.keyCode
										   if (charCode > 31 && (charCode < 48 || charCode > 57))
								 
										    return false;
										  return true;
										}
									</script>
									<br/>

									 <center>  <button type="submit" name="btnYa" class="btnPilihanYa btn-primary btn-grey" ><i class="fa fa-check"></i> Hasil Cek</button> </center>

                                
                                   <?php echo form_close(); ?>
					    	</div>




						  </section>
						  <!-- /.content -->
						</div>

						</div>
						
					</div>
				</div>
			</section>
</main>