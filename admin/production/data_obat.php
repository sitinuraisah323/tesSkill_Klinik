<?php 

session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:../../index_admin.php#signin");  
 }  
include('../../layout/header_admin.php');

//koneksi database
include ('../../user/config.php');

$obat= query("SELECT * FROM tb_obat ");

?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                   
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

           <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Obat<small></small></h2>
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

                  <div class="row fontawesome-icon-list">
                  <div class="fa-hover col-md-3 col-sm-4  "><h6><a href="tambah_obat.php"><i class="fa fa-plus-square-o"></i> Tambah Data</a></h6>
                  </div>
                </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Obat </th>
                          <th>Harga </th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php 
                         $no = 0;
                         foreach ($obat as $data) { ?>
                              <tr>
                                <td><?php echo ++$no; ?></td>
                                <?php $data['id_obat']; ?>
                                <td><?php echo $data['nama_obat']; ?></td>
                                <td><?php echo $data['harga']; ?></td>
                              <td>
                                <div clhargass="x_content">
                                    <a href="" class="btn btn-app">
                                      <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="" class="btn btn-app">
                                      <i class="fa fa-trash"></i> Edit
                                    </a>
                                  </div>
                              </td>
                            </tr>

                            <?php } ?>

                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include('../../layout/footer_admin.php'); ?>