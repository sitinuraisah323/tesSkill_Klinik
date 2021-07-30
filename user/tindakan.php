

<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:registrasi_user.php#signin");  
 }  
 

include('../layout/header_user1.php'); ?>
  

  <?php
//koneksi database
include ('config.php');

if(isset($_POST['submit'])){
        if(tambah_pasien($_POST)>0){
            echo 
            "<script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href='index.php';
        
                exit;
            </script>";
        }else{
            echo mysqli_error($con);
        }
    }
?>
    <div class="below-slideshow">
         <div class="container">
        <div class="row">
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="txt-block">
                    <h1 class="head-line">FORM DAFTAR PASIEN</h1>
									
                 </div>
            </div>
        </div>

    </div>
    </div>
    <!-- BELOW SLIDESHOW SECTION END-->
      
    <div class="just-sec">
        

        <div class="container">
             
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
                <div class="just-txt-div">
                    <form method="post">
              
                                    
   <?php    


$kota= query("SELECT * FROM tb_wilayah ");
$pegawai= query("SELECT * FROM tb_pegawai");
$obat= query("SELECT * FROM tb_obat");


 ?>                                     
                                 <div class="form-group">
                                            <label>Tanggal Daftar</label>
                                            <input required="" name="tgl_daftar" class="form-control" type="date" />
                                        </div>
                                <div class="form-group">
                                            <label>Nama Pasien </label>
                                            <input required="" name="nama_pasien" class="form-control" type="text" />
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat </label>
                                            <input required="" name="alamat" class="form-control" type="text" />
                                        </div>
                                        <div class="form-group">
                                            <label>Dokter </label>
                                            <select class="form-control" required="" name="id_pegawai">
                                                <?php   foreach ($pegawai as $datas) { ?>
                                                    <option value=" <?php echo $datas['id_pegawai'] ?> "> <?php echo $datas['nama_pegawai'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                               
                                 
                                        

                            </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
                <div class="just-txt-div">

              
									
                                       
                                 <div class="form-group ">
                                            <label >Jenis Kelamin *:</label>
                                        <p>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L:
                                            <input type="radio"  required="" name="jenis_kelamin" value="Laki-laki"  required />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; P:
                                            <input type="radio"  required="" name="jenis_kelamin" value="Perempuan" />
                                        </p>
                                        
                                    </div>
                                    <div class="form-group col-lg-7 col-md-7 col-sm-7 col-xs-10" >
                                            <label >Nomor KTP </label>
                                            <input required="" name="no_ktp" class="form-control" type="number" />
                                        </div>
                                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-10 " >
                                            <label>Umur </label>
                                            <input required="" name="umur" class="form-control" type="number" />
                                        </div>
                                
                                        
                                        <div class="form-group" >
                                            <label >Kabupate/Kota</label>
                                            
                                                <select class="form-control" required="" name="kota">
                                                    <?php   foreach ($kota as $data) { ?>
                                                    <option value="<?php echo $data['nama_kota'] ?>"> <?php echo $data['nama_kota'] ?> </option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div><br><br>
                                
                                 
                                        <button type="submit" name="submit" class="btn btn-success btn-lg">SEND QUERY </button>
                                        </form>

                            </div>
            </div>
            
        </div>
             
    </div>
    </div>         
     <!--JUST SECTION END-->
     
<?php include('../layout/footer_user1.php'); ?>