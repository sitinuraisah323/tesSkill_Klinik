
<?php

session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:../../index_admin.php#signin");  
 }  include('../../layout/header_admin.php');?>


<?php
//koneksi database
include ('../../user/config.php');

if(isset($_POST['submit'])){
        if(tambah_tindakan($_POST)>0){
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
											<label class="col-form-label col-md-3 col-sm-3 ">Jenis Tindakan</label>
											<div class="col-md-7 col-sm-7 ">
												<input name="jenis_tindakan" type="text" class="form-control" placeholder="Jenis Tindakan">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 "> Biaya</label>
											<div class="col-md-7 col-sm-7 ">
												<input name="biaya" type="text" class="form-control" placeholder="Biaya">
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