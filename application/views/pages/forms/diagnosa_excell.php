<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=riwayat_diagnosa.xls");

?> 

	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

 <h3 class="box-title">Riwayat Diagnosa Peserta </h3>
      
     
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Nama Peserta</th>
            <th>Penyakit</th>
            <th>Diabetes</th>
            <th>Solusi</th>
           
            

          </tr>
          </thead>
          <tbody>



<?php $i=1; 

$room_img=$this->db->query("SELECT * FROM log_hasil join peserta on peserta.id_peserta=log_hasil.id_peserta join tabeldiabetes on tabeldiabetes.KodeDiabetes=log_hasil.KodePenyakit where log_hasil.id_peserta='$getGejala[id_peserta]'")->result();
foreach ($room_img as $t) {  ?>

          <tr>
            <td> <?php echo $i++; ?>
            </td>
            <td> <?php echo date('d-m-Y', strtotime($t->tanggal)); ?> </td>
            <td> <?php echo $t->waktu; ?> </td>
            <td> <?php echo $t->nama; ?> </td>
            <td> <b><?php echo $t->NamaDiabetes; ?> </b> <br/>
                <small><?php echo $t->Deskripsi; ?></small></td>

            <td> <?php   $q_cek=$this->db->query("SELECT * FROM tabelpenyakit Where KodePenyakit='$t->KodeDiabetes'")->result();
            foreach ($q_cek as $cek) { echo $cek->NamaPenyakit. ", ";  } ?></td>

              <td> <b><?php echo $t->solusi; ?> </b> </td>
           
          </tr>

  <?php } ?>

          </tbody>
          <!-- <tfoot>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>

          </tr>
          </tfoot> -->
        </table>