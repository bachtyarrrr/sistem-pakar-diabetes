<main id="main">
    <section
        style="background-image: url(<?php echo base_url(); ?>assets/medbloc/images/img01.png); background-size:cover; height:100px">

    </section>

    <section id="data" class="content-sec container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class=" fwbold text-capitalize">Jawablah pertanyaan berikut ini : </h3>
                <!-- content holder of the page -->
                <div class="content-block fwLight">

                    <div class="container">
                        <div class="jawaban">
                            <div class="row">
                                <?php echo form_open('Halaman/jawab'); ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th style="width:50px">Yes</th>
                                            <th style="width:50px">No</th>
                                        </tr>

                                    </thead>
                                    <tbody>


                                        <?php
										$no = 1;
										$konsul = $this->db->query("SELECT * FROM tabelpertanyaan order by NoPertanyaan Asc")->result();

										foreach ($konsul as $kons) {
											$pj = '';
											$uname = $this->session->userdata('username');
											$hasiljawaban = $this->db->query("SELECT * FROM riwayatjawaban where username='$uname' and kodePertanyaan='$kons->KodePertanyaan' order by noRjawaban")->result();
											foreach ($hasiljawaban as $hj) {
												if ($kons->KodePertanyaan == $hj->kodePertanyaan) {
													$pj = $hj->jawaban;
												}
											}
										?>
                                        <tr>
                                            <td>
                                                <h4><?php echo $no++; ?>). <?php $pj ?> </h4>
                                            </td>
                                            <td>
                                                <h4><?php echo $kons->Pertanyaan; ?></h4>
                                            </td>
                                            <td><input <?php if ($pj == "YA") { ?> checked <?php } ?>
                                                    onclick="getJawaban('<?php echo $kons->KodePertanyaan ?>');"
                                                    type="radio" class="form-control"
                                                    name="<?php echo $kons->KodePertanyaan ?>" value="YA" required>
                                            </td>
                                            <td><input <?php if ($pj == "NO") { ?> checked <?php } ?>
                                                    onclick="getJawaban('<?php echo $kons->KodePertanyaan ?>')"
                                                    type="radio" class="form-control"
                                                    name="<?php echo $kons->KodePertanyaan ?>" value="NO" required>
                                            </td>

                                        </tr>

                                        <?php }  ?>

                                    </tbody>
                                </table>

                                <div>Apakah anda yakin akan menggunakan data ini untuk diproses? &nbsp;
                                </div>
                                <button type="submit" name="btnYa"
                                    onclick="return confirm('Anda Yakin Akan Memproses Data?')"
                                    class="btnPilihanYa btn-primary btn-grey"><i class="fa fa-check"></i> Proses
                                    Evaluasi</button>

                                <?php echo form_close(); ?>

                            </div>


    </section>
    <!-- /.content -->
    </div>

    </div>

    </div>
    </div>
    </section>
</main>

<script>
function getJawaban(nama_jawaban) {
    console.log($('input[name="' + nama_jawaban + '"]:checked').val());
    $.ajax({
        url: "/pakar_minat/Halaman/JawabSatu",
        method: "POST",
        dataType: "json",
        data: {
            kd_pert: nama_jawaban,
            jawab: $('input[name="' + nama_jawaban + '"]:checked').val()
        },
        success: function(result) {
            alert("result: " + result);

        }
    });
}
</script>