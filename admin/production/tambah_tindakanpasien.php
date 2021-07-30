
<?php include('../../layout/header.php');?>


<?php
//koneksi database
include ('../../user/config.php');
global $con;


    $id_pasien=$_GET['id_pasien'];
    $query_mysql = mysqli_query($con,"SELECT * FROM tb_pasien WHERE id_pasien = '$id_pasien'") or die (mysqli_error());
  $no = 1;

  foreach ($query_mysql as $data) {


if(isset($_POST['submit'])){
        if(tambah_tindakanpasien($_POST)>0){
            echo 
            "<script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href='data_tindakan.php';
        
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
									<strong><h2>Tambah Data Tindakan<small></small></h2></strong>
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
											<label class="control-label col-md-3 col-sm-3 ">No Pendafataran </label>
											<div class="col-md-7 col-sm-7 ">
												<input type="text" class="form-control" disabled="disabled" name="id_pasien" value=" <?= $data['id_pasien']; ?> ">
											</div>
										</div>
										</div>

										
												<input name="tgl_daftar" class="date-picker form-control" placeholder="dd-mm-yyyy" type="hidden" required="required" value="<?=$data['tgl_daftar']; ?>">
							
											
											<input value="<?=$data['jenis_kelamin']; ?>" name="jenis_kelamin" type="hidden" class="form-control has-feedback-left" placeholder="Jenis Kelam">

											<input value="<?=$data['nama_pasien']; ?>" name="nama_pasien" type="hidden" class="form-control has-feedback-left" placeholder="Nama Pasien">

											<input value="<?=$data['no_ktp']; ?>" name="no_ktp" type="hidden" class="form-control has-feedback-left" placeholder="Nomor KTP">

											<input value="<?=$data['umur']; ?>" name="umur" type="hidden" class="form-control has-feedback-left" placeholder="Umur">

												<input value="<?=$data['alamat']; ?>" name="alamat" type="hidden" class="form-control" placeholder="Jl. Raya Timur No. 169 Panjalu">

											<input value="<?=$data['kota']; ?>" name="kota" type="hidden" class="form-control has-feedback-left" placeholder="Kota">
											<input value="<?=$data['id_obat']; ?>" name="id_obat" type="hidden" class="form-control" placeholder="Jl. Raya Timur No. 169 Panjalu">

											<input value="<?=$data['harga']; ?>" name="harga" type="hidden" class="form-control has-feedback-left" placeholder="harga">

												<input value="<?=$data['id_pegawai']; ?>" name="id_pegawai" type="hidden" class="form-control" placeholder="Jl. Raya Timur No. 169 Panjalu">
			
	
<?php 
$tindakan= query("SELECT * FROM tb_tindakan "); ?>
										<div class="form-group row">
											<label class="control-label col-md-3 col-sm-3 ">Jenis Tindakan</label>
											<div class="col-md-7 col-sm-7 ">
												<select class="form-control" name="id_tindakan">
													<?php 	foreach ($tindakan as $tindak) { ?>
													<option value="<?php echo $tindak['id_tindakan'] ?>"> <?php echo $tindak['jenis_tindakan'] ?> </option>
												
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 "> Biaya</label>
											<div class="col-md-7 col-sm-7 ">
												<input name="biaya" type="text" class="form-control" placeholder="Biaya">
											</div>
										</div>
				
<?php } ?>
<?php } ?>
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


<?php include('../../layout/footer.php'); ?>