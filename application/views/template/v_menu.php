<?php
		if($this->session->userdata('level')=='Pembelian'){
		
		echo '
		<h2>Data Suplier</h2><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="'.base_url().'pembelian/inputsuplier/">Input Suplier</a><br/><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="'.base_url().'pembelian/inputbarang/">Input Barang </a><br/><br/>
		<h2>Transaksi</h2><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="'.base_url().'pembelian/transaksipembelian/">Pembelian </a><br/><br/>
		<h2>Laporan</h2><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="'.base_url().'laporan/datasuplier/">Data Suplier </a><br/><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="'.base_url().'laporan/datatransaksipembelian/">Pembelian </a><br/><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="'.base_url().'laporan/stokbarang/">Stock Barang </a><br/><br/>
		';
		
		}
		else if($this->session->userdata('level')=='Penjualan'){
		
		echo '
		<h2>Transaksi</h2><br/>
		<span class="glyphicon glyphicon-euro"></span> <a href="'.base_url().'penjualan/inputpenjualan/">Penjualan</a><br/><br/>
		<span class="glyphicon glyphicon-euro"></span> <a href="'.base_url().'penjualan/returpenjualan/">Retur Penjualan </a><br/><br/>
		<h2>Laporan</h2><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="'.base_url().'laporan/datatransaksipenjualan/">Penjualan </a><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="'.base_url().'laporan/databarangretur/">Barang yang Diretur </a><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="'.base_url().'laporan/stockbarang/">Stock Barang </a><br/>
		';
		
		} else {
		echo '
		<h2>laporan<h2/><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="#">Data Suplier</a><br/><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="#">Pembelian</a><br/><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="#">Penjualan</a><br/><br/>
		<span class="glyphicon glyphicon-book"></span> <a href="#">Stock Barang</a><br/><br/>
		';
		
		}
		
		echo '<span class="glyphicon glyphicon-log-out"></span> <a href="'.base_url().'login/user/logout/">Logout</a>';
?>		