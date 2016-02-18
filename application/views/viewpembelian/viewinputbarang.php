
<h2 class="title">Penambahan Data Barang </h2>
<?php if ($this->session->flashdata('info')) {
				 ?>
			<div class="alert">
				<?php echo $this->session->flashdata('info'); ?>
				</div>

				<?php } ?>

<?php echo form_open('pembelian/inputbarang/tambah'); ?>
<?php echo validation_errors(); ?>

	<label>Kode Barang</label><br>
	<input type="text" name="kodebarang"/>
	<select>
		<option>daftar kode barang yang telah ada</option>
		<?php foreach ($kodebarang as $key) {
			echo "<option>".$key->IDBarang."</option>" ;
		} ?>
	</select><br>	
	<label>Kode Suplier</label><br>
	<select name="kodesuplier">
		<?php foreach ($kodesuplier as $key) { ?>
			<option value="<?php echo $key->IDSuplier; ?>"><?php echo $key->NamaSuplier; ?></option>
		<?php } ?>
	</select><br>
	<label>Nama Barang</label><br>
	<input type="text" name="namabarang"><br>
	<label>Jenis Barang</label><br>
	<input type="text" name="jenisbarang"><br>
	<label>Harga</label><br>
	<input type="text" name="harga"><br>
	<label>Jml. Persediaan Max</label><br>
	<input type="text" name="jmlmax"><br>
	<label>Jml. Persediaan Min</label><br>
	<input type="text" name="jmlmin"><br><br>
	<input type="submit" name="submit" class="btn">

<?php echo form_close(); ?>


