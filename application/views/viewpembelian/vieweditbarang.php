<h2 class="title">Edit Data Suplier</h2>
<?php if ($this->session->flashdata('info')) {
				 ?>
			<div class="alert">
				<?php echo $this->session->flashdata('info'); ?>
				</div>

				<?php } ?>

<?php echo form_open('pembelian/inputbarang/edit/'.$editdata->IDBarang);?>
<?php echo validation_errors(); ?>
	
	<label>Kode Barang</label><br>
	<input type="text" name="kodebarang" value="<?php echo $editdata->IDBarang; ?>" disabled><br>
	<label>Kode Suplier</label><br>
	<!--<input type="text" name="kodesuplier" value="<?php //echo $editdata->IDSuplier; ?>"><br>-->
	<select name="kodesuplier">
		<option value="<?php echo $editdatasuplier->IDSuplier; ?>"><b><?php echo $editdatasuplier->IDSuplier."</b>||<b>".$editdatasuplier->NamaSuplier; ?></b></option>
		<option>----------</option>
		<?php foreach ($datasuplier as $key) { ?>
			<option value="<?php echo $key->IDSuplier; ?>"><?php echo $key->IDSuplier."||".$key->NamaSuplier; ?></option>
		<?php } ?>
	</select><br>
	<label>Nama Barang</label><br>
	<input type="text" name="namabarang" value="<?php echo $editdata->NamaBarang; ?>"><br>
	<label>Jenis Barang</label><br>
	<input type="text" name="jenisbarang" value="<?php echo $editdata->Jenis; ?>"><br>
	<label>Harga</label><br>
	<input type="text" name="harga" value="<?php echo $editdata->Harga; ?>"><br>
	<label>Jml. Persediaan Max</label><br>
	<input type="text" name="jmlmax" value="<?php echo $editdata->Jml_max; ?>"><br>
	<label>Jml. Persediaan Min</label><br>
	<input type="text" name="jmlmin" value="<?php echo $editdata->Jml_min; ?>"><br><br>

	<input type="hidden" name="id" value="<?php echo $editdata->IDBarang; ?>">
	<input type="submit" name="submit" class="btn" value="update"> 
<?php echo form_close(); ?>