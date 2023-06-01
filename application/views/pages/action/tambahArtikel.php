<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<div class="tambahPertanyaan">


    <div class="box-body">


  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Tambah Artikel</h3>
    </div>
  <div class="box-body">

  <!-- Main content -->


    <div class="form-group">
      <?php echo validation_errors();?>

  <?php echo form_open('Dataknowledge_control/tambahArtikel'); ?>
    <label for="exampleInputEmail1">Judul Artikel</label>
       <input type="text" name="judul" class="form-control" >
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Deskripsi</label>
       <textarea class="form-control" name="deskripsi" rows="3"></textarea>
    </div>
   



   



<button type="submit" class="btn btn-primary" id="btn-submit" >Tambah</button>
</div>




  <?php echo form_close(); ?>










</div>
</div>
</div>
</div>



</div>
  </section>
  <!-- /.content -->
</div>
