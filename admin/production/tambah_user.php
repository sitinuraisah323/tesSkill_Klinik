
<?php

session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:../../index_admin.php#signin");  
 } 
 include('../../layout/header_admin.php');?>



<?php include('../../layout/footer_admin.php'); ?>