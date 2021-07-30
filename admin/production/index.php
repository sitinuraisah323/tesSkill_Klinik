<?php 
session_start();  
 if(!isset($_SESSION["username"]))  
 {  
      header("location:../index_admin.php#signin");  
 }  

include('../../layout/header_admin.php');?>

 <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <img src="">
          <!-- /top tiles -->
      </div>

<?php include('../../layout/footer_admin.php'); ?>