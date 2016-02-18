<h2 class="title">Edit Data Suplier</h2>
<?php if ($this->session->flashdata('info')) {
				 ?>
			<div class="alert">
				<?php echo $this->session->flashdata('info'); ?>
				</div>

				<?php } ?>

<?php echo form_open('pembelian/inputsuplier/edit/'.$editdata->IDSuplier);?>
<?php echo validation_errors(); ?>

	<label>Kode Suplier</label><br>
	<input type="text" name="kodesuplier" value="<?php echo $editdata->IDSuplier; ?>" disabled><br>
	<label>Nama Supplier</label><br>
	<input type="text" name="namasuplier" value="<?php echo $editdata->NamaSuplier; ?>"><br>
	<label>Alamat Supplier</label><br>
	<textarea name="alamatsuplier"><?php echo $editdata->AlamatSuplier; ?></textarea><br>
	<label>Kontak </label><br>
	<input type="text" name="kontak" value="<?php echo $editdata->Telepon; ?>"><br><br>
	<input type="hidden" name="id" value="<?php echo $editdata->IDSuplier; ?>">
	<input type="submit" name="submit" class="btn" value="update"> 
<?php echo form_close(); ?>