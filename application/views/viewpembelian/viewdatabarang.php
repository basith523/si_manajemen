<table class="table table-bordered" align="center">
	<h2 class="title">Data Barang</h2>
	<?php if ($this->session->flashdata('info')) {
				 ?>
			<div class="alert">
				<?php echo $this->session->flashdata('info'); ?>
				</div>

				<?php } ?>
	<?php echo form_open('pembelian/inputbarang'); ?>
		<select name="kode_suplier">
			<?php foreach ($datasuplier as $key) { ?>
			<option value="<?php echo $key->IDSuplier;?>"><?php echo $key->NamaSuplier; ?></option>
			<?php } ?>
		</select> <br><br>
		<input type="submit" name="cari" value="cari">
	<?php echo form_close(); ?>
	<br>

	<caption>Daftar data barang yang telah diinput pada aplikasi pengelolaan persediaan, untuk melakukan menambah data barang klik <b>tambah barang</b>, untuk editing klik <b>edit</b> dan 
		jika ingin menghapus klik <b>hapus</b></caption> <br>

	<button type="button" class="btnbtn-primary"><a href="<?php echo base_url()?>pembelian/inputbarang/tambah">Tambah Barang</a></button>	
	<thead>
		<tr>
			<th>No.</th>
			<th>Kode Barang</th>
			<th>Kode Supplier</th>
			<th>Nama Barang</th>
			<th>Jenis Barang</th>
			<th>Harga satuan</th>
			<th>Jml Max</th>
			<th>Jml Min</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		foreach ($databarang as $key) {
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$key->IDBarang."</td>";
			echo "<td>".$key->IDSuplier."</td>";
			echo "<td>".$key->NamaBarang."</td>";
			echo "<td>".$key->Jenis."</td>";
			echo "<td>Rp. ".str_replace(",",".",number_format($key->Harga))."</td>";
			echo "<td>".$key->Jml_max."</td>";
			echo "<td>".$key->Jml_min."</td>";
			
			echo "<td><a href=".base_url()."pembelian/inputbarang/edit/".$key->IDBarang." class='btn btn-mini'>edit</a> || <a href=".base_url()."pembelian/inputbarang/hapus/".$key->IDBarang." class='btn btn-mini'>hapus</a></td>";
			echo "<tr/>";
			$no++;
		} ?>
		
	</tbody>
</table>
