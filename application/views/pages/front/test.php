
<main id="main">
    <section style="background-image: url(<?php echo base_url(); ?>assets/medbloc/images/img01.png); background-size:cover; height:100px">
    
      </section>

<section id="data" class="content-sec container">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="heading2 fwbold text-capitalize">Jawablah pertanyaan berikut ini : </h2>
						<!-- content holder of the page -->
						<div class="content-block fwLight wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
								
<div class="container">
<div class="jawaban">
    <div class="row">

      <?php foreach ($konsul as $kons) {?>



  <div class="jawab">

    
    <div class="diagnosa-box">
      <div class="pertanyaan-box">


<center>  <h2><?php echo $kons['Pertanyaan']; ?></h2></center>
</div>
      <?php echo validation_errors();?>
      <?php echo form_open('Halaman/jawaban'); ?>

      <div class="pertanyaan">
          <input type="hidden" name="KodePertanyaan" value="<?php echo $kons['KodePertanyaan'];?>">
          <input type="hidden" name="Pertanyaan" value="<?php echo $kons['Pertanyaan'];?>">
          <input type="hidden" name="Tanggal" value="<?php echo date('Y-m-d'); ?>">
          <input type="hidden" name="Waktu" value="<?php echo date('h:i:sa'); ?> ">
      </div>




  <div class="tombol">

<!-- <center>  



  <button class="btn btn-primary"> <i class="fa fa-check"></i>  YA</button>
  <button class="btn btn-danger"> <i class="fa fa-close"></i>  TIDAK</button></center> <br/>
 -->
<center>  <button type="submit" name="btnYa" class="btnPilihanYa btn-primary btn-grey" ><i class="fa fa-check"></i> YA</button>
  <button type="submit" name="btnNo" class="btnPilihanNo btn-primary btn-grey"><i class="fa fa-close"></i> TIDAK</button></center>
  </div>



<?php echo form_close(); ?>

    </div>




  </div>




    </div>
</div>

<?php } ?>



</div>


  </section>
  <!-- /.content -->
</div>

						</div>
						
					</div>
				</div>
			</section>
</main>