<h2 class="title">Penambahan Data Suplier</h2>
<?php if ($this->session->flashdata('info')) {
				 ?>
			<div class="alert">
				<?php echo $this->session->flashdata('info'); ?>
				</div>

				<?php } ?>

<?php echo form_open('pembelian/inputsuplier/tambah'); ?>
<?php echo validation_errors(); ?>

	<label>Kode Suplier</label><br>
	<input type="text" name="kodesuplier"/><br>
	<label>Nama Supplier</label><br>
	<input type="text" name="namasuplier"><br>
	<label>Alamat Supplier</label><br>
	<textarea name="alamatsuplier"></textarea><br>
	<label>Kontak </label><br>
	<input type="text" name="kontak"><br><br>
	<input type="submit" name="submit" class="btn">

<?php echo form_close(); ?>

<table class="table table-bordered" align="center">
	<h2 class="title">Data Suplier</h2>
	<caption>Daftar data suplier yang telah diinput pada aplikasi pengelolaan persediaan, untuk melakukan editing klik <b>edit</b> dan 
		jika ingin menghapus klik <b>hapus</b></caption>
	<thead>
		<tr>
			<th>No.</th>
			<th>Kode Suplier</th>
			<th>Nama Suplier</th>
			<th>Alamat Suplier</th>
			<th>Kontak</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		foreach ($isi as $key) {
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$key->IDSuplier."</td>";
			echo "<td>".$key->NamaSuplier."</td>";
			echo "<td>".$key->AlamatSuplier."</td>";
			echo "<td>".$key->Telepon."</td>";
			echo "<td><a href=".base_url()."pembelian/inputsuplier/edit/".$key->IDSuplier." class='btn btn-mini'>edit</a> || <a href=".base_url()."pembelian/inputsuplier/hapus/".$key->IDSuplier." class='btn btn-mini'>hapus</a></td>";
			echo "</tr>";
			$no++;
		} ?>
		
	</tbody>
</table>

