<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">
    <div class="dataknowledge">

      <div class="box">
        <div class="box-header btnRight">
          <h3 class="box-title">Tabel Peserta</h3>
          <a href="<?php echo base_url(); ?>tambahPeserta" class="btn btn-primary"> Tambah peserta</a>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Usia</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>

              </tr>
            </thead>
            <tbody>



              <?php $i = 1; ?>
              <?php foreach ($TabelPekerjaan as $t) : ?>

                <tr>
                  <td> <?php echo $i++; ?>
                  </td>
                  <td> <?php echo $t['nama']; ?> </td>
                  <td> <?php echo $t['usia']; ?> (th) </td>
                  <td> <?php echo $t['email']; ?> </td>
                  <td> <?php if ($t['status'] == '1') {
                          echo "<label class='label label-success'> Confirmed </label>";
                        } else {
                          echo "<label class='label label-danger'> Unconfirmed </label>";
                        } ?>
                  </td>

                  <td class="action">
                    <a href="<?php echo base_url(); ?>logPeserta/<?php echo $t['id_peserta']; ?>" title="Riwayat Diagnosa"> <i class="fa fa-eye"></i></a>

                    <a href="<?php echo base_url(); ?>log_gula/<?php echo $t['id_peserta']; ?>" title="Riwayat Gula"> <i class="fa fa-eye"></i></a>

                    <a href="<?php echo base_url(); ?>updatePeserta/<?php echo $t['id_peserta']; ?>"> <i class="fa fa-edit"></i></a>

                    <button value="<?php echo $t['id_peserta']; ?>" id="btnDelete" onclick="validate(this)"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>

              <?php endforeach; ?>

            </tbody>
            <!-- <tfoot>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>

          </tr>
          </tfoot> -->
          </table>



          <?php if ($this->session->flashdata('success')) { ?>
            <script>
              $(document).ready(function() {


                swal({
                  title: "Berhasil !",
                  text: "<?php echo $this->session->flashdata('success'); ?>",
                  timer: 3000,
                  showConfirmButton: true,
                  type: 'success'
                });
              });
            </script>
          <?php  } ?>



          <script>
            $(function() {
              TablesDatatables.init();
            });

            function validate(a) {
              var id = a.value;

              swal({
                title: "Are you sure?",
                text: "You want to delete this !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false
              }, function() {

                $(location).attr('href', '<?php echo base_url(); ?>deletePeserta/' + id);

              });
            }
          </script>


          <div class="pagination1">
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </div>
        <!-- /.box-body -->
      </div>



    </div>

  </section>
  <!-- /.content -->
</div>