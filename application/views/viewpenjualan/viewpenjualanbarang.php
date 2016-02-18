<h2 class="title">Transaksi penjualan barang</h2>
<p>untuk melkaukan transaksi silahkan isi form dibawah</p>

<?php $today= date("Y-m-d");
$this->load->model('m_penjualan'); ?>
<?php if ($this->session->flashdata('info')) {
				 ?>
			<div class="alert">
				<?php echo $this->session->flashdata('info'); ?>
				</div>

				<?php } ?>

<?php echo form_open('penjualan/inputpenjualan'); ?>
<?php echo validation_errors(); ?>
<label>Suplier - Nama Barang - Sisa </label><br>
<select name="kodebarang">
	<option value="-">Pilih barang</option>
	<?php foreach ($databarang as $key ) { ?>
		<option value="<?php echo $key->IDBarang;?>">
			<?php echo $this->m_penjualan->namasuplier($key->IDSuplier); ?> - 
			<?php echo $key->NamaBarang; ?> -
			<?php echo $this->m_penjualan->sisabarang($key->IDBarang); 
				// $no=0;
				// $hasil=2;
				// for ($i=0; $i <5 ; $i++) { 
				// 	$no = $no+$hasil;
				// }
				// echo $no;
			?>
		</option>
	<?php } ?>
</select><br>
	<label>Keterangan</label><br>
	<input type="text" name="keterangan" width="50%"><br>
	<label>Jumlah penjualan</label><br>
	<input type="text" name="jumlah" required><br><br>
<input type="submit" name="submit" value="input">

<?php echo form_close(); ?>

<?php echo form_open('penjualan/inputpenjualan/tambah'); ?>

<table class = "table">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Barang - suplier</th>
			<th>Jumlah</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>no</td>
			<td>bla</td>
			<td>12000</td>
			<td>12900</td>
		</tr>
		<tr style="background:grey; color:white;">
			<td colspan="3">total</td>
			<td>1000</td>
		</tr>
		<tr>
			<td colspan="3">uang</td>
			<td>21000</td>
		</tr>
		<tr style="background:green; color:white;">
			<td colspan="3">kembalian</td>
			<td>1000</td>
		</tr>
	</tbody>
</table>

<?php echo form_close(); ?>