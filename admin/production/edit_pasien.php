
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

global $con;


    $id_pasien=$_GET['id_pasien'];
    $query_mysql = mysqli_query($con,"SELECT * FROM tb_pasien WHERE id_pasien = '$id_pasien'") or die (mysqli_error());
  $no = 1;

  foreach ($query_mysql as $data) {
  
    if(isset($_POST['ubah'])){
      if(ubah_pasien($_POST)>0){
        echo "<script>
        alert('Data Berhasil Diubah!')
        document.location.href='data_donatur_admin.php';
        </script>";
      }else{
        echo "<script>
        alert('Data Gagal Diubah!')
        </script>";
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
									<strong><h2>Edit Data Pasien<small></small></h2></strong>
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

											<input type="hidden" name="id_pasien" value="<?=$id_pasien;?>">

											<div class="form-group row">
											<label class="col-form-label col-md-2 col-sm-2 ">Tanggal Pendaftaran <span class="required">*</span>
											</label>
											<div class="col-md-4 col-sm-4 ">
												<input name="tgl_daftar" class="date-picker form-control" placeholder="dd-mm-yyyy" type="date" required="required" value="<?=$data['tgl_daftar']; ?>">
							
											</div>
											<label class="col-form-label col-md-2 col-sm-2 ">Jenis Kelamin *:</label>
										<p class="col-md-2 col-sm-2 ">
											L:
											<input type="radio" class="flat" name="jenis_kelamin" value="Laki-laki"  required />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; P:
											<input type="radio" class="flat" name="jenis_kelamin" value="Perempuan" />
										</p>
										</div>

											
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input value="<?=$data['nama_pasien']; ?>" name="nama_pasien" type="text" class="form-control has-feedback-left" placeholder="Nama Pasien">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>

										<div class="col-md-4 col-sm-4  form-group has-feedback">
											<input value="<?=$data['no_ktp']; ?>" name="no_ktp" type="text" class="form-control has-feedback-left" placeholder="Nomor KTP">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>
									<div class="col-md-2 col-sm-2  form-group has-feedback">
											<input value="<?=$data['umur']; ?>" name="umur" type="text" class="form-control has-feedback-left" placeholder="Umur">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 "> Alamat</label>
											<div class="col-md-7 col-sm-7 ">
												<input value="<?=$data['alamat']; ?>" name="alamat" type="text" class="form-control" placeholder="Jl. Raya Timur No. 169 Panjalu">
											</div>
										</div>
<?php 	


$kota= query("SELECT * FROM tb_wilayah ");
$pegawai= query("SELECT * FROM tb_pegawai");


 ?>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Kabupaten/Kota</label>
											<div class="col-md-7 col-sm-7 ">
												<select class="form-control" name="kota">
													<?php 	foreach ($kota as $datas) { ?>
													<option value="<?php echo $data['nama_kota'] ?>"> <?php echo $datas['nama_kota'] ?> </option>
												<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Dokter</label>
											<div class="col-md-7 col-sm-7 ">
												<select class="form-control" name="dokter">
													<?php 	foreach ($pegawai as $datas) { ?>
													<option value=" <?php echo $datas['nama_pegawai'] ?> "> <?php echo $datas['nama_pegawai'] ?> </option>
												<?php


												 } ?>
												</select>
											</div>
										</div>
	<?php } ?>
										<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<button type="button" class="btn btn-primary">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success" name="ubah">Submit</button>
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