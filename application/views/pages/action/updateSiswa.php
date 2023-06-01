<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<div class="tambahPertanyaan">


    <div class="box-body">


  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Update data</h3>
    </div>
  <div class="box-body">

  <!-- Main content -->

    <div class="form-group">
      <?php echo validation_errors();?>

  <?php echo form_open_multipart('Dataknowledge_control/updateSiswa/'.$getGejala['id_peserta']); ?>
  <label for="exampleInputEmail1">Nama Peserta</label>


      <input  type="text" name="nama" class="form-control" value="<?php echo $getGejala['nama']; ?>"  >


    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Usia (th)</label>
       <input type="number" name="usia" class="form-control" value="<?php echo $getGejala['usia']; ?>" >
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
       <input type="text" name="email" class="form-control" value="<?php echo $getGejala['email']; ?>" >
    </div>
    <div class="form-group">
     <label for="exampleInputEmail1">Password</label>
       <input type="text" name="password" class="form-control" value="<?php echo $getGejala['password']; ?>">
    </div>

    <div class="form-group">
     <label for="exampleInputEmail1">Status</label>

        <select class="form-control" aria-label="Default select example" name="status">
           <?php if($getGejala['status']=='1'){ ?>
            <option value="1" selected>Confirmed</option>
            <option value="0" >Unconfirmed</option>
          <?php }else{ ?>
            <option value="1">Confirmed</option>
            <option value="0" selected>Unconfirmed</option>
          <?php } ?>

        </select>
       
    </div>


    



<button type="submit" class="btn btn-primary" id="btn-submit" >Ubah</button>
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
