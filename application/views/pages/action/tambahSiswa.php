<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<div class="tambahPertanyaan">


    <div class="box-body">


  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Tambah Peserta</h3>
    </div>
  <div class="box-body">

  <!-- Main content -->


    <div class="form-group">
      <?php echo validation_errors();?>

  <?php echo form_open('Dataknowledge_control/tambahSiswa'); ?>
    <label for="exampleInputEmail1">Nama Peserta</label>
       <input type="text" name="nama" class="form-control" >
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Usia (th)</label>
       <input type="number" name="usia" class="form-control" >
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
       <input type="text" name="email" class="form-control" >
    </div>
    <div class="form-group">
     <label for="exampleInputEmail1">Password</label>
       <input type="text" name="password" class="form-control" >
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
