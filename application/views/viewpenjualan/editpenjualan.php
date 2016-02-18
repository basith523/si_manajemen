<h2 class="title">Keterangan</h2>
<p>Tambah keterangan dibawah ini</p>

<?php echo form_open('penjualan/inputpenjualan/edit/'.$datatransaksi->IDTransaksi); ?>
<label>Kode transaksi</label><br> <b><?php echo $datatransaksi->IDTransaksi; ?></b><br>
<input type="hidden" name="kodetransaksi" value="<?php echo $datatransaksi->IDTransaksi;?>">
<label>Kode Barang</label><br> <b><?php echo $datatransaksi->IDBarang; ?></b><br>
<input type="hidden" name="kodebarang" value="<?php echo $datatransaksi->IDBarang;?>">
<label>Keterangan</label><br>
<textarea name="keterangan" required><?php echo $datatransaksi->Keterangan; ?></textarea><br>
<input type="hidden" name="tanggal" value="<?php echo $datatransaksi->TglTransaksi; ?>">
<input type="hidden" name="jumlah" value="<?php echo $datatransaksi->Jumlah; ?>">
<input type="hidden" name="status" value="<?php echo $datatransaksi->Status; ?>">
<input type="submit" name="submit" value="submit">
<?php echo form_close(); ?>