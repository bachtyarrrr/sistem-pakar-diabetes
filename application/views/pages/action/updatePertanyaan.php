<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<div class="tambahPertanyaan">


    <div class="box-body">


  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Update Pertanyaan</h3>
    </div>
  <div class="box-body">

  <!-- Main content -->

    <div class="form-group">
      <?php echo validation_errors();?>

  <?php echo form_open_multipart('Dataknowledge_control/updatePertanyaan/'.$getPertanyaan['NoPertanyaan']); ?>




      <label>Pilih Penyakit</label>
      <select class="form-control select2" name="NamaPekerjaan" style="width: 100%;  ">

   <option value="<?php echo $getPertanyaan['NamaPenyakit']; ?>" selected ><?php echo $getPertanyaan['NamaPenyakit']; ?></option>



            <?php foreach ($Gejala as $G): ?>

        <option value="<?php echo $G['NamaPenyakit']; ?>"><?php echo $G['NamaPenyakit']; ?></option>
    <?php endforeach; ?>
      </select>
    </div>


    <div class="form-group">

      <label for="exampleInputEmail1">Kode Pertanyaan</label>


      <input  readonly type="text" name="KodePertanyaan" class="form-control" value="<?php echo $getPertanyaan['KodePertanyaan']; ?>"  >

    </div>

    <div class="form-group">
  <label for="exampleInputEmail1">Pertanyaan</label>
  <input type="text" name="Pertanyaan" value="<?php echo $getPertanyaan['Pertanyaan']; ?> " class="form-control" >
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
