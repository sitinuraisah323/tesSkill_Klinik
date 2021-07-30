
<?php 
session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:../../index_admin.php#signin");  
 } 
include('../../layout/header_admin.php');?>


<?php
//koneksi database
include ('../../user/config.php');

if(isset($_POST['submit'])){
        if(tambah_pegawai($_POST)>0){
            echo 
            "<script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href='data_pegawai.php';
        
                exit;
            </script>";
        }else{
            echo mysqli_error($con);
        }
    }
?>
         
        ?>

<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
			<div class="row">
						<div class="col-md-12 ">
							<div class="x_panel">
								<div class="x_title">
									<strong><h2>Tambah Data Pegawai<small></small></h2></strong>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="#">Settings 1</a>
												<a class="dropdown-item" href="#">Settings 2</a>
											</div>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form method="post" action="" class="form-label-left input_mask">
										
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 "> Foto Pegawai</label>
											<div class="col-md-7 col-sm-7 ">
												<input name="foto" type="file" class="form-control" placeholder="Gambar">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 "> Nama Pegawai</label>
											<div class="col-md-7 col-sm-7 ">
												<input name="nama_pegawai" type="text" class="form-control" placeholder="Nama Pegawai">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 "> Alamat</label>
											<div class="col-md-7 col-sm-7 ">
												<input name="alamat" type="text" class="form-control" placeholder="Alamat">
											</div>
										</div>
										<?php 	


$kota= query("SELECT * FROM tb_wilayah ");
$pegawai= query("SELECT * FROM tb_pegawai");


 ?>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Kabupate/Kota</label>
											<div class="col-md-7 col-sm-7 ">
												<select class="form-control" name="kota">
													<?php 	foreach ($kota as $data) { ?>
													<option value="<?php echo $data['nama_kota'] ?>"> <?php echo $data['nama_kota'] ?> </option>
												<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 "> Nomor Telepon</label>
											<div class="col-md-7 col-sm-7 ">
												<input name="no_hp" type="text" class="form-control" placeholder="Nomor Handphone">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 "> Tarif</label>
											<div class="col-md-7 col-sm-7 ">
												<input name="tarif_dokter" type="text" class="form-control" placeholder="Tarif">
											</div>
										</div>


										<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<button type="button" class="btn btn-primary">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success" name="submit">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>



					</div>		
					</div>
				</div>
			</div>


<?php include('../../layout/footer_admin.php'); ?>