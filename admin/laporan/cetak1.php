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

<h3>Laporan Data Perhitungan dengan Metode Weight Sum Model</h3>
<h2>Anggota Pemadam Kebakaran</h2>

</center>

<?php   
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  for ($a = 1; $a <= $_POST['id_tempbobot']; $a++) {
  $insertSQL = sprintf("UPDATE tb_alternatif SET preferentif=%s WHERE id_alternatif=%s",
                       GetSQLValueString($koneksi, $_POST['name'.$a], "double"),
                       GetSQLValueString($koneksi, $_POST['id_tempbobot'.$a], "int"));

  mysqli_select_db($koneksi, $database_koneksi);
  $Result1 = mysqli_query($koneksi, $insertSQL) or die(mysqli_error($koneksi));
  }
  
  echo "
  <script>
  	document.location = '?page=proses/result';
  </script>
  ";
}

mysqli_select_db($koneksi, $database_koneksi);
$query_rs_alternatif = "SELECT * FROM tb_alternatif ORDER BY id_alternatif ASC";
$rs_alternatif = mysqli_query($koneksi, $query_rs_alternatif) or die(mysqli_error($koneksi));
$rs_alternatif2 = mysqli_query($koneksi, $query_rs_alternatif) or die(mysqli_error($koneksi));

$row_rs_alternatif = mysqli_fetch_assoc($rs_alternatif);
$row_rs_alternatif2 = mysqli_fetch_assoc($rs_alternatif2);

$totalRows_rs_alternatif = mysqli_num_rows($rs_alternatif);


mysqli_select_db($koneksi, $database_koneksi);
$query_rs_kriteria = "SELECT id_kriteria, nama_kriteria, bobot_kriteria FROM tb_kriteria";
$rs_kriteria = mysqli_query($koneksi, $query_rs_kriteria) or die(mysqli_error($koneksi));
$rs_kriteria2 = mysqli_query($koneksi, $query_rs_kriteria) or die(mysqli_error($koneksi));

$row_rs_kriteria = mysqli_fetch_assoc($rs_kriteria);
$row_rs_kriteria2 = mysqli_fetch_assoc($rs_kriteria2);

$totalRows_rs_kriteria = mysqli_num_rows($rs_kriteria);
?>

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>


 <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
 <div class="table-responsive">
<table width="100%" class="table table-striped table-bordered">
<thead>
   <tr bgcolor="#003366">
    <th><span class="style1">NO.</span></th>
    <th><span class="style1">NAMA ALTERNATIF</span></th>
    <?php do { ?>
    <th bgcolor="#FF6600"><span class="style1"><?php echo $row_rs_kriteria['nama_kriteria']; ?></span></th>
    
    <?php } while ($row_rs_kriteria = mysqli_fetch_assoc($rs_kriteria)); ?>
    <th bgcolor="#FF6600"><span class="style1">NILAI PREFERENTIF</span></th>
  </tr>
    </thead>
   <tbody>
  <?php $no = 1; do { ?>
    <tr>
      <td align="center"><?php echo $no; ?></td>
      <td><?php echo $row_rs_alternatif['nama_alternatif']; ?></td>
      <?php
	  $total = 0; 
	   for ($a = 1; $a <= $totalRows_rs_kriteria; $a++ ) { 
	  
		mysqli_select_db($koneksi, $database_koneksi);
		$query_rs_bobot =  sprintf("SELECT nilai_bobot, bobot_kriteria FROM tb_bobot INNER JOIN tb_kriteria ON kriteria_id = id_kriteria WHERE alternatif_id = %s AND kriteria_id = %s", 
										GetSQLValueString($koneksi, $row_rs_alternatif['id_alternatif'], "int"),
										GetSQLValueString($koneksi, $a, "int"));
		$rs_bobot = mysqli_query($koneksi, $query_rs_bobot) or die(mysqli_error($koneksi));
		$row_rs_bobot = mysqli_fetch_assoc($rs_bobot);
		$totalRows_rs_bobot = mysqli_num_rows($rs_bobot);
	  ?>
	  <td>
       
	 
	  <?php $hitung = $row_rs_bobot['nilai_bobot'] * $row_rs_bobot['bobot_kriteria']; echo $hitung; ?></td>
      <?php 
	  	$total += $hitung;
	  } ?>
      <td><?php echo $total;?>
          <input type="hidden" name="name<?= $no;?>" value="<?= $total; ?>" />
          <input type="hidden" name="id_tempbobot<?= $no;?>" value="<?= $no;?>" />
      </td>
    </tr>
    <?php 
	$no++;
	} while ($row_rs_alternatif = mysqli_fetch_assoc($rs_alternatif)); ?>
    </tbody>
 </table> 



 <table>
 <script>
 window.print()
 </script>
 </table>

  
</body>
</html>