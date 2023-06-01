<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<div class="tambahPertanyaan">


    <div class="box-body">


  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Tambah Rule</h3>
    </div>
  <div class="box-body">

  <!-- Main content -->

    <div class="form-group">
      <?php echo validation_errors();?>

<?php echo form_open_multipart('Dataknowledge_control/updateRule/'.$getRule['NoRule']); ?>




      <label>Nama Minat</label>
      <select class="form-control select2" id="select-btn" name="NamaMinat" style="width: 100%;  ">
        <option value="<?php echo $getRule['NamaMinat']; ?>" selected="selected" ><?php echo $getRule['NamaMinat']; ?></option>
            <?php foreach ($tabelminat as $TP): ?>
        <option value="<?php echo $TP['NamaMinat']; ?>"><?php echo $TP['NamaMinat']; ?></option>
    <?php endforeach; ?>
      </select>
    </div>


    <div class="form-group">
      <label for="exampleInputEmail1">Kode Penyakit</label>
    <input id="KodeMinat" readonly type="text" name="KodeMinat" class="form-control" value="<?php echo $getRule['KodeMinat']; ?>"  >
      <label for="exampleInputEmail1">Kode Rule</label>
      <input  readonly type="text" name="KodeRule" class="form-control" value="<?php echo $getRule['KodeRule']; ?>"  >


    </div>

    <div class="form-group">
  <label for="exampleInputEmail1">Kode Pertanyaan</label>
  <input type="text" name="KodePertanyaan" class="form-control" value="<?php echo $getRule['KodePertanyaan']; ?>" >
</div>


<button type="submit" class="btn btn-primary" id="btn-submit" >Update</button>
</div>




  <?php echo form_close(); ?>



  <script type="text/javascript">
    $(document).ready(function(){
      $('#select-btn').on('change',function(){

var selectData = $(this).val();
var url ="Dataknowledge_control/ajaxTambahRule";
$.ajax({
  type:"POST",
  url:"<?php echo base_url() ?>"+url,
  data:{'selectData':selectData},
  success:function(data){
    $("#KodeMinat").val(data);
  }
});

            });
    })
  </script>




</div>
</div>
</div>
</div>



</div>
  </section>
  <!-- /.content -->
</div>
