<h2 class="title">Transaksi pembelian barang</h2>
<p>Untuk melakukan transaksi Pembelian, isi form dibawah ini</p>
<p>Transaksi yang dilakukan pada tanggal <b><?php echo $tanggal; ?></b></p>
	<?php if ($this->session->flashdata('info')) 
		{
				 ?>
			<div class="alert">
				<?php echo $this->session->flashdata('info'); ?>
				</div>

	<?php } ?>

	<?php echo form_open('pembelian/transaksipembelian/tambah'); ?>
		<?php echo validation_errors(); ?>

		<table width="50%" align="center">
				<tr>
					<td>Kode - Nama Barang</td>
					<td>
						<select name="kodebarang">
							<option >pilih barang</option>
							<?php foreach ($databarang as $key ) { ?>
								<option value="<?php echo $key->IDBarang ?>"><?php echo $key->IDBarang."-".$key->NamaBarang; ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td> <input type="text" name="keterangan"> </td>
				</tr>
				<tr>
					<td>Jumlah pembelian</td>
					<td><input type="text" name="jumlah" size="5" required></td>
					<input type="hidden" name="tanggalbeli" value="<?php echo $tanggal; ?>">
					<input type="hidden" name="status" value="masuk">
				</tr>
		<tr>
			<td><input type="submit" name="submit" value="submit"></td></tr>
		</table>
	<?php form_close(); ?>

<table class="table">
	<caption>data transaksi pada tanggal <b><?php echo $tanggal; ?></b></caption>
	<thead>
		<tr>
			<th>No.</th>
			<th>Barang</th>
			<th>Suplier</th>
			<th>Keterangan</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>option</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1; 
		foreach ($datatransaksi as $key) { 
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$key->NamaBarang."</td>";
			echo "<td>".$key->NamaSuplier."</td>";
			echo "<td>".$key->Keterangan."</td>";
			echo "<td>".$key->Harga."</td>";
			echo "<td>".$key->Jumlah."</td>";
			echo "<td><a href=".base_url()."pembelian/transaksipembelian/hapus/".$key->IDTransaksi." class='btn btn-mini'>hapus</a></td>";
			echo "</tr>";

			$no++;
		} 
		?>
		
	</tbody>
</table>