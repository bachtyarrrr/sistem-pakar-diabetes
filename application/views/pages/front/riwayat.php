<main id="main">
  <section style="background-image: url(<?php echo base_url(); ?>assets/medbloc/images/img01.png); background-size:cover; height:100px">

  </section>

  <section id="data" class="content-sec container">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="heading2 fwbold text-capitalize">Riwayat Diagnosa </h2>
        <button onclick="window.print();" class="noPrint">
          Cetak
        </button>
        <!-- content holder of the page -->
        <div class="content-block fwLight wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
          <div class="box-body">
            <center>
              <h1 noPrint><span class="fa fa-user"></span>
                <?php echo $this->session->userdata('username'); ?></h1>

            </center>
            <blockquote>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal dan Waktu</th>
                    <th>Hasil Diagnosa</th>
                    <th class="noPrint">Deskripsi</th>
                    <th>Solusi</th>
                    <!-- <th>Pengobatan</th> -->
                  </tr>
                </thead>
                <tbody>



                  <?php $i = 1;
                  $email = $this->session->userdata('email');
                  $room_img = $this->db->query("SELECT * FROM log_hasil join peserta on peserta.id_peserta=log_hasil.id_peserta join tabeldiabetes on tabeldiabetes.KodeDiabetes=log_hasil.KodePenyakit where peserta.email='$email'")->result();
                  foreach ($room_img as $t) {  ?>

                    <tr>
                      <td> <?php echo $i++; ?>
                      </td>

                      <td>
                        <?php echo date('d-m-Y', strtotime($t->tanggal)); ?> -
                        <?php echo  $t->waktu; ?>
                      </td>
                      <td class="Print"><?= substr($t->NamaDiabetes, 0, 100) ?></td>

                      <td class="noPrint"><?php echo $t->Deskripsi; ?>
                      </td>
                      <!-- <td class="noPrint"> <?php $q_cek = $this->db->query("SELECT * FROM tabelpenyakit Where KodePenyakit='$t->KodePenyakit'")->result();
                                                foreach ($q_cek as $cek) {
                                                  echo $cek->NamaPenyakit;
                                                } ?></td> -->

                      <td><?php echo $t->solusi; ?></td>
                    </tr>

                  <?php } ?>

                </tbody>
              </table>




            </blockquote>
          </div>


</main>