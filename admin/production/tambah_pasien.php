
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
        if(tambah_pasien($_POST)>0){
            echo 
            "<script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href='data_pasien.php';
        
                exit;
            </script>";
        }else{
            echo mysqli_error($con);
        }
    }
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
									<strong><h2>Tambah Data Pasien<small></small></h2></strong>
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
											<label class="col-form-label col-md-2 col-sm-2 ">Tanggal Pendaftaran <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input name="tgl_daftar" class="date-picker form-control" placeholder="dd-mm-yyyy" type="date" required="required" >
							
											</div>
											<label class="col-form-label col-md-2 col-sm-2 ">Jenis Kelamin *:</label>
										<p class="col-md-2 col-sm-2 ">
											L:
											<input type="radio" class="flat" name="jenis_kelamin" value="Laki-laki"  required />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; P:
											<input type="radio" class="flat" name="jenis_kelamin" value="Perempuan" />
										</p>
										</div>

											
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input name="nama_pasien" type="text" class="form-control has-feedback-left" placeholder="Nama Pasien">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>

										<div class="col-md-4 col-sm-4  form-group has-feedback">
											<input name="no_ktp" type="text" class="form-control has-feedback-left" placeholder="Nomor KTP">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>
									<div class="col-md-2 col-sm-2  form-group has-feedback">
											<input name="umur" type="text" class="form-control has-feedback-left" placeholder="Umur">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 "> Alamat</label>
											<div class="col-md-7 col-sm-7 ">
												<input name="alamat" type="text" class="form-control" placeholder="Jl. Raya Timur No. 169 Panjalu">
											</div>
										</div>
<?php 	


$kota= query("SELECT * FROM tb_wilayah ");
$pegawai= query("SELECT * FROM tb_pegawai");
$obat= query("SELECT * FROM tb_obat");


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
											<label class="control-label col-md-3 col-sm-3 ">Dokter</label>
											<div class="col-md-7 col-sm-7 ">
												<select class="form-control" name="id_pegawai">
													<?php 	foreach ($pegawai as $datas) { ?>
													<option value=" <?php echo $datas['id_pegawai'] ?> "> <?php echo $datas['nama_pegawai'] ?> </option>
												<?php } ?>
												</select>
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