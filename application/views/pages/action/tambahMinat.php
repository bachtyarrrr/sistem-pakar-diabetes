<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<div class="tambahPertanyaan">


    <div class="box-body">


  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Tambah Diabetes</h3>
    </div>
  <div class="box-body">

  <!-- Main content -->


    <div class="form-group">
      <?php echo validation_errors();?>

  <?php echo form_open('Dataknowledge_control/tambahMinat'); ?>
<label for="exampleInputEmail1">Nama Diabetes</label>
<input type="text" name="NamaMinat" class="form-control" >
</div>




    <div class="form-group">

      <label for="exampleInputEmail1">Kode Pertanyaan</label>
      <?php foreach ($tabelminat as $P ): ?>
        <?php $lastKode= $P['KodeDiabetes'];
        $kode = substr($lastKode,0,1);
       $angka = substr($lastKode,1,4);
       $angka_baru = str_repeat("0",4 - strlen($angka+1)).($angka+1);
       $hasil = $kode.$angka_baru;
       ?>

      <input  readonly type="text" name="KodeMinat" class="form-control" value="<?php echo $hasil; ?>"  >
        <?php endforeach; ?>
    </div>

    <div class="form-group">
  <label for="exampleInputEmail1">Deskripsi</label>
  <input type="text" name="Deskripsi" class="form-control" >
</div>

 <div class="form-group">
  <label for="exampleInputEmail1">Solusi</label>
  <input type="text" name="solusi" class="form-control" >
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
