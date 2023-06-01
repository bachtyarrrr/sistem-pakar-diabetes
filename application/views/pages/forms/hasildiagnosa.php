<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">



    <div class="TES">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Hasil Bakat & Minat</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <blockquote>
                <?php
                  foreach ($tabelminat as $data) {  ?>
                      <h3><b><?php echo $data['NamaMinat']; ?> </b></h3>
                     <p><?php echo $data['Deskripsi']; ?></p>
                <?php  } ?>

                
              </blockquote>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       </div>

    
    </div>

  </section>
  <!-- /.content -->
</div>
