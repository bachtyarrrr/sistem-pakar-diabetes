<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=riwayat_gula.xls");

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

 <h3 class="box-title">Riwayat Gula Darah Peserta </h3>
      
     
       <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Waktu</th>        
            <th>Gula Darah</th>
            <th>Hasil Cek</th>
           
            

          </tr>
          </thead>
          <tbody>



<?php $i=1; 
 $id=$this->uri->segment('2');


$room_img=$this->db->query("SELECT * FROM log_gula join peserta on peserta.id_peserta=log_gula.id_peserta where peserta.id_peserta='$id'")->result();
foreach ($room_img as $t) {  ?>

          <tr>
            <td> <?php echo $i++; ?>
            </td>

            <td> <?php echo date('d-m-Y', strtotime($t->tanggal)); ?> </td>
            <td> <?php echo  $t->waktu; ?> </td>
            
            
            <td> <b><?php echo $t->kadar_gula; ?> mg/dL </b> </td>
             <td> <b><?php echo $t->hasil; ?> </b> </td>
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