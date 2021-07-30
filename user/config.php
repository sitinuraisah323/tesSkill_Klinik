<?php 

if (!isset($_SESSION)) {

session_start();
}

	//membuat config untuk menghubungkan php dengan database
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "db_klinik";

	$con = mysqli_connect($host, $user, $pass, $db) or die("Error !!!". mysql_error($con));

	function query($query){
		global $con;
		$result = mysqli_query($con,$query);
		$rows = [];
		while ( $row =  mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

//Tambah Data Pasien
	function tambah_pasien($data){
	global $con;
	//ambil data dari tiap elemen form
	$tgl_daftar= htmlspecialchars($data['tgl_daftar']);
	$nama_pasien= htmlspecialchars($data['nama_pasien']);
    $jenis_kelamin= htmlspecialchars($data['jenis_kelamin']);
    $umur= htmlspecialchars($data['umur']);
    $no_ktp= htmlspecialchars($data['no_ktp']);
    $alamat= htmlspecialchars($data['alamat']);
    $kota= htmlspecialchars($data['kota']);
    $id_pegawai= htmlspecialchars($data['id_pegawai']);

   

    
   
    //cek sudahada atau belum di database
		 $result = mysqli_query($con,"SELECT * FROM tb_pasien WHERE  tgl_daftar='$tgl_daftar' AND no_ktp='$no_ktp'");

		if ( mysqli_fetch_assoc($result) ) {
					echo "<script>
					alert(Pasien sudah terdaftar !);
					</script>";
					return false;
				}


	//query insert data 
	$query = "INSERT INTO tb_pasien VALUES('', '$tgl_daftar','$nama_pasien','$jenis_kelamin','$umur','$no_ktp','$alamat','$kota','$id_pegawai')";

	mysqli_query($con, $query);

	return mysqli_affected_rows($con);
	}

//Tambah Data Pegawai
	function tambah_pegawai($data){
	global $con;
	//ambil data dari tiap elemen form
	$foto= htmlspecialchars($data['foto']);
	$nama_pegawai= htmlspecialchars($data['nama_pegawai']);
    $alamat= htmlspecialchars($data['alamat']);
    $kota= htmlspecialchars($data['kota']);
    $no_hp= htmlspecialchars($data['no_hp']);
    $tarif_dokter= htmlspecialchars($data['tarif_dokter']);
    
   
    //cek sudahada atau belum di database
		 $result = mysqli_query($con,"SELECT * FROM tb_pegawai WHERE  no_hp='$no_hp'");

		if ( mysqli_fetch_assoc($result) ) {
					echo "<script>
					alert(Pasien sudah terdaftar !);
					</script>";
					return false;
				}


	//query insert data 
	$query = "INSERT INTO tb_pegawai VALUES('', '$foto','$nama_pegawai','$alamat','$kota','$no_hp','$tarif_dokter')";

	mysqli_query($con, $query);

	return mysqli_affected_rows($con);
	}


//Tambah Data Tindakan
	function tambah_tindakan($data){
	global $con;
	//ambil data dari tiap elemen form
	$jenis_tindakan= htmlspecialchars($data['jenis_tindakan']);
	$biaya= htmlspecialchars($data['biaya']);
    
   
    //cek sudahada atau belum di database
		 $result = mysqli_query($con,"SELECT * FROM tb_tindakan WHERE  jenis_tindakan='$jenis_tindakan'");

		if ( mysqli_fetch_assoc($result) ) {
					echo "<script>
					alert(Pasien sudah terdaftar !);
					</script>";
					return false;
				}


	//query insert data 
	$query = "INSERT INTO tb_tindakan VALUES('', '$jenis_tindakan','$biaya')";

	mysqli_query($con, $query);

	return mysqli_affected_rows($con);
	}

//Tambah Data Obat
	function tambah_obat($data){
	global $con;
	//ambil data dari tiap elemen form
	$nama_obat= htmlspecialchars($data['nama_obat']);
	$harga= htmlspecialchars($data['harga']);
    
   
    //cek sudahada atau belum di database
		 $result = mysqli_query($con,"SELECT * FROM tb_obat WHERE  nama_obat='$nama_obat'");

		if ( mysqli_fetch_assoc($result) ) {
					echo "<script>
					alert(Data Obat sudah ada !);
					</script>";
					return false;
				}


	//query insert data 
	$query = "INSERT INTO tb_obat VALUES('', '$nama_obat','$harga')";

	mysqli_query($con, $query);

	return mysqli_affected_rows($con);
	}

//Dokter
	//Ubah Data Pasien-Tindakan
	function tambah_tindakanpasien($data){
		global $con;

		$id_pasien= $data['id_pasien'];
		
		$tgl_daftar=$data['tgl_daftar'];
		$nama_pasien= htmlspecialchars($data['nama_pasien']);
	    $jenis_kelamin= htmlspecialchars($data['jenis_kelamin']);
	    $umur= htmlspecialchars($data['umur']);
	    $no_ktp= htmlspecialchars($data['no_ktp']);
	    $alamat= htmlspecialchars($data['alamat']);
	    $kota= htmlspecialchars($data['kota']);
	    $id_pegawai= htmlspecialchars($data['id_pegawai']);
	    $id_obat= htmlspecialchars($data['id_obat']);
	    $harga= htmlspecialchars($data['harga']);
	    $id_tindakan= htmlspecialchars($data['id_tindakan']);
   		$biaya= htmlspecialchars($data['biaya']);
   			
		$query = "UPDATE tb_pasien SET 
		tgl_daftar = '$tgl_daftar',
		nama_pasien = '$nama_pasien',
		jenis_kelamin = '$jenis_kelamin',
		umur = '$umur',
		no_ktp = '$no_ktp',
		alamat= '$alamat',
		kota = '$kota',
		id_pegawai = '$id_pegawai',
		id_obat = '$id_obat',
		harga = '$harga',
		id_tindakan ='$id_tindakan',
		biaya = '$biaya'
		WHERE id_pasien = '$id_pasien'
		";

		mysqli_query($con, $query);
		return mysqli_affected_rows($con);
	}
 

//Ubah Data Pasien
	function ubah_pasien($data){
		global $con;

		$id_pasien = $data['id_pasien'];
		$tgl_daftar= htmlspecialchars($data['tgl_daftar']);
		$nama_pasien= htmlspecialchars($data['nama_pasien']);
	    $jenis_kelamin= htmlspecialchars($data['jenis_kelamin']);
	    $umur= htmlspecialchars($data['umur']);
	    $no_ktp= htmlspecialchars($data['no_ktp']);
	    $alamat= htmlspecialchars($data['alamat']);
	    $kota= htmlspecialchars($data['kota']);
	    $dokter= htmlspecialchars($data['dokter']);

		$query = "UPDATE tb_pasien SET 
		tgl_daftar = '$tgl_daftar',
		nama_pasien = '$nama_pasien',
		jenis_kelamin = '$jenis_kelamin',
		umur = '$umur',
		no_ktp = '$no_ktp',
		alamat= '$alamat',
		kota = '$kota',
		dokter = '$dokter',
		WHERE id_pasien = $id_pasien
		";

		mysqli_query($con, $query);
		return mysqli_affected_rows($con);
	}
 

// REGISTRASI
	function registrasi($data){
		global $con;
		$nama_lengkap = strtolower(stripcslashes($data['nama_lengkap']));
		$username = strtolower(stripcslashes($data['username']));
		$password = mysqli_real_escape_string($con,$data['password']);
		$konpass = mysqli_real_escape_string($con,$data['konpass']);

		//cek username sudahada atau belum di database
		 $result = mysqli_query($con,"SELECT * FROM tb_user WHERE username = '$username'");



				if ( mysqli_fetch_assoc($result) ) {
					echo "<script>
					alert(Username sudah terdaftar !);
					</script>";
					return false;
				}

		//cek konfirmasi password
		if ($password !== $konpass) {
			echo "<script>
			alert(konfirmasi password tidak sesuai);
			</script>";
			return false;
		}
		
		//enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);
		mysqli_query($con,"INSERT INTO tb_user VALUES('','$nama_lengkap','$username','$password')");
		return mysqli_affected_rows($con);
	}

 ?>