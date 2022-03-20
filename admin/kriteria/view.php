<?php  
$maxRows_rs_kriteria = 10;
$pageNum_rs_kriteria = 0;
if (isset($_GET['pageNum_rs_kriteria'])) {
  $pageNum_rs_kriteria = $_GET['pageNum_rs_kriteria'];
}
$startRow_rs_kriteria = $pageNum_rs_kriteria * $maxRows_rs_kriteria;

mysqli_select_db($koneksi, $database_koneksi);
$query_rs_kriteria = "SELECT id_kriteria, nama_kriteria, bobot_kriteria FROM tb_kriteria ORDER BY id_kriteria DESC";
$query_limit_rs_kriteria = sprintf("%s LIMIT %d, %d", $query_rs_kriteria, $startRow_rs_kriteria, $maxRows_rs_kriteria);
$rs_kriteria = mysqli_query($koneksi, $query_limit_rs_kriteria) or die(mysqli_error($koneksi));
$row_rs_kriteria = mysqli_fetch_assoc($rs_kriteria);

if (isset($_GET['totalRows_rs_kriteria'])) {
  $totalRows_rs_kriteria = $_GET['totalRows_rs_kriteria'];
} else {
  $all_rs_kriteria = mysqli_query($koneksi, $query_rs_kriteria);
  $totalRows_rs_kriteria = mysqli_num_rows($all_rs_kriteria);
}
$totalPages_rs_kriteria = ceil($totalRows_rs_kriteria/$maxRows_rs_kriteria)-1;
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


 <?php
  pesan('success','<h1>Data Kriteria</h1>');
 ?>
 <p><a href="?page=kriteria/insert" class="btn btn-xs btn-primary"><span class="fa fa-save"></span> Insert Data</a> </p>
<div class="table-responsive">
<table width="100%" class="table table-striped table-bordered">
<thead>
   <tr bgcolor="#003366">
     <th width="3%"><span class="style1">NO.</span></th>
     <th width="46%"><span class="style1">NAMA</span></th>
     <th width="16%"><span class="style1">BOBOT</span></th>
     <th width="8%"><span class="style1"></span></th>
   </tr>
   </thead>
   <tbody>
  <?php $no = 1; do { ?>
     <tr>
       <td align="center"><a href="?page=kriteria/update&id_kriteria=<?php echo $row_rs_kriteria['id_kriteria']; ?>"><?php echo $no++; ?></a></td>
       <td><?php echo $row_rs_kriteria['nama_kriteria']; ?></td>
       <td><?php echo $row_rs_kriteria['bobot_kriteria']; ?></td>
       <td><a href="?page=kriteria/delete&id_kriteria=<?php echo $row_rs_kriteria['id_kriteria']; ?>">Hapus</a></td>
     </tr>
     <?php } while ($row_rs_kriteria = mysqli_fetch_assoc($rs_kriteria)); ?>
     </tbody>
 </table> 
<p><a href="?page=alternatif/view" class="btn btn-primary">Klik di sini untuk langkah Selanjutnya : Entry Data Alternatif ....</a></p>
</div>