<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<div class="tambahPertanyaan">


    <div class="box-body">


  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Update Diabetes</h3>
    </div>
  <div class="box-body">

  <!-- Main content -->

    <div class="form-group">
      <?php echo validation_errors();?>

  <?php echo form_open_multipart('Dataknowledge_control/updateMinat/'.$getPenyakit['NoDiabetes']); ?>
  <label for="exampleInputEmail1">Nama Diabetes</label>


  <input  type="text" name="NamaMinat" class="form-control" value="<?php echo $getPenyakit['NamaDiabetes']; ?>"  >


    </div>


    <div class="form-group">

      <label for="exampleInputEmail1">Kode Bakat & Minat</label>


      <input  readonly type="text" name="KodeMinat" class="form-control" value="<?php echo $getPenyakit['KodeDiabetes']; ?>"  >

    </div>

    <div class="form-group">
  <label for="exampleInputEmail1">Deskripsi</label>
  <input type="text" name="Deskripsi" value="<?php echo $getPenyakit['Deskripsi']; ?> " class="form-control" >
</div>
    <div class="form-group">
  <label for="exampleInputEmail1">Solusi</label>
  <input type="text" name="solusi" value="<?php echo $getPenyakit['solusi']; ?> " class="form-control" >
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
