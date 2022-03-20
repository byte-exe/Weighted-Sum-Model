<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak laporan</title>
</head>
<body>


<center>

<h3>Laporan Data Perangkingan</h3>
<h2>Anggota Pemadam Kebakaran</h2>

</center>
<?php  

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


?> 


<?php  
$maxRows_rs_alternatif = 10;
$pageNum_rs_alternatif = 0;
if (isset($_GET['pageNum_rs_alternatif'])) {
  $pageNum_rs_alternatif = $_GET['pageNum_rs_alternatif'];
}
$startRow_rs_alternatif = $pageNum_rs_alternatif * $maxRows_rs_alternatif;

mysqli_select_db($koneksi, $database_koneksi);
$query_rs_alternatif = "SELECT id_alternatif, nama_alternatif, preferentif  FROM tb_alternatif ORDER BY preferentif DESC";
$query_limit_rs_alternatif = sprintf("%s LIMIT %d, %d", $query_rs_alternatif, $startRow_rs_alternatif, $maxRows_rs_alternatif);
$rs_alternatif = mysqli_query($koneksi, $query_limit_rs_alternatif) or die(mysqli_error($koneksi));
$row_rs_alternatif = mysqli_fetch_assoc($rs_alternatif);

if (isset($_GET['totalRows_rs_alternatif'])) {
  $totalRows_rs_alternatif = $_GET['totalRows_rs_alternatif'];
} else {
  $all_rs_alternatif = mysqli_query($koneksi, $query_rs_alternatif);
  $totalRows_rs_alternatif = mysqli_num_rows($all_rs_alternatif);
}
$totalPages_rs_alternatif = ceil($totalRows_rs_alternatif/$maxRows_rs_alternatif)-1;
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


 
<?php if ($row_rs_alternatif['preferentif'] > 0) { ?>
 <div class="table-responsive"> <?php pesan('success','HASIL PERINGKAT YANG DIPEROLEH'); ?> 
<table width="100%" class="table table-striped table-bordered">
<thead>
   <tr bgcolor="#003366">
     
     <th width="30%"><div align="center"><span class="style1">NAMA</span></div></th>
     <th width="60%"><div align="center"><span class="style1">NILAI HASIL</span></div></th>
   
    
   </tr>
   </thead>
   <tbody>
  <?php $no = 1; do { ?>
     <tr>
      
       <td><?php echo $row_rs_alternatif['nama_alternatif']; ?></td>
       <td align="center"><?php echo $row_rs_alternatif['preferentif']; ?></td>
       
       
       </td>
     </tr>

     
     <?php
	 $no++;
	  } while ($row_rs_alternatif = mysqli_fetch_assoc($rs_alternatif)); ?>
     </tbody>
 </table> 
 

</div>



<?php }else{
	pesan('danger','Oops! Nilai belum diproses');
}
?>





 <table>
 <script>
 window.print()
 </script>
 </table>

  
</body>
</html>