<h2 class="title">Transaksi pembelian</h2>
<p>untuk mendata pembelian barang masuk, silahkan tentukan tanggal pembelian</p><br>

<?php $today= date("Y-m-d"); ?>

<?php if ($this->session->flashdata('info')) 
		{
				 ?>
			<div class="alert">
				<?php echo $this->session->flashdata('info'); ?>
				</div>

	<?php } ?>

<?php echo form_open('pembelian/transaksipembelian/'); ?>
<p>Tanggal transaksi <input type="date" name="tanggaltransaksi" size="15" value="<?php echo $today; ?>"></p>
<p><input type="submit" name="submit" value="next"></p>
<?php echo form_close(); ?>