<?php  
$maxRows_rs_alternatif = 15;
$pageNum_rs_alternatif = 0;
if (isset($_GET['pageNum_rs_alternatif'])) {
  $pageNum_rs_alternatif = $_GET['pageNum_rs_alternatif'];
}
$startRow_rs_alternatif = $pageNum_rs_alternatif * $maxRows_rs_alternatif;

mysqli_select_db($koneksi, $database_koneksi);
$query_rs_alternatif = "SELECT id_alternatif, nama_alternatif FROM tb_alternatif where 1 = 1 ORDER BY id_alternatif ASC ";
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

			mysqli_select_db($koneksi, $database_koneksi);
			$query_rs_bobot = "SELECT id_bobot FROM tb_bobot WHERE 1 = 1";
			$rs_bobot = mysqli_query($koneksi, $query_rs_bobot) or die(mysqli_error($koneksi));
			$row_rs_bobot = mysqli_fetch_assoc($rs_bobot);
			$totalRows_rs_bobot = mysqli_num_rows($rs_bobot);
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


<?php
  pesan('danger','<b>Berikan Nilai Alternatif</b><p>Klik button warna hijau untuk mengisi nilai alternatif</p> ');
 ?>
 <p><a href="?page=alternatif/insert" class="btn btn-xs btn-primary"><span class="fa fa-save"></span> Insert Data</a> </p>
 <?php if ($totalRows_rs_alternatif > 0) { ?>
<div class="table-responsive">
<table width="100%" class="table table-striped table-bordered">
<thead>
   <tr bgcolor="#003366">
     <th width="3%"><span class="style1">NO.</span></th>
     <th width="59%"><span class="style1">NAMA</span></th>
     <th width="%";><span class="style1"></span></th>
     <th width="%";><span class="style1"></span></th>
   </tr>
   </thead>
   <tbody>
  <?php $no = 1; do { ?>
     <tr>
       <td align="center"><a href="?page=alternatif/update&id_alternatif=<?php echo $row_rs_alternatif['id_alternatif']; ?>"><?php echo $no++; ?></a></td>
       <td><?php echo $row_rs_alternatif['nama_alternatif']; ?></td>
       <td align="center"><a href="?page=bobot/insert&id_alternatif=<?php echo $row_rs_alternatif['id_alternatif']; ?>" class="btn btn-success">Berikan Nilai Bobot</a></td>
       <td><a href="?page=alternatif/delete&id_alternatif=<?php echo $row_rs_alternatif['id_alternatif']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Hapus</a></td>
     </tr>
     <?php } while ($row_rs_alternatif = mysqli_fetch_assoc($rs_alternatif)); ?>
     </tbody>
 </table> 
<p>
<?php if ($totalRows_rs_bobot > 0 ) { ?>
<a href="?page=proses/view" class="btn btn-primary">Klik di sini untuk langkah Selanjutnya :  [ Lihat nilai Preferentif ]</a>
<?php } ?>
</p>


</div>
<?php }else{ 
	pesan('danger','Sepertinya Alternatif belum ada. Silahkan Tambahkan Data Alternatif !'); 
}
?>