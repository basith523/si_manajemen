    <body class="bg-black">
        <div class="form-box-width">
            <div class="header">Contoh Aplikasi Login Multi User</div>
                <div class="body bg-gray">
                    

<div class="row">
	<!-- blok menu kiri -->
	<div class="col-sm-3">

	<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"><span class="glyphicon glyphicon-th-list"></span> Menu Utama</h3>
                                </div> <!--./akhir box-header -->
			<div class="box-body">
			<?php
			$this->load->view('template/v_menu');
			?>
			</div>	<!--./akhir box-body--> 
		</div> <!--./akhir box box-primary-->

		<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"><span class="glyphicon glyphicon-user"></span> Profil User</h3>
                                </div> <!--./akhir box-header -->
			<div class="box-body">
			<div align="center">Hai, <?php echo $this->session->userdata('nama_lengkap');?><br>
			Anda login sebagai Bagian <?php echo $this->session->userdata('level');?></div>
			</div>	<!--./akhir box-body--> 
		</div> <!--./akhir box box-primary-->

		
	</div> <!--./akhir blok menu kiri-->

	<!-- blok konten kanan -->
	<div class="col-sm-9">
		 <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Selamat Datang</h3>
                                </div> <!--./akhir box-header -->
			<div class="box-body">
				<?php $this->load->view($content); ?>
			</div>	<!--./akhir box-body--> 
		</div> <!--./akhir box box-primary-->						
	</div>	<!-- akhir blok konten kanan -->
</div>



					
                </div>
                <div class="footer">                                                               
                    <p>&copy; Oyazhuryachna</p>  
                    
                </div>
        </div>
    </body>
