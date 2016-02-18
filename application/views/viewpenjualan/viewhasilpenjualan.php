<table class="table">
	<caption>Hasil transaksi penjualan tanggal <?php echo $today; ?></caption>
	
	<thead>
		<tr>
			<th>No</th>
			<th>Barang</th>
			<th>Suplier</th>
			<th>Keterangan</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		foreach ($datapenjualan as $key) { ?>
			<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $key->IDBarang."-".$key->NamaBarang; ?></td>
			<td><?php echo $key->NamaSuplier; ?></td>
			<td><?php echo $key->Keterangan; ?></td>
			<td><?php echo $key->Harga; ?></td>
			<td><?php echo $key->Jumlah; ?></td>
			<td><a href="<?php echo base_url().'penjualan/inputpenjualan/edit/'.$key->IDTransaksi; ?>" class='btn btn-mini'>keterangan</a></td>
			</tr> 
		<?php 
			$no++;
			} ?>
		
	
	</tbody>
</table>